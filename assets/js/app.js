/**
 * ExchangeHub Main Application Script (Vanilla JS)
 */

document.addEventListener('DOMContentLoaded', () => {
  // Initialize Lucide icons if available
  if (window.lucide) {
    window.lucide.createIcons();
  }
});

// Hero Smart Matchmaker Handler
function handleHeroMatch(e) {
  e.preventDefault();
  const have = document.getElementById('haveCategory').value;
  const want = document.getElementById('wantCategory').value;

  Swal.fire({
    title: 'Finding Barter Matches...',
    html: `Searching listings where owners have <strong>${want}</strong> and want <strong>${have}</strong>...`,
    timer: 1000,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading();
    },
    customClass: { popup: 'rounded-3xl' }
  }).then(() => {
    Swal.fire({
      title: '🎯 2 Direct Matches Found!',
      html: `
        <div class="text-left text-xs space-y-3 pt-2">
          <div class="p-3 bg-emerald-50 rounded-2xl border border-emerald-200">
            <div class="flex items-center justify-between font-bold text-emerald-900 mb-1">
              <span>Hero Splendor Plus (₹45,000)</span>
              <span class="text-[10px] bg-emerald-200 px-2 py-0.5 rounded-full">98% Match</span>
            </div>
            <p class="text-slate-600">Owner in Lucknow has Bike and is looking for Mobiles/TV. You can offer your mobile + cash difference!</p>
          </div>
          <div class="p-3 bg-blue-50 rounded-2xl border border-blue-200">
            <div class="flex items-center justify-between font-bold text-blue-900 mb-1">
              <span>Samsung 4K TV (₹32,000)</span>
              <span class="text-[10px] bg-blue-200 px-2 py-0.5 rounded-full">94% Match</span>
            </div>
            <p class="text-slate-600">Owner in Bengaluru has TV and is looking for a smartphone exchange.</p>
          </div>
        </div>
      `,
      showCancelButton: true,
      confirmButtonText: 'Explore Matched Listings',
      cancelButtonText: 'Close',
      confirmButtonColor: '#2563eb',
      customClass: { popup: 'rounded-3xl' }
    }).then((res) => {
      if (res.isConfirmed) {
        window.location.href = `/browse.php?category=${encodeURIComponent(want)}`;
      }
    });
  });
}

// Toggle Favorite listing
function toggleFavorite(id) {
  Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'success',
    title: 'Saved to your favorites',
    showConfirmButton: false,
    timer: 1600
  });
}
