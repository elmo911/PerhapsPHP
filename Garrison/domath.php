<?php
include 'garrisonsmath.php';

$func= new GarrisonsMath();


$func->printDoMathPage();
if(!empty($_POST)){

  $x = $_POST["x"];
  $h = $_POST["h"];

  $before = ($func->mathstuff($x+$h) - $func->mathstuff($x)) / $h;

  echo "before (((x+h)^2 + 7(x+h) + 2) - (x^2 + 7x + 2)) / h: = ".$before;

  echo "<br>after (2x + h  + 7): = ".($func->simple($x,$h));
}


 ?>
