<?php
// utils/mail.php
// Fonction d'envoi d'email de confirmation de réservation
function send_reservation_email($to, $name, $date, $terrain, &$error = null) {
    $subject = "Confirmation de réservation - MyStadium";
    $message = "Bonjour $name,\n\nVotre réservation pour le $date sur le terrain $terrain a bien été prise en compte.\n\nMerci pour votre confiance !\n\nSportivement,\nL'équipe MyStadium";
    $headers = "From: noreply@mystadium.com\r\nContent-Type: text/plain; charset=utf-8";
    $result = mail($to, $subject, $message, $headers);
    if (!$result) {
        $error = 'Erreur lors de l\'envoi de l\'email.';
    }
    return $result;
}
