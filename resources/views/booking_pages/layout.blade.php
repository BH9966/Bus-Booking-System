
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SwiftRide — Bus Ticket Booking</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Syne:wght@700;800&display=swap" rel="stylesheet">
  @include('booking_pages.style')
</head>
<body class="bg-slate-50 text-slate-800">
<div id="page-home" class="page active">

  <!-- HEADER -->
  
@include('booking_pages.header')
  <!-- HERO / CAROUSEL -->
  @include('booking_pages.carousel')

  <!-- AVAILABLE BUSES SECTION -->
  @include('booking_pages.availableBuses')

  <!-- ROUTES SECTION -->
 @include('booking_pages.routesection')

  <!-- OUR BUSES / FLEET SECTION -->
  @include('booking_pages.busessection')

  <!-- WHY CHOOSE US -->
  @include('booking_pages.chooseus')

  <!-- FOOTER -->
 @include('booking_pages.footer')
</div>
<script>
// ============================================================
// PAGE NAVIGATION
// ============================================================

function showPage(pageId) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.getElementById(pageId).classList.add('active');
  window.scrollTo(0, 0);
}

function toggleMobileMenu() {
  const menu = document.getElementById('mobile-menu');
  menu.classList.toggle('hidden');
}

// ============================================================
// CAROUSEL
// ============================================================
let currentSlide = 0;
const totalSlides = 3;

function updateCarousel() {
  document.getElementById('carousel-inner').style.transform = `translateX(-${currentSlide * 100}%)`;
  for (let i = 0; i < totalSlides; i++) {
    const dot = document.getElementById(`dot-${i}`);
    dot.className = `w-2 h-2 rounded-full transition-all ${i === currentSlide ? 'bg-white w-5' : 'bg-white bg-opacity-40'}`;
  }
}

function nextSlide() { currentSlide = (currentSlide + 1) % totalSlides; updateCarousel(); }
function prevSlide() { currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; updateCarousel(); }
function goToSlide(n) { currentSlide = n; updateCarousel(); }

setInterval(nextSlide, 4500);

// ============================================================
// FIND BUS
// ============================================================
function findBus() {
  const dep = document.getElementById('departure').value || 'Dar es Salaam';
  const dest = document.getElementById('destination').value || 'Arusha';
  const date = document.getElementById('travel-date').value;

  document.getElementById('r-departure').textContent = dep;
  document.getElementById('r-destination').textContent = dest;
  document.getElementById('r-date').textContent = date ? formatDate(date) : 'Today';

  showPage('page-results');
}

function formatDate(dateStr) {
  if (!dateStr) return 'Today';
  const d = new Date(dateStr);
  return d.toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
}

// ============================================================
// SEAT SELECTOR
// ============================================================
let selectedBusName = '';
let selectedDep = '';
let selectedArr = '';
let selectedPrice = '';
let selectedSeat = null;

function openSeatSelector(btn, busName, depTime, arrTime, price) {
  // Close all other panels
  document.querySelectorAll('.seat-panel').forEach(panel => {
    panel.classList.add('hidden');
    panel.innerHTML = '';
  });
  document.querySelectorAll('.chagua-btn').forEach(b => {
    b.textContent = 'Chagua Siti';
    b.classList.remove('bg-green-600', 'hover:bg-green-700');
    b.classList.add('bg-blue-700', 'hover:bg-blue-800');
  });

  selectedBusName = busName;
  selectedDep = depTime;
  selectedArr = arrTime;
  selectedPrice = price;

  const card = btn.closest('.bg-white.rounded-2xl');
  const panel = card.querySelector('.seat-panel');

  panel.classList.remove('hidden');
  panel.innerHTML = buildSeatLayout();

  btn.textContent = '▲ Hide Seats';
  btn.classList.remove('bg-blue-700', 'hover:bg-blue-800');
  btn.classList.add('bg-slate-600', 'hover:bg-slate-700');
}

