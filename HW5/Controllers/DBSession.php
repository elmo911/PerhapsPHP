<?php
Class DBSession {

public $sessionName = "";
public $sessionVars;

function __construct($sesName) {
  date_default_timezone_set('America/Chicago');
  $this->sessionName = $sesName;
  $this->getSessionVar();
}

public function getSessionVar(){
  include $_SERVER['DOCUMENT_ROOT'].'\HW5\Controllers\DatabaseConnection.php';
  $sessionVarList = [];

  $sql_select = "SELECT sessionName, varName, varValue, LastUpdate
  FROM sessionvar
  WHERE sessionName = :curSessionName";
  $stmt = $dbConn->prepare($sql_select);
  $stmt->bindParam(':curSessionName', $this->sessionName, PDO::PARAM_STR);
  $stmt->execute();
  $returnedList = $stmt->fetchAll();

  if(count($returnedList)>0){
    foreach($returnedList as $var) {
        $sessionvar = new SessionVar($var['sessionName']);
        $sessionvar->varName = $var['varName'];
        $sessionvar->varValue = $var['varValue'];
        $sessionvar->LastUpdate = $var['LastUpdate'];
        $sessionVarList[] = $sessionvar;
    }
  }
  $this->sessionVars = $sessionVarList;
  return $sessionVarList;
}

public function insertvar($varName, $varValue){
  include $_SERVER['DOCUMENT_ROOT'].'\HW5\Controllers\DatabaseConnection.php';
  include $_SERVER['DOCUMENT_ROOT'].'\HW5\Models\SessionVar.php';
  $date = date("Y-m-d H:i:s");
	$sql_insert = "Insert into sessionvar Values(':curSessionName', ':varName', ':varValue', '$date')";
	try
	{
    $stmt = $dbConn->prepare($sql_insert);
    $stmt->bindParam(":curSessionName", $this->sessionName, PDO::PARAM_STR);
    $stmt->bindParam(":varName", $varName, PDO::PARAM_STR);
    $stmt->bindParam(":varValue", $varValue, PDO::PARAM_STR);
    $stmt->execute();
    $this->getSessionVar();
    echo "<p>Insert Success.</p>";
	}
	catch(Exeception $e) {
		echo "<p>Insert Failed.</p>";
	}
}

public function varValue($varName){
  $valueList = $this->sessionVars;
  foreach ($valueList as $sessionVar) {
    if($sessionVar->varName == $varName){
      return $sessionVar->varValue;
    }
  }
  return null;
}

public function updateVal($varName, $varVal) {
  include $_SERVER['DOCUMENT_ROOT'].'\HW5\Controllers\DatabaseConnection.php';

  $sql_update = "UPDATE sessionvar
  SET varValue= :varVal, LastUpdate = ".date('Y-m-d H:i:s')."
  WHERE sessionName= :curSessionName AND varName = :varName";

  try
	{
    $stmt = $dbConn->prepare($sql_update);
    $stmt->bindParam(':varVal', $varVal, PDO::PARAM_STR);
    $stmt->bindParam(':curSessionName', $this->sessionName, PDO::PARAM_STR);
    $stmt->bindParam(':varName', $varName, PDO::PARAM_STR);
    $stmt->execute();
    $this->getSessionVar();
    echo "<p>Update Success.</p>";
	}
	catch(Exeception $e) {
		echo "<p>Update Failed.</p>";
	}
}

public function deleteVar($varName){
  include $_SERVER['DOCUMENT_ROOT'].'\HW5\Controllers\DatabaseConnection.php';
	$sql_delete = "DELETE FROM sessionvar
  WHERE sessionName = :curSessionName AND varName = :varName";

  try
	{
    $stmt = $dbConn->prepare($sql_delete);
    $stmt->bindParam(':curSessionName', $this->sessionName, PDO::PARAM_STR);
    $stmt->bindParam(':varName', $varName, PDO::PARAM_STR);
    $stmt->execute();
    $this->getSessionVar();
    echo "<p>Delete Success.</p>";
	}
	catch(Exeception $e) {
		echo "<p>Delete Failed.</p>";
	}
}

  public function printVars(){
    $varList = $this->getSessionVar();
    if(count($varList)>0){
      foreach($varList as $var) {
        echo '
        <p> '.$var->toString().'</p>';
      }
    }
    else {
      echo '
      <p>No session variables set</p>';
    }
  }
}
?>
