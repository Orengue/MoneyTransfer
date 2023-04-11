<!DOCTYPE html>
<html>
<head>
	<title>Delete account page</title>
</head>
<body>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Cormorant+Garamond:ital,wght@0,400;1,300;1,400&family=Lobster&family=Lora:ital,wght@0,600;0,700;1,400;1,500;1,700&family=Montserrat:wght@100;200;300;400;500;600;700;900&family=Poppins:wght@100;200;300;400;500;600;900&family=Quicksand:wght@300;400;500;600;700&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300&display=swap" rel="stylesheet">
	
    <div class="wrapper">
            <section class="form delete-account">
                <header>Delete account Page</header>
                <form action="#">
                  <div class="error-txt"></div>

                <p style="text-align: center;padding:20px;font-size:17px">Do you really want to delete your account? Your money will go bye-bye.</p>

                  <div class="four-digits">
                    <h1>Enter your four digits CODE</h1>
                      <div class="digits-box">
                        <input name="digit1" type="text" maxlength="1" required>
                        <input name="digit2" type="text" maxlength="1" required>
                        <input name="digit3" type="text" maxlength="1" required>
                        <input name="digit4" type="text" maxlength="1" required>
                      </div>
                  </div>
                  
                  <div style="text-align: center;padding: 30px">
                  <input type="checkbox" id="checkbox" name="checkbox" value="Delete">
                  <label for="checkbox">Select this if you want to delete your account.</label>
                  </div>
                  
                  <div class="submit">
                    <input type="submit" value="Delete">
                  </div>

                </form>

                <div class="link"> 
                  <a href="main.php">Home page</a>
                </div>
            </section>  
    </div>
    





    <script src="delete-account.js"></script>

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

    </script>
    
	

</body>
</html>
