// Retrieve data from form 1
if (isset($_POST['input1'])) {
  $input1 = $_POST['input1'];
  // Insert data into database entity
  $sql = "INSERT INTO my_table (input1) VALUES ('$input1')";
  // ...
  echo "Thank you for submitting Form 1 and Form 2!";
}

// Retrieve data from form 2
if (isset($_POST['input2'])) {
  $input2 = $_POST['input2'];
  // Insert data into database entity
  $sql = "INSERT INTO my_table (input2) VALUES ('$input2')";
  // ...
  echo "Thank you for submitting Form 1 and Form 2!";
}
