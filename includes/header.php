<?php
require_once __DIR__ . '/auth.php';
$user = getCurrentUser();
$activePage = $activePage ?? 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ExchangeHub - Apna Samaan Do, Pasand Ka Samaan Lo!</title>
  <meta name="description" content="Exchange and barter marketplace to trade products, multi-item offers with cash adjustment, negotiation, and smart matching.">
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Alpine.js -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="/assets/css/style.css">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              50: '#eff6ff',
              100: '#dbeafe',
              500: '#3b82f6',
              600: '#2563eb',
              700: '#1d4ed8',
              800: '#1e40af',
              900: '#1e3a8a',
              950: '#0f172a'
            }
          }
        }
      }
    }
  </script>
</head>
<body class="bg-[#f8fafc] text-slate-800 font-sans antialiased min-h-screen flex flex-col">

<!-- Top Announcement/Notification Bar (Optional) -->
<header class="bg-white border-b border-slate-200 sticky top-0 z-40">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20 gap-4">
      
      <!-- Brand Logo -->
      <a href="/index.php" class="flex items-center gap-2.5 flex-shrink-0 group">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-500 flex items-center justify-center text-white shadow-md shadow-blue-500/20 group-hover:scale-105 transition-transform">
          <svg class="w-6 h-6 stroke-[2.2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16V4m0 0L3 8m4-4l4 4m6 4v12m0 0l4-4m-4 4l-4-4" />
          </svg>
        </div>
        <div class="leading-tight">
          <span class="text-2xl font-black tracking-tight text-slate-900 flex items-center">
            Exchange<span class="text-blue-600">Hub</span>
          </span>
        </div>
      </a>

      <!-- Search & Location Bar (Matching Reference Screenshot) -->
      <div class="hidden md:flex flex-1 max-w-2xl items-center mx-4">
        <form action="/browse.php" method="GET" class="flex w-full border border-slate-300 hover:border-slate-400 focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-100 rounded-xl overflow-hidden bg-white shadow-sm transition">
          <div class="flex-1 flex items-center px-3.5">
            <svg class="w-4 h-4 text-slate-400 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input type="text" name="q" placeholder="Search for items, categories, or users..." class="w-full text-sm text-slate-800 placeholder-slate-400 outline-none py-2.5">
          </div>
          <div class="border-l border-slate-200 flex items-center px-3 bg-slate-50/70">
            <svg class="w-4 h-4 text-slate-500 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <select name="city" class="text-xs font-medium text-slate-700 bg-transparent outline-none cursor-pointer pr-2">
              <option value="All India">All India</option>
              <option value="Delhi">Delhi</option>
              <option value="Mumbai">Mumbai</option>
              <option value="Bengaluru">Bengaluru</option>
              <option value="Pune">Pune</option>
              <option value="Lucknow">Lucknow</option>
            </select>
          </div>
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 flex items-center justify-center transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </button>
        </form>
      </div>

      <!-- Header Right Actions -->
      <div class="flex items-center gap-3 sm:gap-4">
        
        <!-- Messages with Badge -->
        <a href="/messages.php" class="relative hidden sm:flex items-center gap-1.5 px-3 py-2 text-slate-700 hover:text-blue-600 hover:bg-blue-50/60 rounded-xl transition text-sm font-medium">
          <div class="relative">
            <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <span class="absolute -top-1.5 -right-2 bg-rose-500 text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center ring-2 ring-white">2</span>
          </div>
          <span class="hidden lg:inline text-xs font-semibold">Messages</span>
        </a>

        <!-- Notifications Bell -->
        <a href="/dashboard.php?tab=notifications" class="relative p-2 text-slate-600 hover:text-blue-600 hover:bg-slate-100 rounded-xl transition">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-blue-600 rounded-full ring-2 ring-white"></span>
        </a>

        <!-- Profile Avatar & Dropdown -->
        <div class="relative" x-data="{ open: false }">
          <button @click="open = !open" class="flex items-center gap-2 p-1.5 rounded-xl hover:bg-slate-100 transition focus:outline-none">
            <img src="<?= htmlspecialchars($user['avatar'] ?? 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=200&q=80') ?>" alt="Rohit Sharma" class="w-8 h-8 rounded-full object-cover ring-2 ring-blue-500/20">
            <span class="hidden md:inline text-xs font-semibold text-slate-800"><?= htmlspecialchars($user['name'] ?? 'Rohit Sharma') ?></span>
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          
          <div x-show="open" @click.outside="open = false" x-transition class="absolute right-0 mt-2 w-52 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 text-xs">
            <div class="px-4 py-2 border-b border-slate-100">
              <p class="font-bold text-slate-900"><?= htmlspecialchars($user['name'] ?? 'Rohit Sharma') ?></p>
              <p class="text-slate-500 text-[11px]"><?= htmlspecialchars($user['email'] ?? 'rohit@example.com') ?></p>
            </div>
            <a href="/dashboard.php" class="flex items-center gap-2.5 px-4 py-2.5 text-slate-700 hover:bg-slate-50">
              <span>📊</span> User Dashboard
            </a>
            <a href="/offers.php" class="flex items-center gap-2.5 px-4 py-2.5 text-slate-700 hover:bg-slate-50">
              <span>🤝</span> Multi-Item Offers
            </a>
            <a href="/messages.php" class="flex items-center gap-2.5 px-4 py-2.5 text-slate-700 hover:bg-slate-50">
              <span>💬</span> Messages & Chats
            </a>
            <a href="/admin/index.php" class="flex items-center gap-2.5 px-4 py-2.5 text-blue-600 hover:bg-blue-50 font-medium">
              <span>🛡️</span> Admin Panel
            </a>
            <div class="border-t border-slate-100 my-1"></div>
            <a href="/install/index.php" class="flex items-center gap-2.5 px-4 py-2.5 text-slate-500 hover:bg-slate-50">
              <span>⚙️</span> Database Installer
            </a>
          </div>
        </div>

        <!-- Post Your Item Button (Reference design: prominent blue button with plus) -->
        <a href="/post-item.php" class="bg-blue-600 hover:bg-blue-700 active:scale-95 text-white font-semibold text-xs sm:text-sm px-4 sm:px-5 py-2.5 rounded-xl shadow-md shadow-blue-500/25 flex items-center gap-1.5 transition">
          <svg class="w-4 h-4 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
          </svg>
          <span>Post Your Item</span>
        </a>

      </div>
    </div>

    <!-- Sub-navigation links (Reference: Home | Browse | Exchange | How It Works | Help) -->
    <nav class="hidden md:flex items-center gap-8 border-t border-slate-100 py-2.5 text-xs font-semibold text-slate-600">
      <a href="/index.php" class="<?= $activePage === 'home' ? 'text-blue-600 border-b-2 border-blue-600 pb-1 font-bold' : 'hover:text-blue-600' ?>">Home</a>
      <a href="/browse.php" class="<?= $activePage === 'browse' ? 'text-blue-600 border-b-2 border-blue-600 pb-1 font-bold' : 'hover:text-blue-600' ?>">Browse</a>
      <a href="/offers.php" class="<?= $activePage === 'exchange' ? 'text-blue-600 border-b-2 border-blue-600 pb-1 font-bold' : 'hover:text-blue-600' ?>">Exchange</a>
      <a href="/index.php#how-it-works" class="hover:text-blue-600">How It Works</a>
      <a href="/index.php#help" class="hover:text-blue-600">Help</a>
    </nav>
  </div>
</header>
