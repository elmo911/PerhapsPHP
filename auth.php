<?php
  session_start();
  if($_SESSION['submitted'] == 1){
    echo "session = 1";
  }
  else{
    echo "session = 0";
  }
?>
