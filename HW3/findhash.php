<?php
include 'login-class.php';

$password = "Password123";

$login = new Login();

echo $login->saltPassword($password);

 ?>
