<?php


class QuestionDB
{
  private $conn;
  public function __construct()
  {
    include_once ("qdb.php");
    $this->conn = $conn;
  }

  public function auth($email, $password)
  {
    $return["error"] = false;
    $return["message"] = "Login Success";
    try {
      $sql_select = "SELECT CompanyID, Name, Email, Password
      From Company
      Where Email = :email
      And Password = :password";
      $stmt = $this->conn->prepare($sql_select);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $Company = $stmt->fetch();
      if($Company == false){
        $return["error"] = true;
        $return["message"] = "Login Failed";
      }
      else{
        $return["Company"] = $Company;
      }
    } catch (Exception $e) {
      $return["error"] = true;
      $return["message"] = "Server Error";
      $return["dump"] = var_dump($e);
    }

    return $return;
  }

  public function QuestionByActivity($ActivityName, $CompanyID)
  {
    $return["error"] = false;
    $return["message"] = "Question Retrieval Success";

    try {
      $sql_select = "SELECT
      Question.Content As Question,
      Question.TimeStamp As QTS,
      View.InputType As InputType,
      View.ResponseType As ResponseType,
      Answer.Answer As Answer,
      Answer.TIMESTAMP As ATS
      From CompanyQuestionSet, Question, View, Answer, Activity
      Where CompanyQuestionSet.CompanyID = :CompanyID
      and Activity.ActivityName = :ActivityName
      and CompanyQuestionSet.ActivityID = Activity.ActivityID
      and CompanyQuestionSet.QuestionID = Question.QuestionID
      and Question.ViewID = View.ViewID
      and CompanyQuestionSet.AnswerID = Answer.AnswerID";

      $stmt = $this->conn->prepare($sql_select);
      $stmt->bindParam(':CompanyID', $CompanyID, PDO::PARAM_INT);
      $stmt->bindParam(':ActivityName', $ActivityName, PDO::PARAM_STR);
      $stmt->execute();
      $QuestionSet = $stmt->fetchAll();
      if($QuestionSet == false){
        $return["error"] = true;
        $return["message"] = "No Questions Found";
      }
      else{
        foreach ($QuestionSet as $Question) {
          echo json_encode($Question)."|";
        }
      }
    } catch (Exception $e) {
      $return["error"] = true;
      $return["message"] = "Server Error";
      $return["dump"] = var_dump($e);
    }
  }


}

 ?>
