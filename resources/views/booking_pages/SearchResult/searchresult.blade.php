<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SwiftRide — Bus Ticket Booking</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
    {{--  seat selector css  --}}


.seat{

    width:42px;

    height:42px;

    border-radius:12px;

    font-size:.75rem;

    font-weight:600;

    display:flex;

    align-items:center;

    justify-content:center;

    transition:.25s;

}

.seat-available{

    border:2px solid #2563eb;

    background:#eff6ff;

    color:#2563eb;

    cursor:pointer;

}

.seat-available:hover{

    transform:translateY(-2px);

}

.seat-occupied{

    background:#CBD5E1;

    color:white;

    cursor:not-allowed;

}

.seat-selected{

    background:#22c55e;

    color:white;

    cursor:pointer;

}

.seat-booked{

    background:#ef4444;

    color:white;

    cursor:not-allowed;

}

.seat-locked{

    background:#facc15;

    color:#111827;

    cursor:not-allowed;

}

.seat-disabled{

    background:#9ca3af;

    color:white;

    cursor:not-allowed;

}

{{--  end seat css  --}}

{{--  seat smooth   --}}

.hide-scrollbar::-webkit-scrollbar{
    width:6px;
}

.hide-scrollbar::-webkit-scrollbar-thumb{
    background:#cbd5e1;
    border-radius:999px;
}

