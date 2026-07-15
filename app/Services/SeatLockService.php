<?php

namespace App\Services;

use App\Models\BookedSeat;
use App\Models\SeatLock;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SeatLockService
{

    /**
     * Create temporary seat reservation.
     *
     * @throws \Exception
     */
 public function lockSeats(
    Trip $trip,
    array $seatIds,
    ?string $existingToken = null
): string {

    $reservationToken = $existingToken ?? Str::uuid()->toString();


    return DB::transaction(function () use (
        $trip,
        $seatIds,
        $reservationToken
    ) {


        foreach ($seatIds as $seatId) {


            /*
            |--------------------------------------------------------------------------
            | Remove expired locks first
            |--------------------------------------------------------------------------
            */

            SeatLock::where('locked_until','<',now())
                ->delete();



            /*
            |--------------------------------------------------------------------------
            | Check booked seats
            |--------------------------------------------------------------------------
            */

            $booked = BookedSeat::query()
                ->where('seat_id',$seatId)
                ->whereHas('booking',function($query) use ($trip){

                    $query->where('trip_id',$trip->id)
                          ->where('status','confirmed');

                })
                ->exists();



            if($booked){

                throw new \Exception(
                    "Seat already booked."
                );

            }




            /*
            |--------------------------------------------------------------------------
            | Check active lock by another customer
            |--------------------------------------------------------------------------
            */

            $locked = SeatLock::query()

                ->where('trip_id',$trip->id)

                ->where('seat_id',$seatId)

                ->where('status','active')

                ->where('locked_until','>',now())

                ->where(function($query) use ($reservationToken){

                    $query->whereNull('reservation_token')
                          ->orWhere(
                              'reservation_token',
                              '!=',
                              $reservationToken
                          );

                })

                ->exists();



            if($locked){

                throw new \Exception(
                    "Seat is locked by another passenger."
                );

            }



            /*
            |--------------------------------------------------------------------------
            | Update existing lock or create new one
            |--------------------------------------------------------------------------
            */

            SeatLock::updateOrCreate(

                [
                    'trip_id'=>$trip->id,
                    'seat_id'=>$seatId,
                ],

                [

                    'reservation_token'=>$reservationToken,

                    'user_id'=>Auth::id(),

                    'locked_until'=>now()->addMinutes(10),

                    'ip_address'=>request()->ip(),

                    'device_info'=>request()->userAgent(),

                    'status'=>'active',

                ]

            );


        }


        return $reservationToken;


    });

}





    /**
     * Release all seats belonging to a reservation.
     *
     * Used when passenger abandons booking
     * or selects another trip.
     */
    public function releaseReservation(string $reservationToken): void
    {

        SeatLock::query()

            ->where(
                'reservation_token',
                $reservationToken
            )

            ->delete();

    }





    /**
     * Check if reservation still exists.
     */
    public function hasActiveReservation(
        string $reservationToken
    ): bool {

        return SeatLock::query()

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

            ->exists();

    }





    /**
     * Remove expired locks.
     *
     * Can be called by Laravel Scheduler.
     */
    public function clearExpiredLocks(): void
    {

        SeatLock::query()

            ->where(
                'locked_until',
                '<=',
                now()
            )

            ->delete();

    }


}