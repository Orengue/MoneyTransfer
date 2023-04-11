<?php 
include_once "config.php";
session_start();
    $new_phone_number = mysqli_real_escape_string($conn, str_replace(' ', '' , $_POST['newphonenumber']));
    $former_phone = mysqli_real_escape_string($conn, str_replace(' ', '' , $_POST['formerphonenumber']));
    $user_id = $_SESSION['user_id'];
    $pinCode = mysqli_real_escape_string($conn, $_POST['digit1'] . $_POST['digit2'] . $_POST['digit3'] . $_POST['digit4']);


    if(!empty($new_phone_number) && !empty($former_phone) && !empty($pinCode))
{
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE phone = '$former_phone' AND  user_id = '$user_id'");
    if((mysqli_num_rows($sql) > 0))
    {
        $sql2 = mysqli_query($conn, "SELECT * FROM user WHERE phone = '$new_phone_number'");
        if(!(mysqli_num_rows($sql2) > 0))
        {
            $sql3 = mysqli_query($conn, "SELECT * FROM user WHERE code = '{$pinCode}'");
            if(mysqli_num_rows($sql3) > 0)
            {
                $sql = "UPDATE user SET phone='$new_phone_number' WHERE user_id= '$user_id'";
    
                if (mysqli_query($conn, $sql)) {
                echo "success";
                } else {
                    echo "Error updating phone number: " . mysqli_error($conn);
                }
            }else
            {
                echo "Code incorrect!";
            }    
        }
        else
        {
            echo "The new phone number is already registered.";
        }
    }
    else{
        echo "Please enter your correct phone number.";
    }
    
}else
{
    echo "Please fill all the input data";
}

?>