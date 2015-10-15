<?php

  /**
   *
   */
  class GarrisonsMath
  {

    public function mathstuff($x){
      return ($x^2 + 7*$x + 2);
    }

    public function simple($x, $h){
      return (2*$x + $h  + 7);
    }

    public function print(){
      echo'
      <html>
      <head>
      <Title>Registration Form</Title>
      <style type="text/css">
          body { background-color: #fff; border-top: solid 10px #000;
              color: #333; font-size: .85em; margin: 20; padding: 20;
              font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
          }
          h1, h2, h3,{ color: #000; margin-bottom: 0; padding-bottom: 0; }
          h1 { font-size: 2em; }
          h2 { font-size: 1.75em; }
          h3 { font-size: 1.2em; }
          table { margin-top: 0.75em; }
          th { font-size: 1.2em; text-align: left; border: none; padding-left: 0; }
          td { padding: 0.25em 2em 0.25em 0em; border: 0 none; }
      </style>
      </head>
      <body>
      <h1>Groups you are signed up for</h1>
      <p>Fill in your name and email address, then click <strong>Submit</strong> to register.</p>
      <form method="POST" action="signup.php" enctype="multipart/form-data">
      <input type="text" name="x" id="x">
      <input type="text" name="h" id="h">
      <input type="submit" name="submit" value="Submit">
      </form>
      </body>
      </html>';
    }
  }

 ?>
