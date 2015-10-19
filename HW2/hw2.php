
<?php
include 'moremathfunctions.php';
include 'mathfunction.php';

// Print a stylish html page
echo'
<html>
<head>
<Title>Homework 2</Title>
<style type="text/css">
    body { background-color: #fff; border-top: solid 10px #000;
        color: #333; font-size: .85em; margin: 20; padding: 20;
        font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
    }
    h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
    h1 { font-size: 2em; }
    h2 { font-size: 1.75em; }
    h3 { font-size: 1.2em; }
    table { margin-top: 0.75em; }
    th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
    td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
</style>
</head>
<body>';

echo '<h2>mathfunction Class</h2>';
$aMath = new mathfunction();
echo "<p>mathfuntion class function addthem(4, 6) = ".$aMath->addthem(4, 6)."</p>";

echo '<h2>moremath Class</h2>';
$myarray = array();
$myarray[0] = 10;
$myarray[1] = 20;
$myarray[2] = 15;
$myarray[3] = 5;

$myMath = new moremath();
echo "<p> moremath class extended function addthem(3, 6) = ".$myMath->addthem(3,6)."</p>";
echo '<p>Create an array with the following properties:
$myarray = array();
$myarray[0] = 10;
$myarray[1] = 20;
$myarray[2] = 15;
$myarray[3] = 5;</p>';

echo '<p> moremath class function sumarray($myarray) = '.$myMath->sumarray($myarray).'</p>';

echo '<h2>dGrid Class</h2>';

$Grid = new dGrid();
$Grid->printForm();
if(!empty($_POST)){



}

echo '
</body>
</html>';
?>
