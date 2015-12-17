<?php
include 'QuestionDB.php';
session_start();
echo "user: test@testcompany.com <br>";
$hash = hash('sha256', "Password123test@testcompany.com");
echo "password: ".$hash."<br>";

$return = QuestionDB::auth("test@testcompany.com", "051ac8da1184fe0f635d6333d5609698333cc403b09074e905105b1a20b122dc");
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
