<?php

session_start();
if(!isset($_SESSION['user_id'])){
	header("location: login.php");
}

include_once "config.php";
// Get the form data from the AJAX request
$receiver_id = $_POST['receiver_id'];
$amount = $_POST['amount'];

// Validate the input values
if (empty($receiver_id) || empty($amount)) {
  http_response_code(400);
  echo "Please fill in all the fields.";
  exit;
}

if (!is_numeric($receiver_id) || !is_numeric($amount)) {
  http_response_code(400);
  echo "Invalid input values.";
  exit;
}

// Get the sender's ID from the session
$sender_id = $_SESSION['user_id'];

// Perform the transaction
$result = mysqli_query($conn, "SELECT balance FROM user WHERE user_id = $sender_id");
$sender_balance = mysqli_fetch_assoc($result)['balance'];
$result = mysqli_query($conn, "SELECT balance FROM user WHERE phone = $receiver_id");
$receiver_balance = mysqli_fetch_assoc($result)['balance'];
$new_sender_balance = $sender_balance - $amount;
$new_receiver_balance = $receiver_balance + $amount;
mysqli_query($conn, "UPDATE user SET balance = $new_sender_balance WHERE user_id = $sender_id");
mysqli_query($conn, "UPDATE user SET balance = $new_receiver_balance WHERE phone = $receiver_id");

// Return a success message to the client
echo "Transaction successful!";

?>