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


    .spinner{
    width:22px;
    height:22px;
    border:3px solid rgba(255,255,255,.25);
    border-top-color:#fff;
    border-radius:50%;
    animation:spin .65s linear infinite;
}

@keyframes spin{
    to{
        transform:rotate(360deg);
    }
}
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
            
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="white"><!--!Font Awesome Pro v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2026 Fonticons, Inc.--><path fill="rgb(255, 255, 255)" d="M192 64C139 64 96 107 96 160L96 448C96 477.8 116.4 502.9 144 510L144 544C144 561.7 158.3 576 176 576L192 576C209.7 576 224 561.7 224 544L224 512L416 512L416 544C416 561.7 430.3 576 448 576L464 576C481.7 576 496 561.7 496 544L496 510C523.6 502.9 544 477.8 544 448L544 160C544 107 501 64 448 64L192 64zM160 192C160 174.3 174.3 160 192 160L448 160C465.7 160 480 174.3 480 192L480 288C480 305.7 465.7 320 448 320L192 320C174.3 320 160 305.7 160 288L160 192zM192 384C209.7 384 224 398.3 224 416C224 433.7 209.7 448 192 448C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384zM448 384C465.7 384 480 398.3 480 416C480 433.7 465.7 448 448 448C430.3 448 416 433.7 416 416C416 398.3 430.3 384 448 384z"/></svg>
          </div>
        <a href="{{ route('home') }}">  <span class="font-display text-xl font-800 text-blue-900">Bus<span class="text-blue-600">Poa</span></span> </a>
        </div>
        
       <button 
    type="button"
    onclick="releaseReservation()"
    class="inline-flex items-center gap-2 text-sm font-semibold text-brand-600 hover:text-brand-700 transition">


    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M15 19l-7-7 7-7"/>
    </svg>

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
                {{ $trip->bus->plate_number ?? '' }}
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
            <span class="text-base font-extrabold text-slate-800 tracking-tight">{{ $trip->route->fromRegion->name }}</span>
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
            <span class="text-base font-extrabold text-slate-800 tracking-tight">{{ $trip->route->toRegion->name }}</span>
            <span class="text-xs font-semibold text-slate-500 block mt-0.5">{{ \Carbon\Carbon::parse($trip->arrival_time)->format('H:i') }}</span>
            <span class="text-[11px] text-slate-400 block truncate font-medium">{{ $trip->droppingPoint->name }}</span>
          </div>
        </div>
        {{--  start amount cards  --}}
 <div class="mt-6 bg-blue-50 border border-blue-100 rounded-xl p-4 flex justify-between items-center">

<div>

<p class="text-sm text-slate-500"> Total Amount </p>

<p class="text-2xl font-extrabold text-blue-700"> TZS {{ number_format($total) }} </p>


</div>

<div class="text-right">
<p class="text-sm text-slate-500"> {{ count($seats) }} Seat(s) </p>

<p class="font-semibold"> TZS {{ number_format($trip->price) }} / seat </p>

