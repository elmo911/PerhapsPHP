<?php
  session_start();
  if($_SESSION['submitted'] == 1){
    $_SESSION['submitted'] = 0;
    echo "session = 1";
    echo "User: ".$_POST["user"];
    echo "Password: ".$_POST["pass"];
  }
  else{
    $_SESSION['submitted'] = 1;
    echo "session = 0";
    echo "session = 1";
    echo "User: ".$_POST["user"];
    echo "Password: ".$_POST["pass"];
  }
?>
