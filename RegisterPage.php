<?php


include_once "GlobalVariables.php";

$regname_err = $password_err = $confirm_password_err = "";
date_default_timezone_set('Europe/Samara');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

  $regname = trim($_POST['regname']);
  $password = trim($_POST['regpassword']);
  $confirm_password = trim($_POST["reg_confirm_password"]);
  $permission = "member";

  if (empty($regname)){
      $regname_err = "Username is empty.";
  } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $regname)){
      $regname_err = "Username can only contain letters, numbers, and underscores.";
  } else {
    if ($query = $conn->prepare("SELECT * FROM users WHERE username = ?")) {
      // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
      $query->bind_param('s', $regname);
      $query->execute();
      // Store the result so we can check if the account exists in the database.
      $query->store_result();
      if ($query->num_rows > 0) {
        $regname_err = "Username already exists.";
      }
    }
  }

  if (empty($password)){
    $password_err = "Password is empty.";
  } elseif (strlen($password) < 5){
    $password_err = "Too short password.";
  } 
    
  if (empty($confirm_password)){
    $confirm_password_err = "Confirm password is empty.";
  } elseif (empty($password_err) && $password != $confirm_password){
    $confirm_password_err = "Password doesnt match.";
  }

  if (empty($regname_err) && empty($password_err) && empty($confirm_password_err)) {
    $insertQuery = $conn->prepare("INSERT INTO users (username, password, permission, date_reg) VALUES (?, ?, ?, ?);");
    $insertQuery->bind_param("ssss", $regname, $password, $permission, date("Y-m-d H:m:s"));
    $result = $insertQuery->execute();
    if ($result) {
      header("Location: WelcomePage.php");
    }
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
        background-color: #8a2be2;
        color: white;
        padding: 14px 20px;
        margin: 20px 0px 8px 0px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease-out;
      }

      input[type="submit"]:hover {
        background-color: #7019c2;
      }

      .register-prompt {
        margin-top: 20px;
        font-size: 16px;
      }

      a {
        color: #8a2be2;
        text-decoration: none;
        background-color: transparent;
        transition: text-shadow 0.3s ease-out;
      }

      a:hover{
        text-shadow: #8b00ff 0px 0px 20px, #8b00ff 0px 0px 15px, #8b00ff 0px 0px 10px;
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
      <h2>Register</h2>
      <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="regname">

        <label for="password">Password:</label>
        <input type="password" id="password" name="regpassword">

        <label for="password">Confirm password:</label>
        <input type="password" id="comfirmpassword" name="reg_confirm_password">
        

        <div class="alert">
          <?php 
            echo $regname_err." ".$password_err." ".$confirm_password_err;
          ?>
        </div>
        <input type="submit" value="Submit" name="submit">

        <div class="regloglink">
          Already have an account? <a href="LoginPage.php">Login here</a>
        </div>
      </form>
      
    </div>
  </body>
</html>



