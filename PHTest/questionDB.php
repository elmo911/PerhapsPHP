<?php


class QuestionDB
{
  public static function auth($email, $password)
  {
    include_once ("qdb.php");
    $return["error"] = false;
    $return["message"] = "Login Success";
    $sql_select = "SELECT CompanyID, Name, Email
    From Company
    Where Email = :email
    And Password = :password";
    $stmt = $conn->prepare($sql_select);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $Company = $stmt->fetch();
    if(isset($Company)){
      $return["sessID"] = md5( uniqid('auth', true) );
      $return["Company"] = $Company;
      echo $Company["Name"];
    }
    else{
      $return["error"] = true;
      $return["message"] = "Login Failed";
    }

    return $return;
  }
}



/*
$sql_select = "SELECT Question.Content As Question,
 Answer.Answer As Answer,
  View.WidgetType As AnswerInputType,
   View.ResponseType As ExpectedData
From CompanyQuestionSet, Company, Question, Answer, View, Activity
Where Company.Name = 'Test Company'
and CompanyQuestionSet.CompanyID = Company.CompanyID
and CompanyQuestionSet.ActivityID = Activity.ActivityID
and CompanyQuestionSet.QuestionID = Question.QuestionID
and CompanyQuestionSet.AnswerID = Answer.AnswerID
and Question.ViewID = View.ViewID";
$stmt = $conn->prepare($sql_select);
$stmt->execute();
while($row = $stmt->fetch()){
  echo $row["Question"].'<br>';
}
*/

 ?>
