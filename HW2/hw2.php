
<?php
include 'moremathfunctions.php';
include 'mathfuntion.php';

$aMath = new mathfuntion();
echo "<p>mathfuntion class function addthem(4, 6) = ".$aMath->addthem(4, 6)."</p>";

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

if(!empty($_POST)){


$Grid = new dGrid();
}
?>
