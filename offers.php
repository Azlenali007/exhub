<?php
$activePage = 'exchange';
require_once __DIR__ . '/includes/header.php';
?>

<main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
  
  <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-slate-200 gap-4">
    <div>
      <span class="text-xs font-bold uppercase tracking-wider text-blue-600">Multi-Item Engine</span>
      <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Barter & Exchange Offers</h1>
      <p class="text-xs text-slate-500 mt-1">Review multi-item proposals, counter-offers, and mutual trade completions.</p>
    </div>

    <!-- Filter Pills -->
    <div class="flex items-center gap-2">
      <button class="bg-blue-600 text-white font-bold text-xs px-4 py-2 rounded-xl shadow-sm">All Proposals (3)</button>
      <button class="bg-white border border-slate-200 text-slate-700 font-bold text-xs px-4 py-2 rounded-xl hover:bg-slate-50">Pending (1)</button>
      <button class="bg-white border border-slate-200 text-slate-700 font-bold text-xs px-4 py-2 rounded-xl hover:bg-slate-50">Countered (1)</button>
      <button class="bg-white border border-slate-200 text-slate-700 font-bold text-xs px-4 py-2 rounded-xl hover:bg-slate-50">Completed (1)</button>
    </div>
  </div>

  <div class="mt-8 space-y-6">
    
    <!-- Multi-Item Offer Card 1: Countered with Sneha Kapoor -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
      
      <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-slate-100 gap-2">
        <div class="flex items-center gap-3">
          <span class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-lg font-black">
            🔄
          </span>
          <div>
            <div class="flex items-center gap-2">
              <h3 class="font-bold text-sm text-slate-900">Proposal #EXC-77419 (Version 2)</h3>
              <span class="text-[10px] font-black uppercase tracking-wider bg-amber-100 text-amber-800 px-2.5 py-0.5 rounded-full">
                Countered by Sneha
              </span>
            </div>
            <p class="text-[11px] text-slate-500">Updated 15 minutes ago • Negotiation in progress</p>
          </div>
        </div>

        <div class="flex items-center gap-2">
          <a href="/messages.php?id=2" class="text-xs font-bold text-blue-600 hover:underline flex items-center gap-1">
            <span>Open Negotiation Chat</span>
            <span>&rarr;</span>
          </a>
        </div>
      </div>

      <!-- Two-sided Multi-Item Breakdown Grid -->
      <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
        
        <!-- Side A: Offerer Items (Sneha's side) -->
        <div class="md:col-span-5 bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-3">
          <div class="flex items-center justify-between">
            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Sneha Kapoor Offers:</span>
            <span class="text-xs font-black text-slate-900">Total: ₹32,000</span>
          </div>

          <!-- Item 1 -->
          <div class="flex items-center gap-3 bg-white p-2.5 rounded-xl border border-slate-200">
            <img src="https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?auto=format&fit=crop&w=200&q=80" class="w-12 h-12 rounded-lg object-cover">
            <div class="flex-1 min-w-0">
              <h4 class="text-xs font-bold text-slate-900 truncate">Samsung 4K Smart TV (43")</h4>
              <p class="text-[10px] text-slate-400">TV & Appliances • Like New</p>
            </div>
            <span class="text-xs font-bold text-slate-800">₹32,000</span>
          </div>
        </div>

        <!-- Center: Trade Operator + Cash Adjustment -->
        <div class="md:col-span-2 text-center space-y-2">
          <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center mx-auto text-sm font-black shadow-md">
            ⇄
          </div>
          <div class="bg-blue-50 border border-blue-200 rounded-xl p-2 text-center">
            <span class="block text-[9px] font-bold text-blue-800 uppercase">Cash Adjustment</span>
            <span class="text-xs font-black text-blue-700">+ ₹3,000</span>
            <span class="block text-[9px] text-blue-600">You pay difference</span>
          </div>
        </div>

        <!-- Side B: Requested Items (Rohit's side) -->
        <div class="md:col-span-5 bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-3">
          <div class="flex items-center justify-between">
            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">You Give In Exchange:</span>
            <span class="text-xs font-black text-slate-900">Total: ₹25,000</span>
          </div>

          <!-- Item 1 -->
          <div class="flex items-center gap-3 bg-white p-2.5 rounded-xl border border-slate-200">
            <img src="https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=200&q=80" class="w-12 h-12 rounded-lg object-cover">
            <div class="flex-1 min-w-0">
              <h4 class="text-xs font-bold text-slate-900 truncate">iPhone 13 (128GB)</h4>
              <p class="text-[10px] text-slate-400">Mobile & Tablets • Good Condition</p>
            </div>
            <span class="text-xs font-bold text-slate-800">₹25,000</span>
          </div>
        </div>

      </div>

      <!-- Note / Message from Counter-Offer -->
      <div class="bg-slate-50 p-3.5 rounded-2xl border border-slate-100 text-xs text-slate-700">
        <strong class="text-slate-900">Sneha's Note:</strong> "The 4K TV is 43 inches with warranty. If you can add ₹3,000 extra cash with your iPhone 13, I am ready to close this barter deal."
      </div>

      <!-- Action Bar -->
      <div class="flex flex-wrap items-center justify-between pt-2 gap-3">
        <span class="text-[11px] text-slate-400">Mutual confirmation required before trade completion record is written.</span>
        
        <div class="flex items-center gap-3">
          <button onclick="handleRejectOffer(102)" class="px-4 py-2 border border-slate-300 rounded-xl text-xs font-bold text-slate-700 hover:bg-slate-100 transition">
            Decline
          </button>
          <button onclick="openCounterOfferModal(102, 3000)" class="px-4 py-2 border border-blue-600 rounded-xl text-xs font-bold text-blue-600 hover:bg-blue-50 transition">
            Counter-Offer
          </button>
          <button onclick="handleAcceptOffer(102)" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold shadow-md shadow-blue-500/20 transition">
            Accept Proposal & Reserve
          </button>
        </div>
      </div>

    </div>

    <!-- Multi-Item Offer Card 2: 3 Items For 1 Motorcycle -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 space-y-6">
      
      <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-slate-100 gap-2">
        <div class="flex items-center gap-3">
          <span class="w-10 h-10 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-lg font-black">
            🤝
          </span>
          <div>
            <div class="flex items-center gap-2">
              <h3 class="font-bold text-sm text-slate-900">Proposal #EXC-84920 (3 Items for 1 Bike)</h3>
              <span class="text-[10px] font-black uppercase tracking-wider bg-blue-100 text-blue-800 px-2.5 py-0.5 rounded-full">
                Pending Response from Amit
              </span>
            </div>
            <p class="text-[11px] text-slate-500">Sent 2 hours ago • Direct trade proposal</p>
          </div>
        </div>

        <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">
          ✓ Listings Reserved
        </span>
      </div>

      <!-- Breakdown -->
      <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
        
        <!-- Multi items from Rohit -->
        <div class="md:col-span-5 bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-2.5">
          <div class="flex items-center justify-between">
            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">You Offered (2 Products):</span>
            <span class="text-xs font-black text-slate-900">Total: ₹43,000</span>
          </div>

          <!-- Product A -->
          <div class="flex items-center gap-3 bg-white p-2.5 rounded-xl border border-slate-200">
            <img src="https://images.unsplash.com/photo-1695048133142-1a20484d2569?auto=format&fit=crop&w=200&q=80" class="w-10 h-10 rounded-lg object-cover">
            <div class="flex-1 min-w-0">
              <h4 class="text-xs font-bold text-slate-900 truncate">iPhone 13 (128GB)</h4>
              <p class="text-[10px] text-slate-400">Mobile • Good Condition</p>
            </div>
            <span class="text-xs font-bold text-slate-800">₹25,000</span>
          </div>

          <!-- Product B -->
          <div class="flex items-center gap-3 bg-white p-2.5 rounded-xl border border-slate-200">
            <img src="https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?auto=format&fit=crop&w=200&q=80" class="w-10 h-10 rounded-lg object-cover">
            <div class="flex-1 min-w-0">
              <h4 class="text-xs font-bold text-slate-900 truncate">Apple iPad 9th Gen</h4>
              <p class="text-[10px] text-slate-400">Tablet • Like New</p>
            </div>
            <span class="text-xs font-bold text-slate-800">₹18,000</span>
          </div>
        </div>

        <div class="md:col-span-2 text-center space-y-2">
          <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center mx-auto text-sm font-black shadow-md">
            ⇄
          </div>
          <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-2 text-center">
            <span class="block text-[9px] font-bold text-emerald-800 uppercase">Cash Difference</span>
            <span class="text-xs font-black text-emerald-700">+ ₹2,000</span>
            <span class="block text-[9px] text-emerald-600">You pay difference</span>
          </div>
        </div>

        <!-- Amit's Bike -->
        <div class="md:col-span-5 bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-3">
          <div class="flex items-center justify-between">
            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Amit Verma's Item:</span>
            <span class="text-xs font-black text-slate-900">Total: ₹45,000</span>
          </div>

          <div class="flex items-center gap-3 bg-white p-2.5 rounded-xl border border-slate-200">
            <img src="https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=200&q=80" class="w-12 h-12 rounded-lg object-cover">
            <div class="flex-1 min-w-0">
              <h4 class="text-xs font-bold text-slate-900 truncate">Hero Splendor Plus (2021)</h4>
              <p class="text-[10px] text-slate-400">Motorcycle • Lucknow</p>
            </div>
            <span class="text-xs font-bold text-slate-800">₹45,000</span>
          </div>
        </div>

      </div>

      <!-- Action Bar -->
      <div class="flex items-center justify-between pt-2">
        <span class="text-[11px] text-slate-400">Total trade value balanced at ₹45,000 each side.</span>
        <button onclick="handleWithdrawOffer(101)" class="px-4 py-2 text-rose-600 hover:bg-rose-50 rounded-xl text-xs font-bold transition">
          Withdraw Proposal
        </button>
      </div>

    </div>

  </div>
</main>

<script>
function handleAcceptOffer(id) {
  Swal.fire({
    title: 'Accept Proposal?',
    text: 'Both listings will be reserved exclusively for this exchange trade. No other users will be able to make offers on these items.',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Yes, Accept & Reserve',
    confirmButtonColor: '#2563eb',
    customClass: { popup: 'rounded-3xl' }
  }).then((res) => {
    if (res.isConfirmed) {
      Swal.fire({
        title: 'Deal Accepted!',
        text: 'The items are reserved! Please coordinate meetup or courier in the private chat.',
        icon: 'success',
        confirmButtonColor: '#2563eb',
        customClass: { popup: 'rounded-3xl' }
      });
    }
  });
}

function handleRejectOffer(id) {
  Swal.fire({
    title: 'Decline Offer?',
    text: 'Are you sure you want to decline this exchange proposal?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, Decline',
    confirmButtonColor: '#e11d48',
    customClass: { popup: 'rounded-3xl' }
  }).then((res) => {
    if (res.isConfirmed) {
      Swal.fire('Declined', 'Offer has been declined.', 'info');
    }
  });
}

function handleWithdrawOffer(id) {
  Swal.fire({
    title: 'Withdraw Offer?',
    text: 'Release reservations and retract this barter proposal?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Withdraw',
    confirmButtonColor: '#64748b',
    customClass: { popup: 'rounded-3xl' }
  }).then((res) => {
    if (res.isConfirmed) {
      Swal.fire('Withdrawn', 'Your proposal was retracted.', 'info');
    }
  });
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