</div>      
</div>
{{--  end  --}}
      </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-6">
      <h2 class="text-lg font-bold text-brand-900 flex items-center gap-2 pb-4 border-b border-slate-100">
        <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        Select Terminal Locations
      </h2>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <div class="space-y-3">
          <span class="text-xs uppercase tracking-wider font-extrabold text-slate-400 block">Pick-Up Station</span>
          <div class="space-y-3">
            @foreach($pickupLocations as $index => $location)
              <div>
                <input type="radio" name="pickup_location_id" id="pickup{{$location->id}}" value="{{$location->id}}"  onchange="document.getElementById('selectedPickup').value=this.value"  class="hidden peer location-radio" {{ $index == 0 ? 'checked' : '' }}>
                <label for="pickup{{$location->id}}" class="flex items-center justify-between p-4 bg-white border border-slate-200 rounded-xl cursor-pointer hover:border-brand-200 transition-all duration-200 shadow-sm block">
                  <div class="flex flex-col">
                    <span class="font-bold text-slate-800 text-sm">{{$location->name}}</span>
                    <span class="text-xs text-slate-400 mt-0.5">{{$location->type}}</span>
                  </div>
                  <div class="w-4 h-4 rounded-full border border-slate-300 flex items-center justify-center radio-dot transition-all duration-200">
                    <div class="w-1.5 h-1.5 rounded-full bg-white"></div>
                  </div>
                </label>
              </div>
            @endforeach
          </div>
        </div>

        <div class="space-y-3">
          <span class="text-xs uppercase tracking-wider font-extrabold text-slate-400 block">Drop-Off Station</span>
          <div class="space-y-3">
            @foreach($dropoffLocations as $location)
              <div>
                <input type="radio" name="dropoff_location_id" id="dropoff{{$location->id}}" value="{{$location->id}}"  onchange="document.getElementById('selectedDropoff').value=this.value"  class="hidden peer location-radio" {{ $location->id == $trip->dropping_point_id ? 'checked' : '' }}>
                <label for="dropoff{{$location->id}}" class="flex items-center justify-between p-4 bg-white border border-slate-200 rounded-xl cursor-pointer hover:border-brand-200 transition-all duration-200 shadow-sm block">
                  <div class="flex flex-col">
                    <span class="font-bold text-slate-800 text-sm">{{$location->name}}</span>
                    <span class="text-xs text-slate-400 mt-0.5">{{$location->type}}</span>
                  </div>
                  <div class="w-4 h-4 rounded-full border border-slate-300 flex items-center justify-center radio-dot transition-all duration-200">
                    <div class="w-1.5 h-1.5 rounded-full bg-white"></div>
                  </div>
                </label>
              </div>
            @endforeach
          </div>
        </div>

      </div>

      

<form action="{{ route('passenger.details') }}" method="GET">

    @csrf


    <!-- Trip ID -->
    <input type="hidden"
           name="trip"
           value="{{ $trip->id }}">


    <!-- Reservation Token -->
    <input type="hidden"
           name="reservation_token"
           value="{{ $reservationToken }}">



    <!-- Pickup Location -->

    <input type="hidden"
           name="pickup"
           id="selectedPickup">



    <!-- Dropoff Location -->

    <input type="hidden"
           name="dropoff"
           id="selectedDropoff">



    <div class="pt-2 flex justify-end">


        <button
            id="confirmBookingBtn"
            type="submit"
            class="w-full sm:w-auto px-8 py-3.5 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-xl shadow-md transition flex items-center justify-center">


            <span id="btnText" class="flex items-center gap-2">

                Confirm Ticket Booking


                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M14 5l7 7m0 0l-7 7m7-7H3"/>

                </svg>

            </span>



            <span id="btnSpinner" class="hidden spinner"></span>


        </button>


    </div>


</form>

    </div>

  </div>
</div>

<script>

const form = document.querySelector('form');

form.addEventListener('submit', function () {

    document.getElementById('btnText').classList.add('hidden');
    document.getElementById('btnSpinner').classList.remove('hidden');

});

// Restore button when page is loaded from browser cache (Back button)
window.addEventListener('pageshow', function () {

    document.getElementById('btnText').classList.remove('hidden');
    document.getElementById('btnSpinner').classList.add('hidden');

});

</script>


<script>

document.addEventListener('DOMContentLoaded', function(){


    let pickup = document.querySelector(
        'input[name="pickup_location_id"]:checked'
    );


    let dropoff = document.querySelector(
        'input[name="dropoff_location_id"]:checked'
    );


    if(pickup){

        document.getElementById('selectedPickup').value =
            pickup.value;

    }



    if(dropoff){

        document.getElementById('selectedDropoff').value =
            dropoff.value;

    }


});

</script>


{{--  logic for release in back button  --}}

<script>

function releaseReservation()
{

    fetch(
        "{{ route('booking.releaseReservation') }}",
        {
            method:"POST",

            headers:{
                "Content-Type":"application/json",

                "X-CSRF-TOKEN":
                "{{ csrf_token() }}"
            },

            body:JSON.stringify({

                reservation_token:
                "{{ $reservationToken }}"

            })

        }
    )
    .then(response=>response.json())

    .then(data=>{

        window.history.back();

    });


}

</script>

</body>
</html>