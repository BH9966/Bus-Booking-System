<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex items-center justify-between mb-8">
      <div>
        <h2 class="font-display text-2xl font-700 text-slate-800">Popular Buses Today</h2>
        <p class="text-slate-500 text-sm mt-1">Top-rated buses with available seats</p>
      </div>
      <button onclick="showPage('page-results')" class="text-sm font-600 text-blue-700 hover:text-blue-800 flex items-center gap-1">
        View All <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
      </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
      <!-- Bus Card 1 -->
      <div class="bus-card bg-white rounded-2xl border border-slate-100 p-5 transition-all duration-300 cursor-pointer hover:border-blue-200" onclick="showPage('page-results')">
        <div class="flex items-start justify-between mb-4">
          <div class="flex items-center gap-3">
            <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center">
              <svg class="w-6 h-6 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 17H5a2 2 0 01-2-2V6a2 2 0 012-2h13a2 2 0 012 2v4M8 17v2m0-2h8m-8 0H5m11 0h2.5M16 17v2M3 10h18"/></svg>
            </div>
            <div>
              <p class="font-700 text-slate-800 text-sm">Dar Express</p>
              <p class="text-xs text-slate-400">AC • Business Class</p>
            </div>
          </div>
          <span class="px-2.5 py-1 bg-green-50 text-green-700 text-xs font-600 rounded-full">14 seats left</span>
        </div>
        <div class="flex items-center justify-between mb-3">
          <div class="text-center">
            <p class="font-800 text-slate-900 text-lg">06:00</p>
            <p class="text-xs text-slate-400">Dar es Salaam</p>
          </div>
          <div class="flex-1 flex items-center gap-2 px-4">
            <div class="flex-1 h-px bg-slate-200"></div>
            <span class="text-xs text-slate-400 whitespace-nowrap">8h 30m</span>
            <div class="flex-1 h-px bg-slate-200"></div>
          </div>
          <div class="text-center">
            <p class="font-800 text-slate-900 text-lg">14:30</p>
            <p class="text-xs text-slate-400">Arusha</p>
          </div>
        </div>
        <div class="flex items-center justify-between pt-3 border-t border-slate-100">
          <div>
            <span class="font-800 text-blue-700 text-lg">TZS 35,000</span>
            <span class="text-xs text-slate-400 ml-1">/person</span>
          </div>
          <button onclick="event.stopPropagation(); showPage('page-results')" class="px-4 py-2 bg-blue-700 text-white text-xs font-600 rounded-lg hover:bg-blue-800 transition-colors">
            Book Now
          </button>
        </div>
      </div>

      <!-- Bus Card 2 -->
      <div class="bus-card bg-white rounded-2xl border border-slate-100 p-5 transition-all duration-300 cursor-pointer hover:border-blue-200" onclick="showPage('page-results')">
        <div class="flex items-start justify-between mb-4">
          <div class="flex items-center gap-3">
            <div class="w-11 h-11 bg-indigo-50 rounded-xl flex items-center justify-center">
              <svg class="w-6 h-6 text-indigo-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 17H5a2 2 0 01-2-2V6a2 2 0 012-2h13a2 2 0 012 2v4M8 17v2m0-2h8m-8 0H5m11 0h2.5M16 17v2M3 10h18"/></svg>
            </div>
            <div>
              <p class="font-700 text-slate-800 text-sm">Kilimanjaro Coach</p>
              <p class="text-xs text-slate-400">AC • Standard</p>
            </div>
          </div>
          <span class="px-2.5 py-1 bg-amber-50 text-amber-700 text-xs font-600 rounded-full">7 seats left</span>
        </div>
        <div class="flex items-center justify-between mb-3">
          <div class="text-center">
            <p class="font-800 text-slate-900 text-lg">08:30</p>
            <p class="text-xs text-slate-400">Dodoma</p>
          </div>
          <div class="flex-1 flex items-center gap-2 px-4">
            <div class="flex-1 h-px bg-slate-200"></div>
            <span class="text-xs text-slate-400 whitespace-nowrap">5h 45m</span>
            <div class="flex-1 h-px bg-slate-200"></div>
          </div>
          <div class="text-center">
            <p class="font-800 text-slate-900 text-lg">14:15</p>
            <p class="text-xs text-slate-400">Mwanza</p>
          </div>
        </div>
        <div class="flex items-center justify-between pt-3 border-t border-slate-100">
          <div>
            <span class="font-800 text-blue-700 text-lg">TZS 28,000</span>
            <span class="text-xs text-slate-400 ml-1">/person</span>
          </div>
          <button onclick="event.stopPropagation(); showPage('page-results')" class="px-4 py-2 bg-blue-700 text-white text-xs font-600 rounded-lg hover:bg-blue-800 transition-colors">
            Book Now
          </button>
        </div>
      </div>

      <!-- Bus Card 3 -->
      <div class="bus-card bg-white rounded-2xl border border-slate-100 p-5 transition-all duration-300 cursor-pointer hover:border-blue-200" onclick="showPage('page-results')">
        <div class="flex items-start justify-between mb-4">
          <div class="flex items-center gap-3">
            <div class="w-11 h-11 bg-teal-50 rounded-xl flex items-center justify-center">
              <svg class="w-6 h-6 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 17H5a2 2 0 01-2-2V6a2 2 0 012-2h13a2 2 0 012 2v4M8 17v2m0-2h8m-8 0H5m11 0h2.5M16 17v2M3 10h18"/></svg>
            </div>
            <div>
              <p class="font-700 text-slate-800 text-sm">Safari Liner</p>
              <p class="text-xs text-slate-400">AC • VIP Class</p>
            </div>
          </div>
          <span class="px-2.5 py-1 bg-green-50 text-green-700 text-xs font-600 rounded-full">22 seats left</span>
        </div>
        <div class="flex items-center justify-between mb-3">
          <div class="text-center">
            <p class="font-800 text-slate-900 text-lg">10:00</p>
            <p class="text-xs text-slate-400">Mbeya</p>
          </div>
          <div class="flex-1 flex items-center gap-2 px-4">
            <div class="flex-1 h-px bg-slate-200"></div>
            <span class="text-xs text-slate-400 whitespace-nowrap">3h 20m</span>
            <div class="flex-1 h-px bg-slate-200"></div>
          </div>
          <div class="text-center">
            <p class="font-800 text-slate-900 text-lg">13:20</p>
            <p class="text-xs text-slate-400">Iringa</p>
          </div>
        </div>
        <div class="flex items-center justify-between pt-3 border-t border-slate-100">
          <div>
            <span class="font-800 text-blue-700 text-lg">TZS 18,000</span>
            <span class="text-xs text-slate-400 ml-1">/person</span>
          </div>
          <button onclick="event.stopPropagation(); showPage('page-results')" class="px-4 py-2 bg-blue-700 text-white text-xs font-600 rounded-lg hover:bg-blue-800 transition-colors">
            Book Now
          </button>
        </div>
      </div>
    </div>
  </section>