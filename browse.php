<?php
$activePage = 'browse';
require_once __DIR__ . '/includes/header.php';

$query = htmlspecialchars($_GET['q'] ?? '');
$city = htmlspecialchars($_GET['city'] ?? 'All India');
$category = htmlspecialchars($_GET['category'] ?? '');
?>

<main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
  
  <!-- Browse Header & Search Filters -->
  <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm mb-8 space-y-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
      <div>
        <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Browse Exchange Listings</h1>
        <p class="text-xs text-slate-500 mt-1">Discover items available for direct or multi-item barter trade across India.</p>
      </div>

      <div class="flex items-center gap-3">
        <span class="text-xs font-semibold text-slate-500">Sort by:</span>
        <select class="text-xs font-bold bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 outline-none text-slate-800">
          <option>Trending First</option>
          <option>Estimated Value: Low to High</option>
          <option>Estimated Value: High to Low</option>
          <option>Recently Added</option>
        </select>
      </div>
    </div>

    <!-- Filter Bar -->
    <form method="GET" action="/browse.php" class="grid grid-cols-1 sm:grid-cols-4 gap-3 pt-2">
      <div>
        <label class="block text-[10px] font-bold uppercase text-slate-400 mb-1">Search Keywords</label>
        <input type="text" name="q" value="<?= $query ?>" placeholder="e.g. iPhone, Splendor, TV" class="w-full text-xs p-3 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label class="block text-[10px] font-bold uppercase text-slate-400 mb-1">Category</label>
        <select name="category" class="w-full text-xs p-3 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-medium">
          <option value="">All Categories</option>
          <option value="Mobiles & Tablets" <?= $category === 'Mobiles & Tablets' ? 'selected' : '' ?>>Mobiles & Tablets</option>
          <option value="Bikes & Scooters" <?= $category === 'Bikes & Scooters' ? 'selected' : '' ?>>Bikes & Scooters</option>
          <option value="Laptops & Computers" <?= $category === 'Laptops & Computers' ? 'selected' : '' ?>>Laptops & Computers</option>
          <option value="TV & Home Appliances" <?= $category === 'TV & Home Appliances' ? 'selected' : '' ?>>TV & Home Appliances</option>
          <option value="Furniture" <?= $category === 'Furniture' ? 'selected' : '' ?>>Furniture</option>
          <option value="Gaming" <?= $category === 'Gaming' ? 'selected' : '' ?>>Gaming</option>
          <option value="Fashion & Lifestyle" <?= $category === 'Fashion & Lifestyle' ? 'selected' : '' ?>>Fashion & Lifestyle</option>
        </select>
      </div>
      <div>
        <label class="block text-[10px] font-bold uppercase text-slate-400 mb-1">City / Region</label>
        <select name="city" class="w-full text-xs p-3 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-medium">
          <option value="All India" <?= $city === 'All India' ? 'selected' : '' ?>>All India</option>
          <option value="Delhi" <?= $city === 'Delhi' ? 'selected' : '' ?>>Delhi</option>
          <option value="Mumbai" <?= $city === 'Mumbai' ? 'selected' : '' ?>>Mumbai</option>
          <option value="Bengaluru" <?= $city === 'Bengaluru' ? 'selected' : '' ?>>Bengaluru</option>
          <option value="Pune" <?= $city === 'Pune' ? 'selected' : '' ?>>Pune</option>
          <option value="Lucknow" <?= $city === 'Lucknow' ? 'selected' : '' ?>>Lucknow</option>
        </select>
      </div>
      <div class="flex items-end">
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs py-3 rounded-xl shadow-md shadow-blue-500/20 transition">
          Apply Filters
        </button>
      </div>
    </form>
  </div>

  <!-- Listings Grid -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    
    <!-- Listing 1 -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col hover:shadow-lg transition">
      <div class="relative aspect-[4/3] bg-slate-100">
        <img src="https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover">
        <span class="absolute top-3 left-3 bg-emerald-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow">
          Wants Bike
        </span>
      </div>
      <div class="p-4 flex-1 flex flex-col justify-between">
        <div>
          <h3 class="font-bold text-sm text-slate-900"><a href="/listing.php?id=1">iPhone 13 (128GB)</a></h3>
          <p class="text-base font-extrabold text-slate-900 mt-1">₹25,000 <span class="text-[10px] text-slate-400 font-normal">(Est. Value)</span></p>
          <p class="text-xs text-slate-500 mt-1">Delhi, 5 km away</p>
        </div>
        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
          <span class="text-xs font-semibold text-slate-600">Wants Bike/TV</span>
          <button onclick="openOfferModal(1, 'iPhone 13 (128GB)', 25000, 1)" class="bg-blue-600 text-white font-bold text-xs px-3.5 py-1.5 rounded-lg shadow-sm">
            Exchange
          </button>
        </div>
      </div>
    </div>

    <!-- Listing 2 -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col hover:shadow-lg transition">
      <div class="relative aspect-[4/3] bg-slate-100">
        <img src="https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover">
        <span class="absolute top-3 left-3 bg-purple-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow">
          Wants TV
        </span>
      </div>
      <div class="p-4 flex-1 flex flex-col justify-between">
        <div>
          <h3 class="font-bold text-sm text-slate-900"><a href="/listing.php?id=2">Hero Splendor Plus</a></h3>
          <p class="text-base font-extrabold text-slate-900 mt-1">₹45,000 <span class="text-[10px] text-slate-400 font-normal">(Est. Value)</span></p>
          <p class="text-xs text-slate-500 mt-1">Lucknow, Central</p>
        </div>
        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
          <span class="text-xs font-semibold text-slate-600">Wants TV/Laptop</span>
          <button onclick="openOfferModal(2, 'Hero Splendor Plus', 45000, 2)" class="bg-blue-600 text-white font-bold text-xs px-3.5 py-1.5 rounded-lg shadow-sm">
            Exchange
          </button>
        </div>
      </div>
    </div>

    <!-- Listing 3 -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col hover:shadow-lg transition">
      <div class="relative aspect-[4/3] bg-slate-100">
        <img src="https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover">
        <span class="absolute top-3 left-3 bg-emerald-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow">
          Wants Laptop
        </span>
      </div>
      <div class="p-4 flex-1 flex flex-col justify-between">
        <div>
          <h3 class="font-bold text-sm text-slate-900"><a href="/listing.php?id=3">Samsung 4K Smart TV</a></h3>
          <p class="text-base font-extrabold text-slate-900 mt-1">₹32,000 <span class="text-[10px] text-slate-400 font-normal">(Est. Value)</span></p>
          <p class="text-xs text-slate-500 mt-1">Bengaluru, Koramangala</p>
        </div>
        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
          <span class="text-xs font-semibold text-slate-600">Wants Laptop/Mobile</span>
          <button onclick="openOfferModal(3, 'Samsung 4K Smart TV', 32000, 3)" class="bg-blue-600 text-white font-bold text-xs px-3.5 py-1.5 rounded-lg shadow-sm">
            Exchange
          </button>
        </div>
      </div>
    </div>

    <!-- Listing 4 -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden flex flex-col hover:shadow-lg transition">
      <div class="relative aspect-[4/3] bg-slate-100">
        <img src="https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover">
        <span class="absolute top-3 left-3 bg-purple-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow">
          Wants Mobile
        </span>
      </div>
      <div class="p-4 flex-1 flex flex-col justify-between">
        <div>
          <h3 class="font-bold text-sm text-slate-900"><a href="/listing.php?id=4">Dell Inspiron i5</a></h3>
          <p class="text-base font-extrabold text-slate-900 mt-1">₹28,000 <span class="text-[10px] text-slate-400 font-normal">(Est. Value)</span></p>
          <p class="text-xs text-slate-500 mt-1">Pune, Shivajinagar</p>
        </div>
        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
          <span class="text-xs font-semibold text-slate-600">Wants Mobile</span>
          <button onclick="openOfferModal(4, 'Dell Inspiron i5', 28000, 4)" class="bg-blue-600 text-white font-bold text-xs px-3.5 py-1.5 rounded-lg shadow-sm">
            Exchange
          </button>
        </div>
      </div>
    </div>

  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
