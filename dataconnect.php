<?php

echo "<html>";
echo "<body";

try {
  $dbConn = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=jwolfe.accdb");
} catch (PDOException $e) {
  echo "Failed to open DB: ".$e->getMessage()."\n";
}

/*
$sql = "insert into person Values('123457', 'George', 'E', 44)";

$rs_person = $dbConn->exec($sql);*/

echo $rs_person;
echo "</body";
echo "</html>";
 ?>
