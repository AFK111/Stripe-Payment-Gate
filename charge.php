<?php


require_once('vendor/autoload.php'); 
require_once("config/db.php");
require_once("lib/pdo_db.php");
require_once("models/Customer.php");
require_once("models/Transaction.php");

$stripe = new \Stripe\StripeClient(API_SECREC_KEY);

\Stripe\Stripe::setApiKey(API_SECREC_KEY);

// Sanitize Post Array
$POST = filter_var_array($_POST , FILTER_SANITIZE_STRING);
$full_name = $POST['full_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

// Create Customer In Stripe
$customer = \Stripe\Customer::create([
    'email' => $email,
    "source" => $token,
]);

// Charge Customer
$charge = \Stripe\Charge::create([
    "amount" => 5000,
    "currency"=>"usd",
    "description"=>"Helping W.W",
    "customer" => $customer->id,
]);


// Customer Data
$customerData = [
    'id' => $charge->customer,
    'full_name' => $full_name,
    'email'=> $email
];
// Instntiate Customer 
$customer = new Customer();
// Add Customer To DB
$customer->addCustomer($customerData);



// Transaction Data
$transactionData = [
    'id' => $charge->id,
    'customer_id' => $charge->customer,
    'product'=> $charge->description,
    'amount' => $charge->amount,
    'currency'=>$charge->currency,
    'status' => $charge->status
];
// Instntiate Transaction 
$transaction = new Transaction();
// Add Transaction To DB
$transaction->addTransaction($transactionData);



//Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);

?>