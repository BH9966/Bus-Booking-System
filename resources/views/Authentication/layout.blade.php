
@extends('Authentication.app')

@section('content')
<!-- ===================== LOGIN ===================== -->
<div class="auth-page active min-h-screen w-full">

  <!-- Left Panel — Branding -->
  <div class="hidden lg:flex lg:w-1/2 hero-bg relative overflow-hidden flex-col justify-between p-12">


    <!-- Logo -->
{{--  <div class="relative z-10">
  <div class="flex items-center flex   mb-4">
    <span class="text-3xl font-extrabold tracking-tight text-[#1D4ED8]   font-sans">
      SafariBus
    </span>
    <div class="w-16 h-16 flex items-center justify-start">
      <img src="{{ asset('logo/logo_site-removebg-preview (1).png') }}" class="w-full h-full object-contain" alt="SafariBus Logo">
    </div>

  </div>
</div>  --}}

    <!-- Center Content -->
    <div class="relative z-10 flex-1 flex flex-col justify-center py-12">
      <!-- Bus SVG Illustration -->
      {{--  <div class="bus-illustration mb-10">
         <h1 class="font-display text-4xl font-bold text-white leading-tight mb-4 font-sans">
        Travel Across<br> <span class="text-[#1D4ED8]">Tanzania</span>  in Style
      </h1>
      </div>  --}}


      {{-- <p class="text-black text-base leading-relaxed mb-10 max-w-sm">
        Book bus tickets instantly  2026 - {{ date('Y') }}
      </p> --}}

      <!-- Feature badges -->
      {{-- <div class="space-y-3">
        <div class="feat-badge">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(16,185,129,0.25)">
            <svg width="18" height="18" fill="none" stroke="#10b981" stroke-width="2.2" stroke-linecap="round"><path d="M13 2H6a2 2 0 00-2 2v16l3-3 2 3 2-3 2 3 2-3 3 3V4a2 2 0 00-2-2z"/><line x1="8" y1="9" x2="14" y2="9"/><line x1="8" y1="13" x2="11" y2="13"/></svg>
          </div>
          <div>
            <p class="text-white font-semibold text-sm">Instant E-Tickets</p>
            <p class="text-blue-300 text-xs">Get your ticket directly on your phone</p>
          </div>
        </div>
        <div class="feat-badge">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(59,130,246,0.25)">
            <svg width="18" height="18" fill="none" stroke="#60a5fa" stroke-width="2.2" stroke-linecap="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <div>
            <p class="text-white font-semibold text-sm">Secure & Reliable</p>
            <p class="text-blue-300 text-xs">SSL-encrypted payments & verified operators</p>
          </div>
        </div>
        <div class="feat-badge">
          <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0" style="background:rgba(245,158,11,0.2)">
            <svg width="18" height="18" fill="none" stroke="#fbbf24" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div>
            <p class="text-white font-semibold text-sm">Real-Time Tracking</p>
            <p class="text-blue-300 text-xs">Know exactly where your bus is</p>
          </div>
        </div>
      </div> --}}
    </div>
    <p class="text-white text-base leading-relaxed mb-0 max-w-sm">
        Book bus tickets instantly  2026 - {{ date('Y') }}
      </p>
  </div>

  <!-- Right Panel — Auth Forms -->
  <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-10 bg-gray-50 min-h-screen overflow-y-auto no-scroll">
    <div class="w-full max-w-md">

      <!-- Mobile Logo -->
      <div class="lg:hidden flex items-center gap-3 mb-8 justify-center">
        <div class="w-9 h-9 bg-blue-700 rounded-xl flex items-center justify-center shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" class="white"><!--!Font Awesome Pro v7.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2026 Fonticons, Inc.--><path fill="rgb(255, 255, 255)" d="M192 64C139 64 96 107 96 160L96 448C96 477.8 116.4 502.9 144 510L144 544C144 561.7 158.3 576 176 576L192 576C209.7 576 224 561.7 224 544L224 512L416 512L416 544C416 561.7 430.3 576 448 576L464 576C481.7 576 496 561.7 496 544L496 510C523.6 502.9 544 477.8 544 448L544 160C544 107 501 64 448 64L192 64zM160 192C160 174.3 174.3 160 192 160L448 160C465.7 160 480 174.3 480 192L480 288C480 305.7 465.7 320 448 320L192 320C174.3 320 160 305.7 160 288L160 192zM192 384C209.7 384 224 398.3 224 416C224 433.7 209.7 448 192 448C174.3 448 160 433.7 160 416C160 398.3 174.3 384 192 384zM448 384C465.7 384 480 398.3 480 416C480 433.7 465.7 448 448 448C430.3 448 416 433.7 416 416C416 398.3 430.3 384 448 384z"/></svg>
          </div>
        <span class="font-display text-2xl font-bold font-800 text-blue-900">Safari<span class="text-blue-600">Bus</span></span>
      </div>

      
      <!-- Tab Switcher -->
       <nav class=" md:flex items-center gap-8">
          <a href="{{ route('home') }}"  class="text-sm font-600 text-slate-600 hover:text-blue-700 transition-colors">← Back to Home</a>
         
        </nav>
      <div class="flex justify-center mb-8" id="tabBar">

    <h1 class="text-2xl font-bold text-[#1D4ED8] font-sans">LOGIN</h1>
</div>

      <!-- ===== LOGIN FORM ===== -->
      <livewire:auth.login />
    </div>
  </div>
</div>
<!-- END AUTH MAIN -->

@endsection
