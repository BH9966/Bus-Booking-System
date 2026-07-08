<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Route;
use App\Models\Bus;
use App\Models\Trip;
use App\Models\Location;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class TripForm extends Component
{

     public $step = 1;

    public ?int $bus_id = null;
    public ?int $route_id = null;

    public ?int $boarding_point_id = null;
    public ?int $dropping_point_id = null;

    public ?string $departure_date = null;
    public ?string $departure_time = null;
    public ?string $arrival_time = null;

    public ?float $price = null;
    public $trip_status = 'scheduled';

    public $buses = [];
    public $routes = [];
   public $pickupLocations = [];
   public $dropoffLocations = [];


        public function mount()
        {
            $user = Auth::user();
            $companyId = $user ? $user->company_id : null;

            if (! $companyId) {
                $this->buses = collect();
                $this->routes = collect();
                return;
            }

            $this->buses = Bus::where('company_id', $companyId)
                ->where('bus_status', 'active')
                ->get();

            $this->routes = Route::with(['fromLocation', 'toLocation'])
                ->where('company_id', $companyId)
                ->where('status', 'active')
                ->get();
        }


       public function stepOneNext()
{
    // 1. Standard Validation
    $this->validate([
        'bus_id' => 'required',
        'route_id' => 'required',
    ], [
        'bus_id.required' => 'Please assign a bus for this trip.',
        'route_id.required' => 'Please select a primary route.',
    ]);

    // 2. Check duplicate trip
    $exists = Trip::where('bus_id', $this->bus_id)
        ->where('route_id', $this->route_id)
        ->exists();

    if ($exists) {
        // Tie the error directly to the bus_id input field down below
        $this->addError('bus_id', 'This bus already has an active trip scheduled on this route.');
        return;
    }

    $companyId = Auth::user()->company_id;
    $route = Route::findOrFail($this->route_id);

    // Load route cities & terminals
    $this->routes = Route::with(['fromRegion', 'toRegion'])
        ->where('company_id', $companyId)
        ->where('status', 'active')
        ->get();

    $this->pickupLocations = Location::where('company_id', Auth::user()->company_id)
        ->where('region_id', $route->from_region_id)
        ->where('status', 'active')
        ->whereIn('type', ['city', 'terminal'])
        ->orderBy('name')
        ->get();

    $this->dropoffLocations = Location::where('company_id', Auth::user()->company_id)
        ->where('region_id', $route->to_region_id)
        ->where('status', 'active')
        ->whereIn('type', ['city', 'terminal'])
        ->orderBy('name')
        ->get();

    $this->step = 2;
}
            public function previousStep()
            {
                if ($this->step > 1) {
                    $this->step--;
                }
            }


        public function stepTwoNext()
        {
            $this->validate([
                'boarding_point_id' => 'required|different:dropping_point_id',
                'dropping_point_id' => 'required',
            ], [
                'boarding_point_id.required' => 'Please select a boarding terminal.',
                'boarding_point_id.different' => 'The boarding terminal cannot be the same as the destination stop.',
                'dropping_point_id.required' => 'Please select a destination stop.',
            ]);

            $this->step = 3;
        }


            public function save()
{
    $this->validate([
        'departure_date' => 'required|date|after_or_equal:today',
        'departure_time' => 'required',
        'arrival_time'   => 'required|different:departure_time',
        'price'          => 'required|numeric|min:1',
        'trip_status'    => 'required',
    ], [
        'departure_date.after_or_equal' => 'The departure date cannot be in the past.',
        'arrival_time.different'        => 'The arrival time cannot be the exact same as the departure time.',
        'price.min'                     => 'The fare price must be a valid amount greater than 0.',
        'trip_status.required'          => 'Please select a trip status.',
    ]);

    $bus = Bus::findOrFail($this->bus_id);

    Trip::create([
        'company_id'        => Auth::user()->company_id,
        'bus_id'            => $bus->id,
        'route_id'          => $this->route_id,
        'boarding_point_id' => $this->boarding_point_id,
        'dropping_point_id' => $this->dropping_point_id,
        'departure_date'    => $this->departure_date,
        'departure_time'    => $this->departure_time,
        'arrival_time'      => $this->arrival_time,
        'price'             => $this->price,
        'available_seats'   => $bus->capacity,
        'trip_code'         => 'TRP-' . strtoupper(Str::random(6)),
        'status'            => $this->trip_status,
        'created_by'        => Auth::id(),
    ]);

    $this->reset();
    $this->step = 1;

    session()->flash('success', 'Trip created successfully');

    return redirect()->route('trip');
}

    public function render()
    {
        return view('livewire.trip-form');
    }
}
