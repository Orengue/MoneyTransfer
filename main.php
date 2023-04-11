<?php
session_start();
if(!isset($_SESSION['user_id'])){
	header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="style2.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Changa+One&family=Montserrat:wght@100;200;300;400;500;600;700;900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet"><meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
		<section class="user-page" id="user-page">
			<div class="user-board">
				<h1 id="home-view">milky</h1>
				<p id="send-money">Send money</p>	
				<p id="transaction-history">View transactions history</p>
				<p><a href="logout.php">Logout</a></p>	
				<h3>Account Settings</h3>
				<p><a href="change-phone-number-page.php">Change Phone Number</a></p>	
				<p><a href="change-code-page.php">Change Code</a></p>	
				<p><a href="change-username-page.php">Change Username</a></p>	
				<p><a href="delete-account-page.php">Delete Account</a></p>	
			</div>

			<div class="user-info">
				<?php
					include_once "config.php";
					$sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id ={$_SESSION['user_id']}");
					if(mysqli_num_rows($sql) > 0){
						$row = mysqli_fetch_assoc($sql);
					}
				?>
				<div class="greetings">
					Hello <?php echo $row['firstname']?>!
				</div>
				<div class="user-balance">
					<p>Your current balance is : </p>
					<div class="balance"><?php echo $row['balance']?> FCFA</div>
				</div>
			</div>
			<div class="user-notifications">
				<h1>Notifications <i class="fas fa-bell"></i></h1>
				
				<div class="notifications">
					<?php include('notifications.php'); ?>
				</div>
			</div>
		</section>

		<section class="send-money-page" id="send-money-page">
		<?php
					include_once "config.php";
					$sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id ={$_SESSION['user_id']}");
					if(mysqli_num_rows($sql) > 0){
						$row = mysqli_fetch_assoc($sql);
					}
				?>
			<header>Send Money easily! There are no fees.</header>
			<div class="send-money-current">
				You have actually <?php echo $row['balance']?> FCFA
			</div>
			<form id = "transaction-form" action="#">
				<div class="error-txt"></div>
				<div class="field" >
                    <label for="phone-number">Receiver Phone Number:</label>
                    <input type="text" placeholder="Receiver Phone Number" id="phone-number" name="phonenumber" required><br>
                  </div>
				  <div class="field" >
                    <label for="phone-number">Money to send:</label>
                    <input type="text" placeholder="000 000 000 FCFA" id="money" name="money" required><br>
                  </div>
				  <div class="submit">
                    <input type="submit" value="Send">
                  </div>
			</form>
		</section>
		
		<section class="transactions-history-page" id="transactions-history-page">
			<header>See all your transactions so far</header>
			<?php include('transaction.php'); ?>
			  
		</section>
	</div>
	
	<script src="dropdown."></script>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<script src="send-money.js"></script>
	<script>
		document.getElementById("send-money").addEventListener("click", function() {
		  document.getElementById("send-money-page").scrollIntoView({ behavior: "smooth" });
		});

		document.getElementById("transaction-history").addEventListener("click", function() {
		  document.getElementById("transactions-history-page").scrollIntoView({ behavior: "smooth" });
		});
		document.getElementById("home-view").addEventListener("click", function() {
		  document.getElementById("user-page").scrollIntoView({ behavior: "smooth" });
		});
	  </script>
</body>
</html>