<?php

namespace App\Livewire;

use App\Models\BookedSeat;
use App\Models\SeatLock;
use App\Models\Trip;
use App\Services\SeatLayoutBuilder;
use App\Services\SeatLockService;
use Livewire\Attributes\On;
use Livewire\Component;

class SeatSelectorModal extends Component
{
    protected SeatLockService $seatLockService;

    public bool $show = false;

    public ?Trip $trip = null;

    public array $rows = [];

    /*
    |--------------------------------------------------------------------------
    | Currently selected seats by this customer
    |--------------------------------------------------------------------------
    */
    public array $selectedSeats = [];

    public int $maxSeats = 5;


    #[On('open-seat-selector')]
    public function open(int $tripId)
    {
        /*
        |--------------------------------------------------------------------------
        | Load Trip
        |--------------------------------------------------------------------------
        */

        $this->trip = Trip::with([
    'bus.seats',
    'route.fromRegion',
    'route.toRegion',
    'company',
    'boardingPoint',
    'droppingPoint',
     ])->findOrFail($tripId);


        /*
        |--------------------------------------------------------------------------
        | Reset previous selection
        |--------------------------------------------------------------------------
        */

        $this->selectedSeats = [];


        $this->buildLayout();


        $this->show = true;
    }


    public function boot(SeatLockService $seatLockService)
{
    $this->seatLockService = $seatLockService;
}


    /*
    |--------------------------------------------------------------------------
    | Build Seat Layout
    |--------------------------------------------------------------------------
    */

public function buildLayout()
{
    /*
    |--------------------------------------------------------------------------
    | Current Passenger Reservation Token
    |--------------------------------------------------------------------------
    */

    $reservation = session('reservation');

    $reservationToken = null;

    if ($reservation) {

        $reservationToken = $reservation['reservation_token'];

    }

    /*
    |--------------------------------------------------------------------------
    | Confirmed Booked Seats
    |--------------------------------------------------------------------------
    */

    $bookedSeatIds = BookedSeat::query()

        ->whereHas('booking', function ($query) {

            $query->where('trip_id', $this->trip->id)
                  ->where('status', 'confirmed');

        })

        ->pluck('seat_id')

        ->toArray();

    /*
    |--------------------------------------------------------------------------
    | Active Locked Seats
    |--------------------------------------------------------------------------
    | Exclude seats locked by the current passenger.
    */

    $lockedSeatIds = SeatLock::query()

        ->where('trip_id', $this->trip->id)

        ->where('status', 'active')

        ->where('locked_until', '>', now())

        ->when(

            $reservationToken,

            function ($query) use ($reservationToken) {

                $query->where(
                    'reservation_token',
                    '!=',
                    $reservationToken
                );

            }

        )

        ->pluck('seat_id')

        ->toArray();

    /*
    |--------------------------------------------------------------------------
    | Generate Seat Layout
    |--------------------------------------------------------------------------
    */

    $this->rows = SeatLayoutBuilder::build(

        $this->trip,

        $bookedSeatIds,

        $lockedSeatIds,

        $this->selectedSeats

    );
}




    public function toggleSeat(int $seatId)
{
    /*
    |--------------------------------------------------------------------------
    | Remove seat if already selected
    |--------------------------------------------------------------------------
    */
    session()->forget('seat_limit');

    if (in_array($seatId, $this->selectedSeats)) {

        $this->selectedSeats = array_values(
            array_diff(
                $this->selectedSeats,
                [$seatId]
            )
        );

        $this->buildLayout();

        return;
    }

    /*
    |--------------------------------------------------------------------------
    | Maximum seat limit
    |--------------------------------------------------------------------------
    */

    if (count($this->selectedSeats) >= $this->maxSeats) {

        session()->flash(
            'seat_limit',
            "You can select a maximum of {$this->maxSeats} seats."
        );

        return;
    }

    /*
    |--------------------------------------------------------------------------
    | Ensure seat is not already booked
    |--------------------------------------------------------------------------
    */

    $isBooked = BookedSeat::query()

        ->where('seat_id', $seatId)

        ->whereHas('booking', function ($query) {

            $query->where('trip_id', $this->trip->id)
                  ->where('status', 'confirmed');

        })

        ->exists();

    if ($isBooked) {

        session()->flash(
            'seat_limit',
            'This seat has already been booked.'
        );

        $this->buildLayout();

        return;
    }

    /*
    |--------------------------------------------------------------------------
    | Ensure seat is not locked by another passenger
    |--------------------------------------------------------------------------
    */

    $reservation = session('reservation');

    $reservationToken = null;

    if ($reservation) {

        $reservationToken = $reservation['reservation_token'];

    }

    $isLocked = SeatLock::query()

        ->where('trip_id', $this->trip->id)

        ->where('seat_id', $seatId)

        ->where('status', 'active')

        ->where('locked_until', '>', now())

        ->when(

            $reservationToken,

            function ($query) use ($reservationToken) {

                $query->where(
                    'reservation_token',
                    '!=',
                    $reservationToken
                );

            }

        )

        ->exists();

    if ($isLocked) {

        session()->flash(
            'seat_limit',
            'This seat has just been reserved by another passenger.'
        );

        $this->buildLayout();

        return;
    }

    /*
    |--------------------------------------------------------------------------
    | Add seat
    |--------------------------------------------------------------------------
    */

    $this->selectedSeats[] = $seatId;

    /*
    |--------------------------------------------------------------------------
    | Refresh layout
    |--------------------------------------------------------------------------
    */

    $this->buildLayout();
}


