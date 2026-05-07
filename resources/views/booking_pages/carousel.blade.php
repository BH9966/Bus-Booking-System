<section class="relative overflow-hidden">
    <div class="hero-gradient">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-32">
        <div class="text-center mb-12">
          <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-800 bg-opacity-60 rounded-full text-xs text-blue-200 font-500 mb-5">
            <span class="relative flex h-2 w-2"><span class="live-badge absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-green-400"></span></span>
            100+ Routes Available Across Tanzania
          </div>
          <h1 class="font-display text-4xl sm:text-5xl text-3xl sm:text-5xl lg:text-6xl font-800 text-white leading-tight mb-4">
            Travel Smarter,<br/><span class="text-blue-300">Arrive Happier</span>
          </h1>
          <!-- <p class="text-blue-200 text-lg max-w-xl mx-auto leading-relaxed">
            Book comfortable, reliable bus tickets across Tanzania in seconds. Safe journeys, great prices.
          </p> -->
        </div>

              
            </div> 
          </div>
          <!-- Dots -->
          <div class="absolute bottom-4 left-0 right-0 flex justify-center gap-2">
            <button onclick="goToSlide(0)" id="dot-0" class="w-2 h-2 rounded-full bg-white transition-all"></button>
            <button onclick="goToSlide(1)" id="dot-1" class="w-2 h-2 rounded-full bg-white bg-opacity-40 transition-all"></button>
            <button onclick="goToSlide(2)" id="dot-2" class="w-2 h-2 rounded-full bg-white bg-opacity-40 transition-all"></button>
          </div>
        </div>
      </div>
    </div>

    <!-- Search Card (overlapping hero) -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-10 pb-8">
      <div class="bg-white rounded-2xl shadow-2xl border border-slate-100 p-6 lg:p-8">
        <h2 class="font-display text-xl font-700 text-slate-800 mb-1">Find Your Bus</h2>
        <p class="text-slate-500 text-sm mb-6">Search from 100+ routes across Tanzania</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <!-- Departure -->
          <div class="space-y-1.5">
            <label class="text-xs font-600 text-slate-500 uppercase tracking-wide">From</label>
            <div class="relative">
              <div class="absolute left-3 top-1/2 -translate-y-1/2">
                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
              </div>
              <select id="departure" class="w-full pl-9 pr-4 py-3 text-sm border-2 border-slate-200 rounded-xl appearance-none bg-white text-slate-700 cursor-pointer hover:border-blue-300 transition-colors font-500">
                <option value="">Select Region</option>
                <option>Dar es Salaam</option>
                <option>Dodoma</option>
                <option>Arusha</option>
                <option>Mwanza</option>
                <option>Mbeya</option>
                <option>Zanzibar</option>
                <option>Tanga</option>
                <option>Morogoro</option>
                <option>Kigoma</option>
                <option>Tabora</option>
              </select>
            </div>
          </div>

          <!-- Destination -->
          <div class="space-y-1.5">
            <label class="text-xs font-600 text-slate-500 uppercase tracking-wide">To</label>
            <div class="relative">
              <div class="absolute left-3 top-1/2 -translate-y-1/2">
                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              </div>
              <select id="destination" class="w-full pl-9 pr-4 py-3 text-sm border-2 border-slate-200 rounded-xl appearance-none bg-white text-slate-700 cursor-pointer hover:border-blue-300 transition-colors font-500">
                <option value="">Select Destination</option>
                <option>Dar es Salaam</option>
                <option>Dodoma</option>
                <option>Arusha</option>
                <option>Mwanza</option>
                <option>Mbeya</option>
                <option>Zanzibar</option>
                <option>Tanga</option>
                <option>Morogoro</option>
                <option>Kigoma</option>
                <option>Tabora</option>
              </select>
            </div>
          </div>

          <!-- Date -->
          <div class="space-y-1.5">
            <label class="text-xs font-600 text-slate-500 uppercase tracking-wide">Travel Date</label>
            <div class="relative">
              <div class="absolute left-3 top-1/2 -translate-y-1/2">
                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
              </div>
              <input type="date" id="travel-date" class="w-full pl-9 pr-4 py-3 text-sm border-2 border-slate-200 rounded-xl bg-white text-slate-700 cursor-pointer hover:border-blue-300 transition-colors font-500">
            </div>
          </div>

          <!-- Button -->
          <div class="space-y-1.5">
            <label class="text-xs font-600 text-transparent uppercase tracking-wide">Search</label>
            <button onclick="findBus()" class="w-full py-3 bg-blue-700 hover:bg-blue-800 active:scale-95 text-white text-sm font-700 rounded-xl transition-all flex items-center justify-center gap-2 shadow-lg shadow-blue-200">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-4.35-4.35"/></svg>
              Find Bus
            </button>
          </div>
        </div>

        <!-- Quick stats -->
        <div class="flex flex-wrap gap-6 mt-6 pt-5 border-t border-slate-100">
          <div class="flex items-center gap-2 text-xs text-slate-500">
            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span>Free cancellation 24h before</span>
          </div>
          <div class="flex items-center gap-2 text-xs text-slate-500">
            <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            <span>Secure & encrypted booking</span>
          </div>
          <div class="flex items-center gap-2 text-xs text-slate-500">
            <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <span>4.9★ from 50,000+ reviews</span>
          </div>
        </div>
      </div>
    </div>
  </section>