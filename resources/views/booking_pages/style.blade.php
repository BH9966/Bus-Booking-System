<style>
  * { font-family: 'Plus Jakarta Sans', sans-serif; }
  .font-display { font-family: 'Syne', sans-serif; }
  .page { display: none; }
  .page.active { display: block; }
  .carousel-track { transition: transform 0.6s cubic-bezier(.77,0,.18,1); }
  .seat-btn { transition: all 0.18s; }
  .seat-btn:hover:not(.occupied) { transform: scale(1.12); }
  .hero-gradient {
    background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #1a4a3a 100%);
  }
  .glass {
    background: rgba(255,255,255,0.07);
    backdrop-filter: blur(14px);
    border: 1px solid rgba(255,255,255,0.12);
  }
  .card-hover { transition: transform 0.2s, box-shadow 0.2s; }
  .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 40px rgba(0,0,0,0.12); }
  .btn-primary {
    background: linear-gradient(135deg, #059669, #10b981);
    transition: all 0.2s;
  }
  .btn-primary:hover { background: linear-gradient(135deg, #047857, #059669); transform: translateY(-1px); box-shadow: 0 8px 24px rgba(5,150,105,0.35); }
  .nav-link { position: relative; }
  .nav-link::after { content:''; position:absolute; bottom:-4px; left:0; width:0; height:2px; background:#10b981; transition: width 0.25s; border-radius:2px; }
  .nav-link:hover::after { width:100%; }
  .fade-in { animation: fadeIn 0.4s ease; }
  @keyframes fadeIn { from { opacity:0; transform:translateY(16px); } to { opacity:1; transform:translateY(0); } }
  .search-card { background: rgba(255,255,255,0.95); backdrop-filter: blur(20px); }
  .ticket-card { border-left: 4px solid #10b981; }
  .selected-seat { background: linear-gradient(135deg, #059669, #10b981) !important; color: white !important; border-color: #059669 !important; }
  .seat-legend-dot { width: 20px; height: 20px; border-radius: 6px; display: inline-block; }
  input, select { outline: none; }
  input:focus, select:focus { ring: 0; }
  .step-active { background: linear-gradient(135deg, #059669, #10b981); color: white; }
  .step-done { background: #059669; color: white; }
  .route-card { border-top: 3px solid; }
  .zigzag {
    background: linear-gradient(135deg, #f0fdf4, #ecfdf5);
    clip-path: polygon(0 0, 100% 0, 100% 90%, 50% 100%, 0 90%);
    padding-bottom: 80px;
  }
</style>