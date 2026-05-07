<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SwiftRide — Bus Ticket Booking</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Syne:wght@700;800&display=swap" rel="stylesheet">
 @include('booking_pages.style')
</head>
<body class="bg-gray-50 min-h-screen">

<!-- ===== PAGE 1: HOME ===== -->
<div id="homePage" class="page active">

  <!-- HEADER -->
 
@include('booking_pages.header')
  <!-- HERO + CAROUSEL -->
 @include('booking_pages.carousel')

  <!-- AVAILABLE BUSES SECTION -->
  @include('booking_pages.busessection')

  <!-- ROUTES SECTION -->
  
@include('booking_pages.routesection')
  <!-- BUS GALLERY SECTION -->
  @include('booking_pages.gallerysection')

  <!-- FOOTER -->
   @include('booking_pages.footer')
</div>
<!-- END HOME PAGE -->


<script>
// ---- STATE ----
let currentSlide = 0;
let selectedSeat = null;
let currentBusInfo = {};
let autoSlide;

// ---- PAGE NAVIGATION ----
function showPage(id) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.getElementById(id).classList.add('active');
  window.scrollTo(0,0);
}

// ---- MOBILE MENU ----
function toggleMobileMenu() {
  const m = document.getElementById('mobileMenu');
  m.classList.toggle('hidden');
}

// ---- CAROUSEL ----
function goToSlide(n) {
  currentSlide = (n + 4) % 4;
  document.getElementById('carouselTrack').style.transform = `translateX(-${currentSlide * 25}%)`;
  document.querySelectorAll('.carousel-dot').forEach((d, i) => {
    d.classList.toggle('bg-white', i === currentSlide);
    d.classList.toggle('bg-white/50', i !== currentSlide);
    d.classList.toggle('w-6', i === currentSlide);
  });
}
function nextSlide() { goToSlide(currentSlide + 1); resetAutoSlide(); }
function prevSlide() { goToSlide(currentSlide - 1); resetAutoSlide(); }
function resetAutoSlide() { clearInterval(autoSlide); autoSlide = setInterval(() => goToSlide(currentSlide + 1), 4000); }

document.querySelectorAll('.carousel-dot').forEach(d => {
  d.addEventListener('click', () => { goToSlide(+d.dataset.idx); resetAutoSlide(); });
});
autoSlide = setInterval(() => goToSlide(currentSlide + 1), 4000);

// ---- FIND BUS ----
function findBus() {
  const dep = document.getElementById('departure').value || 'Dar es Salaam';
  const dest = document.getElementById('destination').value || 'Dodoma';
  const dateVal = document.getElementById('travelDate').value;
  let dateStr = 'Wed, 7 May 2026';
  if (dateVal) {
    const d = new Date(dateVal + 'T00:00:00');
    dateStr = d.toLocaleDateString('en-US', { weekday:'short', day:'numeric', month:'short', year:'numeric' });
  }
  document.getElementById('result-departure').textContent = dep;
  document.getElementById('result-destination').textContent = dest;
  document.getElementById('result-date').textContent = dateStr;
  document.getElementById('sum-route').textContent = dep + ' → ' + dest;
  document.getElementById('sum-date').textContent = dateStr;

  showPage('resultsPage');
  document.getElementById('seatMapSection').classList.add('hidden');
  document.getElementById('passengerForm').classList.add('hidden');
  document.getElementById('successMessage').classList.add('hidden');
  selectedSeat = null;
}

// ---- SEAT MAP ----
const occupiedSeats = [2, 5, 8, 12, 15, 19, 23, 27, 30, 33, 38, 42];
const ladiesSeats = [1, 2, 3, 4];

function showSeatMap(btn, busId, busName, dep, arr, price) {
  currentBusInfo = { busId, busName, dep, arr, price };
  selectedSeat = null;

  document.getElementById('seat-bus-name').textContent = busName + ' (' + busId + ')';
  document.getElementById('seat-dep').textContent = dep;
  document.getElementById('seat-arr').textContent = arr;
  document.getElementById('sum-bus').textContent = busName;
  document.getElementById('sum-price').textContent = 'TZS ' + price;
  document.getElementById('selectedSeatLabel').textContent = 'None';
  document.getElementById('sum-seat').textContent = '—';
  document.getElementById('confirmSeatBtn').disabled = true;

  renderSeatGrid();

  document.getElementById('seatMapSection').classList.remove('hidden');
  document.getElementById('passengerForm').classList.add('hidden');
  document.getElementById('successMessage').classList.add('hidden');

  setTimeout(() => {
    document.getElementById('seatMapSection').scrollIntoView({ behavior: 'smooth', block: 'start' });
  }, 100);
}

