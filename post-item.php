<?php
$activePage = 'post';
require_once __DIR__ . '/includes/header.php';
?>

<main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Left Sidebar (Directly matching bottom-left screenshot) -->
    <aside class="hidden lg:block lg:col-span-3 space-y-6">
      <div class="bg-white rounded-3xl p-5 border border-slate-200 shadow-sm space-y-1">
        <a href="/dashboard.php" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 hover:bg-slate-50 font-medium text-xs transition">
          <span>🏠</span> <span>Dashboard</span>
        </a>
        <a href="/dashboard.php?tab=listings" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 hover:bg-slate-50 font-medium text-xs transition">
          <span>📋</span> <span>My Listings</span>
        </a>
        <a href="/messages.php" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 hover:bg-slate-50 font-medium text-xs transition">
          <span>💬</span> <span>Messages</span>
        </a>
        <a href="/dashboard.php?tab=favorites" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 hover:bg-slate-50 font-medium text-xs transition">
          <span>❤️</span> <span>Favorites</span>
        </a>
        <a href="/offers.php" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 hover:bg-slate-50 font-medium text-xs transition">
          <span>🔄</span> <span>My Exchanges</span>
        </a>
        <a href="/dashboard.php?tab=profile" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 hover:bg-slate-50 font-medium text-xs transition">
          <span>👤</span> <span>Profile</span>
        </a>
        <a href="/dashboard.php?tab=settings" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 hover:bg-slate-50 font-medium text-xs transition">
          <span>⚙️</span> <span>Settings</span>
        </a>
      </div>

      <!-- Upgrade Card (Matching bottom-left screenshot: "Get More Views") -->
      <div class="bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 text-white rounded-3xl p-6 border border-slate-800 shadow-lg text-center">
        <div class="w-12 h-12 rounded-2xl bg-blue-600/30 border border-blue-400/40 text-blue-400 mx-auto flex items-center justify-center text-xl mb-3">
          🚀
        </div>
        <h4 class="font-bold text-sm">Get More Views</h4>
        <p class="text-[11px] text-slate-300 mt-1 leading-snug">Boost your listing and reach 5x more people looking to trade.</p>
        <button onclick="upgradeListingPromo()" class="mt-4 w-full bg-blue-600 hover:bg-blue-700 font-bold text-xs py-2.5 rounded-xl shadow-md shadow-blue-600/30 transition">
          Upgrade Now
        </button>
      </div>
    </aside>

    <!-- Main Listing Form Wizard (Matching screenshot stepper & fields) -->
    <div class="lg:col-span-9 bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-sm">
      
      <div class="border-b border-slate-100 pb-6 mb-8">
        <h1 class="text-2xl font-black text-slate-900 tracking-tight">Post Your Item</h1>
        <p class="text-xs text-slate-500 mt-1">List what you own to find the perfect barter or exchange partner.</p>
      </div>

      <!-- 4-Step Stepper Header -->
      <div class="grid grid-cols-4 gap-2 mb-8 text-center text-xs font-bold">
        <div class="flex items-center gap-2 text-blue-600 border-b-2 border-blue-600 pb-2">
          <span class="w-5 h-5 rounded-full bg-blue-600 text-white flex items-center justify-center text-[10px]">1</span>
          <span class="hidden sm:inline">Basic Details</span>
        </div>
        <div class="flex items-center gap-2 text-slate-400 pb-2">
          <span class="w-5 h-5 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center text-[10px]">2</span>
          <span class="hidden sm:inline">Photos</span>
        </div>
        <div class="flex items-center gap-2 text-slate-400 pb-2">
          <span class="w-5 h-5 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center text-[10px]">3</span>
          <span class="hidden sm:inline">Exchange Preferences</span>
        </div>
        <div class="flex items-center gap-2 text-slate-400 pb-2">
          <span class="w-5 h-5 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center text-[10px]">4</span>
          <span class="hidden sm:inline">Review</span>
        </div>
      </div>

      <form id="postItemForm" onsubmit="handlePostSubmit(event)" class="space-y-6">
        
        <!-- What do you want to list? (Reference: I want to sell / I want to exchange tabs) -->
        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">What do you want to do?</label>
          <div class="grid grid-cols-2 gap-3 max-w-md">
            <button type="button" onclick="setListingType('sell', this)" class="type-btn py-3 px-4 rounded-xl border border-slate-200 font-bold text-xs text-slate-600 flex items-center justify-center gap-2 hover:bg-slate-50">
              <span>🏷️</span> I want to sell
            </button>
            <button type="button" onclick="setListingType('exchange', this)" class="type-btn active py-3 px-4 rounded-xl bg-blue-600 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-sm">
              <span>🔄</span> I want to exchange
            </button>
          </div>
        </div>

        <!-- Category Dropdown -->
        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Category</label>
          <select id="itemCategory" required class="w-full text-xs font-medium p-3.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 outline-none bg-white">
            <option value="">Select category</option>
            <option value="Mobiles & Tablets" selected>Mobiles & Tablets</option>
            <option value="Bikes & Scooters">Bikes & Scooters</option>
            <option value="Laptops & Computers">Laptops & Computers</option>
            <option value="TV & Home Appliances">TV & Home Appliances</option>
            <option value="Furniture">Furniture</option>
            <option value="Gaming">Gaming</option>
            <option value="Fashion & Lifestyle">Fashion & Lifestyle</option>
            <option value="Sports & Fitness">Sports & Fitness</option>
          </select>
        </div>

        <!-- Title -->
        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Title</label>
          <input type="text" id="itemTitle" value="iPhone 13 (128GB)" placeholder="e.g. iPhone 13 (128GB)" required class="w-full text-xs font-medium p-3.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <!-- Description -->
        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Description</label>
          <textarea id="itemDesc" rows="3" placeholder="Tell us about your item, condition, warranty, included accessories, etc..." class="w-full text-xs font-medium p-3.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 outline-none">Well maintained iPhone 13, 128GB. No scratches, works perfectly, Original box and charger available. Interested in bike or TV (with or without extra cash).</textarea>
        </div>

        <!-- Estimated Value (₹) -->
        <div>
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Estimated Value (₹)</label>
          <input type="number" id="itemValue" value="25000" placeholder="e.g. 25000" required class="w-full text-xs font-medium p-3.5 rounded-xl border border-slate-300 focus:ring-2 focus:ring-blue-500 outline-none">
          <p class="text-[11px] text-slate-400 mt-1">This is your estimated trade value to help matchmakers calculate fair barter balances.</p>
        </div>

        <!-- What do you want in exchange? (Reference Checkboxes) -->
        <div class="border-t border-slate-100 pt-6">
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">What do you want in exchange?</label>
          <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-200 hover:border-blue-400 cursor-pointer">
              <input type="checkbox" name="wants" value="Bike / Scooter" checked class="w-4 h-4 text-blue-600 rounded">
              <span class="text-xs font-semibold text-slate-800">Bike / Scooter</span>
            </label>
            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-200 hover:border-blue-400 cursor-pointer">
              <input type="checkbox" name="wants" value="TV" checked class="w-4 h-4 text-blue-600 rounded">
              <span class="text-xs font-semibold text-slate-800">TV</span>
            </label>
            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-200 hover:border-blue-400 cursor-pointer">
              <input type="checkbox" name="wants" value="Laptop / Computer" checked class="w-4 h-4 text-blue-600 rounded">
              <span class="text-xs font-semibold text-slate-800">Laptop / Computer</span>
            </label>
            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-200 hover:border-blue-400 cursor-pointer">
              <input type="checkbox" name="wants" value="Mobile / Tablet" class="w-4 h-4 text-blue-600 rounded">
              <span class="text-xs font-semibold text-slate-800">Mobile / Tablet</span>
            </label>
            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-200 hover:border-blue-400 cursor-pointer">
              <input type="checkbox" name="wants" value="Furniture" class="w-4 h-4 text-blue-600 rounded">
              <span class="text-xs font-semibold text-slate-800">Furniture</span>
            </label>
            <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-200 hover:border-blue-400 cursor-pointer">
              <input type="checkbox" name="wants" value="Other" class="w-4 h-4 text-blue-600 rounded">
              <span class="text-xs font-semibold text-slate-800">Other</span>
            </label>
          </div>
        </div>

        <!-- Next / Submit Button -->
        <div class="pt-6 flex justify-end">
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 active:scale-95 text-white font-bold text-sm px-8 py-3.5 rounded-2xl shadow-md shadow-blue-500/25 flex items-center gap-2 transition">
            <span>Next &rarr;</span>
          </button>
        </div>

      </form>
    </div>

  </div>
