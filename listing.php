<?php
$activePage = 'browse';
require_once __DIR__ . '/includes/header.php';

$listingId = (int)($_GET['id'] ?? 1);
?>

<main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
  
  <!-- Back navigation & Actions row (Directly from reference) -->
  <div class="flex items-center justify-between pb-6">
    <a href="/index.php" class="inline-flex items-center gap-2 text-xs font-bold text-slate-600 hover:text-blue-600 transition">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
      <span>Back to Listings</span>
    </a>
    <div class="flex items-center gap-4 text-xs font-semibold text-slate-500">
      <button onclick="shareListing()" class="flex items-center gap-1.5 hover:text-blue-600">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
        <span>Share</span>
      </button>
      <button onclick="reportListing()" class="flex items-center gap-1.5 hover:text-rose-600">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        <span>Report</span>
      </button>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Left Column: Gallery & Product Images -->
    <div class="lg:col-span-7 space-y-4">
      <div class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-sm aspect-[4/3] relative">
        <img id="mainListingImage" src="https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=1000&q=80" alt="iPhone 13 (128GB)" class="w-full h-full object-cover">
        <div class="absolute top-4 left-4 bg-emerald-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow flex items-center gap-1.5">
          <span>🔄</span> Wants Bike / TV
        </div>
      </div>

      <!-- Thumbnail Row (Matches 5 small cards in screenshot) -->
      <div class="grid grid-cols-5 gap-3">
        <button onclick="changeMainImage(this.querySelector('img').src)" class="rounded-xl overflow-hidden border-2 border-blue-600 aspect-square">
          <img src="https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover">
        </button>
        <button onclick="changeMainImage(this.querySelector('img').src)" class="rounded-xl overflow-hidden border border-slate-200 hover:border-blue-400 aspect-square">
          <img src="https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover">
        </button>
        <button onclick="changeMainImage(this.querySelector('img').src)" class="rounded-xl overflow-hidden border border-slate-200 hover:border-blue-400 aspect-square">
          <img src="https://images.unsplash.com/photo-1591337676887-a217a6970a8a?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover">
        </button>
        <button onclick="changeMainImage(this.querySelector('img').src)" class="rounded-xl overflow-hidden border border-slate-200 hover:border-blue-400 aspect-square">
          <img src="https://images.unsplash.com/photo-1580910051074-3eb694886505?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover">
        </button>
        <button onclick="changeMainImage(this.querySelector('img').src)" class="rounded-xl overflow-hidden border border-slate-200 hover:border-blue-400 aspect-square">
          <img src="https://images.unsplash.com/photo-1512499617640-c74ae3a79d37?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover">
        </button>
      </div>
    </div>

    <!-- Right Column: Details, Requirements, Owner & Actions -->
    <div class="lg:col-span-5 space-y-6">
      <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
        
        <!-- Title & Value -->
        <div>
          <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">iPhone 13 (128GB)</h1>
          <div class="mt-2 flex items-baseline gap-2">
            <span class="text-3xl font-black text-slate-900">₹25,000</span>
            <span class="text-xs text-slate-400 font-semibold">(Estimated Value)</span>
          </div>

          <!-- Feature Pills (Reference: Good Condition, 128 GB, Black) -->
          <div class="mt-3 flex flex-wrap gap-2">
            <span class="bg-slate-100 text-slate-700 text-xs font-semibold px-3 py-1 rounded-full">Good Condition</span>
            <span class="bg-slate-100 text-slate-700 text-xs font-semibold px-3 py-1 rounded-full">128 GB</span>
            <span class="bg-slate-100 text-slate-700 text-xs font-semibold px-3 py-1 rounded-full">Black</span>
          </div>

          <div class="mt-3 flex items-center text-xs text-slate-500 gap-1.5">
            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span class="font-medium text-slate-700">Delhi, 5 km away</span>
          </div>
        </div>

        <!-- What I want in exchange (Reference: Bike, TV, Laptop) -->
        <div class="border-t border-slate-100 pt-5">
          <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">What I want in exchange</h3>
          <div class="flex flex-wrap gap-2.5">
            <span class="inline-flex items-center gap-1.5 bg-blue-50 text-blue-700 px-3.5 py-1.5 rounded-xl text-xs font-bold border border-blue-100">
              <span>🏍️</span> Bike
            </span>
            <span class="inline-flex items-center gap-1.5 bg-teal-50 text-teal-700 px-3.5 py-1.5 rounded-xl text-xs font-bold border border-teal-100">
              <span>📺</span> TV
            </span>
            <span class="inline-flex items-center gap-1.5 bg-indigo-50 text-indigo-700 px-3.5 py-1.5 rounded-xl text-xs font-bold border border-indigo-100">
              <span>💻</span> Laptop
            </span>
          </div>
        </div>

        <!-- Description (Reference) -->
        <div class="border-t border-slate-100 pt-5">
          <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Description</h3>
          <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
            Well maintained iPhone 13, 128GB. No scratches, works perfectly, Original box and charger available. Interested in bike or TV (with or without extra cash).
          </p>
          <p class="text-[11px] text-slate-400 mt-2">Posted 2 days ago</p>
        </div>

        <!-- Seller Card (Reference: Rohit Sharma, Verified User, Member since Jan 2024, 12 listings, 4.8 star) -->
        <div class="border-t border-slate-100 pt-5 flex items-center justify-between bg-slate-50/80 p-4 rounded-2xl border border-slate-200">
          <div class="flex items-center gap-3">
            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=200&q=80" alt="Rohit Sharma" class="w-12 h-12 rounded-full object-cover ring-2 ring-blue-500/20">
            <div>
              <div class="flex items-center gap-1.5">
                <h4 class="font-bold text-sm text-slate-900">Rohit Sharma</h4>
                <span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full">
                  ✓ Verified User
                </span>
              </div>
              <p class="text-[11px] text-slate-500 mt-0.5">Member since Jan 2024 • 12 listings • 4.8 ★</p>
            </div>
          </div>
        </div>

        <!-- Primary Actions (Reference: Chat with Seller, Make an Offer) -->
        <div class="space-y-3 pt-2">
          <a href="/messages.php?id=2" class="w-full bg-blue-600 hover:bg-blue-700 active:scale-95 text-white font-bold text-sm py-3.5 rounded-2xl shadow-md shadow-blue-500/25 flex items-center justify-center gap-2 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            <span>Chat with Seller</span>
          </a>

          <button onclick="openOfferModal(1, 'iPhone 13 (128GB)', 25000, 1)" class="w-full bg-white hover:bg-slate-50 border-2 border-blue-600 text-blue-600 font-bold text-sm py-3.5 rounded-2xl flex items-center justify-center gap-2 transition">
            <span>Make an Offer</span>
          </button>
        </div>

      </div>
    </div>

  </div>
</main>

<script>
function changeMainImage(url) {
  document.getElementById('mainListingImage').src = url;
}
function shareListing() {
  navigator.clipboard.writeText(window.location.href);
  Swal.fire({
    title: 'Link Copied!',
    text: 'Listing URL has been copied to your clipboard.',
    icon: 'success',
    timer: 1800,
    showConfirmButton: false,
    customClass: { popup: 'rounded-3xl' }
  });
}
function reportListing() {
  Swal.fire({
    title: 'Report Listing',
    input: 'select',
    inputOptions: {
      'fraud': 'Suspected scam or fraud',
      'prohibited': 'Prohibited or illegal item',
      'inaccurate': 'Inaccurate valuation or photos',
      'other': 'Other policy violation'
    },
    inputPlaceholder: 'Select report reason',
    showCancelButton: true,
    confirmButtonText: 'Submit Report',
    confirmButtonColor: '#2563eb',
    customClass: { popup: 'rounded-3xl' }
  }).then((res) => {
    if (res.isConfirmed) {
      Swal.fire('Report Submitted', 'Our moderation team will review this item within 2 hours.', 'success');
    }
  });
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
