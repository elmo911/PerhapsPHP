<?php

  /**
   *
   */
  class Grid
  {

  	public static function drawgrid($x, $y){
  		$grid = "<table border=1 cellpadding=0 style=border-collapse: bordercolor=#222222 width=100 id=autonumber>";

  		$c=1;
  		while($c<=$this->y){
  			$grid = $grid . "<tr>";
  			$d=1;
  			while($d<=$this->x){
  				$grid = $grid . '<td align="left">' . $c . "X" . $d . "</td>";
  				$d++;
  			}
  			$c++;
  		}
      $grid = $grid."</table>";
  		return($grid);
  	}


 ?>
