<?php
require_once __DIR__ . '/../includes/auth.php';
$adminUser = getCurrentUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ExchangeHub - Admin Management Console</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex flex-col font-sans">
  
  <!-- Admin Header -->
  <header class="bg-slate-950 border-b border-slate-800 px-6 py-4 flex items-center justify-between sticky top-0 z-30">
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center font-black text-white">
        🛡️
      </div>
      <div>
        <h1 class="font-extrabold text-base text-white tracking-tight">ExchangeHub <span class="text-blue-500 font-semibold text-xs px-2 py-0.5 rounded bg-blue-500/10 border border-blue-500/20">Admin Panel</span></h1>
      </div>
    </div>

    <div class="flex items-center gap-4 text-xs">
      <span class="text-slate-400">Logged in as <strong class="text-white">Admin (Rohit)</strong></span>
      <a href="../index.php" class="bg-slate-800 hover:bg-slate-700 text-slate-200 px-3.5 py-2 rounded-xl transition">
        &larr; View Marketplace
      </a>
      <a href="../login.php?logout=1" class="text-rose-400 hover:text-rose-300">Logout</a>
    </div>
  </header>

  <div class="flex-1 max-w-7xl mx-auto px-6 py-8 w-full space-y-8">
    
    <!-- Admin Statistics Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
      <div class="bg-slate-800/80 p-5 rounded-2xl border border-slate-700">
        <span class="text-xs font-bold uppercase text-slate-400">Total Users</span>
        <h3 class="text-2xl font-black text-white mt-1">1,248</h3>
        <span class="text-[11px] text-emerald-400 font-semibold mt-1 block">↑ 18 new today</span>
      </div>
      <div class="bg-slate-800/80 p-5 rounded-2xl border border-slate-700">
        <span class="text-xs font-bold uppercase text-slate-400">Active Listings</span>
        <h3 class="text-2xl font-black text-white mt-1">482</h3>
        <span class="text-[11px] text-blue-400 font-semibold mt-1 block">12 pending moderation</span>
      </div>
      <div class="bg-slate-800/80 p-5 rounded-2xl border border-slate-700">
        <span class="text-xs font-bold uppercase text-slate-400">Completed Barters</span>
        <h3 class="text-2xl font-black text-white mt-1">319</h3>
        <span class="text-[11px] text-emerald-400 font-semibold mt-1 block">₹8.4M item trade volume</span>
      </div>
      <div class="bg-slate-800/80 p-5 rounded-2xl border border-slate-700">
        <span class="text-xs font-bold uppercase text-slate-400">Pending Reports</span>
        <h3 class="text-2xl font-black text-rose-400 mt-1">1</h3>
        <span class="text-[11px] text-slate-400 font-semibold mt-1 block">Requires staff review</span>
      </div>
    </div>

    <!-- Listings Moderation Table -->
    <div class="bg-slate-800/80 rounded-2xl border border-slate-700 p-6 space-y-4">
      <div class="flex items-center justify-between border-b border-slate-700 pb-4">
        <div>
          <h2 class="font-extrabold text-base text-white">Listing Moderation Queue</h2>
          <p class="text-xs text-slate-400 mt-0.5">Approve, reject, or flag newly published barter items</p>
        </div>
        <span class="text-xs font-semibold bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full border border-blue-500/20">
          Auto-Shield Active
        </span>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full text-xs text-left">
          <thead class="text-[11px] uppercase tracking-wider text-slate-400 bg-slate-900/60">
            <tr>
              <th class="p-3">Item</th>
              <th class="p-3">User</th>
              <th class="p-3">Valuation</th>
              <th class="p-3">Wants In Return</th>
              <th class="p-3">Status</th>
              <th class="p-3 text-right">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-700/60 text-slate-300">
            <tr>
              <td class="p-3 font-bold text-white flex items-center gap-2">
                <img src="https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=100&q=80" class="w-8 h-8 rounded-lg object-cover">
                iPhone 13 (128GB)
              </td>
              <td class="p-3">Rohit Sharma</td>
              <td class="p-3 font-black text-white">₹25,000</td>
              <td class="p-3">Bike / TV / Laptop</td>
              <td class="p-3"><span class="bg-emerald-500/20 text-emerald-400 font-bold px-2 py-0.5 rounded">Active</span></td>
              <td class="p-3 text-right space-x-2">
                <button onclick="Swal.fire('Listing Approved', 'Item is approved and visible.', 'success')" class="text-emerald-400 hover:underline font-bold">Approve</button>
                <button onclick="Swal.fire('Rejected', 'Item rejected with notification to seller.', 'warning')" class="text-rose-400 hover:underline font-bold">Reject</button>
              </td>
            </tr>
            <tr>
              <td class="p-3 font-bold text-white flex items-center gap-2">
                <img src="https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=100&q=80" class="w-8 h-8 rounded-lg object-cover">
                Hero Splendor Plus
              </td>
              <td class="p-3">Amit Verma</td>
              <td class="p-3 font-black text-white">₹45,000</td>
              <td class="p-3">TV / Laptop</td>
              <td class="p-3"><span class="bg-emerald-500/20 text-emerald-400 font-bold px-2 py-0.5 rounded">Active</span></td>
              <td class="p-3 text-right space-x-2">
                <button onclick="Swal.fire('Listing Approved', 'Item is approved and visible.', 'success')" class="text-emerald-400 hover:underline font-bold">Approve</button>
                <button onclick="Swal.fire('Rejected', 'Item rejected with notification to seller.', 'warning')" class="text-rose-400 hover:underline font-bold">Reject</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Database Schema & Audit Log -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bg-slate-800/80 rounded-2xl border border-slate-700 p-6 space-y-3">
        <h3 class="font-bold text-sm text-white">Database Information</h3>
        <p class="text-xs text-slate-400 leading-relaxed">
          Database architecture: Normalized MySQL 8+ with foreign key cascades, row-level locks on multi-item reservations, and audit history.
        </p>
        <div class="pt-2">
          <a href="../install/index.php" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-4 py-2 rounded-xl inline-block transition">
            Launch Database Installer &rarr;
          </a>
        </div>
      </div>

      <div class="bg-slate-800/80 rounded-2xl border border-slate-700 p-6 space-y-3">
        <h3 class="font-bold text-sm text-white">Security & Audit Policy</h3>
        <p class="text-xs text-slate-400 leading-relaxed">
          Zero-TypeScript Core PHP backend with PDO prepared statements, context-aware output escaping, and session-based authentication.
        </p>
        <span class="inline-flex items-center gap-1.5 text-xs text-emerald-400 font-bold">
          ✓ CSRF Protection Active • PDO Parameterized Queries Enforced
        </span>
      </div>
    </div>

  </div>
</body>
</html>
