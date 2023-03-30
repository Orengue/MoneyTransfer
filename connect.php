<?php
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
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phonenumber'];
$pinCode = $_POST['digit1'] . $_POST['digit2'] . $_POST['digit3'] . $_POST['digit4'];


// Insert data into table
$sql = "INSERT INTO user (firstname, lastname, phone, code) VALUES ('$firstname', '$lastname', '$phone', '$pinCode')";

if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
