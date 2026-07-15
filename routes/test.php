<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SwiftRide — Bus Ticket Booking</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Syne:wght@700;800&display=swap" rel="stylesheet">
<script>
tailwind.config = {
  theme: {
    extend: {
      fontFamily: {
        sans: ['Plus Jakarta Sans', 'sans-serif'],
        display: ['Syne', 'sans-serif'],
      },
      colors: {
        brand: {
          50: '#eff6ff',
          100: '#dbeafe',
          200: '#bfdbfe',
          400: '#60a5fa',
          500: '#3b82f6',
          600: '#1d4ed8',
          700: '#1e40af',
          800: '#1e3a8a',
          900: '#0f172a',
        },
        gold: {
          400: '#fbbf24',
          500: '#f59e0b',
          600: '#d97706',
        }
      }
    }
  }
}
</script>
<style>
  body { font-family: 'Plus Jakarta Sans', sans-serif; }
  .font-display { font-family: 'Syne', sans-serif; }

  /* Page transitions */
  .page { display: none; }
  .page.active { display: block; }

  /* Form input focus & Radio custom highlights */
  input:focus, select:focus { outline: none; border-color: #1d4ed8 !important; box-shadow: 0 0 0 3px rgba(29,78,216,0.15); }
  
  /* Peer selection trick for beautiful radio wrappers */
  .location-radio:checked + label {
    border-color: #1d4ed8;
    background-color: #eff6ff;
    box-shadow: 0 0 0 1px #1d4ed8;
  }
  .location-radio:checked + label .radio-dot {
    border-color: #1d4ed8;
    background-color: #1d4ed8;
  }
</style>
</head>
<body class="bg-slate-50 text-slate-800">

<div id="page-booking" class="page active">

  <header class="bg-white border-b border-slate-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center gap-3 cursor-pointer" onclick="showPage('page-home')">
          <div class="w-9 h-9 bg-brand-600 rounded-xl flex items-center justify-center shadow-md">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 17H5a2 2 0 01-2-2V6a2 2 0 012-2h13a2 2 0 012 2v4M8 17v2m0-2h8m-8 0H5m11 0h2.5M16 17v2M3 10h18M8 6h.01M16 6h.01"/></svg>
          </div>
          <span class="font-display text-xl font-[800] text-brand-900">Swift<span class="text-brand-600">Ride</span></span>
        </div>
        
        <button onclick="showPage('page-results')" class="text-sm font-[600] text-brand-600 hover:text-brand-700 flex items-center gap-1">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
          Back
        </button>
      </div>
    </div>
  </header>

  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
      <div class="p-6 bg-gradient-to-br from-white to-slate-50/50">
        <div class="flex items-center justify-between mb-4">
          <div>
            <span class="text-xs uppercase font-extrabold tracking-wider text-brand-600 bg-brand-50 px-2.5 py-1 rounded-md">Selected Trip</span>
            <h3 class="text-lg font-bold text-brand-900 mt-2">
                {{ $trip->bus->bus_name }}
            </h3>

            <p class="text-sm text-slate-500">
                {{ $trip->bus->registration_number ?? '' }}
            </p>
          </div>
          <div class="text-right">
            <span class="text-xs text-slate-400 block font-medium">Selected Seats</span>
            <div class="flex flex-wrap gap-2 justify-end mt-2">

            @foreach($seats as $seat)

            <span class="font-bold text-brand-700 bg-brand-100 border border-brand-200 px-3 py-1 rounded-lg text-sm">

            {{ $seat->seat_number }}

            </span>

            @endforeach

            </div>
            </div>
        </div>

        <div class="grid grid-cols-7 items-center gap-2 mt-6">
          <div class="col-span-2">
            <span class="text-2xl font-extrabold text-slate-800 tracking-tight">{{ $trip->route->fromRegion->name }}</span>
            <span class="text-xs font-semibold text-slate-500 block mt-0.5">{{ \Carbon\Carbon::parse($trip->departure_time)->format('H:i') }}</span>
            <span class="text-[11px] text-slate-400 block truncate font-medium">{{ $trip->boardingPoint->name }}</span>
          </div>
          
          <div class="col-span-3 flex flex-col items-center justify-center px-2">
            <span class="text-[11px] text-brand-600 font-bold bg-white shadow-sm border border-slate-200 px-2.5 py-0.5 rounded-full mb-1">Direct Route</span>
            <div class="w-full relative flex items-center justify-center">
              <div class="w-full border-t-2 border-dashed border-slate-200"></div>
              <div class="absolute w-2 h-2 rounded-full bg-brand-500"></div>
            </div>
          </div>

          <div class="col-span-2 text-right">
            <span class="text-2xl font-extrabold text-slate-800 tracking-tight">{{ $trip->route->toRegion->name }}</span>
            <span class="text-xs font-semibold text-slate-500 block mt-0.5">{{ \Carbon\Carbon::parse($trip->arrival_time)->format('H:i') }}</span>
            <span class="text-[11px] text-slate-400 block truncate font-medium"></span>
          </div>
        </div>
        <div class="mt-6 bg-blue-50 border border-blue-100 rounded-xl p-4 flex justify-between items-center">


<div>

<p class="text-sm text-slate-500">

Total Amount

</p>


<p class="text-2xl font-extrabold text-blue-700">

TZS {{ number_format($total) }}

</p>


</div>



<div class="text-right">


<p class="text-sm text-slate-500">

{{ count($seats) }} Seat(s)

</p>


<p class="font-semibold">

TZS {{ number_format($trip->price) }} / seat

</p>


</div>


</div>
      </div>
    </div>

<div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-6">
      <h2 class="text-lg font-bold text-brand-900 flex items-center gap-2 pb-4 border-b border-slate-100">
        <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        Select Terminal Locations
      </h2>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
 <div class="space-y-3">

<span class="text-xs uppercase tracking-wider font-extrabold text-slate-400 block">
    Pick-Up Station
</span>


<div class="space-y-3">


@foreach($trip->trip_stops as $stop)


<div>

<input

type="radio"

name="pickup"

id="pickup-{{ $stop->id }}"

value="{{ $stop->location->id }}"

class="hidden peer"

{{ $stop->location->id == $trip->boarding_point_id ? 'checked' : '' }}

>


<label

for="pickup-{{ $stop->id }}"

class="flex items-center justify-between p-4 bg-white border border-slate-200 rounded-xl cursor-pointer hover:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-50 shadow-sm transition"


>


<div>

<span class="font-bold text-slate-800 text-sm">

{{ $stop->location->name }}

</span>


<p class="text-xs text-slate-400 mt-1">

Stop Order: {{ $stop->stop_order }}

</p>


</div>



<div class="w-4 h-4 rounded-full border border-slate-300 peer-checked:bg-blue-600">

</div>



</label>


</div>


@endforeach


</div>


</div>

        <div class="space-y-3">

<span class="text-xs uppercase tracking-wider font-extrabold text-slate-400 block">

Drop-Off Station

</span>



<div class="space-y-3">


@foreach($trip->trip_stops as $stop)


<div>


<input

type="radio"

name="dropoff"

id="dropoff-{{ $stop->id }}"

value="{{ $stop->location->id }}"

class="hidden peer"


{{ $stop->location->id == $trip->dropping_point_id ? 'checked' : '' }}


>


<label

for="dropoff-{{ $stop->id }}"

class="flex items-center justify-between p-4 bg-white border border-slate-200 rounded-xl cursor-pointer hover:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-50 shadow-sm transition"


>


<div>


<span class="font-bold text-slate-800 text-sm">

{{ $stop->location->name }}

</span>


<p class="text-xs text-slate-400 mt-1">

Stop Order: {{ $stop->stop_order }}

</p>


</div>



<div class="w-4 h-4 rounded-full border border-slate-300">

</div>


</label>



</div>


@endforeach


</div>


</div>

{{--  end  --}}

      </div>

      

      <div class="pt-2 flex justify-end">
        <button class="w-full sm:w-auto px-8 py-3.5 bg-brand-600 hover:bg-brand-700 active:bg-brand-800 text-white font-bold rounded-xl shadow-md shadow-brand-600/10 transition-all duration-150 transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
          Confirm Ticket Booking
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>
      </div>

    </div>

  </div>
</div>

























































<div class="space-y-3">

<span class="text-xs uppercase tracking-wider font-extrabold text-slate-400">
Pickup Location
</span>


<div class="space-y-3">


@foreach($pickupLocations as $location)
<div>
<input type="radio" name="pickup_location_id" id="pickup{{$location->id}}" value="{{$location->id}}" class="hidden location-radio" {{ $location->id == $trip->boarding_point_id ? 'checked' : '' }} >



<label for="pickup{{$location->id}}" class="flex items-center justify-between p-4 bg-white border border-slate-200 rounded-xl cursor-pointer shadow-sm">
<div>
<h4 class="font-bold text-sm">{{$location->name}}</h4>


<p class="text-xs text-slate-400">{{$location->type}}</p>

</div>



<div class="radio-circle w-4 h-4 rounded-full border">

</div>


</label>


</div>



@endforeach


</div>


</div>









</body>
</html>