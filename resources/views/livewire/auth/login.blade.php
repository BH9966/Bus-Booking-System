<div>
    {{-- He who is contented is rich. - Laozi --}}

    <div id="loginForm" class="fade-in">

        <div class="mb-8 flex justify-center">

          <p class="text-gray-500 text-sm mt-1">Sign in to manage your bookings and travel history.</p>
        </div>
        {{-- form start --}}

     <form wire:submit.prevent="login" >
        @csrf
        <div class="mb-4">

          <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2 " >Email Address</label>
          <div class="input-wrap">
            <span class="input-icon">
               <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            </span>

            <input type="email" id="loginEmail" wire:model.defer="email" class="input-field " required autocomplete="current-password" placeholder="you@example.com" >
          </div>

        </div>

        <!-- Password -->
        <div class="mb-2">
          <label class="block text-xs font-semibold text-gray-600 uppercase tracking-wider mb-2">Password</label>
          <div class="input-wrap">

             <span class="input-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
             </span>
            <input type="password" id="loginPassword" class="input-field " wire:model.defer="password" required autocomplete="current-password" placeholder="Your password">
        </div>

        <!-- Remember & Forgot -->
        <div class="flex items-center justify-between mb-6 mt-4">
          <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" class="custom-check" id="rememberMe">
            <span class="text-sm text-gray-600">Remember me</span>
          </label>
          <button class="text-sm text-[#1D4ED8] font-semibold hover:text-[#1D4ED8] transition-colors"> <a href="#">Forgot password?</a> </button>
        </div>

        <!-- Login Button -->
        {{-- <button type="submit"  class="btn-primary w-full text-white font-bold py-3.5 rounded-2xl text-base flex items-center justify-center gap-2 mb-5">
          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
</svg>

          Sign In to SwiftRide
        </button> --}}
        <button type="submit" wire:click="login" wire:loading.attr="disabled" wire:target="login" class="btn-primary w-full text-white font-bold py-3.5 rounded-2xl text-base flex items-center justify-center gap-2 mb-5" >

    <!-- NORMAL STATE (icon + text) -->
    <span wire:loading.remove wire:target="login" class="flex items-center gap-2">
        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
        </svg>

        Sign In
    </span>

    <!-- LOADING STATE -->
    <span wire:loading wire:target="login" class="inline-flex items-center gap-2">
    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-20" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
        <path class="opacity-85" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
</span>

</button>
       </form>
  {{-- End form --}}
        <p class="text-center text-sm text-gray-500">
          Don't have an account?
          <button  class="text-[#1D4ED8] font-bold hover:text-[#1D4ED2] transition-colors ml-1">Sign up free →</button>
        </p>
      </div>
     

</div>
