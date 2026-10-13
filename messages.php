<?php
$activePage = 'messages';
require_once __DIR__ . '/includes/header.php';
$chatId = (int)($_GET['id'] ?? 2);
?>

<main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 w-full">
  <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden h-[780px] grid grid-cols-1 md:grid-cols-12">
    
    <!-- Left Conversation List (Matches bottom-middle screenshot) -->
    <div class="md:col-span-5 lg:col-span-4 border-r border-slate-100 flex flex-col h-full bg-slate-50/50">
      
      <!-- Messages Search Header -->
      <div class="p-4 border-b border-slate-100 bg-white">
        <div class="flex items-center justify-between mb-3">
          <h1 class="text-xl font-black text-slate-900 tracking-tight">Messages</h1>
          <button class="p-1.5 text-slate-400 hover:text-slate-600 rounded-xl hover:bg-slate-100">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
          </button>
        </div>
        <div class="relative">
          <input type="text" placeholder="Search chats..." class="w-full text-xs py-2.5 pl-9 pr-4 bg-slate-100 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 font-medium text-slate-800">
          <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>
      </div>

      <!-- Conversations Scrollable List -->
      <div class="flex-1 overflow-y-auto divide-y divide-slate-100">
        
        <!-- Conversation 1: Amit Verma -->
        <a href="/messages.php?id=1" class="flex items-center gap-3 p-4 hover:bg-slate-100 transition <?= $chatId === 1 ? 'bg-blue-50/80 border-r-4 border-blue-600' : '' ?>">
          <div class="relative flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?auto=format&fit=crop&w=200&q=80" alt="Amit Verma" class="w-11 h-11 rounded-full object-cover">
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between mb-0.5">
              <h4 class="text-xs font-bold text-slate-900 truncate">Amit Verma</h4>
              <span class="text-[10px] text-slate-400 font-medium">2m</span>
            </div>
            <p class="text-[11px] text-slate-600 truncate font-semibold">Is this still available?</p>
          </div>
        </a>

        <!-- Conversation 2: Sneha Kapoor (Active in Reference Screenshot) -->
        <a href="/messages.php?id=2" class="flex items-center gap-3 p-4 hover:bg-slate-100 transition <?= $chatId === 2 ? 'bg-blue-50/80 border-r-4 border-blue-600' : '' ?>">
          <div class="relative flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80" alt="Sneha Kapoor" class="w-11 h-11 rounded-full object-cover">
            <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 rounded-full ring-2 ring-white"></span>
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between mb-0.5">
              <h4 class="text-xs font-bold text-slate-900 truncate">Sneha Kapoor</h4>
              <span class="text-[10px] text-blue-600 font-bold">15m</span>
            </div>
            <p class="text-[11px] text-slate-800 font-bold truncate">I can give you my TV + ₹3k</p>
          </div>
        </a>

        <!-- Conversation 3: Rakesh Yadav -->
        <a href="/messages.php?id=3" class="flex items-center gap-3 p-4 hover:bg-slate-100 transition <?= $chatId === 3 ? 'bg-blue-50/80 border-r-4 border-blue-600' : '' ?>">
          <div class="relative flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=200&q=80" alt="Rakesh Yadav" class="w-11 h-11 rounded-full object-cover">
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between mb-0.5">
              <h4 class="text-xs font-bold text-slate-900 truncate">Rakesh Yadav</h4>
              <span class="text-[10px] text-slate-400 font-medium">1h</span>
            </div>
            <p class="text-[11px] text-slate-500 truncate">Can you share more photos?</p>
          </div>
        </a>

        <!-- Conversation 4: Pooja Singh -->
        <a href="/messages.php?id=4" class="flex items-center gap-3 p-4 hover:bg-slate-100 transition <?= $chatId === 4 ? 'bg-blue-50/80 border-r-4 border-blue-600' : '' ?>">
          <div class="relative flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=200&q=80" alt="Pooja Singh" class="w-11 h-11 rounded-full object-cover">
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between mb-0.5">
              <h4 class="text-xs font-bold text-slate-900 truncate">Pooja Singh</h4>
              <span class="text-[10px] text-slate-400 font-medium">3h</span>
            </div>
            <p class="text-[11px] text-slate-500 truncate">Deal done! Thanks</p>
          </div>
        </a>

        <!-- Conversation 5: Vikram Patel -->
        <a href="/messages.php?id=5" class="flex items-center gap-3 p-4 hover:bg-slate-100 transition <?= $chatId === 5 ? 'bg-blue-50/80 border-r-4 border-blue-600' : '' ?>">
          <div class="relative flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=200&q=80" alt="Vikram Patel" class="w-11 h-11 rounded-full object-cover">
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between mb-0.5">
              <h4 class="text-xs font-bold text-slate-900 truncate">Vikram Patel</h4>
              <span class="text-[10px] text-slate-400 font-medium">5h</span>
            </div>
            <p class="text-[11px] text-slate-500 truncate">Interested in your laptop</p>
          </div>
        </a>

        <!-- Conversation 6: Neha Joshi -->
        <a href="/messages.php?id=6" class="flex items-center gap-3 p-4 hover:bg-slate-100 transition <?= $chatId === 6 ? 'bg-blue-50/80 border-r-4 border-blue-600' : '' ?>">
          <div class="relative flex-shrink-0">
            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=200&q=80" alt="Neha Joshi" class="w-11 h-11 rounded-full object-cover">
          </div>
          <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between mb-0.5">
              <h4 class="text-xs font-bold text-slate-900 truncate">Neha Joshi</h4>
              <span class="text-[10px] text-slate-400 font-medium">1d</span>
            </div>
            <p class="text-[11px] text-slate-500 truncate">Is the condition good?</p>
          </div>
        </a>

      </div>
    </div>

    <!-- Right Active Chat Window (Directly matching bottom-middle screenshot) -->
    <div class="md:col-span-7 lg:col-span-8 flex flex-col h-full bg-white">
      
      <!-- Chat Header -->
      <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80" alt="Sneha Kapoor" class="w-10 h-10 rounded-full object-cover">
            <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-emerald-500 rounded-full ring-2 ring-white"></span>
          </div>
          <div>
            <h3 class="font-bold text-sm text-slate-900 flex items-center gap-1.5">
              <span>Sneha Kapoor</span>
              <span class="text-[10px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">Online</span>
            </h3>
            <p class="text-[11px] text-slate-500">Trading for iPhone 13 & Samsung 4K Smart TV</p>
          </div>
        </div>

        <!-- Chat Options & Counter Offer Button -->
        <div class="flex items-center gap-2">
          <button onclick="openCounterOfferModal(102, 3000)" class="bg-blue-50 text-blue-700 hover:bg-blue-100 font-bold text-xs px-3.5 py-1.5 rounded-xl border border-blue-200 transition">
            Negotiate / Counter-Offer
          </button>
          <button onclick="confirmDealCompletion(102)" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs px-3.5 py-1.5 rounded-xl shadow-sm transition">
            Confirm Exchange
          </button>
        </div>
      </div>

      <!-- Trade Context Ribbon -->
      <div class="bg-amber-50/80 border-b border-amber-200/60 px-6 py-2 flex items-center justify-between text-xs text-amber-900">
        <span class="font-semibold">🤝 Proposed Barter: Samsung 4K TV + ₹3,000 cash for your iPhone 13</span>
        <span class="font-bold text-amber-700">Status: Countered</span>
      </div>

      <!-- Messages Stream (Matching screenshot exact messages & photos) -->
      <div id="chatStream" class="flex-1 overflow-y-auto p-6 space-y-4">
        
        <div class="text-center my-2">
          <span class="text-[10px] font-semibold text-slate-400 bg-slate-100 px-3 py-1 rounded-full">Today, 10:24 AM</span>
        </div>

        <!-- The other user message 1 -->
        <div class="flex items-start gap-2.5 max-w-md">
          <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80" class="w-7 h-7 rounded-full object-cover">
          <div class="bg-slate-100 p-3.5 rounded-2xl rounded-tl-none text-xs text-slate-800">
            <p>Hi, I saw your iPhone 13 (128GB). I have a 43" 4K Smart TV in excellent condition. Would you be interested in exchange?</p>
            <span class="text-[9px] text-slate-400 mt-1 block text-right">10:24 AM</span>
          </div>
        </div>

        <!-- My reply 1 -->
        <div class="flex items-start justify-end gap-2.5 ml-auto max-w-md">
          <div class="bg-blue-600 text-white p-3.5 rounded-2xl rounded-tr-none text-xs">
            <p>Hello! Yes, I'm interested. Can you share photos and details of your TV?</p>
            <span class="text-[9px] text-blue-200 mt-1 block text-right">10:32 AM</span>
          </div>
        </div>

        <!-- The other user photo attachment (Matching TV picture in screenshot) -->
        <div class="flex items-start gap-2.5 max-w-md">
          <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=200&q=80" class="w-7 h-7 rounded-full object-cover">
          <div class="bg-slate-100 p-2 rounded-2xl rounded-tl-none text-xs text-slate-800 space-y-2">
            <div class="rounded-xl overflow-hidden aspect-video bg-black/5">
              <img src="https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?auto=format&fit=crop&w=800&q=80" alt="Samsung 4K TV" class="w-full h-full object-cover">
            </div>
            <p class="px-1.5 font-medium">This is my TV. It's 43 inch, 4K. Interested in your mobile. Can you add ₹3k?</p>
            <span class="text-[9px] text-slate-400 block px-1.5 text-right">3:45 PM</span>
          </div>
        </div>

        <!-- My reply 2 (Matches blue message in screenshot) -->
        <div class="flex items-start justify-end gap-2.5 ml-auto max-w-md">
          <div class="bg-blue-600 text-white p-3.5 rounded-2xl rounded-tr-none text-xs">
            <p>Yes, I can do that. I'll share photos of the mobile and we can finalize.</p>
            <span class="text-[9px] text-blue-200 mt-1 block text-right">3:52 PM</span>
          </div>
        </div>

      </div>

      <!-- Chat Input Footer (Matching bottom of screenshot) -->
      <div class="p-4 border-t border-slate-100 bg-white">
        <form id="sendMessageForm" onsubmit="sendChatMessage(event)" class="flex items-center gap-2">
          
          <button type="button" onclick="attachPhotoMock()" class="p-2.5 text-slate-400 hover:text-slate-600 rounded-xl hover:bg-slate-100 transition" title="Attach item photo">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
          </button>

          <input type="text" id="chatInputText" placeholder="Type a message..." required class="flex-1 text-xs py-3 px-4 bg-slate-50 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-blue-500 text-slate-800">

          <button type="submit" class="bg-blue-600 hover:bg-blue-700 active:scale-95 text-white w-10 h-10 rounded-xl flex items-center justify-center shadow-md shadow-blue-500/20 transition">
            <svg class="w-4 h-4 transform rotate-45 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
          </button>

        </form>
      </div>

    </div>

  </div>
