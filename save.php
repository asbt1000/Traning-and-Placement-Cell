<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tnp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 

$scname = $_POST["cname"];
$sname = $_POST["name"];
$sdes = $_POST["designation"];
$semail = $_POST["email"];
$scontact = $_POST["contact"];
$sconfor = $_POST["reason"];
$sdate = $_POST["date"];
$sqldate = date("Y-m-d",strtotime($sdate));
$sql = "INSERT INTO $dbname.comp_sche VALUES ('$scname','$sname','$sdes','$semail','$scontact','$sconfor','$sqldate')";
$conn->query($sql);
$sql ="DELETE FROM $dbname.companies_register where cname= '$scname'";
$conn->query($sql);
$conn->close();

$date = date("d-F-Y",strtotime($sdate));
$msg = "Mr ".$sname."\n(".$sdes." department)\n".$scname."\n\nWe would like to invite you for ".$sconfor." programme on ".$date.".\nFor any change or query, reply back.\n\n\nMr Rakesh Sharma\nTraining and Placement Incharge \nSVNIT, Surat\nContact.no- 9876543210\nEmail- tnp@svnit.ac.in ";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
$subject= "For ".$sconfor." at SVNIT, Surat on ".$date; 
// send email
mail("asbt1000@gmail.com",$subject,$msg);
?>