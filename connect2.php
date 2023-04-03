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
$phone = mysqli_real_escape_string($conn, str_replace(' ', '' , $_POST['phonenumber']));
$pinCode = mysqli_real_escape_string($conn, $_POST['digit1'] . $_POST['digit2'] . $_POST['digit3'] . $_POST['digit4']);

if(!empty($phone) && !empty($pinCode))
{
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE phone = '{$phone}' AND code = '{$pinCode}'");
    if(mysqli_num_rows($sql) > 0){

        $row = mysqli_fetch_assoc($sql);
        $_SESSION['user_id'] = $row['user_id'];
        echo "success";

    }else
    {
        echo "Phone number or Code is incorrect";
    }
}else{
    echo "All input data are required";
}

?>