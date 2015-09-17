<?php
//Create varibles to hold information passed from another page.
$myArray=array();

$myArray[0]=$_POST["FName"];
$myArray[1]=$_POST["LName"];
$myArray[2]=$_POST["Company"];
$myArray[3]=$_POST["Contact"];
$myArray[4]=$_POST["Phone"];
$myArray[5]=$_POST["Question"];
$myArray[6]=$_POST["A101"];

echo "Customer: ".$myArray[0]." ".$myArray[1]."<br></br>";
echo "Company: ".$myArray[2]."<br></br>";
echo "Phone: ".$myArray[4]."<br></br>";
echo $myArray[5]."<br></br>";
echo "Do you agree?"."<br></br>";
if ($myArray[6]==1) {
  echo "Strongly Disagree";
}
else if ($myArray[6]==2) {
  echo "Disagree";
}
else if ($myArray[6]==3) {
  echo "Neutral/Undecided";
}
else if ($myArray[6]==4) {
  echo "Agree";
}
else if ($myArray[6]==5) {
  echo "Strongly Agree";
}

?>
