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

// Retrieve data from form 1
if (isset($_POST['firstname','lastname'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phonenumber'];
    // Insert data into database entity
    $sql = "INSERT INTO user (firstname, lastname, phone) VALUES ('$firstname', '$lastname', '$phone')";


if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
