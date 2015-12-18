<?php
include 'addclass.php';
session_start();

$auth = false;
$idSet = false;

echo '
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Page</title>
  </head>
  <body>';

  if(isset($_POST["Logout"])){
    session_unset();
  }

  if(isset($_POST["SQLUser"]) && isset($_POST["SQLPassword"])){
    $_SESSION["SQLUser"] = $_POST["SQLUser"];
    $_SESSION["SQLPassword"] = $_POST["SQLPassword"];
  }

  if(isset($_SESSION["SQLUser"]) && isset($_SESSION["SQLPassword"])){
    $auth = true;
    echo "<p>Current SQL User is ". $_SESSION["SQLUser"] ."</p>";
  }
  echo '
    <h3>
      Add SQL Login
    </h3>
    <form class="" action="addDB.php" method="post">
      <input type="text" name="SQLUser" value="" placeholder="SQL Username">
      <input type="password" name="SQLPassword" value="" placeholder="SQL Password">
      <input type="submit" name="submit" value="Login">
    </form>

    <h3>
      Add SQL Logout
    </h3>
    <form class="" action="addDB.php" method="post">
      <input type="submit" name="Logout" value="Logout">
    </form>

    <h3>
      Set/change CompanyID
    </h3>
    ';
    if(isset($_POST["ADDID"])){
      $_SESSION["CurCompanyID"] = $_POST["ADDID"];
    }
    if(isset($_SESSION["CurCompanyID"])){
      $idSet = true;
      echo "<p>Current CompanyID is ". $_SESSION["CurCompanyID"] ."</p>";
      $addclass = new AddToDB($_SESSION["CurCompanyID"]);
      echo "<p>Current Company Name is " . $addclass->companyName() . "</p>";

      if($auth){
        $addclass->setNewConn($_SESSION["SQLUser"], $_SESSION["SQLPassword"]);
      }
    }
    echo '
    <form class="" action="addDB.php" method="post">
      <select name="ADDID">';
      echo AddToDB::companyOptions();
      echo '
      </select>
      <input type="submit" name="submit" value="Submit">
    </form>';

  if($idSet){
    echo '
    <h3>
      Add CompanyQuestionSet
    </h3>
    <form class="" action="addDB.php" method="post">
      <select name="CSActivityID">';
      echo $addclass->activityOptions();
      echo '
      </select>
      <select name="CSQuestionID">';
      echo $addclass->questionOptions();
      echo '
      </select>
      <select name="CSAnswerID">';
      echo $addclass->answerOptions();
      echo '
      </select>
      <input type="submit" name="submit" value="Submit">
    </form>

    <h3>
      Add Question
    </h3>
    <form class="" action="addDB.php" method="post">
      <input type="text" name="QuestionContent" value="" placeholder="Content">
      <select name="QuestionViewID">';
      echo $addclass->viewOptions();
      echo '
      </select>
      <input type="submit" name="submit" value="Submit">
    </form>

    <h3>
      Add Answer
    </h3>
    <form class="" action="addDB.php" method="post">
      <input type="text" name="AddAnswer" value="" placeholder="Answer">
      <input type="submit" name="submit" value="Submit">
    </form>

    <h3>
      Add Activity
    </h3>
    <form class="" action="addDB.php" method="post">
      <input type="text" name="AddActivity" value="" placeholder="Activity">
      <input type="submit" name="submit" value="Submit">
    </form>

    <h3>
      Add View
    </h3>
    <form class="" action="addDB.php" method="post">
      <input type="text" name="AddInputType" value="" placeholder="Input Type">
      <input type="text" name="AddResponseType" value="" placeholder="Expected Return Data Type">
      <input type="submit" name="submit" value="Submit">
    </form>
';
}
  if($auth && $idSet){
    if(isset($_POST["CSActivityID"]) && isset($_POST["CSQuestionID"]) && isset($_POST["CSAnswerID"])){
      $addclass->addCompanyQuestionSet($_SESSION["CurCompanyID"], $_POST["CSActivityID"], $_POST["CSQuestionID"], $_POST["CSAnswerID"]);
    }

    if(isset($_POST["QuestionContent"]) && isset($_POST["QuestionViewID"])){
      $addclass->addQuestion($_POST["QuestionContent"], $_POST["QuestionViewID"]);
    }

    if(isset($_POST["AddAnswer"])){
      $addclass->addAnswer($_POST["AddAnswer"]);
    }

    if(isset($_POST["AddActivity"])){
      $addclass->addActivity($_POST["AddActivity"]);
    }

    if(isset($_POST["AddInputType"]) && isset($_POST["AddResponseType"])){
      $addclass->addView($_POST["AddInputType"], $_POST["AddResponseType"]);
    }
  }

  if($idSet){
  echo $addclass->listDB();
  }


echo '
  </body>
</html>';

?>
