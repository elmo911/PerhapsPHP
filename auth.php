<?php
  include 'wordChangeClass.php';
  session_start();

  $changeWord = new ChangeWord();

  if($_SESSION['submitted'] == 1){
    $_SESSION['submitted'] = 0;
    echo "session = 1";
    echo "<br></br>User: ".$_POST["user"];
    echo "<br></br>Password: ".$_POST["pass"];
    echo "<br></br>Word change: ".$changeWord->toDog($count);
  }
  else{
    $_SESSION['submitted'] = 1;
    echo "session = 0";
    echo "<br></br>User: ".$_POST["user"];
    echo "<br></br>Password: ".$_POST["pass"];
  }
?>
