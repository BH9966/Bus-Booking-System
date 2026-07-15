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
</style>
</head>
<body class="bg-slate-50 text-slate-800">



<!-- ============================================================ -->
<!-- PAGE 3: BOOKING FORM (PASSENGER DETAILS) -->
<!-- ============================================================ -->
<div  class="">

  <!-- Header -->
  <header class="bg-white border-b border-slate-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center gap-3 cursor-pointer" onclick="showPage('page-home')">
          <div class="w-9 h-9 bg-brand-600 rounded-xl flex items-center justify-center shadow-md">
            
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="white"><!--!Font Awesome Pro v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2026 Fonticons, Inc.--><path fill="rgb(255, 255, 255)" d="M192 64C139 64 96 107 96 160L96 448C96 477.8 116.4 502.9 144 510L144 544C144 561.7 158.3 576 176 576L192 576C209.7 576 224 561.7 224 544L224 512L416 512L416 544C416 561.7 430.3 576 448 576L464 576C481.7 576 496 561.7 496 544L496 510C523.6 502.9 544 477.8 544 448L544 160C544 107 501 64 448 64L192 64zM160 192C160 174.3 174.3 160 192 160L448 160C465.7 160 480 174.3 480 192L480 288C480 305.7 465.7 320 448 320L192 320C174.3 320 160 305.7 160 288L160 192zM192 384C209.7 384 224 398.3 224 416C224 433.7 209.7 448 192 448C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384zM448 384C465.7 384 480 398.3 480 416C480 433.7 465.7 448 448 448C430.3 448 416 433.7 416 416C416 398.3 430.3 384 448 384z"/></svg>
          </div>
             <a href="{{ route('home') }}">  <span class="font-display text-xl font-800 text-blue-900">Bus<span class="text-blue-600">Poa</span></span> </a>
        </div>
        <button onclick="window.history.back()" class="text-sm font-600 text-blue-700 hover:text-blue-800 flex items-center gap-1">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
          Back
        </button>
      </div>
    </div>
  </header>

  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

      <!-- Booking Summary (right sidebar) -->
      <div class="lg:col-span-1 order-first lg:order-last">
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5 sticky top-24">
          <h3 class="font-700 text-slate-800 mb-4 text-sm uppercase tracking-wide">Booking Summary</h3>

          <div class="space-y-3 text-sm">
            <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-xl">
              <div class="w-9 h-9 bg-blue-700 rounded-lg flex items-center justify-center">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="white"><!--!Font Awesome Pro v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2026 Fonticons, Inc.--><path fill="rgb(255, 255, 255)" d="M192 64C139 64 96 107 96 160L96 448C96 477.8 116.4 502.9 144 510L144 544C144 561.7 158.3 576 176 576L192 576C209.7 576 224 561.7 224 544L224 512L416 512L416 544C416 561.7 430.3 576 448 576L464 576C481.7 576 496 561.7 496 544L496 510C523.6 502.9 544 477.8 544 448L544 160C544 107 501 64 448 64L192 64zM160 192C160 174.3 174.3 160 192 160L448 160C465.7 160 480 174.3 480 192L480 288C480 305.7 465.7 320 448 320L192 320C174.3 320 160 305.7 160 288L160 192zM192 384C209.7 384 224 398.3 224 416C224 433.7 209.7 448 192 448C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384zM448 384C465.7 384 480 398.3 480 416C480 433.7 465.7 448 448 448C430.3 448 416 433.7 416 416C416 398.3 430.3 384 448 384z"/></svg>
              </div>
              <div>
                <p class="font-700 text-slate-800" id="booking-bus"> {{ $trip->bus->bus_name }}</p>
                <p class="text-xs text-slate-500">{{ $trip->bus->type }} </p>
              </div>
            </div>

            <div class="space-y-2 pt-1">
              <div class="flex justify-between">
                <span class="text-slate-500">Route</span>
                <span class="font-600 text-slate-700 text-right" id="booking-route">{{ $trip->route->fromRegion->name }} → {{ $trip->route->toRegion->name }}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-slate-500">Departure</span>
                <span class="font-600 text-slate-700" id="booking-time">{{ \Carbon\Carbon::parse($trip->departure_time)->format('h:i A') }}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-slate-500">Seat</span>
                <span class="font-600 text-blue-700" id="booking-seat">
                @foreach($seats as $seat)

               <span> {{ $seat->seat_number }}   </span> @endforeach</span>
              </div>
              <div class="flex justify-between">
                <span class="text-slate-500">Date</span>
                <span class="font-600 text-slate-700" id="booking-date-display">{{ \Carbon\Carbon::parse($trip->departure_date)->format('d M Y') }}</span>
              </div>
            </div>

            <div class="border-t border-slate-100 pt-3 mt-3">
              <div class="flex justify-between mb-1.5">
                <span class="text-slate-500">Ticket Price</span>
                <span class="font-600 text-slate-700" id="booking-price">TZS {{ number_format($trip->price) }}</span>
              </div>

              <div class="flex justify-between pt-2 border-t border-slate-100">
                <span class="font-700 text-slate-800">Total</span>
                <span class="font-800 text-blue-700 text-lg" id="booking-total">TZS {{ number_format($total) }}</span>
              </div>
            </div>
          </div>

          <div class="mt-4 flex items-start gap-2 p-3 bg-green-50 rounded-xl">
            <svg class="w-4 h-4 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            <p class="text-xs text-green-700">Free cancellation up to 24 hours before departure.</p>
          </div>
        </div>
      </div>

      <!-- Passenger Details Form -->
      <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 sm:p-8">
          <h2 class="font-display text-2xl font-700 text-slate-800 mb-1">Passenger Details</h2>
          <p class="text-slate-500 text-sm mb-7">Enter your information to complete the booking</p>

          <div class="space-y-5">
            <!-- Name fields -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="block text-xs font-700 text-slate-600 mb-2 uppercase tracking-wide">First Name</label>
                <input type="text" placeholder="e.g. Amina" class="w-full px-4 py-3 border-2 border-slate-200 rounded-xl text-sm text-slate-700 placeholder-slate-400 hover:border-blue-300 transition-colors">
              </div>
              <div>
                <label class="block text-xs font-700 text-slate-600 mb-2 uppercase tracking-wide">Last Name</label>
                <input type="text" placeholder="e.g. Mwangi" class="w-full px-4 py-3 border-2 border-slate-200 rounded-xl text-sm text-slate-700 placeholder-slate-400 hover:border-blue-300 transition-colors">
              </div>
            </div>

            <!-- Phone -->
            <div>
              <label class="block text-xs font-700 text-slate-600 mb-2 uppercase tracking-wide">Phone Number</label>
              <div class="flex gap-3">
                <select class="px-3 py-3 border-2 border-slate-200 rounded-xl text-sm text-slate-700 bg-white hover:border-blue-300 transition-colors">
                  <option>🇹🇿 +255</option>
                  <option>🇰🇪 +254</option>
                  <option>🇺🇬 +256</option>
                </select>
                <input type="tel" placeholder="712 345 678" class="flex-1 px-4 py-3 border-2 border-slate-200 rounded-xl text-sm text-slate-700 placeholder-slate-400 hover:border-blue-300 transition-colors">
              </div>
            </div>

            <!-- Email -->
            <div>
              <label class="block text-xs font-700 text-slate-600 mb-2 uppercase tracking-wide">Email Address</label>
              <input type="email" placeholder="amina@example.com" class="w-full px-4 py-3 border-2 border-slate-200 rounded-xl text-sm text-slate-700 placeholder-slate-400 hover:border-blue-300 transition-colors">
              <p class="text-xs text-slate-400 mt-1.5">Your e-ticket will be sent to this email</p>
            </div>

            <!-- ID Number -->
            <div>
              <label class="block text-xs font-700 text-slate-600 mb-2 uppercase tracking-wide">National ID / Passport</label>
              <input type="text" placeholder="e.g. 19840112-12345-00001-5" class="w-full px-4 py-3 border-2 border-slate-200 rounded-xl text-sm text-slate-700 placeholder-slate-400 hover:border-blue-300 transition-colors">
            </div>

            <!-- Gender & DOB -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="block text-xs font-700 text-slate-600 mb-2 uppercase tracking-wide">Gender</label>
                <select class="w-full px-4 py-3 border-2 border-slate-200 rounded-xl text-sm text-slate-700 bg-white hover:border-blue-300 transition-colors appearance-none">
                  <option value="">Select Gender</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Prefer not to say</option>
                </select>
              </div>
              <div>
                <label class="block text-xs font-700 text-slate-600 mb-2 uppercase tracking-wide">Date of Birth</label>
                <input type="date" class="w-full px-4 py-3 border-2 border-slate-200 rounded-xl text-sm text-slate-700 hover:border-blue-300 transition-colors">
              </div>
            </div>

            <!-- Emergency contact -->
            <div class="p-4 bg-amber-50 rounded-xl border border-amber-100">
              <p class="text-xs font-700 text-amber-700 uppercase tracking-wide mb-3">Emergency Contact (Optional)</p>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <input type="text" placeholder="Contact name" class="px-4 py-2.5 border border-amber-200 rounded-lg text-sm text-slate-700 bg-white placeholder-slate-400">
                <input type="tel" placeholder="Phone number" class="px-4 py-2.5 border border-amber-200 rounded-lg text-sm text-slate-700 bg-white placeholder-slate-400">
              </div>
            </div>

            <!-- Terms -->
            <div class="flex items-start gap-3">
              <input type="checkbox" id="terms" class="mt-1 w-4 h-4 rounded border-slate-300 text-blue-600">
              <label for="terms" class="text-xs text-slate-500 leading-relaxed">
                I agree to SwiftRide's <a href="#" class="text-blue-600 hover:underline">Terms of Service</a> and <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>. I confirm all passenger details are accurate.
              </label>
            </div>

            <!-- Submit -->
            <button onclick="showConfirmation()" class="w-full py-4 bg-blue-700 hover:bg-blue-800 active:scale-98 text-white font-700 rounded-2xl transition-all flex items-center justify-center gap-3 text-base shadow-lg shadow-blue-200">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Confirm for payment <span id="pay-total">36,500</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>
