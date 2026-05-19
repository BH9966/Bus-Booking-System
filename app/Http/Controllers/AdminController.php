<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Location;
use App\Models\Route;
use App\Models\Trip;
class AdminController extends Controller
{
    //
    public function index()
    {
        return view('adminpage.dashboard');
    }
    public function showBuses()
    {
        $buses= Bus::with(['company','creator'])->paginate(10);
        return view('adminpage.buses.bus',compact('buses'));
    }
    public function addBus(Request $request)
    {
        $existsBusNumber = Bus::where('bus_number', $request->bus_number)->first();
        if ($existsBusNumber) {
            return back()->with('errors', 'Bus number already exists');
        }

        $existsPlate = Bus::where('plate_number', $request->plate_number)->first();
        if ($existsPlate) {
            return back()->with('errors', 'Plate number already exists');
        }
        $imagePath = null;

        if ($request->hasFile('imagePath')) {
            $file = $request->file('imagePath');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/buses'), $fileName);
            $imagePath = 'uploads/buses/'.$fileName;
        }
          if (!Auth::user()->company_id) {
           return back()->with('errors', 'User is not assigned to any company');
         }
          $companyId = Auth::user()->company_id;
            Bus::create([
            'company_id'   => $companyId,
            'bus_name' =>$request->bus_name,
            'bus_number'   => $request->bus_number,
            'plate_number' => $request->plate_number,
            'model'        => $request->model,
            'bus_type'     => $request->bus_type,
            'capacity'     => $request->capacity,
            'bus_status'   => $request->bus_status ?? 'active',
            'image'        => $imagePath,
            'created_by'   => Auth::id(),
        ]);
        return back()->with('success', 'Bus created successfully');
    
    }
    public function deleteBus( int $id)

    {
        $bus = Bus::findOrFail($id);
        $bus->delete();

    return redirect()->back()->with('success', 'Bus deleted successfully!');
    }
    public function viewseat()
    {
        return view('adminpage.buses.seat');
    }
    public function viewlocation()
    {
         $locations= Location::with(['creator'])->paginate(2);
        return view('adminpage.location.location',compact('locations'));
    }
    public function storeLocation(Request $request )
    {


    if (
        empty($request->name) ||
        empty($request->city)
    ) {
        return back()->with('errors', 'Station name and city are required');
    }


    $name = strtolower(trim($request->name));
    $city = strtolower(trim($request->city));

 
    $exists = Location::whereRaw('LOWER(name) = ?', [$name])
        ->whereRaw('LOWER(city) = ?', [$city])
        ->first();

    if ($exists) {
        return back()->with('errors', 'This station already exists');
    }

   
    // $exists = Location::where('company_id', Auth::user()->company_id)
    //     ->where('name', $request->name)
    //     ->first();

    // if ($exists) {
    //     return back()->with('errors', 'Station already exists');
    // }

    
    Location::create([
        'company_id' => Auth::user()->company_id,
        'name'       => $request->name,
        'city'       => $request->city,
        'status'     => $request->status ?? 'active',
        'created_by' => Auth::id(),
    ]);

    return back()->with('success', 'Station created successfully');

    }
    public function deletelocation(int $id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

    return redirect()->back()->with('success', 'Location deleted successfully!');
    }

    public function viewroots()
    {
         $routes = Route::with(['fromLocation', 'toLocation', 'creator'])  ->paginate(10);

         $locations = Location::all(); // IMPORTANT for dropdown

    return view('adminpage.roots.root', compact('routes', 'locations'));;
    }


    public function storeRoute(Request $request)
{
   
    if (
        empty($request->from_location_id) ||
        empty($request->to_location_id) ||
        empty($request->distance_km) ||
        empty($request->estimated_duration)
    ) {
        return back()->with('errors', 'All fields are required');
    }

    // 2. From & To must be different
    if ($request->from_location_id == $request->to_location_id) {
        return back()->with('errors', 'From and To stations must be different');
    }

    // 3. Check duplicate route
    // $exists = Route::where('company_id', Auth::user()->company_id)
    //     ->where('from_location_id', $request->from_location_id)
    //     ->where('to_location_id', $request->to_location_id)
    //     ->first();

    // if ($exists) {
    //     return back()->with('errors', 'Route already exists');
    // }

    // 4. Create route
    Route::create([
        'from_station_id'     => $request->from_location_id,
        'to_station_id'       => $request->to_location_id,
        'distance_km'          => $request->distance_km,
        'estimated_duration'   => $request->estimated_duration,
        'status'               => $request->status ?? 'active',
        'created_by'           => Auth::id(),
    ]);

    return back()->with('success', 'Route created successfully');
}

 public function deleteroot( int $id)

    {
        $route = Route::findOrFail($id);
        $route->delete();

    return redirect()->back()->with('success', 'Route deleted successfully!');
    }
    public function viewtrip()
    {
        $companyId = Auth::user()->company_id;

    $buses = Bus::where('company_id', $companyId)
        ->where('bus_status', 'active')
        ->get();

    $routes = Route::with(['fromLocation', 'toLocation'])
        ->where('status', 'active')
        ->get();

    $locations = Location::where('status', 'active')->get();

    $trips = Trip::with(['bus', 'route'])
        ->where('company_id', $companyId)
        ->latest()
        ->paginate(10);

    return view('adminpage.trip.trip', compact(
        'buses',
        'routes',
        'locations',
        'trips'
    ));
    }
    public function storeTrip(Request $request)
{
  
    if (
        empty($request->bus_id) ||
        empty($request->route_id) ||
        empty($request->departure_date) ||
        empty($request->departure_time) ||
        empty($request->arrival_time) ||
        empty($request->boarding_point_id) ||
        empty($request->dropping_point_id) ||
        empty($request->price)
    ) {
        return back()->with('errors', 'All fields are required');
    }

   
    if ($request->boarding_point_id == $request->dropping_point_id) {
        return back()->with('errors', 'Boarding and dropping points must differ');
    }

    // 3. Get bus & validate company
    $bus = Bus::where('id', $request->bus_id)
        ->where('company_id', Auth::user()->company_id)
        ->first();
      
    if (!$bus) {
        return back()->with('errors', 'Invalid bus selected');
    }

    // 4. Create trip
    Trip::create([
        'company_id'        => Auth::user()->company_id,
        'bus_id'            => $bus->id,
        'route_id'          => $request->route_id,
        'departure_date'    => $request->departure_date,
        'departure_time'    => $request->departure_time,
        'arrival_time'      => $request->arrival_time,
        'boarding_point_id' => $request->boarding_point_id,
        'dropping_point_id' => $request->dropping_point_id,
        'price'             => $request->price,
        'available_seats'   => $bus->capacity,
        'trip_code'         => 'TRP-' . strtoupper(Str::random(6)),
        'trip_status'       => 'scheduled',
        'bus_trip_status'   => 'waiting',
        'created_by'        => Auth::id(),
    ]);

    return back()->with('success', 'Trip created successfully');
}
}
