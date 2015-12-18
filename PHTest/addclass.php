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
        <td>Questions</td>
      </tr>
      <tr>
        <td><strong>QuestionID</strong></td>
        <td><strong>ViewID</strong></td>
        <td><strong>Content</strong></td>
        <td><strong>Private</strong></td>
        <td><strong>TimeStamp</strong></td>
      </tr>';
      $sql_selq = "SELECT * from Question";
      $stmt = $this->conn->prepare($sql_selq);
      $stmt->execute();
      $this->printRows($stmt);

      $out = $out . '
      </table>';
      return $out;
  }


  private function printRows($stmt){
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
  }


}

 ?>
