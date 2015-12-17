<?php

echo "user: test@testcompany.com <br>";
$hash = hash('sha256', "Password123test@testcompany.com");
echo "password: ".$hash;

if(isset($_POST)){
  $CompanyName = $_POST("CompanyName");
  $password = $_POST("password");

  
}

?>
