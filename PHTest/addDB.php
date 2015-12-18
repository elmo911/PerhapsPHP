<?php
include 'addclass.php';
session_start();



echo '
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Page</title>
  </head>
  <body>
    <h3>
      Set/change CompanyID
    </h3>
    ';
    if(isset($_POST["ADDID"])){
      $_SESSION["ADDID"] = $_POST["ADDID"];
    }
    $id = $_SESSION["ADDID"];
    if(isset($id)){
      echo "<p>Current CompanyID is ". $_SESSION["ADDID"] ."</p>";
      $addclass = new AddToDB($_SESSION["ADDID"]);
      echo "<p>Current Company Name is " . $addclass->companyName() . "</p>";
    }
    echo '
    <form class="" action="addDB.php" method="post">
      <input type="text" name="ADDID" value="" placeholder = "CompanyID">
      <input type="submit" name="submit" value="Submit">
    </form>
    <p>
      Add Question
    </p>
    <form class="" action="addDB.php" method="post">
      <input type="text" name="QuestionContent" value="" placeholder="Content">
      <select name="QuestionViewID">';
      echo $addclass->viewOptions();
      echo '
      </select>
      <input type="submit" name="submit" value="Submit">
    </form>
';


  echo $addclass->listDB();



echo '
  </body>
</html>';

?>
