<?php 
include_once "config.php";
session_start();

    $user_id = $_SESSION['user_id'];
    $pinCode = mysqli_real_escape_string($conn, $_POST['digit1'] . $_POST['digit2'] . $_POST['digit3'] . $_POST['digit4']);
    $checkbox = isset($_POST['checkbox']);

    if(!empty($pinCode) && $checkbox == 'on')
{
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$user_id' AND code = '$pinCode'");
    if((mysqli_num_rows($sql) > 0))
    {
                // Construct the SQL query to delete the user data from the database
    $sql = "DELETE FROM transaction WHERE sender = $user_id OR receiver = $user_id";
// Execute the query and check if it was successful
    if (mysqli_query($conn, $sql)) {
        $sql2 = "DELETE FROM user WHERE user_id = $user_id";
        if (mysqli_query($conn, $sql2)) {

            echo "success";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    }else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    
}else{
        echo "Code incorrect.";
    }
    
}else
{
    echo "Please fill all the input data";
}


?>