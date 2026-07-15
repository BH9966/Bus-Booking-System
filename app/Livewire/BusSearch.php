<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Region;
use App\Models\Route;
class BusSearch extends Component
{
    // Search inputs
    public $from_search = '';
    public $to_search = '';

    // Selected names
    public $selected_from_name = 'Where from?';
    public $selected_to_name = 'Where to?';

    // Selected IDs
    public ?int $selected_from_id = null;
    public ?int $selected_to_id = null;

    public ?string $travel_date;

    protected $rules = [
        'selected_from_id' => 'required|integer',
        'selected_to_id'   => 'required|integer|different:selected_from_id',
        'travel_date'      => 'required|date|after_or_equal:today',
    ];

    protected $messages = [
        'selected_from_id.required' => 'Please select the departure region.',
        'selected_to_id.required'   => 'Please select the destination region.',
        'selected_to_id.different'  => 'Departure and destination cannot be the same.',
        'travel_date.required'      => 'Please select the travel date.',
        'travel_date.after_or_equal'=> 'Travel date cannot be in the past.',
    ];

    public function render()
    {
        $departureRegions = Region::whereHas('fromRoutes', function ($query) {
                $query->where('status', 'active');
            })
            ->when($this->from_search, function ($query) {
                $query->where('name', 'like', '%' . $this->from_search . '%');
            })
            ->orderBy('name')
            ->take(8)
            ->get();

        $destinationRegions = Region::whereHas('toRoutes', function ($query) {
                $query->where('status', 'active');
            })
            ->when($this->to_search, function ($query) {
                $query->where('name', 'like', '%' . $this->to_search . '%');
            })
            ->orderBy('name')
            ->take(8)
            ->get();

        return view('livewire.bus-search', [
            'departureRegions'   => $departureRegions,
            'destinationRegions' => $destinationRegions,
        ]);
    }

    public function selectFromRegion( int $id, string $name)
    {
        $this->selected_from_id = $id;
        $this->selected_from_name = $name;
        $this->from_search = '';
    }

    public function selectToRegion( int $id, string $name)
    {
        $this->selected_to_id = $id;
        $this->selected_to_name = $name;
        $this->to_search = '';
    }

    public function findBus()
{
    $this->validate();

    $from = Region::findOrFail($this->selected_from_id);
    $to   = Region::findOrFail($this->selected_to_id);

    return redirect()->route('search_bus', [
        'from' => $from->slug,
        'to'   => $to->slug,
        'date' => $this->travel_date,
    ]);
}
}