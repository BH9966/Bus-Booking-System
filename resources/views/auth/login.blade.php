@extends('layouts.app')

@section('content')
<!-- ===================== LOGIN ===================== -->
<div class="auth-page active min-h-screen w-full">

  <!-- Left Panel — Branding -->
  <div class="hidden lg:flex lg:w-1/2 hero-bg relative overflow-hidden flex-col justify-between p-12">
    

    <!-- Logo -->
    <div class="relative z-10">
      <div class="flex items-center gap-3 mb-2">
        <div class="w-11 h-11 rounded-2xl flex items-center justify-center" style="background:linear-gradient(135deg,#059669,#10b981)">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2" stroke-linecap="round">
            <rect x="2" y="4" width="20" height="14" rx="3"/>
            <path d="M10 18v2M14 18v2M2 10h20"/>
            <circle cx="6.5" cy="15" r="1.5" fill="white" stroke="none"/>
            <circle cx="17.5" cy="15" r="1.5" fill="white" stroke="none"/>
          </svg>
        </div>
        <span class="font-display text-2xl font-bold text-white">Swift<span class="text-[#1D4ED8]">Ride</span></span>
      </div>
    </div>
    

    <!-- Center Content -->
    <div class="relative z-10 flex-1 flex flex-col justify-center py-12">
      <!-- Bus SVG Illustration -->
      <div class="bus-illustration mb-10">
         <h1 class="font-display text-4xl font-bold text-white leading-tight mb-4">
        Travel Across<br> <span class="text-[#1D4ED8]">Tanzania</span>  in Style
      </h1>
      </div>

      
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
        <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:linear-gradient(135deg,#1D4ED8,#1D4ED8)">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.2" stroke-linecap="round">
            <rect x="2" y="4" width="20" height="14" rx="3"/>
            <path d="M10 18v2M14 18v2M2 10h20"/>
            <circle cx="6.5" cy="15" r="1.5" fill="white" stroke="none"/>
            <circle cx="17.5" cy="15" r="1.5" fill="white" stroke="none"/>
          </svg>
        </div>
        <span class="font-display text-2xl font-bold text-gray-900">Swift<span class="text-emerald-600">Ride</span></span>
      </div>

      <!-- Tab Switcher -->
      <div class="flex justify-center mb-8" id="tabBar">
    <h1 class="text-2xl font-bold text-[#1D4ED8]">LOGIN</h1>
</div>

      <!-- ===== LOGIN FORM ===== -->
      <livewire:auth.login />
    </div>
  </div>
</div>
<!-- END AUTH MAIN -->

@endsection
