<?php


class QuestionDB
{
  public static function auth($email, $password)
  {
    include_once ("qdb.php");
    $return["error"] = false;
    $return["message"] = "Login Success";
    try {
      $sql_select = "SELECT CompanyID, Name, Email, Password
      From Company";
      /*
      Where Email = :email
      And Password = :password*/
      $stmt = $conn->prepare($sql_select);
      //$stmt->bindParam(':email', $email, PDO::PARAM_STR);
      //$stmt->bindParam(':password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $Company = $stmt->fetch();
      if($Company == false){
        $return["error"] = true;
        $return["message"] = "Login Failed Still";
      }
      else{
        echo "D: ".$Company["Email"]."<br>";
        echo "W: ".$email."<br>";
        echo ($Company["Email"] == $email);
        echo "<br>D: ".$Company["Password"]."<br>";
        echo "W: ".$password."<br>";
        echo ($Company["Password"] == $password);

        $return["Company"] = $Company;
      }
    } catch (Exception $e) {
      $return["error"] = true;
      $return["message"] = "Server Error";
      $return["dump"] = var_dump($e);
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
