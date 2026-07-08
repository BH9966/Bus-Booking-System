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
            $this->validate([
                'bus_id' => 'required',
                'route_id' => 'required',
            ]);

            // Check duplicate trip
            $exists = Trip::where('bus_id', $this->bus_id)
                ->where('route_id', $this->route_id)
                ->exists();

            if ($exists) {
                session()->flash('error', 'This bus already has a trip on this route');
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
                ]);

                $this->step = 3;
            }


            public function save()
{
    $this->validate([
        'departure_date' => 'required',
        'departure_time' => 'required',
        'arrival_time' => 'required',
        'price' => 'required|numeric',
    ]);

    $bus = Bus::findOrFail($this->bus_id);

    Trip::create([
        'company_id' => Auth::user()->company_id,
        'bus_id' => $bus->id,
        'route_id' => $this->route_id,
        'boarding_point_id' => $this->boarding_point_id,
        'dropping_point_id' => $this->dropping_point_id,
        'departure_date' => $this->departure_date,
        'departure_time' => $this->departure_time,
        'arrival_time' => $this->arrival_time,
        'price' => $this->price,
        'available_seats' => $bus->capacity,
        'trip_code' => 'TRP-' . strtoupper(Str::random(6)),
        'status' => $this->trip_status,
        'created_by'        => Auth::id(),
    ]);

    $this->reset();
    $this->step = 1;

    session()->flash('success','Trip created successfully');

    return redirect()->route('trip');
    }

    public function render()
    {
        return view('livewire.trip-form');
    }
}
