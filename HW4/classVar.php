<?php
/**
 *
 */
class classVar
{
public function printVar($sample){
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
    $num = $num * $num;
    $summation += $num;
  }

  $result = (1/$N) * $summation;
  $corResult = (1/($N-1)) * $summation;

  echo "Sample: 13, 14, 30, 3, 18, 18, 50, 20 <br>";
  echo "Mean X: ".$mean."<br>";
  echo "N: ".$N."<br>";
  echo "Result: ".$result."<br>";
  echo "Result (biased-corrected): ".$corResult;
}

private function findP($sample){
  $N = count($sample);
  $P = 0;
  for($i=0; $i < $N; $i++){
    $P += $sample[$i];
  }
  $P = $P/$N;
  return $P;
}

private function findPBar($population){
  $M = count($population);
  $PBar = 0;
  for($i=0; $i < $M; $i++){
    $PBar += $this->findP($population[$i]);
  }
  $PBar = $PBar/$M;
  echo "Population P Bar = ".$PBar."<br>";
  return $PBar;
}

public function findPopulationVar($population){
  $N = count($population);
  $PBar = $this->findPBar($population);
  $var = (1 - $PBar);
  $var = $PBar * $var;
  $var = $var / $N;
  echo "Population Variance = ".$var."<br>";
  return $var;
}

public function findPopulationSD($population){
  $var = $this->findPopulationVar($population);
  $SD = sqrt($var);
  echo "Population Standard Deviation  = ".$SD."<br>";
  return $SD;
}

}


 ?>
