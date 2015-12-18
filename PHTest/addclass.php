<?php


class AddToDB
{
  private $conn;
  private $CompanyID;
  public function __construct($CompanyID)
  {
    include_once ("qdb.php");
    $this->conn = $conn;
    $this->CompanyID = $CompanyID;
  }

  public function companyName(){
    $sql_select = "SELECT Name from Company where CompanyID = '".$this->CompanyID."'";
    $stmt = $this->conn->prepare($sql_select);
    $stmt->execute();
    $ID = $stmt->fetch();
    return $ID["Name"];
  }

  public function addAnswer($Answer){
    $sql_insert = "INSERT INTO `QuestionDB`.`Answer` (`Answer`) VALUES ('".$Answer."')";
    $stmt = $this->conn->prepare($sql_insert);
    $stmt->execute();

    $sql_select = "SELECT AnswerID from Answer where Answer = '".$Answer."'";
    $stmt = $this->conn->prepare($sql_select);
    $stmt->execute();
    $ID = $stmt->fetch();
    return $ID["AnswerID"];
  }

  public function addView($InputType, $ResponseType){
    $sql_insert = "INSERT INTO `QuestionDB`.`View` (`InputType`, `ResponseType`)
     VALUES ('".$InputType."', '".$ResponseType."')";
    $stmt = $this->conn->prepare($sql_insert);
    $stmt->execute();

    $sql_select = "SELECT ViewID from View
    where InputType = '".$InputType."'
    and ResponseType = '".$ResponseType."'";
    $stmt = $this->conn->prepare($sql_select);
    $stmt->execute();
    $ID = $stmt->fetch();
    return $ID["ViewID"];
  }

  public function addActivity($ActivityName){
    $sql_insert = "INSERT INTO `QuestionDB`.`Activity` (`ActivityName`) VALUES ('".$ActivityName."')";
    $stmt = $this->conn->prepare($sql_insert);
    $stmt->execute();

    $sql_select = "SELECT ActivityID from Activity where ActivityName = '".$ActivityName."'";
    $stmt = $this->conn->prepare($sql_select);
    $stmt->execute();
    $ID = $stmt->fetch();
    return $ID["ActivityID"];
  }

  public function addQuestion($Question, $ViewID){
    $sql_insert = "INSERT INTO `QuestionDB`.`Question` (`Content`, `ViewID`) VALUES ('".$Question."', '".$ViewID."')";
    $stmt = $this->conn->prepare($sql_insert);
    $stmt->execute();

    $sql_select = "SELECT QuestionID from Question where Content = '".$Question."'";
    $stmt = $this->conn->prepare($sql_select);
    $stmt->execute();
    $ID = $stmt->fetch();
    return $ID["QuestionID"];
  }

  public function listDB(){
    $out = '
    <table style="width:100%">
      <tr>
        <td><h2>Question</h2></td>
      </tr>';
      $questionHeaders = array("QuestionID", "ViewID", "Content", "Private", "TimeStamp");
      $out = $this->printHeaders($questionHeaders, $out);
      $sql_selq = "SELECT * from Question";
      $stmt = $this->conn->prepare($sql_selq);
      $stmt->execute();
      $out = $this->printRows($stmt, $out);

      $out = $out . '
      <br><br>
      <tr>
        <td><h2>Answer</h2></td>
      </tr>';
      $answerHeaders = array("AnswerID", "Answer", "TIMESTAMP");
      $out = $this->printHeaders($answerHeaders, $out);
      $sql_selq = "SELECT * from Answer";
      $stmt = $this->conn->prepare($sql_selq);
      $stmt->execute();
      $out = $this->printRows($stmt, $out);

      $out = $out . '
      <br><br>
      <tr>
        <td><h2>Activity</h2></td>
      </tr>';
      $answerHeaders = array("ActivityID", "ActivityName");
      $out = $this->printHeaders($answerHeaders, $out);
      $sql_selq = "SELECT * from Activity";
      $stmt = $this->conn->prepare($sql_selq);
      $stmt->execute();
      $out = $this->printRows($stmt, $out);


      $out = $out . '
      </table>';
      return $out;
  }

private function printHeaders($Headers, $out){
  $out = $out . '
  <tr>';
  foreach ($Headers as $header) {
    $out = $out . '
    <td><strong>'.$header.'</strong></td>';
  }
  $out = $out . '
  </tr>';
  return $out;
}

  private function printRows($stmt, $out){
    while($row = $stmt->fetch()){
      $out = $out . '
      <tr>';
      $count = 0;
      foreach ($row as $key) {
        if($count % 2 == 1){
          $out = $out . '
          <td>'.$key.'</td>';
        }
        $count++;
      }
      $out = $out . '
      </tr>';
    }
    return $out;
  }


}

 ?>
