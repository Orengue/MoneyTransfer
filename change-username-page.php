<!DOCTYPE html>
<html>
<head>
	<title>Change name page</title>
</head>
<body>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Cormorant+Garamond:ital,wght@0,400;1,300;1,400&family=Lobster&family=Lora:ital,wght@0,600;0,700;1,400;1,500;1,700&family=Montserrat:wght@100;200;300;400;500;600;700;900&family=Poppins:wght@100;200;300;400;500;600;900&family=Quicksand:wght@300;400;500;600;700&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&display=swap" rel="stylesheet">
	
    <div class="wrapper">
            <section class="form change-name">
                <header>Change Name Page</header>
                <form action="#">
                  <div class="error-txt"></div>

                  <div class="field" >
                    <label for="first-name">New First Name:</label>
                    <input type="text" placeholder="First Name" id="first-name" name="firstname" required><br>
      
                    <label for="last-name">New Last Name:</label>
                    <input type="text" placeholder ="Last Name" id="last-name" name="lastname" required><br>
      
                  </div>
                  
                  <div class="four-digits">
                    <h1>Enter your four digits CODE</h1>
                      <div class="digits-box">
                        <input name="digit1" type="text" maxlength="1" required>
                        <input name="digit2" type="text" maxlength="1" required>
                        <input name="digit3" type="text" maxlength="1" required>
                        <input name="digit4" type="text" maxlength="1" required>
                      </div>
                  </div>

                  <div class="submit">
                    <input type="submit" value="Change">
                  </div>

                </form>

                <div class="link"> 
                  <a href="main.php">Home page</a>
                </div>
            </section>  
    </div>
    





    <script src="change-username.js"></script>

    <script>
      
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
