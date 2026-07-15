<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\SeatLock;
use App\Models\Trip;
use Illuminate\Http\Request;

class PassengerDetailsController extends Controller
{
    public function index(Request $request)
    {

        /*
        |--------------------------------------------------------------------------
        | Load Trip
        |--------------------------------------------------------------------------
        */

        $trip = Trip::with([
            'bus',
            'route.fromRegion',
            'route.toRegion',
            'boardingPoint',
            'droppingPoint'
        ])
        ->findOrFail($request->trip);



        /*
        |--------------------------------------------------------------------------
        | Get reservation token
        |--------------------------------------------------------------------------
        */

        $reservationToken = $request->reservation_token;


        if(!$reservationToken){

            abort(404, 'Reservation expired.');

        }



        /*
        |--------------------------------------------------------------------------
        | Get locked seats
        |--------------------------------------------------------------------------
        */

        $seatIds = SeatLock::query()

            ->where('trip_id',$trip->id)

            ->where('reservation_token',$reservationToken)

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
        | No seats found
        |--------------------------------------------------------------------------
        */

        if($seats->isEmpty()){

            return redirect()
                ->route('home')
                ->with(
                    'error',
                    'Your seat reservation has expired.'
                );

        }



        /*
        |--------------------------------------------------------------------------
        | Pickup and Dropoff
        |--------------------------------------------------------------------------
        */

        $pickup = $request->pickup;

        $dropoff = $request->dropoff;



        /*
        |--------------------------------------------------------------------------
        | Calculate total
        |--------------------------------------------------------------------------
        */

        $total = $trip->price * $seats->count();



        return view(
            'booking_pages.Passenger.passengerDetails',
            compact(
                'trip',
                'seats',
                'pickup',
                'dropoff',
                'total',
                'reservationToken'
            )
        );

    }
}