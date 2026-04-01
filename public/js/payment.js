// public/js/payment.js
// Script pour lancer le paiement Stripe Checkout

document.addEventListener('DOMContentLoaded', function () {
  var payBtn = document.getElementById('pay-btn');
  if (payBtn) {
    payBtn.addEventListener('click', function (e) {
      e.preventDefault();
      var name = document.querySelector('input[name="name"]').value;
      var email = document.querySelector('input[name="email"]').value;
      var tel = document.querySelector('input[name="tel"]').value;
      var date = document.getElementById('res_date').value;
      var slot = document.getElementById('slot').value;
      var amount = document.getElementById('amount').value || 10;
      // Stocker les infos de réservation dans localStorage
      var reservationData = {
        name: name,
        email: email,
        tel: tel,
        date: date,
        slot: slot,
        amount: amount
      };
      localStorage.setItem('pendingReservation', JSON.stringify(reservationData));
      // Récupérer la clé publique Stripe depuis une balise meta ou variable globale
      var stripeKey = window.STRIPE_PUBLISHABLE_KEY || 'pk_test_votre_cle_publique';
      fetch('/MyStadium/controller/payment.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'amount=' + encodeURIComponent(amount) + '&email=' + encodeURIComponent(email)
      })
        .then(function (res) { return res.json(); })
        .then(function (data) {
          if (data.id) {
            if (typeof Stripe === 'undefined') {
              alert('Stripe.js n\'est pas chargé.');
              return;
            }
            var stripe = Stripe(stripeKey);
            stripe.redirectToCheckout({ sessionId: data.id });
          } else {
            alert('Erreur paiement : ' + (data.error || 'Inconnue'));
          }
        });
    });
  }
});
