 <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-18 py-4">
        <!-- Logo -->
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,#059669,#10b981)">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="4" width="20" height="14" rx="3"/><path d="M10 18v2M14 18v2M2 10h20"/><circle cx="6.5" cy="15" r="1.5" fill="white" stroke="none"/><circle cx="17.5" cy="15" r="1.5" fill="white" stroke="none"/>
            </svg>
          </div>
          <span class="font-display text-2xl font-bold text-gray-900">Swift<span class="text-emerald-600">Ride</span></span>
        </div>
        <!-- Nav -->
        <nav class="hidden md:flex items-center gap-8">
          <a href="#routes-section" class="nav-link text-gray-600 hover:text-emerald-600 font-medium text-sm transition-colors">Routes</a>
          <a href="#" class="nav-link text-gray-600 hover:text-emerald-600 font-medium text-sm transition-colors">Bus Ticket</a>
          <a href="#footer" class="nav-link text-gray-600 hover:text-emerald-600 font-medium text-sm transition-colors">Contact</a>
          <button onclick="showPage('resultsPage')" class="btn-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl">Book Now</button>
        </nav>
        <!-- Mobile menu -->
        <button class="md:hidden p-2 rounded-lg text-gray-600" onclick="toggleMobileMenu()">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
      </div>
      <!-- Mobile Nav -->
      <div id="mobileMenu" class="hidden md:hidden pb-4 border-t border-gray-100 pt-3">
        <div class="flex flex-col gap-3">
          <a href="#routes-section" class="text-gray-600 font-medium text-sm py-1">Routes</a>
          <a href="#" class="text-gray-600 font-medium text-sm py-1">Bus Ticket</a>
          <a href="#footer" class="text-gray-600 font-medium text-sm py-1">Contact</a>
        </div>
      </div>
    </div>
  </header>