<?php
  $sample = array(13 , 14, 30, 3, 18, 18, 50, 20);
  $mean = 0;
  $result = 0;
  $N = count($sample);
  for($i=0; $i < $N; $i++){
    $mean += $sample[$i];
  }
  $mean = $mean / $N;

  $summation = 0;
  for($i=0; $i < $N; $i++){
    $summation += ($mean - $sample[$i])^2;
  }

  $result = (1/$N) * $summation;

  echo $result;
 ?>
