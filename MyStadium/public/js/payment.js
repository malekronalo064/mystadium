<?php
// public/js/payment.js
// Script pour lancer le paiement Stripe Checkout

document.addEventListener('DOMContentLoaded', function () {
  var payBtn = document.getElementById('pay-btn');
  if (payBtn) {
    payBtn.addEventListener('click', function (e) {
      e.preventDefault();
      var email = document.querySelector('input[name="email"]').value;
      var amount = document.getElementById('amount').value || 10; // Montant par défaut
      fetch('/MyStadium/controller/payment.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'amount=' + encodeURIComponent(amount) + '&email=' + encodeURIComponent(email)
      })
        .then(function (res) { return res.json(); })
        .then(function (data) {
          if (data.id) {
            var stripe = Stripe('pk_test_votre_cle_publique'); // Remplacer par la vraie clé
            stripe.redirectToCheckout({ sessionId: data.id });
          } else {
            alert('Erreur paiement : ' + (data.error || 'Inconnue'));
          }
        });
    });
  }
});
