<?php

echo "<html>";
echo "<body";

$dbConn = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=jwolfe.accdb");

$sql = "insert into person Values('123457', 'George', 'E', 44)";

$rs_person = $dbConn->exec($sql);

echo $rs_person;
echo "</body";
echo "</html>";
 ?>
