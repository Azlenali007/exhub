<?php
?>
<footer class="bg-slate-900 text-slate-400 mt-auto pt-16 pb-12 border-t border-slate-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
      <div>
        <div class="flex items-center gap-2 mb-4">
          <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center text-white">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M7 16V4m0 0L3 8m4-4l4 4m6 4v12m0 0l4-4m-4 4l-4-4" />
            </svg>
          </div>
          <span class="text-xl font-bold text-white tracking-tight">Exchange<span class="text-blue-500">Hub</span></span>
        </div>
        <p class="text-xs text-slate-400 leading-relaxed mb-4">
          India's leading smart barter and multi-item exchange marketplace. Apna samaan do, pasand ka samaan lo!
        </p>
        <div class="flex gap-3 text-slate-400 text-sm">
          <span class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-600 hover:text-white cursor-pointer transition">FB</span>
          <span class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-600 hover:text-white cursor-pointer transition">IG</span>
          <span class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-600 hover:text-white cursor-pointer transition">X</span>
        </div>
      </div>

      <div>
        <h4 class="text-white text-xs font-bold uppercase tracking-wider mb-4">Popular Categories</h4>
        <ul class="space-y-2.5 text-xs">
          <li><a href="/browse.php?cat=Mobiles" class="hover:text-white transition">Mobiles & Tablets</a></li>
          <li><a href="/browse.php?cat=Bikes" class="hover:text-white transition">Bikes & Scooters</a></li>
          <li><a href="/browse.php?cat=Laptops" class="hover:text-white transition">Laptops & Computers</a></li>
          <li><a href="/browse.php?cat=TV" class="hover:text-white transition">TV & Home Appliances</a></li>
          <li><a href="/browse.php?cat=Gaming" class="hover:text-white transition">Gaming Consoles</a></li>
        </ul>
      </div>

      <div>
        <h4 class="text-white text-xs font-bold uppercase tracking-wider mb-4">Multi-Item Exchange</h4>
        <ul class="space-y-2.5 text-xs">
          <li><a href="/offers.php" class="hover:text-white transition">How Multi-Item Barter Works</a></li>
          <li><a href="/post-item.php" class="hover:text-white transition">Post Your Item</a></li>
          <li><a href="/browse.php" class="hover:text-white transition">Explore Direct Trades</a></li>
          <li><a href="/dashboard.php" class="hover:text-white transition">My Barter Offers</a></li>
          <li><a href="/messages.php" class="hover:text-white transition">Private Negotiation Chat</a></li>
        </ul>
      </div>

      <div>
        <h4 class="text-white text-xs font-bold uppercase tracking-wider mb-4">Trust, Safety & Admin</h4>
        <ul class="space-y-2.5 text-xs">
          <li><a href="/index.php#safety" class="hover:text-white transition">Safe Trading Guidelines</a></li>
          <li><a href="/admin/index.php" class="hover:text-white transition">Admin Management Panel</a></li>
          <li><a href="/install/index.php" class="hover:text-white transition">Database Setup & Installer</a></li>
          <li><span class="inline-flex items-center gap-1.5 text-emerald-400 font-medium">● 100% Core PHP & MySQL</span></li>
        </ul>
      </div>
    </div>

    <div class="pt-8 border-t border-slate-800/80 flex flex-col md:flex-row items-center justify-between text-xs text-slate-500 gap-4">
      <p>© <?= date('Y') ?> ExchangeHub Technologies. All rights reserved. Zero-TypeScript Architecture.</p>
      <div class="flex gap-6">
        <a href="#" class="hover:text-slate-400">Terms of Service</a>
        <a href="#" class="hover:text-slate-400">Privacy Policy</a>
        <a href="#" class="hover:text-slate-400">Community Safety</a>
      </div>
    </div>
  </div>
</footer>

<!-- Mobile Bottom Navigation Bar (Matching Reference Screenshot bottom right) -->
<div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-slate-200 px-6 py-2.5 flex items-center justify-between z-40 shadow-lg">
  <a href="/index.php" class="flex flex-col items-center text-blue-600 gap-0.5">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
    <span class="text-[10px] font-semibold">Home</span>
  </a>
  <a href="/post-item.php" class="flex flex-col items-center text-slate-600 hover:text-blue-600 gap-0.5">
    <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center -mt-3 shadow-md">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
    </div>
    <span class="text-[10px] font-semibold">Post</span>
  </a>
  <a href="/messages.php" class="flex flex-col items-center text-slate-600 hover:text-blue-600 gap-0.5 relative">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
    <span class="absolute top-0 right-1 w-2 h-2 bg-rose-500 rounded-full"></span>
    <span class="text-[10px] font-semibold">Chat</span>
  </a>
  <a href="/dashboard.php" class="flex flex-col items-center text-slate-600 hover:text-blue-600 gap-0.5">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
    <span class="text-[10px] font-semibold">Profile</span>
  </a>
</div>

<script src="/assets/js/app.js"></script>
<script src="/assets/js/offers.js"></script>
<script>
  if (window.lucide) {
    lucide.createIcons();
  }
</script>
</body>
</html>
