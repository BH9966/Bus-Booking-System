<header class="bg-white border-b border-slate-100 sticky top-0 z-50 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <!-- Logo -->
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 bg-blue-700 rounded-xl flex items-center justify-center shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="white"><!--!Font Awesome Pro v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2026 Fonticons, Inc.--><path fill="rgb(255, 255, 255)" d="M192 64C139 64 96 107 96 160L96 448C96 477.8 116.4 502.9 144 510L144 544C144 561.7 158.3 576 176 576L192 576C209.7 576 224 561.7 224 544L224 512L416 512L416 544C416 561.7 430.3 576 448 576L464 576C481.7 576 496 561.7 496 544L496 510C523.6 502.9 544 477.8 544 448L544 160C544 107 501 64 448 64L192 64zM160 192C160 174.3 174.3 160 192 160L448 160C465.7 160 480 174.3 480 192L480 288C480 305.7 465.7 320 448 320L192 320C174.3 320 160 305.7 160 288L160 192zM192 384C209.7 384 224 398.3 224 416C224 433.7 209.7 448 192 448C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384zM448 384C465.7 384 480 398.3 480 416C480 433.7 465.7 448 448 448C430.3 448 416 433.7 416 416C416 398.3 430.3 384 448 384z"/></svg>
          </div>
          <span class="font-display text-xl font-800 text-blue-900">Bus<span class="text-blue-600">Poa</span></span>
        </div>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex items-center gap-8">
          <a href="#routes" class="text-sm font-600 text-slate-600 hover:text-blue-700 transition-colors">Routes</a>
          <a href="#" onclick="showPage('page-results')" class="text-sm font-600 text-slate-600 hover:text-blue-700 transition-colors">Bus Tickets</a>
          <a href="#contact" class="text-sm font-600 text-slate-600 hover:text-blue-700 transition-colors">Contact</a>
        </nav>

        <!-- CTA + Mobile Menu -->
        <div class="flex items-center gap-3">
        <a href="{{ route('login') }}"> <button class="hidden md:inline-flex items-center gap-2 px-4 py-2 bg-blue-700 text-white text-sm font-600 rounded-lg hover:bg-blue-800 transition-colors">
          <svg class="w-6 h-6 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
        </svg>

            Sign In
          </button></a> 
       <a href="#"><button class="hidden md:inline-flex items-center gap-2 px-4 py-2 bg-blue-700 text-white text-sm font-600 rounded-lg hover:bg-blue-800 transition-colors">
                  <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
    <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
</svg>

            Sign Up
          </button> </a>
          
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
     <a href="{{ route('login') }}">   <button class="w-full mt-2 px-4 py-2.5 bg-blue-700 text-white text-sm font-600 rounded-lg">
         
        Sign In</button> </a>
          <button class="w-full mt-2 px-4 py-2.5 bg-blue-700 text-white text-sm font-600 rounded-lg">Sign up</button>
      </div>
    </div>
  </header>