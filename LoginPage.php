<?php


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

  if (empty($password)){
    $password_err = "Password is empty.";
  } elseif (strlen($password) < 5){
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
      header("Location: WelcomePage.php");
  }        
  
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
    <style>
      body {
        background-color: #303030;
      }

      .form-container {
        background-color: #202020;
        border-radius: 10px;
        padding: 20px;
        width: 30%;
        margin: 0 auto;
        box-shadow: rgba(0, 0, 0, 0.75) 0px 6px 12px, rgba(0, 0, 0, 0.65) 0px 9px 20px;
        color: white;
        text-align: left;
      }

      .regloglink {
        text-align: center;
      }

      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 12px;
        border-radius: 5px;
        margin: 8px 0;
        box-sizing: border-box;
        border: 2px solid #151515;
        outline: none;
        font-size: 16px;
        color: #FFFFFF;
        background-color: #303030;
      }

      input[type="submit"] {
        width: 100%;
        background-color: #00ad5a;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease-out;
      }

      input[type="submit"]:hover {
        background-color: #2b874a;
      }

      .register-prompt {
        margin-top: 20px;
        font-size: 16px;
      }

      a {
        color: #00ad5a;
        text-decoration: none;
        background-color: transparent;
        transition: text-shadow 0.3s ease-out;
      }

      a:hover{
        text-shadow: #00ad5a 0px 0px 20px, #00ad5a 0px 0px 15px, #00ad5a 0px 0px 10px;
      }

      h2{
        margin-top: 0px;
        text-align: center;
      }

      .alert {
        text-align: center;
        color: #f8173e;
        height: 38px;
      }
    </style>
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