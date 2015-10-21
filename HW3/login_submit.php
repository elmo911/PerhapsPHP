<?php
include "login-class.php";
session_start();
if(!empty($_POST)){

  $username = $_POST["username"];
  $password = $_POST["password"];

  echo $_POST["username"];
  echo $_POST["password"];

  $login = new Login();
  $loginresult = $login->logintodb($username, $password);

  if(array_key_exists("error",$loginresult)){
    echo $loginresult['error'];
  }
  else{
    $_SESSION['user'] = $loginresult;
  }
}



 ?>
