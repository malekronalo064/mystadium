<?php
// utils/mail.php
// Fonction d'envoi d'email de confirmation de réservation
function send_reservation_email($to, $name, $date, $terrain) {
    $subject = "Confirmation de réservation - MyStadium";
    $message = "Bonjour $name,\n\nVotre réservation pour le $date sur le $terrain a bien été prise en compte.\n\nMerci et à bientôt sur MyStadium !";
    $headers = "From: noreply@mystadium.com\r\nContent-Type: text/plain; charset=utf-8";
    return mail($to, $subject, $message, $headers);
}
