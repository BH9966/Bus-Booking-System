<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--  tailwind start --}}

<title>SwiftRide Login</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/heroicons@2.0.18/outline/heroicons.min.js"></script>
<style>
  * { font-family: 'Plus Jakarta Sans', sans-serif; box-sizing: border-box; }
  .font-display { font-family: 'Syne', sans-serif; }

  /* Page switching */
  .auth-page { display: none; }
  .auth-page.active { display: flex; }

  /* Gradient bg */
  .hero-bg {
    width: 30%;
    height: 100vh;
    background-image: url("{{ asset('image/Fly Nonstop to New Jersey for as Low as $39!.jpg') }}");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    
  }

  {{--  linear-gradient(to top, rgba(179, 176, 176, 0.603), transparent),  --}}
  /* Animated orbs */
  .orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(72px);
    animation: float 8s ease-in-out infinite;
    pointer-events: none;
  }
  .orb-1 { width: 400px; height: 400px; background: rgba(16,185,129,0.18); top: -80px; left: -80px; animation-delay: 0s; }
  .orb-2 { width: 320px; height: 320px; background: rgba(59,130,246,0.15); bottom: 50px; right: -60px; animation-delay: 3s; }
  .orb-3 { width: 200px; height: 200px; background: rgba(139,92,246,0.12); top: 40%; left: 30%; animation-delay: 5s; }

  @keyframes float {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-30px) scale(1.05); }
  }

  /* Card glass effect */
  .auth-card {
    background: rgba(255,255,255,0.97);
    border-radius: 24px;
    box-shadow: 0 32px 80px rgba(0,0,0,0.18), 0 0 0 1px rgba(255,255,255,0.3);
  }

  /* Buttons */
  .btn-primary {
    background: linear-gradient(135deg, #1D4ED8, #1D4ED8);
    transition: all 0.22s;
    border: none;
  }
  .btn-primary:hover {
    background: linear-gradient(135deg, #1d4fd8c7, #1d4fd8cc);
    transform: translateY(-2px);
    box-shadow: 0 10px 28px #1D4ED8;
  }
  .btn-primary:active { transform: translateY(0); }

  .btn-outline {
    background: transparent;
    border: 2px solid #e5e7eb;
    transition: all 0.2s;
  }
  .btn-outline:hover { border-color: #1D4ED8; background: #f0fdf4; }

  /* Inputs */
  .input-field {
    width: 100%;
    border: 2px solid #e5e7eb;
    border-radius: 14px;
    padding: 13px 44px 13px 46px;
    font-size: 14px;
    color: #1f2937;
    background: #f9fafb;
    outline: none;
    transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
  }
  .input-field:focus {
    border-color: #1D4ED8;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(16,185,129,0.1);
  }
  .input-field.error { border-color: #ef4444; background: #fff8f8; }
  .input-field.success-field { border-color: #10b981; background: #f0fdf4; }

  /* Input wrapper */
  .input-wrap { position: relative; }
  .input-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); pointer-events: none; }
  .input-eye { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #9ca3af; }
  .input-eye:hover { color: #1D4ED8; }

  /* Tab switcher */
  .tab-btn {
    flex: 1; padding: 11px; font-weight: 600; font-size: 14px;
    border-radius: 12px; cursor: pointer; border: none;
    transition: all 0.22s; background: transparent; color: #9ca3af;
  }
  .tab-btn.active {
    background: linear-gradient(135deg, #1D4ED8, #1D4ED8);
    color: white;
    box-shadow: 0 4px 16px rgba(5,150,105,0.3);
  }

  /* Social buttons */
  .social-btn {
    display: flex; align-items: center; justify-content: center; gap: 10px;
    padding: 11px; border: 2px solid #e5e7eb; border-radius: 14px;
    font-size: 13px; font-weight: 600; color: #374151;
    cursor: pointer; background: white; transition: all 0.2s; width: 100%;
  }
  .social-btn:hover { border-color: #10b981; background: #f0fdf4; transform: translateY(-1px); }

  /* Progress bar */
  .strength-bar { height: 4px; border-radius: 4px; transition: all 0.4s; }

  /* Error text */
  .err-msg { color: #ef4444; font-size: 11.5px; margin-top: 4px; display: none; }
  .err-msg.show { display: block; }

  /* Checkbox custom */
  .custom-check { accent-color: #1D4ED8; width: 16px; height: 16px; cursor: pointer; }

  /* Fade in */
  .fade-in { animation: fadeUp 0.35s ease; }
  @keyframes fadeUp { from { opacity:0; transform:translateY(18px); } to { opacity:1; transform:translateY(0); } }

  /* Decorative bus illustration */
  .bus-illustration { opacity: 0.85; }

  /* Floating feature badges */
  .feat-badge {
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.18);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 12px 16px;
    display: flex; align-items: center; gap: 10px;
  }

  /* OTP inputs */
  .otp-input {
    width: 52px; height: 56px; border: 2px solid #e5e7eb; border-radius: 14px;
    text-align: center; font-size: 22px; font-weight: 700; color: #1f2937;
    background: #f9fafb; outline: none; transition: all 0.2s;
  }
  .otp-input:focus { border-color: #1D4ED8; background: #fff; box-shadow: 0 0 0 4px rgba(16,185,129,0.1); }

  input[type="date"] { appearance: none; }
  select { appearance: none; }

  /* Scrollbar hide */
  .no-scroll::-webkit-scrollbar { display: none; }
  .no-scroll { -ms-overflow-style: none; scrollbar-width: none; }
</style>


{{-- tailwind end --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    <script>
    window.addEventListener('error_message', event => {
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: event.detail.message,
            showConfirmButton: false,
            timer: 2000
        });
    });
    document.addEventListener('DOMContentLoaded', function () {

    @if (session('error'))
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2500
        });
    @endif

});


document.addEventListener('livewire:init', () => {
    Livewire.on('swal', data => {
        Swal.fire({
            position: 'top-end',
            icon: data.icon,
            title: data.title,
            showConfirmButton: false,
            timer: 2500
        });
    });
});



</script>
</body>
</html>

