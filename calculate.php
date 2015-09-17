<?php

include 'metricfunctions.php';

$conv = new MetricFunctions();

$F=$_POST["Fahrenheit"];
$C=$conv->FtoC($F);
$LB=$_POST["Pounds"];
$KG=$conv->LBtoKG($LB);
$MI=$_POST["Miles"];
$KM=$conv->MItoKM($MI);

$count = 0;

if ($F!=0) {
  echo $F." degrees F = ".$C." degrees Celsius<br></br>";
    count++;
}
if ($LB!=0) {
  echo $LB." Pounds = ".$KG." Kilograms<br></br>";
    count++;
}
if ($MI!=0) {
  echo $MI." Miles = ".$KM." Kilometers<br></br>";
    count++;
}
if ($count > 0) {
  echo $count." Conversions Calculated";
}

else {
    echo "No conversions were made. TIP: did you leave all values as 0?";
}

?>
