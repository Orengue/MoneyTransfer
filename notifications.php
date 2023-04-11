<?php   

include_once "config.php";

$user_id = $_SESSION['user_id'];

// SQL query to retrieve transaction data
$sql = "SELECT 
            transaction_number, 
            sender, 
            receiver, 
            amount, 
            transaction_date 
        FROM 
            transaction 
        WHERE 
            sender = $user_id OR receiver = $user_id
            
            ORDER BY transaction_date DESC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // Create the HTML table
while ($row = mysqli_fetch_assoc($result)) {
    // Determine the transaction type
    if ($row['sender'] == $user_id) {
        $transaction_type = 'sent to';
        $phone_number = $row['receiver'];
    } else {
        $transaction_type = 'received from';
        $phone_number = $row['receiver'];
    }
    
    // Get the phone number of the other party
    $sql_phone = "SELECT phone FROM user WHERE user_id = $phone_number";
    $result_phone = mysqli_query($conn, $sql_phone);
    $row_phone = mysqli_fetch_assoc($result_phone);
    $phone_number = $row_phone['phone'];

    // Format the date
    $date = date('Y-m-d h:m', strtotime($row['transaction_date']));
    
    // Echo the table row
    echo "<p>$date : You have $transaction_type $phone_number : {$row['amount']} FCFA</p>";
}

} else {
    echo "No notifications yet.";
}




?>