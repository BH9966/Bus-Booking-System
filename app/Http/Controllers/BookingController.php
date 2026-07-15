<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Seat;
use App\Models\SeatLock;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Services\SeatLockService;
class BookingController extends Controller
{ 

     protected SeatLockService $seatLockService;


    public function __construct(
        SeatLockService $seatLockService
    ){

        $this->seatLockService = $seatLockService;

    }


    // release logic when back button clicked in the PassengerStops


    public function releaseSeatReservation(Request $request)
{

    $reservationToken = $request->reservation_token;


    if($reservationToken){

        $this->seatLockService
            ->releaseReservation(
                $reservationToken
            );


    }


    session()->forget([
        'reservation',
        'seat_limit'
    ]);


    return response()->json([
        'status'=>'released'
    ]);

}

    public function passengerView(Request $request)
    {

        /*
        |--------------------------------------------------------------------------
        | Load Trip
        |--------------------------------------------------------------------------
        */

        $trip = Trip::with([

            'bus',

            'route',

            'route.fromRegion',

            'route.toRegion',

            'boardingPoint',

            'droppingPoint',

        ])
        ->findOrFail($request->trip);



        /*
        |--------------------------------------------------------------------------
        | Reservation Token
        |--------------------------------------------------------------------------
        */

        $reservationToken = $request->reservation_token;



        if(!$reservationToken){

            abort(404,'Reservation not found.');

        }



        /*
        |--------------------------------------------------------------------------
        | Get seats from seat_locks
        |--------------------------------------------------------------------------
        */

        $seatIds = SeatLock::query()

            ->where('trip_id',$trip->id)

            ->where(
                'reservation_token',
                $reservationToken
            )

            ->where('status','active')

            ->where(
                'locked_until',
                '>',
                now()
            )

            ->pluck('seat_id')

            ->toArray();



        /*
        |--------------------------------------------------------------------------
        | Load seats
        |--------------------------------------------------------------------------
        */

        $seats = Seat::whereIn(
            'id',
            $seatIds
        )
        ->get();



        /*
        |--------------------------------------------------------------------------
        | No seats means reservation expired
        |--------------------------------------------------------------------------
        */

        if($seats->count() == 0){

            abort(
                404,
                'Your seat reservation has expired.'
            );

        }



        /*
        |--------------------------------------------------------------------------
        | Pickup locations
        |--------------------------------------------------------------------------
        */

        $pickupLocations = Location::where(
                'region_id',
                $trip->route->from_region_id
            )

            ->where('status','active')

            ->whereIn(
                'type',
                [
                    'city',
                    'terminal'
                ]
            )

            ->orderBy('name')

            ->get();



        /*
        |--------------------------------------------------------------------------
        | Dropoff locations
        |--------------------------------------------------------------------------
        */

        $dropoffLocations = Location::where(
                'region_id',
                $trip->route->to_region_id
            )

            ->where('status','active')

            ->whereIn(
                'type',
                [
                    'city',
                    'terminal'
                ]
            )

            ->orderBy('name')

            ->get();



        /*
        |--------------------------------------------------------------------------
        | Total Price
        |--------------------------------------------------------------------------
        */

        $total = $seats->count() * $trip->price;



        return view(
            'booking_pages.Passenger.passengerSelectStops',
            [

                'trip'=>$trip,

                'seats'=>$seats,

                'total'=>$total,

                'pickupLocations'=>$pickupLocations,

                'dropoffLocations'=>$dropoffLocations,

                'reservationToken'=>$reservationToken,

            ]
        );

    }

}