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
  include $_SERVER['DOCUMENT_ROOT'].'\HW5\Models\SessionVar.php';
  $sessionVarList = [];

  $sql_select = "SELECT sessionName, varName, varValue, LastUpdate
  FROM sessionvar
  WHERE sessionName = '$this->sessionName'";
  $stmt = $dbConn->prepare($sql_select);
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
  $date = date("Y-m-d H:i:s");
	$sql_insert = "Insert into sessionvar Values('$this->sessionName', '$varName', '$varValue', '$date')";
	try
	{
    $stmt = $dbConn->prepare($sql_insert);
    $stmt->execute();
    $this->getSessionVar();
    echo "<h2>Insert Success.</h2>";
	}
	catch(Exeception $e) {
		echo "<h2>Insert Failed.</h2>";
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
  $date = date('Y-m-d H:i:s');
  $sql_update = "UPDATE sessionvar
  SET varValue= '$varVal', LastUpdate = '$date'
  WHERE sessionName= '$this->sessionName' AND varName = '$varName'";

  try
	{
    $stmt = $dbConn->prepare($sql_update);
    $stmt->execute();
    $this->getSessionVar();
    echo "<h2>Update Success.</h2>";
	}
	catch(Exeception $e) {
		echo "<h2>Update Failed.</h2>";
	}
}

public function deleteVar($varName){
  include $_SERVER['DOCUMENT_ROOT'].'\HW5\Controllers\DatabaseConnection.php';
	$sql_delete = "DELETE FROM 'sessionvar' WHERE 'sessionName'='$this->sessionName' and 'varName'='$varName'";

  try
	{
    $stmt = $dbConn->prepare($sql_delete);
    $stmt->execute();
    $this->getSessionVar();
    echo "<h2>Delete Success.</h2>";
	}
	catch(Exeception $e) {
		echo "<h2>Delete Failed.</h2>";
	}
}

  public function printVars(){
    $varList = $this->getSessionVar();
    if(count($varList)>0){
      foreach($varList as $var) {
        echo '
        <p> '.nl2br($var->toString()).'</p>';
      }
    }
    else {
      echo '
      <h2>No session variables set</h2>';
    }
  }
}
?>
