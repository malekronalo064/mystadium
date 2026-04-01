<?php
// utils/sms.php
// Exemple d’envoi de SMS avec Twilio (remplacer par vos identifiants)
function send_reservation_sms($to, $name, $date, $terrain, &$error = null) {
    $sid = 'ACXXXXXXXXXXXXXXXXXXXXXXXXXXXX'; // Votre SID Twilio
    $token = 'your_auth_token';
    $from = '+1234567890'; // Numéro Twilio
    $body = "Bonjour $name, votre réservation du $date sur le terrain $terrain est confirmée. Merci pour votre confiance ! - MyStadium";
    $url = 'https://api.twilio.com/2010-04-01/Accounts/' . $sid . '/Messages.json';
    $data = http_build_query([
        'From' => $from,
        'To' => $to,
        'Body' => $body
    ]);
    $options = [
        'http' => [
            'header'  => "Authorization: Basic " . base64_encode("$sid:$token") . "\r\nContent-type: application/x-www-form-urlencoded",
            'method'  => 'POST',
            'content' => $data,
        ],
    ];
    $context  = stream_context_create($options);
    $result = @file_get_contents($url, false, $context);
    if ($result === false) {
        $error = 'Erreur lors de l\'envoi du SMS.';
    }
    return $result !== false;
}
