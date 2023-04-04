// Get a reference to the form and add a submit event listener
var form = document.getElementById("transaction-form");
form.addEventListener("submit", function(event) {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get the form data
  var receiverId = document.getElementById("phone-number").value;
  var amount = document.getElementById("money").value;

  // Send an AJAX request to the server to handle the transaction
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "send-money.php");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Display a success message to the user
        alert(xhr.responseText);
      } else {
        // Display an error message to the user
        alert("Error: " + xhr.statusText);
      }
    }
  };
  xhr.send("receiver_id=" + receiverId + "&amount=" + amount);
});
