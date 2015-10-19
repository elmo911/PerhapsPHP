<?php
include 'mathfunction.php';
Class moremath extends mathfunction {
	Public function sumarray($myar) {
		$res=0;
		for ($c=0; $c<count($myar); $c++) {
			$res = $res + $myar[$c];
		}
    return($res);
	}
}

Class dGrid {
	public $rows;
	public $cols;

	public function drawgrid(){
		$grid = "<table border=1 cellpadding=0 style=border-collapse: bordercolor=#222222 width=100 id=autonumber>";

		$c=1;
		while($c<=$this->rows){
			$grid = $grid . "<tr>";
			$d=1;
			while($d<=$this->cols){
				$grid = $grid . '<td align="left">' . $c . "X" . $d . "</td>";
				$d++;
			}
			$c++;
		}
		return($grid);
	}

  public function printForm(){
    echo'
    <p>Input number of <strong>rows</strong> and <strong>columns</strong></p>
    <form method="POST" action="hw2.php">
    <p>Rows: <input type="text" name="rows" id="rows"></p>
    <p>Columns: <input type="text" name="cols" id="cols"></p>
    <input type="submit" name="submit" value="Draw">';
  }
}
?>
