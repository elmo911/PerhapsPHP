<?php
include 'garrisonsmath.php';

$func= new GarrisonsMath();

$x = 5;
$h = 3;

echo ($func->mathstuff($x+$h) - $func->mathstuff($x));

echo "<br>".($func->simple($x,$h));


 ?>
