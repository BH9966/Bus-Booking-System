<?php

namespace App\Services;

use App\Models\Bus;
use App\Models\Trip;

class SeatLayoutBuilder
{
    public static function build(
        Trip $trip,
        array $bookedSeatIds,
        array $lockedSeatIds,
        array $selectedSeatIds = []
    ): array {

        $rows = [];

        $bus = $trip->bus;


        $groupedSeats = $bus->seats
            ->sortBy([
                ['row_letter', 'asc'],
                ['layout_column', 'asc'],
            ])
            ->groupBy('row_letter');


        foreach ($groupedSeats as $letter => $seats) {

            $rows[$letter] = self::buildRow(
                $trip,
                $bus,
                $seats,
                $bookedSeatIds,
                $lockedSeatIds,
                $selectedSeatIds
            );

        }


        return $rows;
    }



    protected static function buildRow(
        Trip $trip,
        Bus $bus,
        $seats,
        array $bookedSeatIds,
        array $lockedSeatIds,
        array $selectedSeatIds
    ): array {


        $cells = [];


        /*
        |--------------------------------------------------------------------------
        | Detect rear bench
        |--------------------------------------------------------------------------
        */

        $normalSeats = $bus->left_seats + $bus->right_seats;

        $isRearBench = $seats->count() > $normalSeats;



        /*
        |--------------------------------------------------------------------------
        | Rear Bench
        |--------------------------------------------------------------------------
        */

        if ($isRearBench) {

            foreach ($seats as $seat) {

                $cells[] = self::seatCell(
                    $seat,
                    $bookedSeatIds,
                    $lockedSeatIds,
                    $selectedSeatIds
                );

            }


            return $cells;
        }




        /*
        |--------------------------------------------------------------------------
        | Left side seats
        |--------------------------------------------------------------------------
        */

        foreach ($seats->where('seat_side', 'left') as $seat) {

            $cells[] = self::seatCell(
                $seat,
                $bookedSeatIds,
                $lockedSeatIds,
                $selectedSeatIds
            );

        }




        /*
        |--------------------------------------------------------------------------
        | Bus aisle
        |--------------------------------------------------------------------------
        */

        $cells[] = [
            'type' => 'aisle'
        ];





        /*
        |--------------------------------------------------------------------------
        | Right side seats
        |--------------------------------------------------------------------------
        */

        foreach ($seats->where('seat_side', 'right') as $seat) {

            $cells[] = self::seatCell(
                $seat,
                $bookedSeatIds,
                $lockedSeatIds,
                $selectedSeatIds
            );

        }


        return $cells;
    }





    protected static function seatCell(
        $seat,
        array $bookedSeatIds,
        array $lockedSeatIds,
        array $selectedSeatIds
    ): array {


        /*
        |--------------------------------------------------------------------------
        | Seat Status Priority
        |
        | Disabled
        | Booked
        | Locked
        | Selected
        | Available
        |--------------------------------------------------------------------------
        */


        if ($seat->status === 'disabled') {

            $status = 'disabled';


        } elseif (in_array($seat->id, $bookedSeatIds, true)) {

            $status = 'booked';


        } elseif (in_array($seat->id, $lockedSeatIds, true)) {

            $status = 'locked';


        } elseif (in_array($seat->id, $selectedSeatIds, true)) {

            $status = 'selected';


        } else {

            $status = 'available';

        }



        return [

            'type' => 'seat',

            'seat' => $seat,

            'status' => $status,

            'selected' => $status === 'selected',

            'seat_type' => $seat->seat_type,

        ];
    }
}