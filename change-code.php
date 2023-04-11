<?php 
include_once "config.php";
session_start();

    $phone = mysqli_real_escape_string($conn, str_replace(' ', '' , $_POST['phonenumber']));
    $user_id = $_SESSION['user_id'];
    $pinCode = mysqli_real_escape_string($conn, $_POST['digit1'] . $_POST['digit2'] . $_POST['digit3'] . $_POST['digit4']);
    $newpinCode = mysqli_real_escape_string($conn, $_POST['1digit1'] . $_POST['2digit2'] . $_POST['3digit3'] . $_POST['4digit4']);


    if(!empty($phone) && !empty($pinCode) && !empty($newpinCode))
{
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE phone = '$phone' AND  user_id = '$user_id'");
    if((mysqli_num_rows($sql) > 0))
    {
            $sql3 = mysqli_query($conn, "SELECT * FROM user WHERE code = '{$pinCode}'");
            if(mysqli_num_rows($sql3) > 0)
            {
                $sql = "UPDATE user SET code='$newpinCode' WHERE phone= '$phone'";
    
                if (mysqli_query($conn, $sql)) {
                echo "success";
                } else {
                    echo "Error updating code: " . mysqli_error($conn);
                }
            }else
            {
                echo "Code incorrect!";
            }    
    }
    else{
        echo "Code or Phone number incorrect.";
    }
    
}else
{
    echo "Please fill all the input data";
}

?>