<?php
session_start();
// foreach(get_defined_vars() as $var){
//     echo var_dump($var) . '<br>';
// }

print '<pre>' . htmlspecialchars(print_r(get_defined_vars(), true)) . '</pre>';
$servers = $_SERVER;
?>