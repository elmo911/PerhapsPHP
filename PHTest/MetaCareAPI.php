<?php
include 'QuestionDB.php';
session_start();
echo "user: test@testcompany.com <br>";
$hash = hash('sha256', "Password123test@testcompany.com");
echo "password: ".$hash."<br>";
$DB = new QuestionDB();
$return = $DB->auth("test@testcompany.com", 'ajhahjhjvc');
if($return["error"]){
  echo "ERROR|".$return["message"];
}
else{
  $_SESSION["Company"] = $return["Company"];
  echo "SESSION|Welcome ";
}


// Required field names
$required = array('email', 'password');

// Loop over field names, make sure each one exists and is not empty
$proceed = false;
if (isset($_POST['email']) && isset($_POST['password'])){
  $return = QuestionDB::auth($_POST['email'], $hash);
  if($return["error"]){
    echo "ERROR|".$return["message"];
  }
  else{
    $_SESSION["Company"] = $return["Company"];
    echo "SESSION|Welcome ".var_dump($return["Company"]);
  }
}

if($proceed){
  //

}

?>
