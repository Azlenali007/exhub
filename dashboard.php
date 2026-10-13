<?php
$activePage = 'dashboard';
require_once __DIR__ . '/includes/header.php';
$tab = $_GET['tab'] ?? 'overview';
?>

<main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    
    <!-- Left Navigation Sidebar -->
    <aside class="lg:col-span-3 space-y-6">
      
      <!-- Profile Card -->
      <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm text-center">
        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=200&q=80" alt="Rohit Sharma" class="w-20 h-20 rounded-full mx-auto object-cover ring-4 ring-blue-500/20">
        <h3 class="font-extrabold text-base text-slate-900 mt-3">Rohit Sharma</h3>
        <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-700 bg-emerald-100 px-3 py-0.5 rounded-full mt-1">
          ✓ Verified User
        </span>
        <p class="text-xs text-slate-500 mt-2">Delhi, India • Member since Jan 2024</p>

        <div class="grid grid-cols-3 gap-2 mt-4 pt-4 border-t border-slate-100 text-center">
          <div>
            <span class="block font-black text-sm text-slate-900">4.8 ★</span>
            <span class="text-[10px] text-slate-400 font-semibold">Rating</span>
          </div>
          <div>
            <span class="block font-black text-sm text-slate-900">12</span>
            <span class="text-[10px] text-slate-400 font-semibold">Listings</span>
          </div>
          <div>
            <span class="block font-black text-sm text-slate-900">9</span>
            <span class="text-[10px] text-slate-400 font-semibold">Exchanges</span>
          </div>
        </div>
      </div>

      <!-- Navigation Tabs -->
      <div class="bg-white rounded-3xl p-4 border border-slate-200 shadow-sm space-y-1 text-xs font-semibold">
        <a href="/dashboard.php?tab=overview" class="flex items-center justify-between px-4 py-3 rounded-2xl transition <?= $tab === 'overview' ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-700 hover:bg-slate-50' ?>">
          <div class="flex items-center gap-3">
            <span>📊</span> <span>Overview</span>
          </div>
        </a>
        <a href="/dashboard.php?tab=listings" class="flex items-center justify-between px-4 py-3 rounded-2xl transition <?= $tab === 'listings' ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-700 hover:bg-slate-50' ?>">
          <div class="flex items-center gap-3">
            <span>📋</span> <span>My Listings</span>
          </div>
          <span class="text-[10px] font-bold px-2 py-0.5 rounded-full <?= $tab === 'listings' ? 'bg-white/20' : 'bg-slate-100 text-slate-600' ?>">3</span>
        </a>
        <a href="/offers.php" class="flex items-center justify-between px-4 py-3 rounded-2xl text-slate-700 hover:bg-slate-50 transition">
          <div class="flex items-center gap-3">
            <span>🤝</span> <span>Barter Proposals</span>
          </div>
          <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-blue-100 text-blue-700">2</span>
        </a>
        <a href="/messages.php" class="flex items-center justify-between px-4 py-3 rounded-2xl text-slate-700 hover:bg-slate-50 transition">
          <div class="flex items-center gap-3">
            <span>💬</span> <span>Messages</span>
          </div>
          <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-rose-500 text-white">2</span>
        </a>
        <a href="/dashboard.php?tab=favorites" class="flex items-center justify-between px-4 py-3 rounded-2xl transition <?= $tab === 'favorites' ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-700 hover:bg-slate-50' ?>">
          <div class="flex items-center gap-3">
            <span>❤️</span> <span>Favorites</span>
          </div>
        </a>
        <a href="/dashboard.php?tab=notifications" class="flex items-center justify-between px-4 py-3 rounded-2xl transition <?= $tab === 'notifications' ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-700 hover:bg-slate-50' ?>">
          <div class="flex items-center gap-3">
            <span>🔔</span> <span>Notifications</span>
          </div>
        </a>
        <a href="/dashboard.php?tab=settings" class="flex items-center justify-between px-4 py-3 rounded-2xl transition <?= $tab === 'settings' ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-700 hover:bg-slate-50' ?>">
          <div class="flex items-center gap-3">
            <span>⚙️</span> <span>Settings & Security</span>
          </div>
        </a>
      </div>

    </aside>

    <!-- Main Dashboard Content -->
    <div class="lg:col-span-9 space-y-6">
      
      <!-- KPI Metric Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm flex items-center gap-4">
          <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl font-black">
            📱
          </div>
          <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Active Listings</span>
            <h3 class="text-2xl font-black text-slate-900 mt-0.5">3 Items</h3>
          </div>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm flex items-center gap-4">
          <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl font-black">
            🤝
          </div>
          <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Pending Barters</span>
            <h3 class="text-2xl font-black text-slate-900 mt-0.5">2 Offers</h3>
          </div>
        </div>

        <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm flex items-center gap-4">
          <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl font-black">
            ✓
          </div>
          <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Completed Deals</span>
            <h3 class="text-2xl font-black text-slate-900 mt-0.5">9 Trades</h3>
          </div>
        </div>
      </div>

      <!-- Active Listings Panel -->
      <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm">
        <div class="flex items-center justify-between pb-6 border-b border-slate-100">
          <div>
            <h2 class="text-lg font-black text-slate-900 tracking-tight">My Active Listings</h2>
            <p class="text-xs text-slate-500 mt-0.5">Items currently available for trade or barter negotiation</p>
          </div>
          <a href="/post-item.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-md shadow-blue-500/20 transition">
            + Post New Item
          </a>
        </div>

        <div class="divide-y divide-slate-100 mt-4">
          
          <!-- Item 1 -->
          <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
              <img src="https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=200&q=80" class="w-16 h-16 rounded-2xl object-cover">
              <div>
                <h4 class="font-bold text-sm text-slate-900"><a href="/listing.php?id=1" class="hover:text-blue-600">iPhone 13 (128GB)</a></h4>
                <div class="flex items-center gap-2 mt-1">
                  <span class="font-black text-xs text-slate-900">₹25,000</span>
                  <span class="text-[10px] text-slate-400">• Mobile & Tablets • Delhi</span>
                </div>
                <div class="mt-1 flex items-center gap-2">
                  <span class="text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full">Active</span>
                  <span class="text-[10px] text-blue-600 font-semibold">Wants: Bike / TV</span>
                </div>
              </div>
            </div>

            <div class="flex items-center gap-2">
              <a href="/offers.php" class="px-3 py-1.5 bg-blue-50 text-blue-700 hover:bg-blue-100 rounded-lg text-xs font-bold transition">
                Offers (2)
              </a>
              <button onclick="editListingMock(1)" class="px-3 py-1.5 border border-slate-200 text-slate-700 hover:bg-slate-50 rounded-lg text-xs font-bold transition">
                Edit
              </button>
            </div>
          </div>

          <!-- Item 2 -->
          <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
              <img src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=200&q=80" class="w-16 h-16 rounded-2xl object-cover">
              <div>
                <h4 class="font-bold text-sm text-slate-900">Apple iPad 9th Gen</h4>
                <div class="flex items-center gap-2 mt-1">
                  <span class="font-black text-xs text-slate-900">₹18,000</span>
                  <span class="text-[10px] text-slate-400">• Tablets • Like New</span>
                </div>
                <div class="mt-1 flex items-center gap-2">
                  <span class="text-[10px] font-bold text-blue-700 bg-blue-100 px-2 py-0.5 rounded-full">In Multi-Offer</span>
                  <span class="text-[10px] text-slate-500 font-semibold">Reserved for Proposal #84920</span>
                </div>
              </div>
            </div>

            <div class="flex items-center gap-2">
              <a href="/offers.php" class="px-3 py-1.5 bg-slate-100 text-slate-700 hover:bg-slate-200 rounded-lg text-xs font-bold transition">
                View Trade
              </a>
            </div>
          </div>

          <!-- Item 3 -->
          <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
              <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=200&q=80" class="w-16 h-16 rounded-2xl object-cover">
              <div>
                <h4 class="font-bold text-sm text-slate-900">Sony WH-1000XM4 Headphones</h4>
                <div class="flex items-center gap-2 mt-1">
                  <span class="font-black text-xs text-slate-900">₹7,000</span>
                  <span class="text-[10px] text-slate-400">• Audio & Electronics • Black</span>
                </div>
                <div class="mt-1 flex items-center gap-2">
                  <span class="text-[10px] font-bold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full">Active</span>
                  <span class="text-[10px] text-blue-600 font-semibold">Wants: Gaming / Watch</span>
                </div>
              </div>
            </div>

            <div class="flex items-center gap-2">
              <button onclick="editListingMock(3)" class="px-3 py-1.5 border border-slate-200 text-slate-700 hover:bg-slate-50 rounded-lg text-xs font-bold transition">
                Edit
              </button>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
</main>

<script>
function editListingMock(id) {
  Swal.fire({
    title: 'Edit Listing',
    text: 'Modify item title, valuation, condition, or photos.',
    icon: 'info',
    confirmButtonText: 'Go to Edit Form',
    confirmButtonColor: '#2563eb',
    customClass: { popup: 'rounded-3xl' }
  }).then(() => {
    window.location.href = '/post-item.php?edit=' + id;
  });
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
