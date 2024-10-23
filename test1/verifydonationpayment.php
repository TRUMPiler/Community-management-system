<?php 
require('../razorpay-php-2.9.0/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\Error;
session_start();
$api = new Api('rzp_test_qxeuAYL6jOqDSW', 'IxoRKz8mHWNvDpWmN5n74wpI');

// Create Razorpay API instance


// Get form data from the request
$name = $_POST['name'];
$email = "umafoundation123@gmail.com";
$contact = '123';
$amount = $_POST['amount']; // Amount to be donated, in rupees
$_SESSION['price'] = $amount; // Store the price in session for later use

// Convert amount to smallest currency unit (paise)
$amount_in_paise = $amount * 100;

try {
    // Create an order in Razorpay
    $orderData = [
        'receipt'         => 'rcptid_' . time(),
        'amount'          => $amount_in_paise, // Amount in paise
        'currency'        => 'INR',
        'payment_capture' => 1 // Auto capture payment
    ];

    $razorpayOrder = $api->order->create($orderData);

    // Prepare the response to send back to the client-side AJAX
    $response = [
        'order_id' => $razorpayOrder['id'], // Razorpay Order ID
        'amount' => $razorpayOrder['amount'], // Amount in paise
        'donor_name' => $name,
        'email' => $email,
        'contact' => $contact
    ];

    // Send the order details as JSON response
    echo json_encode($response);
} catch (Exception $e) {
    // Handle error and send back error message
    echo 'Error: ' . $e->getMessage();
}
?>
