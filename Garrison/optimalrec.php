<?php
  include "garrisonsmath.php";

  $gmath = new GarrisonsMath();

  $gmath->printRecPage();
  $gmath->printXYDrawForm();
  if(key_exists("x",$_POST) && key_exists("y",$_POST)){

  }
  $gmath->printGuessDrawForm();
  if(key_exists("parameter_g",$_POST)){

  }
  $gmath->printOptimizedForm();
  if(key_exists("parameter",$_POST)){

  }
  $gmath->printEnd();
 ?>
