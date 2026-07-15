<?php

namespace App\Services;

use App\Models\Bus;
use App\Models\Seat;


class SeatGenerator
{
    public static function generate(Bus $bus): void
    {
        $letters = range('A', 'Z');

        for ($row = 1; $row <= $bus->total_rows; $row++) {

            $letter = $letters[$row - 1];

            $isLastRow = ($row === $bus->total_rows);

            /*
            |--------------------------------------------------------------------------
            | NORMAL ROWS
            |--------------------------------------------------------------------------
            */

            if (! $isLastRow) {

                // LEFT SIDE
                for ($i = 1; $i <= $bus->left_seats; $i++) {

                    Seat::create([
                        'bus_id'        => $bus->id,
                        'seat_number'   => $letter . $i,
                        'row_letter'    => $letter,
                        'seat_position' => $i,
                        'layout_column' => $i,
                        'seat_side'     => 'left',
                        'status'        => 'active',
                        'seat_type'     => 'normal',
                    ]);
                }

                // RIGHT SIDE
                for ($i = 1; $i <= $bus->right_seats; $i++) {

                    Seat::create([
                        'bus_id'        => $bus->id,
                        'seat_number'   => $letter . ($bus->left_seats + $i),
                        'row_letter'    => $letter,
                        'seat_position' => $i,
                        'layout_column' => $bus->left_seats + 1 + $i,
                        'seat_side'     => 'right',
                        'status'        => 'active',
                        'seat_type'     => 'normal',
                    ]);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | REAR ROW
            |--------------------------------------------------------------------------
            */

            else {

                $rearSeats = self::rearRowSeats($bus);

                for ($i = 1; $i <= $rearSeats; $i++) {

                    Seat::create([
                        'bus_id'        => $bus->id,
                        'seat_number'   => $letter . $i,
                        'row_letter'    => $letter,
                        'seat_position' => $i,
                        'layout_column' => $i,

                        // Keep enum valid
                        'seat_side'     => 'left',

                        'status'        => 'active',
                        'seat_type'     => 'normal',
                    ]);
                }
            }
        }
    }

    /**
     * Determine how many seats should be generated
     * in the last row (rear bench).
     */
    protected static function rearRowSeats(Bus $bus): int
    {
        /*
        Common layouts with a full-width rear bench.
        */

        if (
            ($bus->left_seats == 2 && $bus->right_seats == 2) ||
            ($bus->left_seats == 2 && $bus->right_seats == 3)
        ) {
            return ($bus->left_seats + $bus->right_seats) + 1;
        }

       

        return $bus->left_seats + $bus->right_seats;
    }
}