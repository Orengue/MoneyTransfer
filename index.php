<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
<link rel="stylesheet" href="style3.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Cormorant+Garamond:ital,wght@0,400;1,300;1,400&family=Lobster&family=Lora:ital,wght@0,600;0,700;1,400;1,500;1,700&family=Montserrat:wght@100;200;300;400;500;600;700;900&family=Poppins:wght@100;200;300;400;500;600;900&family=Quicksand:wght@300;400;500;600;700&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&display=swap" rel="stylesheet">
	
  <div class="welcome" id="welcome">
    <h1>Akwaba to</h1>
    <p class="milk-logo">milky <img src="imgs/bottle.png" alt=""></p>
    <p class="milk-citation">milky transfer money: Tu as tout le lait.</p>
  </div>
    <div class="wrapper">
            <section class="form signup">
                <header>Sign Up Page</header>
                <form action="#">
                  <div class="error-txt"></div>

                  <div class="field" >
                    <label for="first-name">First Name:</label>
                    <input type="text" placeholder="First Name" id="first-name" name="firstname" required><br>
      
                    <label for="last-name">Last Name:</label>
                    <input type="text" placeholder ="Last Name" id="last-name" name="lastname" required><br>
      
                    <label for="phone-number">Phone Number:</label>
                    <input type="tel" maxlength="16" pattern="\d{2} \d{2} \d{2} \d{2} \d{2}" placeholder="Phone Number" id="phone-number" name="phonenumber" required><br>

                  </div>
                  
                  <div class="four-digits">
                    <h1>Create your four digits CODE</h1>
                      <div class="digits-box">
                        <input name="digit1" type="text" maxlength="1" required>
                        <input name="digit2" type="text" maxlength="1" required>
                        <input name="digit3" type="text" maxlength="1" required>
                        <input name="digit4" type="text" maxlength="1" required>
                      </div>
                  </div>

                  <div class="submit">
                    <input type="submit" value="Register">
                  </div>

                </form>

                <div class="link">
                  Already signed up? 
                  <a href="login.php">Login here</a>
                </div>
            </section>  
    </div>
    





    <script src="signup.js"></script>

    <script>




window.addEventListener('load', function() {
  // Get the welcome message element
  var welcomeMsg = document.getElementById('welcome');

  // Hide the welcome message after 3 seconds
  setTimeout(function() {
    welcomeMsg.classList.add('hidden');
  }, 3000); // 3000 milliseconds = 3 seconds
});
      
      // Your JavaScript code goes here
      const inputFields = document.querySelectorAll('.four-digits input[type="text"]');
      for (let i = 0; i < inputFields.length; i++) {
        inputFields[i].addEventListener('keyup', function(event) {
          const currentInput = event.target;
          const currentInputValue = currentInput.value;
          const currentInputIndex = Array.prototype.indexOf.call(inputFields, currentInput);
          if (currentInputValue.length === currentInput.maxLength) {
            if (currentInputIndex !== inputFields.length - 1) {
              inputFields[currentInputIndex + 1].focus();
            } else {
              currentInput.blur();
            }
          }
        });
      }



      const phoneInput = document.getElementById('phone-number');
phoneInput.addEventListener('input', function(event) {
  const inputValue = event.target.value.replace(/\D/g, ''); // Remove any non-numeric characters
  const formattedValue = formatPhoneNumber(inputValue); // Format the phone number
  event.target.value = formattedValue; // Set the input value to the formatted phone number
});

function formatPhoneNumber(value) {
  const cleaned = ('' + value).replace(/\D/g, ''); // Remove any non-numeric characters
  const match = cleaned.match(/^(\d{2})(\d{0,2})(\d{0,2})(\d{0,2})(\d{0,2})$/);
  if (match) {
    return [match[1], match[2], match[3], match[4], match[5]].filter(Boolean).join(' ');
  }
  return value;
}

    </script>
    
	

</body>
</html>