</main>

<script>
function sendChatMessage(e) {
  e.preventDefault();
  const input = document.getElementById('chatInputText');
  const text = input.value.trim();
  if (!text) return;

  const stream = document.getElementById('chatStream');
  const bubble = document.createElement('div');
  bubble.className = 'flex items-start justify-end gap-2.5 ml-auto max-w-md';
  bubble.innerHTML = `
    <div class="bg-blue-600 text-white p-3.5 rounded-2xl rounded-tr-none text-xs">
      <p>${text}</p>
      <span class="text-[9px] text-blue-200 mt-1 block text-right">Just now</span>
    </div>
  `;
  stream.appendChild(bubble);
  input.value = '';
  stream.scrollTop = stream.scrollHeight;
}

function attachPhotoMock() {
  Swal.fire({
    title: 'Attach Item Photo',
    text: 'Attach a photograph of your item to share directly in this barter negotiation.',
    input: 'url',
    inputPlaceholder: 'Paste image URL or use sample',
    inputValue: 'https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?auto=format&fit=crop&w=600&q=80',
    showCancelButton: true,
    confirmButtonText: 'Send Photo',
    confirmButtonColor: '#2563eb',
    customClass: { popup: 'rounded-3xl' }
  }).then((res) => {
    if (res.isConfirmed && res.value) {
      const stream = document.getElementById('chatStream');
      const bubble = document.createElement('div');
      bubble.className = 'flex items-start justify-end gap-2.5 ml-auto max-w-md';
      bubble.innerHTML = `
        <div class="bg-blue-600 text-white p-2 rounded-2xl rounded-tr-none text-xs space-y-1.5">
          <img src="${res.value}" class="rounded-xl max-h-48 w-full object-cover">
          <p class="px-1 text-[11px]">Photo of item attached</p>
          <span class="text-[9px] text-blue-200 block px-1 text-right">Just now</span>
        </div>
      `;
      stream.appendChild(bubble);
      stream.scrollTop = stream.scrollHeight;
    }
  });
}

