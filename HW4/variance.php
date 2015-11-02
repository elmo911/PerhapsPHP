<?php
  include "classVar.php";
  $myVar = new classVar();
  $sample1 = array(13, 14, 30, 3, 18, 18, 50, 20);
  $myVar->printVar($sample1);

  $sample2 = array(23, 11, 38, 8, 14, 19, 40, 10);
  $sample3 = array(19, 15, 28, 1, 12, 13, 20, 70);
  $sample4 = array(33, 24, 20, 6, 28, 28, 52, 13);
  $population = array($sample1, $sample2, $sample3, $sample4);

  echo 'Samples:<br>
    Sample 1 = 13, 14, 30, 3, 18, 18, 50, 20<br>
    Sample 2 = 23, 11, 38, 8, 14, 19, 40, 10<br>
    Sample 3 = 19, 15, 28, 1, 12, 13, 20, 70<br>
    Sample 4 = 33, 24, 20, 6, 28, 28, 52, 13<br>
  ';
  $myVar->findPopulationSD($population);
 ?>