   public function close()
{
    session()->forget('seat_limit');


    $reservation = session('reservation');


    if ($reservation) {


        /*
        |--------------------------------------------------------------------------
        | Release reservation
        |--------------------------------------------------------------------------
        */

        $this->seatLockService
            ->releaseReservation(
                $reservation['reservation_token']
            );


        session()->forget('reservation');

    }


    $this->reset([
        'trip',
        'rows',
        'show',
        'selectedSeats',
    ]);
}

    /*
|--------------------------------------------------------------------------
| Confirm Selected Seats
|--------------------------------------------------------------------------
*/

  /*
|--------------------------------------------------------------------------
| Confirm Selected Seats
|--------------------------------------------------------------------------
*/

public function confirmSeats()
{
    /*
    |--------------------------------------------------------------------------
    | Ensure at least one seat selected
    |--------------------------------------------------------------------------
    */

    if (count($this->selectedSeats) === 0) {

        session()->flash(
            'seat_limit',
            'Please select at least one seat.'
        );

        return;
    }


    try {


        /*
        |--------------------------------------------------------------------------
        | Check existing reservation
        |--------------------------------------------------------------------------
        */

        $oldReservation = session('reservation');


        if ($oldReservation) {


            /*
            |--------------------------------------------------------------------------
            | If old reservation belongs to another trip
            | release old seats
            |--------------------------------------------------------------------------
            */

            if (
                $oldReservation['trip_id']
                !=
                $this->trip->id
            ) {


                $this->seatLockService
                    ->releaseReservation(
                        $oldReservation['reservation_token']
                    );


                session()->forget('reservation');

            }

        }



        /*
        |--------------------------------------------------------------------------
        | Get existing token for same trip
        |--------------------------------------------------------------------------
        */

        $existingToken = null;


        $reservation = session('reservation');


        if ($reservation) {


            if (
                $reservation['trip_id']
                ==
                $this->trip->id
            ) {

                $existingToken =
                    $reservation['reservation_token'];

            }

        }



        /*
        |--------------------------------------------------------------------------
        | Lock seats
        |--------------------------------------------------------------------------
        */

        $reservationToken =
            $this->seatLockService->lockSeats(

                $this->trip,

                $this->selectedSeats,

                $existingToken

            );



        /*
        |--------------------------------------------------------------------------
        | Save reservation in session
        |--------------------------------------------------------------------------
        */

        session([

            'reservation' => [

                'trip_id' => $this->trip->id,

                'reservation_token' => $reservationToken,

            ]

        ]);



        /*
        |--------------------------------------------------------------------------
        | Redirect passenger details
        |--------------------------------------------------------------------------
        */

        return redirect()->route(
            'passenger_view',
            [

                'trip' => $this->trip->id,

                'reservation_token' => $reservationToken,

            ]
        );



    } catch (\Exception $e) {


        /*
        |--------------------------------------------------------------------------
        | Seat became unavailable
        |--------------------------------------------------------------------------
        */

        session()->flash(
            'seat_limit',
            $e->getMessage()
        );


        /*
        |--------------------------------------------------------------------------
        | Refresh seat map
        |--------------------------------------------------------------------------
        */

        $this->buildLayout();


        return;

    }
}



    public function render()
    {
        return view('livewire.seat-selector-modal');
    }
}