</main>

<script>
function setListingType(type, btn) {
  document.querySelectorAll('.type-btn').forEach(b => {
    b.className = 'type-btn py-3 px-4 rounded-xl border border-slate-200 font-bold text-xs text-slate-600 flex items-center justify-center gap-2 hover:bg-slate-50';
  });
  btn.className = 'type-btn active py-3 px-4 rounded-xl bg-blue-600 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-sm';
}

function handlePostSubmit(e) {
  e.preventDefault();
  const title = document.getElementById('itemTitle').value;
  const val = document.getElementById('itemValue').value;
  
  Swal.fire({
    title: 'Publish Listing?',
    text: `Your listing "${title}" valued at ₹${val} will be published for barter exchange.`,
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Yes, Publish Item',
    confirmButtonColor: '#2563eb',
    customClass: { popup: 'rounded-3xl' }
  }).then((res) => {
    if (res.isConfirmed) {
      Swal.fire({
        title: '🎉 Listing Live!',
        text: 'Your item is now live and searchable by thousands of traders.',
        icon: 'success',
        confirmButtonColor: '#2563eb',
        customClass: { popup: 'rounded-3xl' }
      }).then(() => {
        window.location.href = '/listing.php?id=1';
      });
    }
  });
}

function upgradeListingPromo() {
  Swal.fire({
    title: 'Boost Your Listing',
    text: 'Highlight your listing at top of search results and smart matchmaker for 7 days.',
    icon: 'info',
    showCancelButton: true,
    confirmButtonText: 'Boost for Free (Demo)',
    confirmButtonColor: '#2563eb',
    customClass: { popup: 'rounded-3xl' }
  }).then((res) => {
    if (res.isConfirmed) {
      Swal.fire('Boost Active!', 'Your listing will receive priority matching.', 'success');
    }
  });
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
