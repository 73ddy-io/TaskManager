<?php
session_start();

include_once "GlobalVariables.php";

$logname_err = $password_err = "";
date_default_timezone_set('Europe/Samara');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

  $logname = trim($_POST['logname']);
  $password = trim($_POST['logpassword']);

  if (empty($logname)){
      $logname_err = "Username is empty.";
  } else {
    if ($query = $conn->prepare("SELECT * FROM users WHERE username = ?")) {
      // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
      $query->bind_param('s', $logname);
      $query->execute();
      // Store the result so we can check if the account exists in the database.
      $query->store_result();
      if ($query->num_rows == 0){
        $logname_err = "Username does not exists.";
      } 
    }
  }

  if (empty($password) && empty($logname_err)){

    $password_err = "Password is empty.";

  } elseif (strlen($password) < 5 && empty($logname_err)){

    $password_err = "Too short password.";
    
  } else {
    if ($stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?")){
      $stmt->bind_param("ss", $logname, $password);
      try {
        $stmt->execute();
      } catch (mysqli_sql_exception $e) {
        echo "Error: ".$e->getMessage();
      }
      // Store the result so we can check if the account exists in the database.
      $stmt->store_result();
      if ($stmt->num_rows == 0 && empty($logname_err)) {
          $password_err = "Password is incorrect";
      }
     
    }
  }
  

  if (empty($logname_err) && empty($password_err)) {
      $_SESSION['auth'] = true;
      header("Location: MainPage.php");
  }else{
      $_SESSION['auth'] = false;
  }
  session_write_close();
//$query->close();
//$insertQuery->close();
// Close connection
//mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Task Manager</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/LoginPage.css"/>
  </head>
  <body>
    <div class="form-container">
      <h2>Login</h2>
      <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="logname">

        <label for="password">Password:</label>
        <input type="password" id="password" name="logpassword">

        <div class="alert">
          <?php 
            echo $logname_err." ".$password_err;
          ?>
        </div>

        <input type="submit" value="Submit" name="submit">

        <div class="regloglink">
          Don't have an account yet? <a href="RegisterPage.php">Register here</a>
        </div>
      </form>
    </div>
  </body>
</html>