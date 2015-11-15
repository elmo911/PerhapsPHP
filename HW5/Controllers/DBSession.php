<?php
include 'conntodb.php';
Class dbsession {

public $sesName = "";
public $sessionVar = [];

function __construct($sesName) {
  $this->sesName = $sesName;
}

public function getSessionVar(){
  $sessionVar = [];
  $sql_select = "SELECT sessionName, varName, varValue, LastUpdate
  FROM sessionvar";
  $stmt = $conn->query($sql_select);
  $returnedList = $stmt->fetchAll();
  if(count($returnedList)>0){
    foreach($returnedList as $group) {
        $curGroup = new Group($group['group_name']);
        $curGroup->setID($group['groupid']);
        $curGroup->setType($group['group_type']);
        $curGroup->setWeb($group['group_web']);
        $listOfGroups[] = $curGroup;
    }
  }
  return $listOfGroups;
}

public function insertvar($varName,$varValue){
	date_default_timezone_set('American/Chicago');
	$sql = "Insert into sessionVar Values('".$this->sesName."','".$varName."','".$varValue."',getdate())";
	try
	{
		$dbsesin = $this->openses();
		$rs_var = $dbsesin->prepare($sql);
		$rs_var->execute();
		$dbsesin = null;
	}
	catch(Exeception $e) {
		echo "<p>Insert Failed.</p>";
	}
}

public function varValue($varName){
	$sql = "select varValue from sessionVar where sessionID = '".$this->sesName."' and VarName ='".$varName."'";

	try
	{
		$dbsesin = $this->openses();
		$rs_var = $dbsesin->prepare($sql);
		$rs_var->execute();
		$row = $rs_var->fetch();
		return ($row['varValue']);

	}
	catch(Exeception $e) {
		echo "<p>Insert Failed.</p>";
	}


}

public function updateVal($varName,$varVal) {
	date_default_timezone_set('American/Chicago');
	$sql = "update sessionVar set varValue='".$varVal."', LastUpdate = getdate()"." where sessionID='".$this->sesName."' and varName = '".$varName."'";
	try
	{
		$dbsesin = $this->openses();
		$rs_var = $dbsesin->prepare($sql);
		$rs_var->execute();
		 echo "<p>Update successful</p>";

	}
	catch(Exeception $e) {
		echo "<p>Insert Failed.</p>";
	}
}

public function deleteVar($varName){
	$sql = "delete from sessionVar where sessionID = '".$this->sesName."' and varName = '".$varName."'";

	try
	{
		$dbsesin = $this->openses();
		$rs_var = $dbsesin->prepare($sql);
		$rs_var->execute();
		echo "<p>Delete successful</p>";

	}
	catch(Exeception $e) {
		echo "<p>Insert Failed.</p>";
	}
}

}
?>