function renderSeatGrid() {
  const grid = document.getElementById('seatGrid');
  let html = '<div style="display:grid; grid-template-columns: repeat(5, 1fr); gap:8px; max-width:320px; margin:0 auto;">';
  // Row labels: A B [aisle] C D
  html += `<div class="text-xs text-gray-400 font-bold text-center py-1">A</div>
           <div class="text-xs text-gray-400 font-bold text-center py-1">B</div>
           <div></div>
           <div class="text-xs text-gray-400 font-bold text-center py-1">C</div>
           <div class="text-xs text-gray-400 font-bold text-center py-1">D</div>`;

  const totalRows = 12;
  let seatNum = 1;
  for (let row = 1; row <= totalRows; row++) {
    // Seat A
    html += buildSeat(seatNum, row);
    seatNum++;
    // Seat B
    html += buildSeat(seatNum, row);
    seatNum++;
    // Aisle
    html += `<div class="flex items-center justify-center text-xs text-gray-300 font-medium">${row}</div>`;
    // Seat C
    html += buildSeat(seatNum, row);
    seatNum++;
    // Seat D
    html += buildSeat(seatNum, row);
    seatNum++;
  }
  html += '</div>';
  grid.innerHTML = html;
}

function buildSeat(num, row) {
  const isOccupied = occupiedSeats.includes(num);
  const isLadies = ladiesSeats.includes(num);
  if (isOccupied) {
    return `<div class="seat-btn occupied w-full aspect-square rounded-lg bg-gray-300 flex items-center justify-center text-xs font-bold text-gray-500 cursor-not-allowed select-none" title="Occupied">
      <svg width="12" height="12" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
    </div>`;
  } else if (isLadies) {
    return `<div onclick="selectSeat(${num})" class="seat-btn w-full aspect-square rounded-lg bg-amber-50 border-2 border-amber-400 flex items-center justify-center text-xs font-bold text-amber-700 cursor-pointer hover:bg-amber-100 select-none" id="seat-${num}" title="Ladies Only - Seat ${num}">
      ${num}
    </div>`;
  } else {
    return `<div onclick="selectSeat(${num})" class="seat-btn w-full aspect-square rounded-lg bg-white border-2 border-gray-200 flex items-center justify-center text-xs font-bold text-gray-600 cursor-pointer hover:border-emerald-400 hover:bg-emerald-50 select-none transition-colors" id="seat-${num}" title="Seat ${num}">
      ${num}
    </div>`;
  }
}

function selectSeat(num) {
  if (occupiedSeats.includes(num)) return;
  // Deselect previous
  if (selectedSeat) {
    const prev = document.getElementById('seat-' + selectedSeat);
    if (prev) {
      if (ladiesSeats.includes(selectedSeat)) {
        prev.className = 'seat-btn w-full aspect-square rounded-lg bg-amber-50 border-2 border-amber-400 flex items-center justify-center text-xs font-bold text-amber-700 cursor-pointer hover:bg-amber-100 select-none';
      } else {
        prev.className = 'seat-btn w-full aspect-square rounded-lg bg-white border-2 border-gray-200 flex items-center justify-center text-xs font-bold text-gray-600 cursor-pointer hover:border-emerald-400 hover:bg-emerald-50 select-none transition-colors';
      }
    }
  }
  selectedSeat = num;
  const el = document.getElementById('seat-' + num);
  if (el) {
    el.className = 'seat-btn selected-seat w-full aspect-square rounded-lg flex items-center justify-center text-xs font-bold cursor-pointer select-none';
  }
  document.getElementById('selectedSeatLabel').textContent = 'Seat ' + num;
  document.getElementById('sum-seat').textContent = 'Seat ' + num;
  document.getElementById('confirmSeatBtn').disabled = false;
}

function closeSeatMap() {
  document.getElementById('seatMapSection').classList.add('hidden');
}

function confirmSeat() {
  if (!selectedSeat) return;
  const { busId, busName, dep, arr, price } = currentBusInfo;
  const dep2 = document.getElementById('result-departure').textContent;
  const dest2 = document.getElementById('result-destination').textContent;

  document.getElementById('form-bus-info').textContent = busName + ' — ' + busId;
  document.getElementById('form-route-info').textContent = dep2 + ' → ' + dest2 + ' · ' + dep + ' – ' + arr;
  document.getElementById('form-seat-no').textContent = selectedSeat;
  document.getElementById('ord-seat').textContent = 'Seat ' + selectedSeat;
  document.getElementById('ord-price').textContent = 'TZS ' + price;

  const priceNum = parseInt(price.replace(',',''));
  document.getElementById('ord-total').textContent = 'TZS ' + (priceNum + 500).toLocaleString();

  document.getElementById('seatMapSection').classList.add('hidden');
  document.getElementById('passengerForm').classList.remove('hidden');

  setTimeout(() => {
    document.getElementById('passengerForm').scrollIntoView({ behavior: 'smooth', block: 'start' });
  }, 100);
}

function proceedPayment() {
  const dep2 = document.getElementById('result-departure').textContent;
  const dest2 = document.getElementById('result-destination').textContent;
  document.getElementById('success-bus').textContent = currentBusInfo.busName || 'SwiftRide Express';
  document.getElementById('success-route').textContent = dep2 + ' → ' + dest2;
  document.getElementById('success-seat').textContent = 'Seat ' + selectedSeat;
  document.getElementById('success-price').textContent = 'TZS ' + (currentBusInfo.price || '15,000');

  document.getElementById('passengerForm').classList.add('hidden');
  document.getElementById('successMessage').classList.remove('hidden');
  setTimeout(() => {
    document.getElementById('successMessage').scrollIntoView({ behavior: 'smooth', block: 'start' });
  }, 100);
}

// Set today as min date
document.getElementById('travelDate').min = new Date().toISOString().split('T')[0];
</script>
</body>
</html>
