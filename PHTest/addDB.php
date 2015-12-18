<?php
echo '
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
      include 'addclass.php';
      session_start();

      if(isset($_POST["ADDID"])){
        $_SESSION["ADDID"] = $_POST["ADDID"];
      }

      if(isset($_SESSION["ADDID"])){
        echo "<p>Current CompanyID is "+$_SESSION["ADDID"]+"</p>";
        $addclass = new AddToDB($_SESSION["ADDID"]);
        echo "<p>Current Company Name is " + $addclass->companyName() + "</p>";
        echo $addclass->listDB();
      }


echo '
  </body>
</html>';

?>
