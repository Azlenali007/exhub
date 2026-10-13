/**
 * Multi-Item Exchange Barter Proposal Engine (Vanilla JS)
 */

let currentTargetItem = {
  id: 1,
  title: 'iPhone 13 (128GB)',
  value: 25000,
  userId: 1
};

function openOfferModal(listingId, title, value, userId) {
  currentTargetItem = { id: listingId, title, value, userId };
  
  const modal = document.getElementById('multiItemOfferModal');
  if (!modal) return;

  document.getElementById('modalTargetListingId').value = listingId;
  document.getElementById('modalTargetUserId').value = userId;
  document.getElementById('modalTargetTitle').innerText = `Make Barter Offer for ${title}`;
  document.getElementById('modalRequestedItemName').innerText = title;
  document.getElementById('modalRequestedItemVal').innerText = `₹${Number(value).toLocaleString()}`;

  recalculateOfferTotals();
  modal.classList.remove('hidden');
}

function closeOfferModal() {
  const modal = document.getElementById('multiItemOfferModal');
  if (modal) {
    modal.classList.add('hidden');
  }
}

function recalculateOfferTotals() {
  const checkboxes = document.querySelectorAll('input[name="my_items"]:checked');
  let myTotal = 0;
  checkboxes.forEach(cb => {
    myTotal += Number(cb.getAttribute('data-val') || 0);
  });

  const payer = document.getElementById('modalCashPayer') ? document.getElementById('modalCashPayer').value : 'none';
  const cashAmt = document.getElementById('modalCashAmount') ? Number(document.getElementById('modalCashAmount').value || 0) : 0;

  let netEffective = myTotal;
  if (payer === 'sender') {
    netEffective += cashAmt;
  } else if (payer === 'receiver') {
    netEffective -= cashAmt;
  }

  const calcElem = document.getElementById('modalTotalCalculated');
  if (calcElem) {
    calcElem.innerText = `₹${netEffective.toLocaleString()} (Items: ₹${myTotal.toLocaleString()} ${payer === 'sender' ? '+ ₹' + cashAmt.toLocaleString() : (payer === 'receiver' ? '- ₹' + cashAmt.toLocaleString() : '')})`;
  }
}

function submitMultiOffer(e) {
  e.preventDefault();
  const checkboxes = document.querySelectorAll('input[name="my_items"]:checked');
  if (checkboxes.length === 0) {
    Swal.fire({
      icon: 'warning',
      title: 'No Items Selected',
      text: 'Please select at least one item you own to offer in this exchange proposal.',
      confirmButtonColor: '#2563eb'
    });
    return;
  }

  const selectedTitles = Array.from(checkboxes).map(c => c.getAttribute('data-name')).join(' + ');
  const payer = document.getElementById('modalCashPayer').value;
  const cash = document.getElementById('modalCashAmount').value;
  const note = document.getElementById('modalOfferMessage').value;

  closeOfferModal();

  Swal.fire({
    title: '🎉 Offer Submitted!',
    html: `
      <div class="text-left text-xs space-y-2 pt-2">
        <p>Your proposal has been securely sent to the owner:</p>
        <div class="p-3 bg-slate-50 rounded-xl border border-slate-200">
          <p><strong>You Offer:</strong> ${selectedTitles}</p>
          <p><strong>For Their:</strong> ${currentTargetItem.title}</p>
          <p><strong>Cash Adjustment:</strong> ${payer === 'sender' ? '+ ₹' + cash + ' (You pay)' : (payer === 'receiver' ? 'Requesting ₹' + cash + ' cash' : 'Direct swap (₹0 cash)')}</p>
        </div>
        <p class="text-slate-500">A private negotiation channel has been opened in Messages.</p>
      </div>
    `,
    icon: 'success',
    confirmButtonText: 'Go to Messages & Track',
    showCancelButton: true,
    cancelButtonText: 'Stay Here',
    confirmButtonColor: '#2563eb',
    customClass: { popup: 'rounded-3xl' }
  }).then((res) => {
    if (res.isConfirmed) {
      window.location.href = '/messages.php?id=2';
    }
  });
}
