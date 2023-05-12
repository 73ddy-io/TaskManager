<?php
session_start();

if(empty($_SESSION['name'])){
    header('location.index.php');
}

if(!empty($_SESSION['name'])){
    $username = $_SESSION['name'];
}
?>

<center><h2>Welcome, <?php if(!empty($username)){ echo $username; }?> to the dashboard</h2></
center>
<center><h3><a href="logout.php">Logout</a></h3></center>