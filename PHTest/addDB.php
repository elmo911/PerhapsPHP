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
      <select name="ADDID">';
      echo $addclass->companyOptions();
      echo '
      </select>
      <input type="submit" name="submit" value="Submit">
    </form>

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
';

  if(isset($_POST["CSActivityID"]) && isset($_POST["CSQuestionID"]) && isset($_POST["CSAnswerID"])){
    $addclass->addCompanyQuestionSet($id, $_POST["CSActivityID"], $_POST["CSQuestionID"], $_POST["CSAnswerID"]);
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

  echo $addclass->listDB();



echo '
  </body>
</html>';

?>
