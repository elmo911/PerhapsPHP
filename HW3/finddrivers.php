<?php
foreach(PDO::getAvailableDrivers() AS $DRIVERS) :

    $CountDrivers++;
    $ARR_DRIVERS[$CountDrivers] = $DRIVERS;
	echo $DRIVERS."<br></br>";

endforeach;
?>
