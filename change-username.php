<?php 
include_once "config.php";
session_start();

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $user_id = $_SESSION['user_id'];
    $pinCode = mysqli_real_escape_string($conn, $_POST['digit1'] . $_POST['digit2'] . $_POST['digit3'] . $_POST['digit4']);


    if(!empty($lastname) && !empty($firstname) && !empty($pinCode))
{
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$user_id' AND code = '$pinCode'");
    if((mysqli_num_rows($sql) > 0))
    {
                $sql = "UPDATE user SET firstname ='$firstname' WHERE user_id= '$user_id'";
    
                if (mysqli_query($conn, $sql)) {
                    $sql2 = "UPDATE user SET lastname ='$lastname' WHERE user_id= '$user_id'";

                    if(mysqli_query($conn, $sql2))
                    {
                        echo "success";
                    }
                    else {
                    echo "Error updating name: " . mysqli_error($conn);
                }
            }

    }
    else{
        echo "Code incorrect.";
    }
    
}else
{
    echo "Please fill all the input data";
}

?>