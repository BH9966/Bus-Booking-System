<section id="routes-section" class="py-16 px-4" style="background:linear-gradient(135deg,#f0fdf4,#ecfdf5)">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-10">
        <span class="text-emerald-600 font-semibold text-sm uppercase tracking-widest">Network</span>
        <h2 class="font-display text-3xl font-bold text-gray-900 mt-2">Popular Routes</h2>
        <p class="text-gray-500 mt-2 max-w-lg mx-auto">Connecting major cities across Tanzania with reliable daily services.</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white rounded-2xl p-5 shadow-sm card-hover route-card border-t-emerald-500">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
              <svg width="20" height="20" fill="none" stroke="#059669" stroke-width="2"><path d="M3 12h18M3 12l4-4M3 12l4 4M21 12l-4-4M21 12l-4 4"/></svg>
            </div>
            <div>
              <p class="font-bold text-gray-900 text-sm">Dar es Salaam</p>
              <p class="text-xs text-gray-400">→ Dodoma</p>
            </div>
          </div>
          <div class="space-y-2 text-xs text-gray-500">
            <div class="flex justify-between"><span>Distance</span><span class="font-semibold text-gray-700">455 km</span></div>
            <div class="flex justify-between"><span>Duration</span><span class="font-semibold text-gray-700">5h 30m</span></div>
            <div class="flex justify-between"><span>From</span><span class="font-bold text-emerald-600">TZS 15,000</span></div>
            <div class="flex justify-between"><span>Departures</span><span class="font-semibold text-gray-700">8 daily</span></div>
          </div>
          <button onclick="findBus()" class="mt-4 w-full btn-primary text-white text-xs font-bold py-2 rounded-lg">Book Route</button>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm card-hover route-card border-t-purple-500">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center">
              <svg width="20" height="20" fill="none" stroke="#7c3aed" stroke-width="2"><path d="M3 12h18M3 12l4-4M3 12l4 4M21 12l-4-4M21 12l-4 4"/></svg>
            </div>
            <div>
              <p class="font-bold text-gray-900 text-sm">Arusha</p>
              <p class="text-xs text-gray-400">→ Mwanza</p>
            </div>
          </div>
          <div class="space-y-2 text-xs text-gray-500">
            <div class="flex justify-between"><span>Distance</span><span class="font-semibold text-gray-700">683 km</span></div>
            <div class="flex justify-between"><span>Duration</span><span class="font-semibold text-gray-700">9h 00m</span></div>
            <div class="flex justify-between"><span>From</span><span class="font-bold text-purple-600">TZS 22,000</span></div>
            <div class="flex justify-between"><span>Departures</span><span class="font-semibold text-gray-700">4 daily</span></div>
          </div>
          <button onclick="findBus()" class="mt-4 w-full bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold py-2 rounded-lg transition-colors">Book Route</button>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm card-hover route-card border-t-blue-500">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
              <svg width="20" height="20" fill="none" stroke="#2563eb" stroke-width="2"><path d="M3 12h18M3 12l4-4M3 12l4 4M21 12l-4-4M21 12l-4 4"/></svg>
            </div>
            <div>
              <p class="font-bold text-gray-900 text-sm">Mbeya</p>
              <p class="text-xs text-gray-400">→ Dar es Salaam</p>
            </div>
          </div>
          <div class="space-y-2 text-xs text-gray-500">
            <div class="flex justify-between"><span>Distance</span><span class="font-semibold text-gray-700">838 km</span></div>
            <div class="flex justify-between"><span>Duration</span><span class="font-semibold text-gray-700">11h 30m</span></div>
            <div class="flex justify-between"><span>From</span><span class="font-bold text-blue-600">TZS 25,000</span></div>
            <div class="flex justify-between"><span>Departures</span><span class="font-semibold text-gray-700">5 daily</span></div>
          </div>
          <button onclick="findBus()" class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold py-2 rounded-lg transition-colors">Book Route</button>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm card-hover route-card border-t-amber-500">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center">
              <svg width="20" height="20" fill="none" stroke="#d97706" stroke-width="2"><path d="M3 12h18M3 12l4-4M3 12l4 4M21 12l-4-4M21 12l-4 4"/></svg>
            </div>
            <div>
              <p class="font-bold text-gray-900 text-sm">Tanga</p>
              <p class="text-xs text-gray-400">→ Morogoro</p>
            </div>
          </div>
          <div class="space-y-2 text-xs text-gray-500">
            <div class="flex justify-between"><span>Distance</span><span class="font-semibold text-gray-700">310 km</span></div>
            <div class="flex justify-between"><span>Duration</span><span class="font-semibold text-gray-700">4h 30m</span></div>
            <div class="flex justify-between"><span>From</span><span class="font-bold text-amber-600">TZS 9,000</span></div>
            <div class="flex justify-between"><span>Departures</span><span class="font-semibold text-gray-700">6 daily</span></div>
          </div>
          <button onclick="findBus()" class="mt-4 w-full bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold py-2 rounded-lg transition-colors">Book Route</button>
        </div>
      </div>
    </div>
  </section>