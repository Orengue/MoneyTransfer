<?php   

session_start();
include_once "config.php";

$receiver_phone = str_replace(' ', '' , $_POST['phonenumber']);
$amount = $_POST['money'];
$sender_id = $_SESSION['user_id'];

if (!empty($receiver_phone) && !empty($amount)) {
    if ($amount == 0) {
        echo "You cannot send 0 FCFA";
    } else {
        $sql = "SELECT * FROM user WHERE phone = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $receiver_phone);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($result) > 0) {
            $receiver = $receiver_phone;
            $sender_balance_query = "SELECT balance FROM user WHERE user_id = ?";
            $stmt = mysqli_prepare($conn, $sender_balance_query);
            mysqli_stmt_bind_param($stmt, "i", $sender_id);
            mysqli_stmt_execute($stmt);
            $sender_balance = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))['balance'];

            if ($sender_balance >= $amount) {  
                $receiver_balance_query = "SELECT balance FROM user WHERE phone = ?";
                $stmt = mysqli_prepare($conn, $receiver_balance_query);
                mysqli_stmt_bind_param($stmt, "s", $receiver);
                mysqli_stmt_execute($stmt);
                $receiver_balance = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))['balance'];
                $new_sender_balance = $sender_balance - $amount;
                $new_receiver_balance = $receiver_balance + $amount;

                $update_sender_query = "UPDATE user SET balance = ? WHERE user_id = ?";
                $stmt = mysqli_prepare($conn, $update_sender_query);
                mysqli_stmt_bind_param($stmt, "ii", $new_sender_balance, $sender_id);
                mysqli_stmt_execute($stmt);

                $update_receiver_query = "UPDATE user SET balance = ? WHERE phone = ?";
                $stmt = mysqli_prepare($conn, $update_receiver_query);
                mysqli_stmt_bind_param($stmt, "is", $new_receiver_balance, $receiver);
                mysqli_stmt_execute($stmt);

                $stmt = mysqli_prepare($conn, "SELECT user_id FROM user WHERE phone = ?");
                mysqli_stmt_bind_param($stmt, 's', $receiver_phone);
                mysqli_stmt_execute($stmt);
                $receiverID = mysqli_stmt_get_result($stmt);
                $receiverid = mysqli_fetch_assoc($receiverID)['user_id'];

                $transaction_number = uniqid(); // generate a unique transaction number
                $insert_transaction_query = "INSERT INTO transaction (transaction_number, sender, receiver, amount, transaction_date) VALUES (?, ?, ?, ?, NOW())";
                $stmt = mysqli_prepare($conn, $insert_transaction_query);
                mysqli_stmt_bind_param($stmt, "sisi", $transaction_number, $sender_id, $receiverid, $amount);
                mysqli_stmt_execute($stmt);

                echo "Success";
            } else {
                echo "You do not have enough money";
            }
        } else {
            echo "Phone number incorrect or not registered";
        }
    }
} else {
    echo "All input data are required";
}

?>
