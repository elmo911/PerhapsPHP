<?php
include 'QuestionDB.php';
session_start();

$_POST['email'] = "test@testcompany.com";
$_POST['password'] = $hash;
// Required field names
$required = array('email', 'password');
// Loop over field names, make sure each one exists and is not empty
$proceed = false;
if (isset($_POST['email']) && isset($_POST['password'])){
  $return = QuestionDB::auth($_POST['email'], $_POST['password']);
  if($return["error"]){
    echo "ERROR|".$return["message"]."|";
  }
  else{
    $_SESSION["Company"] = $return["Company"];
    echo "AUTH SUCCESS|";
  }
}
else if (isset($_SESSION["Company"])){
  echo "AUTH SUCCESS|";
  $proceed = true;
}

if($proceed){

echo "Welcome ".$_SESSION["Company"]["Name"];
}
else {
  echo "ERROR|Authentication Failed|";
}

?>
