<?php
include 'qdb.php';

class QuestionDB
{
  public static function auth($email, $password)
  {
    $return["error"] = false;
    $return["message"] = "Login Success";
    $sql_select = "SELECT Email, Password
    From Company
    Where Email = ".$email."
    And Password = ".$password.";";
    $stmt = $conn->prepare($sql_select);
    $stmt->execute();
    $user = $stmt->fetch();
    if(isset($user)){
      $return["sessID"] = md5( uniqid('auth', true) );
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
