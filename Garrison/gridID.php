<?php

  /**
   *
   */
  class Grid
  {

  	public static function drawgrid($x, $y){
  		$grid = "<table border=1 cellpadding=0 style=border-collapse: bordercolor=#222222 width=100 id=autonumber>";

  		$c=1;
  		while($c<=$y){
  			$grid = $grid . "<tr>";
  			$d=1;
  			while($d<=$x){
  				$grid = $grid . '<td align="left">'." </td>";
  				$d++;
  			}
  			$c++;
  		}
      $grid = $grid."</table>";
  		return($grid);
  	}

}
 ?>
