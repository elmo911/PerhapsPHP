<?php
include "login-class.php";
session_start();
if(key_exists("user", $_SESSION)){
  $user = $_SESSION["user"];
  echo "<h2> Error: ".$user['fname']." ".$user['lname']." already logged in</h2>";
}

else if(!empty($_POST)){

  $username = $_POST["username"];
  $password = $_POST["password"];

  echo "<p> Username: ".$_POST["username"]."</p>";
  echo "<p> Password: ".$_POST["password"]."</p>";

  $login = new Login();
  echo "<p> Hashed Password: ".$login->saltPassword($password)."</p>";
  $loginresult = $login->logintodb($username, $password);

  if(array_key_exists("error",$loginresult)){
    echo $loginresult['error'];
  }
  else{
    $_SESSION['user'] = $loginresult;
    echo "<h2>Welcome ".$loginresult['fname']." ".$loginresult['lname']."</h2>";
  }
}

else{

  echo "<h2>Please fill in form</h2>";
}



 ?>
