<?php
  $count = 0;
  $ar = array();

  while ($count < 3){
    echo $count;
    $ar[$count] = $count;
    $count++;
  }

  do {
    echo "<br></br>Doing ".$count;
    $count++;
    $ar[$count] = $count;
  } while ($count <= 10);

  foreach ($ar as $num) {
    echo "<br></br>array: ".$num;
  }
 ?>
