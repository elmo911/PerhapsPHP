<?php
  $sample = array(13, 14, 30, 3, 18, 18, 50, 20);

  $mean = 0;
  $N = count($sample);

  for($i=0; $i < $N; $i++){
    $mean += $sample[$i];
  }
  $mean = $mean / $N;

  $summation = 0;
  for($i=0; $i < $N; $i++){
    $num = ($mean - $sample[$i]);
    $num = pow($num, 2);
    $summation += $num;
  }

  $result = (1/$N) * $summation;
  $corResult = (1/($N-1)) * $summation;

  echo "Sample: 13, 14, 30, 3, 18, 18, 50, 20 <br>";
  echo "Mean X: ".$mean."<br>";
  echo "N: ".$N."<br>";
  echo "Result: ".$result."<br>";
  echo "Result: ".$corResult;
 ?>
