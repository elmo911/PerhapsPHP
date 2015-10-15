<?php
include 'garrisonsmath.php';

$func= new GarrisonsMath();

$x = 5;
$h = 3;

$before = ($func->mathstuff($x+$h) - $func->mathstuff($x)) / $h;

$func->printPage();

echo "before: ".$before;

echo "<br>after ".($func->simple($x,$h));


 ?>
