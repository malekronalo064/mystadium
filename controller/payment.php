<?php
// controller/payment.php

require_once __DIR__ . '/../vendor/autoload.php';
use Stripe\Stripe;
use Stripe\Checkout\Session;
$stripeConfig = require __DIR__ . '/../config/stripe.php';

if (!class_exists('Stripe\\Stripe')) {
    http_response_code(500);
    echo json_encode(['error' => 'Stripe PHP SDK non installé']);
    exit;
}
Stripe::setApiKey($stripeConfig['secret_key']);

function getBaseUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
    return $protocol . '://' . $host . ($base ? $base : '');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = isset($_POST['amount']) ? intval($_POST['amount']) : 0;
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    if ($amount > 0 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $baseUrl = getBaseUrl();
            $session = Session::create([
                'payment_method_types' => ['card'],
                'customer_email' => $email,
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'Réservation terrain de foot',
                        ],
                        'unit_amount' => $amount * 100, // en centimes
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => $baseUrl . '/MyStadium/views/reserver.php?paid=1',
                'cancel_url' => $baseUrl . '/MyStadium/views/reserver.php?paid=0',
            ]);
            header('Content-Type: application/json');
            echo json_encode(['id' => $session->id]);
            exit;
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
            exit;
        }
    }
}
http_response_code(400);
echo json_encode(['error' => 'Requête invalide']);
