<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "money-transfer"; // Replace with your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get values from form
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$phone = mysqli_real_escape_string($conn, str_replace(' ', '' , $_POST['phonenumber']));
$digit1 = $_POST['digit1'];
$digit2 = $_POST['digit2'];
$digit3 = $_POST['digit3'];
$digit4 = $_POST['digit4'];
$PinCode = $digit1 . $digit2 . $digit3 . $digit4;
$pinCode = mysqli_real_escape_string($conn, $PinCode);

if(!empty($firstname) && !empty($lastname) && !empty($phone) && !empty($pinCode))
{
    $cleaned_phone_number = preg_replace('/\D/', '', $phone);

// Check if the cleaned phone number matches a valid format
if (preg_match('/^\d{10}$/', $cleaned_phone_number)) {

    $query = "SELECT COUNT(*) as count FROM user WHERE phone = '$phone'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    if ($row['count'] > 0) {
    echo "The phone number already exists!";
    } else {
    // The phone number does not exist in the database

    if (preg_match('/^\d{4}$/', $pinCode)) {
        // The pin code is valid
        
        $statuts = "Active now";
        $sql = "INSERT INTO user (firstname, lastname, phone, code, creation_date) VALUES ('$firstname', '$lastname', '$phone', '$pinCode', NOW())";

        if (mysqli_query($conn, $sql)) {
            $sql3 = mysqli_query($conn, "SELECT * FROM user WHERE phone = '{$phone}'");
            if(mysqli_num_rows($sql3) > 0)
            {
                $row = mysqli_fetch_assoc($sql3);
                $_SESSION['user_id'] = $row['user_id'];
                echo "success";
            }

        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    } else {
        echo "The 4 digit code is not valid";
    }
    }
} else {
    echo "The phone number is not valid";
}
}
else{
    echo "All input field are required!";
}


// Close connection
mysqli_close($conn);
?>
