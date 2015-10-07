<?php
include 'conntodb.php';

$sql = "SELECT userid, name, email FROM acsm_0e7ddff7b7d920f.user_tbl"

try {
  $user_tbl = $connDB->prepare($sql);
  $connDB->execute();
} catch (PDOException $e) {
  
}

while($row = $user_tbl->fetch()){
  echo $row['userid']." ";
  echo $row['name']." ";
  echo $row['email']." ";
}

 ?>