.hide-scrollbar{
    scrollbar-width:thin;
}
{{--  end  --}}

  body { font-family: 'Plus Jakarta Sans', sans-serif; }
  .font-display { font-family: 'Syne', sans-serif; }

  /* Carousel */
  .carousel-inner { display: flex; transition: transform 0.6s cubic-bezier(.4,0,.2,1); }
  .carousel-slide { min-width: 100%; }

  /* Seat styles */
  .seat { width: 36px; height: 36px; border-radius: 8px; border: 2px solid; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 600; transition: all 0.15s; }
  .seat-available { border-color: #1d4ed8; background: #eff6ff; color: #1d4ed8; }
  .seat-available:hover { background: #1d4ed8; color: white; transform: scale(1.08); }
  .seat-occupied { border-color: #6b7280; background: #f3f4f6; color: #9ca3af; cursor: not-allowed; }
  .seat-selected { border-color: #16a34a; background: #16a34a; color: white; transform: scale(1.08); }

  /* Page transitions */
  .page { display: none; }
  .page.active { display: block; }

  /* Gradient hero */
  .hero-gradient { background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #1d4ed8 100%); }

  /* Scrollbar */
  ::-webkit-scrollbar { width: 6px; }
  ::-webkit-scrollbar-track { background: #f1f5f9; }
  ::-webkit-scrollbar-thumb { background: #1d4ed8; border-radius: 3px; }

  /* Bus card hover */
  .bus-card:hover { transform: translateY(-2px); box-shadow: 0 20px 40px rgba(29,78,216,0.12); }

  /* Animated badge */
  @keyframes pulse-ring {
    0% { transform: scale(1); opacity: 1; }
    100% { transform: scale(1.4); opacity: 0; }
  }
  .live-badge::before {
    content: ''; position: absolute; inset: 0; border-radius: 9999px;
    background: #16a34a; animation: pulse-ring 1.5s infinite;
  }

  /* Smooth scroll */
  html { scroll-behavior: smooth; }

  /* Form input focus */
  input:focus, select:focus { outline: none; border-color: #1d4ed8 !important; box-shadow: 0 0 0 3px rgba(29,78,216,0.15); }

    .seat{

width:42px;

height:42px;

display:flex;

align-items:center;

justify-content:center;

border-radius:10px;

cursor:pointer;

font-size:12px;

font-weight:700;

transition:.2s;

}

.seat-available{

background:#EFF6FF;

border:2px solid #2563EB;

color:#1D4ED8;

}

{{--  chagua seat loading  --}}
.loader{
    width:18px;
    height:18px;
    border:2.5px solid rgba(255,255,255,.25);
    border-top-color:#fff;
    border-right-color:#fff;
    border-radius:50%;
    display:inline-block;
    animation:spin .7s linear infinite;
}

@keyframes spin{
    to{
        transform:rotate(360deg);
    }
}

{{--  Chagua seat button css end  --}}
</style>
</head>
<body class="bg-slate-50 text-slate-800">

<!-- ============================================================ -->
<!-- PAGE 1: HOME -->
<!-- ============================================================ -->
<div id="page-home" class="page active">



 

 
</div>

<!-- ============================================================ -->
<!-- PAGE 2: SEARCH RESULTS -->
<!-- ============================================================ -->
<div id="" class="">

  <!-- Header (same) -->
  <header class="bg-white border-b border-slate-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center gap-3 cursor-pointer" onclick="showPage('page-home')">
          <div class="w-9 h-9 bg-blue-700 rounded-xl flex items-center justify-center shadow-md">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="white"><!--!Font Awesome Pro v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2026 Fonticons, Inc.--><path fill="rgb(255, 255, 255)" d="M192 64C139 64 96 107 96 160L96 448C96 477.8 116.4 502.9 144 510L144 544C144 561.7 158.3 576 176 576L192 576C209.7 576 224 561.7 224 544L224 512L416 512L416 544C416 561.7 430.3 576 448 576L464 576C481.7 576 496 561.7 496 544L496 510C523.6 502.9 544 477.8 544 448L544 160C544 107 501 64 448 64L192 64zM160 192C160 174.3 174.3 160 192 160L448 160C465.7 160 480 174.3 480 192L480 288C480 305.7 465.7 320 448 320L192 320C174.3 320 160 305.7 160 288L160 192zM192 384C209.7 384 224 398.3 224 416C224 433.7 209.7 448 192 448C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384zM448 384C465.7 384 480 398.3 480 416C480 433.7 465.7 448 448 448C430.3 448 416 433.7 416 416C416 398.3 430.3 384 448 384z"/></svg>
          </div>
          <span class="font-display text-xl font-800 text-blue-900">Bus<span class="text-blue-600">Poa</span></span>
        </div>
        <nav class=" md:flex items-center gap-8">
          <a href="{{ route('home') }}"  class="text-sm font-600 text-slate-600 hover:text-blue-700 transition-colors">← Back to Home</a>
         
        </nav>
        <button class="hidden md:inline-flex items-center gap-2 px-4 py-2 bg-blue-700 text-white text-sm font-600 rounded-lg hover:bg-blue-800 transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
          Sign In
        </button>
      </div>
    </div>
  </header>

  <!-- Search Summary Bar -->
  <div class="bg-blue-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
      <div class="flex flex-wrap items-center gap-4">
        <div class="flex items-center gap-3 bg-white bg-opacity-10 rounded-xl px-4 py-2.5 flex-1 min-w-48">
          <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
          <div>
            <p class="text-blue-300 text-xs">From</p>
            <p class="text-white font-600 text-sm" id="r-departure">{{ $from->name }}</p>
          </div>
        </div>
        <div class="text-white opacity-50"> <i class="bi bi-arrow-right"></i></div>
        <div class="flex items-center gap-3 bg-white bg-opacity-10 rounded-xl px-4 py-2.5 flex-1 min-w-48">
          <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
          <div>
            <p class="text-blue-300 text-xs">To</p>
            <p class="text-white font-600 text-sm" id="r-destination">{{ $to->name }}</p>
          </div>
        </div>
        <div class="flex items-center gap-3 bg-white bg-opacity-10 rounded-xl px-4 py-2.5 flex-1 min-w-48">
          <svg class="w-4 h-4 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          <div>
            <p class="text-blue-300 text-xs">Date</p>
            <p class="text-white font-600 text-sm" id="r-date">{{ \Carbon\Carbon::parse($date)->format('d M Y') }}</p>
          </div>
        </div>
        <button onclick="showPage('page-home')" class="px-5 py-2.5 bg-white bg-opacity-10 border border-white border-opacity-20 text-white text-sm font-600 rounded-xl hover:bg-opacity-20 transition-all flex items-center gap-2">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
          Modify
        </button>
      </div>
    </div>
  </div>

  <!-- Results Main -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex items-center justify-between mb-6">
      <div>
        <h2 class="font-display text-2xl font-700 text-slate-800">Available Buses</h2>
        <p class="text-slate-500 text-sm mt-1"> {{ $busCount }} {{ Str::plural('Bus', $busCount) }} Available</p>
        <p class="text-sm text-gray-500">
    Operated by {{ $companyCount }}
    {{ Str::plural('Company', $companyCount) }}
</p>
      </div>
      <div class="flex items-center gap-3">
        <span class="text-sm text-slate-500">Sort by:</span>
        <select class="text-sm border border-slate-200 rounded-lg px-3 py-2 text-slate-700 bg-white">
          <option>Departure Time</option>
          <option>Price: Low to High</option>
          <option>Duration</option>
          <option>Rating</option>
        </select>
      </div>
    </div>

    <!-- Bus Results List -->
     @forelse($trips as $trip)
    <div class="space-y-4 mt-4" id="bus-list">

      <!-- Bus Result 1 -->
     
      <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden hover:border-blue-200 hover:shadow-md transition-all">
        <div class="p-5 sm:p-6">
          <div class="flex flex-col sm:flex-row sm:items-center gap-4">
            <!-- Company -->
            <div class="flex items-center gap-3 sm:w-48">
              <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
              <img src="{{ asset('default/bus.jpg')  }}" alt="Bus Image" >
              </div>
              <div>
                <p class="font-700 text-slate-800 text-sm"> {{ $trip->bus->bus_name }}</p>
                <div class="flex items-center gap-1">
                  <svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                  <span class="text-xs text-slate-500">4.9 (1,203)</span>
                </div>
                <p class="text-xs text-blue-600 font-500"> {{ $trip->bus->bus_type }}</p>
              </div>
            </div>

            <!-- Time -->
            <div class="flex-1 flex items-center justify-between sm:justify-center gap-4">
              <div class="text-center">
                <p class="font-800 text-slate-900 text-xl"> {{ $trip->departure_time->format('H:i') }}</p>
                 <p class="text-xs text-slate-500">{{ $trip->route->fromRegion->name }}</p>
              </div>
              <div class="flex flex-col items-center gap-1">
                <span class="text-xs text-slate-400">{{ $trip->route->estimated_duration }} : Hrs</span>
                <div class="relative w-20 sm:w-32">
                  <div class="h-px bg-slate-200 w-full"></div>
                  <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-1.5 h-1.5 bg-blue-600 rounded-full"></div>
                </div>
                <span class="text-xs text-blue-600 font-500">Direct</span>
              </div>
              <div class="text-center">
                <p class="font-800 text-slate-900 text-xl">{{ $trip->arrival_time->format('H:i') }}</p>
                <p class="text-xs text-slate-500">{{ $trip->route->toRegion->name }}</p>
              </div>
            </div>

            <!-- Amenities -->
            <div class="hidden lg:flex flex-col gap-1.5 w-36">
              <div class="flex flex-wrap gap-1.5">
                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-xs rounded-full">AC</span>
                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-xs rounded-full">Wi-Fi</span>
                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-xs rounded-full">USB</span>
                <span class="px-2 py-0.5 bg-slate-100 text-slate-600 text-xs rounded-full">Toilet</span>
              </div>
            </div>

            <!-- Price & CTA -->
            <div class="flex sm:flex-col items-center sm:items-end justify-between sm:justify-center gap-3 sm:w-36">
              <div class="text-right">
                <p class="font-800 text-blue-700 text-xl">TZS {{ number_format($trip->price) }}</p>
                <p class="text-xs text-slate-500">{{ $trip->available_seats }} seats left</p>
              </div>
               <button
    id="selectSeatBtn"
    class="px-5 py-2.5 bg-blue-700 hover:bg-blue-800 text-white rounded-xl flex items-center justify-center gap-2 transition disabled:opacity-70"
    onclick="openSeatSelector({{ $trip->id }})"
>

    <span id="btnText">
        Chagua Siti
    </span>

    <span id="btnSpinner" class="hidden">
        <span class="loader"></span>
    </span>

</button>
            </div>
          </div>
        </div>

        <!-- Seat selector (hidden by default) -->

       @empty


    </div>
      
    </div>
<div class="text-center py-10">

    <h3 class="text-lg font-semibold text-slate-700">
        No buses found
    </h3>

    <p class="text-slate-500">
        There are no scheduled trips for the selected route and date.
    </p>

</div>
    @endforelse
    <livewire:seat-selector-modal />
  </div>
</div>

</script>


<script>
function openSeatSelector(tripId)
{
    const btn = document.getElementById('selectSeatBtn');
    const text = document.getElementById('btnText');
    const spinner = document.getElementById('btnSpinner');

    btn.disabled = true;

    text.innerHTML = "Loading...";
    spinner.classList.remove('hidden');

    window.dispatchEvent(new CustomEvent('open-seat-selector',{
        detail:{
            tripId:tripId
        }
    }));

    setTimeout(() => {
        btn.disabled = false;
        spinner.classList.add('hidden');
        text.innerHTML = "Chagua Siti";
    },700);
}
</script>
</body>
</html>
