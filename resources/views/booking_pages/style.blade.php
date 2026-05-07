<script>
tailwind.config = {
  theme: {
    extend: {
      fontFamily: {
        sans: ['Plus Jakarta Sans', 'sans-serif'],
        display: ['Syne', 'sans-serif'],
      },
      colors: {
        brand: {
          50: '#eff6ff',
          100: '#dbeafe',
          200: '#bfdbfe',
          400: '#60a5fa',
          500: '#3b82f6',
          600: '#1d4ed8',
          700: '#1e40af',
          800: '#1e3a8a',
          900: '#0f172a',
        },
        gold: {
          400: '#fbbf24',
          500: '#f59e0b',
          600: '#d97706',
        }
      }
    }
  }
}
</script>
<style>
  body { font-family: 'Plus Jakarta Sans', sans-serif; }
  .font-display { font-family: 'Syne', sans-serif; }

  /* Carousel */
  .carousel-inner { display: flex; transition: transform 0.6s cubic-bezier(.4,0,.2,1); }
  .carousel-slide { min-width: 100%; }

  /* Seat styles */
  .seat { width: 36px; height: 36px; border-radius: 8px; border: 2px solid; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 600; transition: all 0.15s; }
  .seat-available { border-color: #1d4ed8; background: #eff6ff; color: #1d4ed8; }
  .seat-available:hover { background: #1d4ed8; color: white; transform: scale(1.08); }
  .seat-occupied { border-color: #6b7280; background: #f3f4f6; color: #9ca3af; cursor: not-allowed; }
  .seat-selected { border-color: #16a34a; background: #16a34a; color: white; transform: scale(1.08); }

  /* Page transitions */
  .page { display: none; }
  .page.active { display: block; }

  /* Gradient hero */
  /* .hero-gradient { background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #1d4ed8 100%); } */
  .hero-gradient {
    background-image: url('/image/Luxury-buses-from-Arusha-to-Dar-es-salaam.jpg');
  background-size: 100% auto; /* Width is 100%, height scales automatically */
  background-repeat: no-repeat;
  
  width: 100%;
  aspect-ratio: 3 / 1;
    
  }

  /* Scrollbar */
  ::-webkit-scrollbar { width: 6px; }
  ::-webkit-scrollbar-track { background: #f1f5f9; }
  ::-webkit-scrollbar-thumb { background: #1d4ed8; border-radius: 3px; }

  /* Bus card hover */
  .bus-card:hover { transform: translateY(-2px); box-shadow: 0 20px 40px rgba(29,78,216,0.12); }

  /* Animated badge */
  @keyframes pulse-ring {
    0% { transform: scale(1); opacity: 1; }
    100% { transform: scale(1.4); opacity: 0; }
  }
  .live-badge::before {
    content: ''; position: absolute; inset: 0; border-radius: 9999px;
    background: #16a34a; animation: pulse-ring 1.5s infinite;
  }

  /* Smooth scroll */
  html { scroll-behavior: smooth; }

  /* Form input focus */
  input:focus, select:focus { outline: none; border-color: #1d4ed8 !important; box-shadow: 0 0 0 3px rgba(29,78,216,0.15); }
</style>