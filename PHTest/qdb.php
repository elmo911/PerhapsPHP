<?php
$servername = "158.69.203.77";
$username = "remote";
$dbpw = "puIe2ohji1Hw1oQCqix76EXs4";

try {
    $conn = new PDO("mysql:host=$servername;dbname=QuestionDB", $username, $dbpw);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }
?>
