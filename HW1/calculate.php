<?php

include 'metricfunctions.php';
session_start();

$conv = new MetricFunctions();

if($_SESSION['submitted'] ==1){
$_SESSION['submitted']=0;
echo '<html>';
echo '<body>';
echo '<form method="POST" action="calculate.php">';
echo '<table cellpadding="0">';
echo '<tr>';
echo '<td width="20%" align="left">Fahrenheit:</td>';
echo '<td width="20%" align="left">';
echo '<input type="text" name="Fahrenheit" size="20" value="0">';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td width="20%" align="left">Pounds:</td>';
echo '<td width="20%" align="left">';
echo '<input type="text" name="Pounds" size="20" value="0">';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td width="20%" align="left">Miles:</td>';
echo '<td width="20%" align="left">';
echo '<input type="text" name="Miles" size="20" value="0">';
echo '</td>';
echo '</tr>';
echo '<tr border="0">';
echo '<td align="left">';
echo '<input type="submit" value="Calculate" name="calc">';
echo '</td>';
echo '</tr>';
echo '</table>';
echo '</form>';
echo '</body>';
echo '</html>';
}
else{
$_SESSION['submitted']=1;
echo '<html>';
echo '<body>';
echo '<form method="POST" action="calculate.php">';
echo '<table cellpadding="0">';
echo '<tr>';
echo '<td width="20%" align="left">Fahrenheit:</td>';
echo '<td width="20%" align="left">';
echo '<input type="text" name="Fahrenheit" size="20" value="0">';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td width="20%" align="left">Pounds:</td>';
echo '<td width="20%" align="left">';
echo '<input type="text" name="Pounds" size="20" value="0">';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td width="20%" align="left">Miles:</td>';
echo '<td width="20%" align="left">';
echo '<input type="text" name="Miles" size="20" value="0">';
echo '</td>';
echo '</tr>';
echo '<tr border="0">';
echo '<td align="left">';
echo '<input type="submit" value="Calculate" name="calc">';
echo '</td>';
echo '</tr>';
echo '</table>';
echo '</form>';
echo '</body>';
echo '</html>';
}
/* Handle Page
$F=$_POST["Fahrenheit"];
$C=$conv->FtoC($F);
$LB=$_POST["Pounds"];
$KG=$conv->LBtoKG($LB);
$MI=$_POST["Miles"];
$KM=$conv->MItoKM($MI);

$count = 0;

if ($F!=0) {
  echo $F." degrees F = ".$C." degrees Celsius<br></br>";
    $count++;
}
if ($LB!=0) {
  echo $LB." Pounds = ".$KG." Kilograms<br></br>";
    $count++;
}
if ($MI!=0) {
  echo $MI." Miles = ".$KM." Kilometers<br></br>";
    $count++;
}
if ($count > 0) {
  echo $count." Conversions Calculated";
}

else {
    echo "No conversions were made. TIP: did you leave all values as 0?";
}
*/
?>
