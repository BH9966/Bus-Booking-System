<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Region;


class SearchBus extends Controller
{
     public function index(
    Region $from,
    Region $to,
    string $date
)
{
    $trips = Trip::with([
    'bus.company',
    'route',
    'boardingPoint',
    'droppingPoint'
])
->where('status', 'scheduled')
->whereDate('departure_date', $date)
->whereHas('route', function ($query) use ($from, $to) {
    $query->where('from_region_id', $from->id)
          ->where('to_region_id', $to->id);
})
->orderBy('departure_time')
->get();

$busCount = $trips->unique('bus_id')->count();

$companyCount = $trips->pluck('bus.company_id')
                      ->unique()
                      ->count();

return view('booking_pages.SearchResult.searchresult', compact(
    'trips',
    'busCount',
    'companyCount',
    'from',
    'to',
    'date'
));
}
    }   

