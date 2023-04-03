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
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
		<section class="user-page">
			<div class="user-board">
				<h1>User Board</h1>
				<p id="send-money">Send money</p>	
				<p id="transaction-history">View transactions history</p>
				<p>Log-out</p>	
				<h3>Account Settings</h3>
				<p>Change Phone Number</p>	
				<p>Change Code</p>	
				<p>Change Username</p>	
				<p>Delete Account</p>	
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
					Hello <?php echo $row['firstname'] . " " . $row['lastname']?>!
				</div>
				<div class="user-balance">
					<p>Your current balance is : </p>
					<div class="balance"><?php echo $row['balance']?> FCFA</div>
				</div>
			</div>
			<div class="user-notifications">
				<h1>Notifications</h1>
				<div class="notifications">
					<p>You have received 0 FCFA from 55 55 55 55 55</p>
					<p>You have sent 0 FCFA to 55 55 55 55 55</p>
					<p>You have received 0 FCFA from 55 55 55 55 55</p>
					<p>You have received 0 FCFA from 55 55 55 55 55</p>
				</div>
			</div>
		</section>

		<section class="send-money-page" id="send-money-page">
			<header>Send Money easily! There is no fee.</header>
			<div class="send-money-current">
				You have actually <?php echo $row['balance']?> FCFA
			</div>
			<form action="#">
				<div class="field" >
                    <label for="phone-number">Receiver Phone Number:</label>
                    <input type="tel" pattern="\d{2} \d{2} \d{2} \d{2} \d{2}" placeholder="Receiver Phone Number" id="phone-number" name="phonenumber" required><br>
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
			<table>
				<thead>
				  <tr>
					<th>Date</th>
					<th>Transaction Type</th>
					<th>Amount</th>
					<th>Phone Number</th>
					<th>Transaction ID</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td>2023-03-28</td>
					<td>Received</td>
					<td>$100.00</td>
					<td>123-456-7890</td>
					<td>ABC123</td>
				  </tr>
				  <tr>
					<td>2023-03-29</td>
					<td>Sent</td>
					<td>$50.00</td>
					<td>987-654-3210</td>
					<td>DEF456</td>
				  </tr>
				  <tr>
					<td>2023-03-30</td>
					<td>Received</td>
					<td>$75.00</td>
					<td>555-123-4567</td>
					<td>GHI789</td>
				  </tr>
				  <!-- Add more rows as needed -->
				</tbody>
			  </table>
			  
		</section>
	</div>



	<script>
		document.getElementById("send-money").addEventListener("click", function() {
		  document.getElementById("send-money-page").scrollIntoView({ behavior: "smooth" });
		});

		document.getElementById("transaction-history").addEventListener("click", function() {
		  document.getElementById("transactions-history-page").scrollIntoView({ behavior: "smooth" });
		});
	  </script>
</body>
</html>