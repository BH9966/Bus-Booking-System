<header class="bg-white border-b border-slate-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <!-- Logo -->
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 bg-blue-700 rounded-xl flex items-center justify-center shadow-md">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 17H5a2 2 0 01-2-2V6a2 2 0 012-2h13a2 2 0 012 2v4M8 17v2m0-2h8m-8 0H5m11 0h2.5M16 17v2M3 10h18M8 6h.01M16 6h.01"/>
            </svg>
          </div>
          <span class="font-display text-xl font-800 text-blue-900">Swift<span class="text-blue-600">Ride</span></span>
        </div>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex items-center gap-8">
          <a href="#routes" class="text-sm font-600 text-slate-600 hover:text-blue-700 transition-colors">Routes</a>
          <a href="#" onclick="showPage('page-results')" class="text-sm font-600 text-slate-600 hover:text-blue-700 transition-colors">Bus Tickets</a>
          <a href="#contact" class="text-sm font-600 text-slate-600 hover:text-blue-700 transition-colors">Contact</a>
        </nav>

        <!-- CTA + Mobile Menu -->
        <div class="flex items-center gap-3">
          <button class="hidden md:inline-flex items-center gap-2 px-4 py-2 bg-blue-700 text-white text-sm font-600 rounded-lg hover:bg-blue-800 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            Sign In
          </button>
          <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100" onclick="toggleMobileMenu()">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>
        </div>
      </div>

      <!-- Mobile Menu -->
      <div id="mobile-menu" class="md:hidden hidden border-t border-slate-100 py-4 space-y-3">
        <a href="#routes" class="block text-sm font-600 text-slate-600 hover:text-blue-700 py-2">Routes</a>
        <a href="#" onclick="showPage('page-results')" class="block text-sm font-600 text-slate-600 hover:text-blue-700 py-2">Bus Tickets</a>
        <a href="#contact" class="block text-sm font-600 text-slate-600 hover:text-blue-700 py-2">Contact</a>
        <button class="w-full mt-2 px-4 py-2.5 bg-blue-700 text-white text-sm font-600 rounded-lg">Sign In</button>
      </div>
    </div>
  </header>