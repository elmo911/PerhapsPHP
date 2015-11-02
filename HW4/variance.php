<?php
  include "classVar.php";
  $myVar = new classVar();
  $sample = array(13, 14, 30, 3, 18, 18, 50, 20);
  $myVar->printVar($sample);

  $sample1 = array(1, 1, 0, 1, 1, 1, 0, 0);
  $sample2 = array(0, 1, 0, 1, 0, 1, 0, 1);
  $sample3 = array(1, 0, 1, 1, 0, 1, 0, 0);
  $sample4 = array(1, 0, 1, 0, 1, 0, 1, 1);
  $population = array($sample1, $sample2, $sample3, $sample4);

  echo 'Samples:<br>
    Sample 1 = 1, 1, 0, 1, 1, 1, 0, 0<br>
    Sample 2 = 0, 1, 0, 1, 0, 1, 0, 1<br>
    Sample 3 = 1, 0, 1, 1, 0, 1, 0, 0<br>
    Sample 4 = 1, 0, 1, 0, 1, 0, 1, 1<br>
  ';
  $myVar->findPopulationSD($population);
 ?>
