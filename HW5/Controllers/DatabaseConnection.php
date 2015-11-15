<?php
$host = "us-cdbr-azure-southcentral-e.cloudapp.net";
$user = "bee88cabb8989c";
$pwd = "6c27be67";
$db = "wolfesolutionsdb";
try {
    $dbConn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    $dbConn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $e){
    die(var_dump($e));
}
 ?>