function openCounterOfferModal(offerId, currentCash) {
  Swal.fire({
    title: 'Submit Counter-Offer',
    html: `
      <div class="text-left text-xs space-y-3 pt-2">
        <p class="text-slate-600">Adjust the cash adjustment difference to counter Sneha's proposal:</p>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Cash Difference (₹)</label>
          <input id="swalCounterCash" type="number" value="${currentCash}" class="w-full p-2.5 border border-slate-300 rounded-xl text-xs outline-none">
        </div>
        <div>
          <label class="block font-bold text-slate-700 mb-1">Counter-offer Note</label>
          <textarea id="swalCounterNote" rows="2" class="w-full p-2.5 border border-slate-300 rounded-xl text-xs outline-none" placeholder="Explain your revised proposal..."></textarea>
        </div>
      </div>
    `,
    showCancelButton: true,
    confirmButtonText: 'Send Counter-Offer',
    confirmButtonColor: '#2563eb',
    customClass: { popup: 'rounded-3xl' }
  }).then((res) => {
    if (res.isConfirmed) {
      const revised = document.getElementById('swalCounterCash').value;
      Swal.fire('Counter-Offer Sent!', `Your revised proposal with ₹${revised} cash difference was sent.`, 'success');
    }
  });
}

function confirmDealCompletion(offerId) {
  Swal.fire({
    title: 'Confirm Exchange Handover?',
    text: 'Confirm that both parties have met, inspected items, and completed the barter exchange.',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Yes, Confirm Exchange Complete',
    confirmButtonColor: '#059669',
    customClass: { popup: 'rounded-3xl' }
  }).then((res) => {
    if (res.isConfirmed) {
      Swal.fire({
        title: '🎉 Exchange Completed!',
        text: 'Congratulations on your successful barter deal! Both items are marked completed and reviews are unlocked.',
        icon: 'success',
        confirmButtonColor: '#059669',
        customClass: { popup: 'rounded-3xl' }
      });
    }
  });
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
