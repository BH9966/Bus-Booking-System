<section class="relative overflow-hidden">
    <div class="hero-gradient">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-32">
        <div class="text-center mb-12">
         
          <h1 class="font-display text-4xl sm:text-5xl text-3xl sm:text-5xl lg:text-6xl font-800 text-white leading-tight mb-4">
            Travel Smarter,<br/><span class="text-blue-300">Arrive Happier</span>
          </h1>
          <!-- <p class="text-blue-200 text-lg max-w-xl mx-auto leading-relaxed">
            Book comfortable, reliable bus tickets across Tanzania. Safe journeys, great prices.
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
        <p class="text-sm text-slate-500 mb-6">Search for bus trips across Tanzania</p>
        
        <livewire:bus-search />
        <!-- Quick stats -->
        <div class="flex flex-wrap gap-6 mt-6 pt-5 border-t border-slate-100">
          <div class="flex items-center gap-2 text-xs text-slate-500">
            <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            <span>Secure & encrypted booking</span>
          </div>
        </div>
      </div>
    </div>
  </section>