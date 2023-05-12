<?php
    session_start(); 
    
    // var_dump($_SESSION['auth']);
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/Main.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Task Manager</title>
    </head>
    <body>
        <div class="main-access-denied">
            <div class="alert-access-denied">
                <p class="text-access-denied">
                    Access denied!
                </p>
                <span class="link-access-denied">
                    You may <a href="RegisterPage.php" class="reg-link">register</a> or <a href="LoginPage.php" class="log-link">login</a>
                </span>
            </div>
        </div>
        <!-- <div class="overlay"></div> -->
        <script src = "script.js"></script>
    </body>
    </html>