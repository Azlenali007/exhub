<?php
$activePage = 'home';
require_once __DIR__ . '/includes/header.php';
?>

<main class="flex-grow pb-24 md:pb-16">
  
  <!-- Hero Section (Matches Reference Screenshot perfectly) -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-8">
    <div class="relative bg-gradient-to-r from-slate-900 via-[#0f172a] to-blue-950 rounded-3xl overflow-hidden shadow-2xl p-6 sm:p-10 lg:p-12 text-white border border-slate-800">
      
      <!-- Decorative background blur -->
      <div class="absolute -right-20 -top-20 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
      
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
        
        <!-- Left Hero Content -->
        <div class="lg:col-span-7 space-y-6">
          <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/20 text-blue-300 text-xs font-semibold">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            India's #1 Barter & Smart Exchange Platform
          </div>

          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight text-white">
            Apna Samaan Do,<br>
            Pasand Ka Samaan <span class="text-emerald-400">Lo!</span>
          </h1>

          <p class="text-slate-300 text-sm sm:text-base leading-relaxed max-w-xl">
            ExchangeHub par aap apne purane saman ko exchange karke apni pasand ki cheezein le sakte hain. Simple. Safe. Smart.
          </p>

          <!-- Interactive Matchmaker Search Box (Directly from reference) -->
          <div class="bg-white/95 backdrop-blur-md p-3 sm:p-4 rounded-2xl shadow-xl border border-white/20 text-slate-800">
            <form id="heroMatchForm" onsubmit="handleHeroMatch(event)" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
              
              <!-- Mere paas kya hai? -->
              <div class="sm:col-span-5 bg-slate-50 hover:bg-slate-100 p-2.5 rounded-xl border border-slate-200 transition">
                <label class="block text-[10px] font-bold uppercase text-slate-400 tracking-wider">Mere paas kya hai?</label>
                <div class="flex items-center gap-2 mt-0.5">
                  <span class="text-slate-400">📦</span>
                  <select id="haveCategory" class="w-full text-xs font-semibold text-slate-800 bg-transparent outline-none cursor-pointer">
                    <option value="Mobiles & Tablets">Mobiles & Tablets</option>
                    <option value="Bikes & Scooters">Bikes & Scooters</option>
                    <option value="Laptops & Computers">Laptops & Computers</option>
                    <option value="TV & Home Appliances">TV & Home Appliances</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Gaming">Gaming</option>
                    <option value="Fashion & Lifestyle">Fashion & Lifestyle</option>
                  </select>
                </div>
              </div>

              <!-- Mujhe kya chahiye? -->
              <div class="sm:col-span-5 bg-slate-50 hover:bg-slate-100 p-2.5 rounded-xl border border-slate-200 transition">
                <label class="block text-[10px] font-bold uppercase text-slate-400 tracking-wider">Mujhe kya chahiye?</label>
                <div class="flex items-center gap-2 mt-0.5">
                  <span class="text-slate-400">🎯</span>
                  <select id="wantCategory" class="w-full text-xs font-semibold text-slate-800 bg-transparent outline-none cursor-pointer">
                    <option value="Bikes & Scooters">Bikes & Scooters</option>
                    <option value="Mobiles & Tablets">Mobiles & Tablets</option>
                    <option value="Laptops & Computers">Laptops & Computers</option>
                    <option value="TV & Home Appliances">TV & Home Appliances</option>
                    <option value="Gaming">Gaming Consoles</option>
                    <option value="Furniture">Furniture</option>
                  </select>
                </div>
              </div>

              <!-- Find Matches Button -->
              <div class="sm:col-span-2">
                <button type="submit" class="w-full h-full min-h-[46px] bg-blue-600 hover:bg-blue-700 active:scale-95 text-white font-bold text-xs rounded-xl shadow-md shadow-blue-600/30 flex items-center justify-center transition">
                  Find Matches
                </button>
              </div>

            </form>
          </div>

        </div>

        <!-- Right Hero Visual Banner (Matching Reference Screenshot: Phone + Motorcycle + 'Exchange Not Just Sell') -->
        <div class="lg:col-span-5 relative flex justify-center">
          <div class="relative w-full max-w-md bg-gradient-to-br from-slate-800/80 to-slate-900/90 p-4 rounded-3xl border border-slate-700/60 shadow-2xl backdrop-blur-sm">
            
            <div class="absolute -top-3 right-6 bg-gradient-to-r from-amber-400 to-amber-500 text-slate-950 font-black text-[11px] px-3.5 py-1 rounded-full shadow-lg uppercase tracking-wider flex items-center gap-1.5">
              <span>⚡</span> Exchange Not Just Sell
            </div>

            <div class="grid grid-cols-2 gap-3 items-center pt-2">
              <div class="rounded-2xl overflow-hidden border border-slate-700 relative group aspect-square">
                <img src="https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=400&q=80" alt="iPhone 13" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute bottom-2 left-2 right-2 bg-slate-900/85 backdrop-blur-sm text-[10px] font-bold px-2 py-1 rounded-md text-white">
                  iPhone 13 (₹25k)
                </div>
              </div>
              <div class="rounded-2xl overflow-hidden border border-slate-700 relative group aspect-square">
                <img src="https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=400&q=80" alt="Hero Splendor Plus" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute bottom-2 left-2 right-2 bg-slate-900/85 backdrop-blur-sm text-[10px] font-bold px-2 py-1 rounded-md text-white">
                  Bike / Splendor (₹45k)
                </div>
              </div>
            </div>

            <!-- Trade exchange arrow badge -->
            <div class="mt-3 bg-blue-600/20 border border-blue-500/40 rounded-xl p-2.5 flex items-center justify-between text-xs">
              <div class="flex items-center gap-2">
                <span class="text-blue-400 font-bold">⇄ Barter Swap</span>
                <span class="text-slate-300 text-[11px]">Phone + ₹20k difference for Bike</span>
              </div>
              <span class="text-emerald-400 font-bold text-[11px]">Direct Deal</span>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Category Icons Row (Matches Reference Screenshot perfectly) -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
    <div class="grid grid-cols-4 sm:grid-cols-4 md:grid-cols-8 gap-3 sm:gap-4 text-center">
      
      <!-- Mobiles & Tablets -->
      <a href="/browse.php?category=Mobiles%20%26%20Tablets" class="group flex flex-col items-center p-3 rounded-2xl bg-white hover:bg-blue-50/70 border border-slate-100 hover:border-blue-200 transition shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl group-hover:scale-110 transition shadow-sm">
          📱
        </div>
        <span class="mt-2 text-xs font-semibold text-slate-700 group-hover:text-blue-600 line-clamp-1">Mobiles & Tablets</span>
      </a>

      <!-- Bikes & Scooters -->
      <a href="/browse.php?category=Bikes%20%26%20Scooters" class="group flex flex-col items-center p-3 rounded-2xl bg-white hover:bg-rose-50/70 border border-slate-100 hover:border-rose-200 transition shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center text-xl group-hover:scale-110 transition shadow-sm">
          🏍️
        </div>
        <span class="mt-2 text-xs font-semibold text-slate-700 group-hover:text-rose-600 line-clamp-1">Bikes & Scooters</span>
      </a>

      <!-- Laptops & Computers -->
      <a href="/browse.php?category=Laptops%20%26%20Computers" class="group flex flex-col items-center p-3 rounded-2xl bg-white hover:bg-indigo-50/70 border border-slate-100 hover:border-indigo-200 transition shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl group-hover:scale-110 transition shadow-sm">
          💻
        </div>
        <span class="mt-2 text-xs font-semibold text-slate-700 group-hover:text-indigo-600 line-clamp-1">Laptops & PC</span>
      </a>

      <!-- TV & Home Appliances -->
      <a href="/browse.php?category=TV%20%26%20Home%20Appliances" class="group flex flex-col items-center p-3 rounded-2xl bg-white hover:bg-teal-50/70 border border-slate-100 hover:border-teal-200 transition shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl group-hover:scale-110 transition shadow-sm">
          📺
        </div>
        <span class="mt-2 text-xs font-semibold text-slate-700 group-hover:text-teal-600 line-clamp-1">TV & Appliances</span>
      </a>

      <!-- Furniture -->
      <a href="/browse.php?category=Furniture" class="group flex flex-col items-center p-3 rounded-2xl bg-white hover:bg-amber-50/70 border border-slate-100 hover:border-amber-200 transition shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl group-hover:scale-110 transition shadow-sm">
          🛋️
        </div>
        <span class="mt-2 text-xs font-semibold text-slate-700 group-hover:text-amber-600 line-clamp-1">Furniture</span>
      </a>

      <!-- Gaming -->
      <a href="/browse.php?category=Gaming" class="group flex flex-col items-center p-3 rounded-2xl bg-white hover:bg-purple-50/70 border border-slate-100 hover:border-purple-200 transition shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl group-hover:scale-110 transition shadow-sm">
          🎮
        </div>
        <span class="mt-2 text-xs font-semibold text-slate-700 group-hover:text-purple-600 line-clamp-1">Gaming</span>
      </a>

      <!-- Fashion & Lifestyle -->
      <a href="/browse.php?category=Fashion%20%26%20Lifestyle" class="group flex flex-col items-center p-3 rounded-2xl bg-white hover:bg-pink-50/70 border border-slate-100 hover:border-pink-200 transition shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-pink-50 text-pink-600 flex items-center justify-center text-xl group-hover:scale-110 transition shadow-sm">
          👕
        </div>
        <span class="mt-2 text-xs font-semibold text-slate-700 group-hover:text-pink-600 line-clamp-1">Fashion</span>
      </a>

      <!-- More -->
      <a href="/browse.php" class="group flex flex-col items-center p-3 rounded-2xl bg-white hover:bg-slate-100 border border-slate-100 hover:border-slate-300 transition shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-600 flex items-center justify-center text-xl group-hover:scale-110 transition shadow-sm">
          ➕
        </div>
        <span class="mt-2 text-xs font-semibold text-slate-700 group-hover:text-slate-900 line-clamp-1">More</span>
      </a>

    </div>
  </section>

  <!-- 4 Feature Value Proposition Cards (Matches Reference Screenshot row) -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
      
      <!-- Smart Matching -->
      <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-start gap-3.5 hover:shadow-md transition">
        <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-xl flex-shrink-0">
          🔄
        </div>
        <div>
          <h3 class="text-xs font-bold text-slate-900">Smart Matching</h3>
          <p class="text-[11px] text-slate-500 mt-0.5 leading-snug">Get relevant exchange offers based on your item and needs.</p>
        </div>
      </div>

      <!-- Safe & Secure -->
      <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-start gap-3.5 hover:shadow-md transition">
        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl flex-shrink-0">
          🛡️
        </div>
        <div>
          <h3 class="text-xs font-bold text-slate-900">Safe & Secure</h3>
          <p class="text-[11px] text-slate-500 mt-0.5 leading-snug">Verified users, secure chat and fraud protection.</p>
        </div>
      </div>

      <!-- Flexible Options -->
      <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-start gap-3.5 hover:shadow-md transition">
        <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl flex-shrink-0">
          🔗
        </div>
        <div>
          <h3 class="text-xs font-bold text-slate-900">Flexible Options</h3>
          <p class="text-[11px] text-slate-500 mt-0.5 leading-snug">Direct exchange or exchange + cash difference.</p>
        </div>
      </div>

      <!-- Nationwide -->
      <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-start gap-3.5 hover:shadow-md transition">
        <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-xl flex-shrink-0">
          🇮🇳
        </div>
        <div>
          <h3 class="text-xs font-bold text-slate-900">Nationwide</h3>
          <p class="text-[11px] text-slate-500 mt-0.5 leading-snug">Connect with users across India with local meetup advice.</p>
        </div>
      </div>

    </div>
  </section>

  <!-- Trending Exchange Listings Section (Matches Reference Screenshot cards) -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="flex items-center justify-between mb-6">
      <div>
        <h2 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">Trending Exchange Listings</h2>
        <p class="text-xs text-slate-500 mt-0.5">Explore popular items ready to be exchanged right now</p>
      </div>
      <a href="/browse.php" class="text-xs sm:text-sm font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1">
        <span>View All</span>
        <span>&rarr;</span>
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5" id="listingsGrid">
      
      <!-- Card 1: iPhone 13 (128GB) -->
      <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col hover:shadow-lg transition duration-300 group">
        <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
          <img src="https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=800&q=80" alt="iPhone 13" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
          <div class="absolute top-3 left-3 bg-emerald-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow flex items-center gap-1">
            <span>🔄</span> Wants Bike
          </div>
          <button onclick="toggleFavorite(1)" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/80 backdrop-blur-sm text-slate-500 hover:text-rose-500 flex items-center justify-center shadow-sm transition">
            ♥
          </button>
        </div>
        <div class="p-4 flex-1 flex flex-col justify-between">
          <div>
            <h3 class="font-bold text-slate-900 text-sm group-hover:text-blue-600 transition">
              <a href="/listing.php?id=1">iPhone 13 (128GB)</a>
            </h3>
            <div class="mt-1 flex items-baseline gap-1">
              <span class="text-base font-extrabold text-slate-900">₹25,000</span>
              <span class="text-[10px] text-slate-400 font-medium">(Estimated Value)</span>
            </div>
            <div class="mt-2 flex items-center text-[11px] text-slate-500">
              <svg class="w-3.5 h-3.5 text-slate-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              <span>Delhi, 5 km away</span>
            </div>
          </div>
          <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
            <span class="text-[11px] font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md">Wants Bike</span>
            <button onclick="openOfferModal(1, 'iPhone 13 (128GB)', 25000, 1)" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-3.5 py-1.5 rounded-lg transition shadow-sm">
              Exchange
            </button>
          </div>
        </div>
      </div>

      <!-- Card 2: Hero Splendor Plus -->
      <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col hover:shadow-lg transition duration-300 group">
        <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
          <img src="https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=800&q=80" alt="Hero Splendor Plus" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
          <div class="absolute top-3 left-3 bg-purple-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow flex items-center gap-1">
            <span>🔄</span> Wants TV
          </div>
          <button onclick="toggleFavorite(2)" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/80 backdrop-blur-sm text-slate-500 hover:text-rose-500 flex items-center justify-center shadow-sm transition">
            ♥
          </button>
        </div>
        <div class="p-4 flex-1 flex flex-col justify-between">
          <div>
            <h3 class="font-bold text-slate-900 text-sm group-hover:text-blue-600 transition">
              <a href="/listing.php?id=2">Hero Splendor Plus</a>
            </h3>
            <div class="mt-1 flex items-baseline gap-1">
              <span class="text-base font-extrabold text-slate-900">₹45,000</span>
              <span class="text-[10px] text-slate-400 font-medium">(Estimated Value)</span>
            </div>
            <div class="mt-2 flex items-center text-[11px] text-slate-500">
              <svg class="w-3.5 h-3.5 text-slate-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              <span>Lucknow, Central</span>
            </div>
          </div>
          <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
            <span class="text-[11px] font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md">Wants TV</span>
            <button onclick="openOfferModal(2, 'Hero Splendor Plus', 45000, 2)" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-3.5 py-1.5 rounded-lg transition shadow-sm">
              Exchange
            </button>
          </div>
        </div>
      </div>

      <!-- Card 3: Samsung 4K Smart TV -->
      <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col hover:shadow-lg transition duration-300 group">
        <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
          <img src="https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?auto=format&fit=crop&w=800&q=80" alt="Samsung 4K Smart TV" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
          <div class="absolute top-3 left-3 bg-emerald-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow flex items-center gap-1">
            <span>🔄</span> Wants Laptop
          </div>
          <button onclick="toggleFavorite(3)" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/80 backdrop-blur-sm text-slate-500 hover:text-rose-500 flex items-center justify-center shadow-sm transition">
            ♥
          </button>
        </div>
        <div class="p-4 flex-1 flex flex-col justify-between">
          <div>
            <h3 class="font-bold text-slate-900 text-sm group-hover:text-blue-600 transition">
              <a href="/listing.php?id=3">Samsung 4K Smart TV</a>
            </h3>
            <div class="mt-1 flex items-baseline gap-1">
              <span class="text-base font-extrabold text-slate-900">₹32,000</span>
              <span class="text-[10px] text-slate-400 font-medium">(Estimated Value)</span>
            </div>
            <div class="mt-2 flex items-center text-[11px] text-slate-500">
              <svg class="w-3.5 h-3.5 text-slate-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              <span>Bengaluru, Koramangala</span>
            </div>
          </div>
          <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
            <span class="text-[11px] font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md">Wants Laptop</span>
            <button onclick="openOfferModal(3, 'Samsung 4K Smart TV', 32000, 3)" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-3.5 py-1.5 rounded-lg transition shadow-sm">
              Exchange
            </button>
          </div>
        </div>
      </div>

      <!-- Card 4: Dell Inspiron i5 -->
      <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col hover:shadow-lg transition duration-300 group">
        <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
          <img src="https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=800&q=80" alt="Dell Inspiron i5" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
          <div class="absolute top-3 left-3 bg-purple-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow flex items-center gap-1">
            <span>🔄</span> Wants Mobile
          </div>
          <button onclick="toggleFavorite(4)" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/80 backdrop-blur-sm text-slate-500 hover:text-rose-500 flex items-center justify-center shadow-sm transition">
            ♥
          </button>
        </div>
        <div class="p-4 flex-1 flex flex-col justify-between">
          <div>
            <h3 class="font-bold text-slate-900 text-sm group-hover:text-blue-600 transition">
              <a href="/listing.php?id=4">Dell Inspiron i5</a>
            </h3>
            <div class="mt-1 flex items-baseline gap-1">
              <span class="text-base font-extrabold text-slate-900">₹28,000</span>
              <span class="text-[10px] text-slate-400 font-medium">(Estimated Value)</span>
            </div>
            <div class="mt-2 flex items-center text-[11px] text-slate-500">
              <svg class="w-3.5 h-3.5 text-slate-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              <span>Pune, Shivajinagar</span>
            </div>
          </div>
          <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
            <span class="text-[11px] font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md">Wants Mobile</span>
            <button onclick="openOfferModal(4, 'Dell Inspiron i5', 28000, 4)" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-3.5 py-1.5 rounded-lg transition shadow-sm">
              Exchange
            </button>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Multi-Item Barter Showcase Section -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" id="how-it-works">
    <div class="bg-gradient-to-r from-blue-900 to-indigo-900 text-white rounded-3xl p-8 sm:p-10 shadow-xl border border-blue-800">
      <div class="max-w-3xl">
        <span class="text-xs font-bold uppercase tracking-wider text-blue-300">Mandatory Core Engine</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold mt-1 tracking-tight">How Multi-Item Barter Exchange Works</h2>
        <p class="text-sm text-blue-100 mt-2 leading-relaxed">
          Need to balance valuations? You don't have to do a 1-to-1 swap. Combine multiple items you own and negotiate an optional cash adjustment with full counter-offers!
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
        <div class="bg-white/10 backdrop-blur-md p-5 rounded-2xl border border-white/10">
          <div class="w-8 h-8 rounded-lg bg-blue-500 text-white font-black flex items-center justify-center text-sm mb-3">1</div>
          <h4 class="font-bold text-sm">Select Multiple Items</h4>
          <p class="text-xs text-blue-200 mt-1 leading-relaxed">
            Pick 1, 2, or 3 products from your active listings (e.g. Mobile + Laptop + Console) to offer for another user's item.
          </p>
        </div>

        <div class="bg-white/10 backdrop-blur-md p-5 rounded-2xl border border-white/10">
          <div class="w-8 h-8 rounded-lg bg-emerald-500 text-white font-black flex items-center justify-center text-sm mb-3">2</div>
          <h4 class="font-bold text-sm">Adjust Cash Difference</h4>
          <p class="text-xs text-blue-200 mt-1 leading-relaxed">
            Add or request cash (e.g. + ₹5,000) to bridge value differences fairly between both trading parties.
          </p>
        </div>

        <div class="bg-white/10 backdrop-blur-md p-5 rounded-2xl border border-white/10">
          <div class="w-8 h-8 rounded-lg bg-amber-500 text-white font-black flex items-center justify-center text-sm mb-3">3</div>
          <h4 class="font-bold text-sm">Negotiate & Mutual Confirm</h4>
          <p class="text-xs text-blue-200 mt-1 leading-relaxed">
            Submit counter-offers, chat privately, reserve listings safely, and confirm deal completion when handed over.
          </p>
        </div>
      </div>
    </div>
  </section>