function buildSeatLayout() {
  // Seat configuration: O = occupied, A = available
  const rows = [
    ['A', 'A', null, 'O', 'A'],
    ['O', 'A', null, 'A', 'A'],
    ['A', 'A', null, 'O', 'O'],
    ['A', 'O', null, 'A', 'A'],
    ['O', 'A', null, 'A', 'O'],
    ['A', 'A', null, 'O', 'A'],
    ['A', 'O', null, 'A', 'A'],
    ['O', 'O', null, 'A', 'A'],
    ['A', 'A', null, 'A', 'O'],
    ['A', 'A', null, 'O', 'A'],
    ['A', 'A', 'A', 'A', 'A'],
  ];

  const letters = ['A','B','','C','D'];

  let html = `
    <div class="max-w-2xl">
      <h3 class="font-700 text-slate-800 mb-1 text-base">Select Your Seat</h3>
      <p class="text-slate-500 text-xs mb-5">Click on an available seat to select it</p>

      <!-- Legend -->
      <div class="flex flex-wrap items-center gap-5 mb-5">
        <div class="flex items-center gap-2">
          <div class="w-7 h-7 rounded-lg border-2 border-blue-600 bg-blue-50"></div>
          <span class="text-xs text-slate-500">Available</span>
        </div>
        <div class="flex items-center gap-2">
          <div class="w-7 h-7 rounded-lg border-2 border-slate-300 bg-slate-100"></div>
          <span class="text-xs text-slate-500">Occupied</span>
        </div>
        <div class="flex items-center gap-2">
          <div class="w-7 h-7 rounded-lg border-2 border-green-500 bg-green-500"></div>
          <span class="text-xs text-slate-500">Selected</span>
        </div>
      </div>

      <!-- Bus front indicator -->
      <div class="bg-slate-200 rounded-xl py-2 px-4 text-center text-xs font-600 text-slate-500 mb-4 flex items-center justify-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17H5a2 2 0 01-2-2V6a2 2 0 012-2h13a2 2 0 012 2v4"/></svg>
        DRIVER — FRONT
      </div>

      <!-- Column labels -->
      <div class="flex items-center gap-2 mb-2 px-1">
        <div class="w-8 text-center"></div>
  `;

  letters.forEach(l => {
    html += `<div class="w-9 text-center text-xs font-600 text-slate-400">${l}</div>`;
  });

  html += `</div><div class="space-y-2">`;

  rows.forEach((row, rowIdx) => {
    html += `<div class="flex items-center gap-2 px-1">`;
    html += `<div class="w-8 text-center text-xs font-600 text-slate-400">${rowIdx + 1}</div>`;

    row.forEach((seat, colIdx) => {
      if (seat === null) {
        html += `<div class="w-9"></div>`;
      } else {
        const seatId = `${['A','B','C','D','E'][colIdx]}${rowIdx + 1}`;
        const stateClass = seat === 'O' ? 'seat-occupied' : 'seat-available';
        const clickHandler = seat === 'O' ? '' : `onclick="selectSeat(this, '${seatId}')"`;
        html += `<div class="seat ${stateClass}" id="seat-${seatId}" ${clickHandler}>${seatId}</div>`;
      }
    });

    html += `</div>`;
  });

  html += `
      </div>

      <!-- Confirm button -->
      <div id="seat-confirm-area" class="hidden mt-6 p-4 bg-blue-50 rounded-xl flex flex-col sm:flex-row items-center justify-between gap-4">
        <div>
          <p class="text-sm font-700 text-slate-800">Seat <span id="selected-seat-label" class="text-blue-700"></span> selected</p>
          <p class="text-xs text-slate-500 mt-0.5">Click confirm to proceed with booking</p>
        </div>
        <button onclick="confirmSeat()" class="px-6 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-700 rounded-xl transition-all active:scale-95 shadow-md shadow-green-100 whitespace-nowrap">
          ✓ Confirm Seat
        </button>
      </div>
    </div>
  `;

  return html;
}

function selectSeat(el, seatId) {
  // Reset previously selected
  document.querySelectorAll('.seat-selected').forEach(s => {
    s.className = 'seat seat-available';
  });

  el.className = 'seat seat-selected';
  selectedSeat = seatId;

  const confirmArea = document.getElementById('seat-confirm-area');
  confirmArea.classList.remove('hidden');
  document.getElementById('selected-seat-label').textContent = seatId;
}

function confirmSeat() {
  if (!selectedSeat) return;

  // Update booking page
  document.getElementById('booking-bus').textContent = selectedBusName;
  document.getElementById('booking-route').textContent =
    (document.getElementById('r-departure').textContent || 'Dar es Salaam') +
    ' → ' +
    (document.getElementById('r-destination').textContent || 'Arusha');
  document.getElementById('booking-time').textContent = selectedDep;
  document.getElementById('booking-seat').textContent = selectedSeat;
  document.getElementById('booking-date-display').textContent = document.getElementById('r-date').textContent;
  document.getElementById('booking-price').textContent = 'TZS ' + selectedPrice;

  const total = parseInt(selectedPrice.replace(/,/g,'')) + 1500;
  const totalFmt = total.toLocaleString();
  document.getElementById('booking-total').textContent = 'TZS ' + totalFmt;
  document.getElementById('pay-total').textContent = totalFmt;

  // Update confirmation modal fields
  document.getElementById('conf-bus').textContent = selectedBusName;
  document.getElementById('conf-seat').textContent = selectedSeat;
  document.getElementById('conf-total').textContent = 'TZS ' + totalFmt;

  showPage('page-booking');
}

// ============================================================
// BOOKING FORM
// ============================================================
function selectPayment(label) {
  document.querySelectorAll('label[onclick="selectPayment(this)"], label:has(input[name="payment"])').forEach(l => {
    l.classList.remove('border-blue-600', 'bg-blue-50');
    l.classList.add('border-slate-200');
    const txt = l.querySelector('span:last-child');
    if (txt) { txt.classList.remove('text-blue-700'); txt.classList.add('text-slate-600'); }
  });
  label.classList.remove('border-slate-200');
  label.classList.add('border-blue-600', 'bg-blue-50');
  const txt = label.querySelector('span:last-child');
  if (txt) { txt.classList.add('text-blue-700'); txt.classList.remove('text-slate-600'); }
  label.querySelector('input').checked = true;
}

function showConfirmation() {
  const modal = document.getElementById('success-modal');
  modal.classList.remove('hidden');
  modal.classList.add('flex');
}

function closeModal() {
  const modal = document.getElementById('success-modal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

// Set today's date as default
window.onload = function() {
  const today = new Date().toISOString().split('T')[0];
  document.getElementById('travel-date').value = today;
  document.getElementById('travel-date').min = today;
};
</script>
</body>
</html>

