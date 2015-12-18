<?php
include 'addclass.php';
session_start();

echo '
<html>
  <head>
    <title>Add Page</title>
  </head>
  <body>
    <p>
      Set/change CompanyID
    </p>
    <form class="" action="addDB.php" method="post">
      <input type="text" name="ADDID" value="">
      <input type="submit" name="submit" value="Submit">
    </form>
';

      if(isset($_POST["ADDID"])){
        $_SESSION["ADDID"] = $_POST["ADDID"];
      }
      $id = $_SESSION["ADDID"];
      echo "<p>Current CompanyID is "+ $id +"</p>";
      if(isset($id)){
        echo "<p>Current CompanyID is "+ $_SESSION["ADDID"] +"</p>";
        $addclass = new AddToDB($_SESSION["ADDID"]);
        echo "<p>Current Company Name is " + $addclass->companyName() + "</p>";
        echo $addclass->listDB();
      }


echo '
  </body>
</html>';

?>