</main>

<!-- Multi-Item Barter Offer Modal (Interactive Barter Engine) -->
<div id="multiItemOfferModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
  <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-slate-100 p-6 sm:p-8">
    <div class="flex items-center justify-between pb-4 border-b border-slate-100">
      <div>
        <span class="text-[11px] font-bold uppercase tracking-wider text-blue-600">Multi-Item Exchange Proposal</span>
        <h3 class="text-lg font-bold text-slate-900 mt-0.5" id="modalTargetTitle">Make Barter Offer for Listing</h3>
      </div>
      <button onclick="closeOfferModal()" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 flex items-center justify-center">✕</button>
    </div>

    <form id="offerProposalForm" onsubmit="submitMultiOffer(event)" class="mt-6 space-y-6">
      <input type="hidden" id="modalTargetListingId">
      <input type="hidden" id="modalTargetUserId">

      <!-- Target Requested Item Summary -->
      <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200">
        <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Item You Are Requesting (Their Side)</label>
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-3">
            <span class="text-2xl">🎯</span>
            <div>
              <p class="font-bold text-sm text-slate-900" id="modalRequestedItemName">Item Name</p>
              <p class="text-xs text-slate-500">Estimated value</p>
            </div>
          </div>
          <span class="font-black text-sm text-slate-900" id="modalRequestedItemVal">₹0</span>
        </div>
      </div>

      <!-- Select Multiple Owned Items to Offer -->
      <div>
        <div class="flex items-center justify-between mb-2">
          <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Select Items You Own To Offer (Your Side)</label>
          <span class="text-[11px] text-blue-600 font-semibold">Multi-item allowed</span>
        </div>

        <div class="space-y-2.5">
          <!-- Item A -->
          <label class="flex items-center justify-between p-3.5 rounded-xl border border-slate-200 hover:border-blue-500 bg-white cursor-pointer transition">
            <div class="flex items-center gap-3">
              <input type="checkbox" name="my_items" value="1" data-val="25000" data-name="iPhone 13 (128GB)" checked onchange="recalculateOfferTotals()" class="w-4 h-4 text-blue-600 rounded">
              <div>
                <p class="text-xs font-bold text-slate-800">iPhone 13 (128GB)</p>
                <p class="text-[11px] text-slate-400">Mobile & Tablets • Good Condition</p>
              </div>
            </div>
            <span class="text-xs font-black text-slate-900">₹25,000</span>
          </label>

          <!-- Item B -->
          <label class="flex items-center justify-between p-3.5 rounded-xl border border-slate-200 hover:border-blue-500 bg-white cursor-pointer transition">
            <div class="flex items-center gap-3">
              <input type="checkbox" name="my_items" value="5" data-val="18000" data-name="Apple iPad 9th Gen" onchange="recalculateOfferTotals()" class="w-4 h-4 text-blue-600 rounded">
              <div>
                <p class="text-xs font-bold text-slate-800">Apple iPad 9th Gen (64GB Wi-Fi)</p>
                <p class="text-[11px] text-slate-400">Tablet • Excellent Condition</p>
              </div>
            </div>
            <span class="text-xs font-black text-slate-900">₹18,000</span>
          </label>

          <!-- Item C -->
          <label class="flex items-center justify-between p-3.5 rounded-xl border border-slate-200 hover:border-blue-500 bg-white cursor-pointer transition">
            <div class="flex items-center gap-3">
              <input type="checkbox" name="my_items" value="6" data-val="7000" data-name="Sony WH-1000XM4 Headset" onchange="recalculateOfferTotals()" class="w-4 h-4 text-blue-600 rounded">
              <div>
                <p class="text-xs font-bold text-slate-800">Sony WH-1000XM4 Noise Canceling Headphones</p>
                <p class="text-[11px] text-slate-400">Audio • Like New</p>
              </div>
            </div>
            <span class="text-xs font-black text-slate-900">₹7,000</span>
          </label>
        </div>
      </div>

      <!-- Cash Difference Adjustment -->
      <div class="bg-blue-50/70 p-4 rounded-2xl border border-blue-200">
        <label class="block text-xs font-bold text-blue-900 mb-1">Cash Difference Adjustment (Optional)</label>
        <p class="text-[11px] text-blue-700 mb-3">Add or request money to balance the trade value fairly.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label class="block text-[10px] font-bold uppercase text-blue-800 mb-1">Who pays cash difference?</label>
            <select id="modalCashPayer" onchange="recalculateOfferTotals()" class="w-full text-xs font-semibold bg-white border border-blue-200 rounded-lg p-2.5 outline-none">
              <option value="sender">I will pay extra cash (+)</option>
              <option value="receiver">Receiver should pay extra cash (-)</option>
              <option value="none">Direct Barter (₹0 Cash)</option>
            </select>
          </div>
          <div>
            <label class="block text-[10px] font-bold uppercase text-blue-800 mb-1">Cash Amount (₹)</label>
            <input type="number" id="modalCashAmount" value="5000" min="0" step="500" oninput="recalculateOfferTotals()" class="w-full text-xs font-bold bg-white border border-blue-200 rounded-lg p-2.5 outline-none">
          </div>
        </div>

        <div class="mt-3 pt-3 border-t border-blue-200 flex items-center justify-between text-xs font-bold text-blue-900">
          <span>Net Effective Value On Your Side:</span>
          <span class="text-sm font-black text-blue-700" id="modalTotalCalculated">₹30,000</span>
        </div>
      </div>

      <!-- Message -->
      <div>
        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Proposal Note / Message</label>
        <textarea id="modalOfferMessage" rows="2" class="w-full text-xs p-3 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g. I have iPhone 13 + ₹5,000 cash ready for your motorcycle. Can handover this weekend!"></textarea>
      </div>

      <!-- Submit Proposal -->
      <div class="flex items-center justify-end gap-3 pt-2">
        <button type="button" onclick="closeOfferModal()" class="px-5 py-2.5 rounded-xl border border-slate-300 text-xs font-semibold text-slate-700 hover:bg-slate-100">Cancel</button>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-6 py-2.5 rounded-xl shadow-md shadow-blue-500/20 transition">
          Submit Multi-Item Offer &rarr;
        </button>
      </div>
    </form>
  </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
