<?php
include 'login.php'

$password = "Password123";

$login = new Login();

echo $login->saltPassword($password);

 ?>
