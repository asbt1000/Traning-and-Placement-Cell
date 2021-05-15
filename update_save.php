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
$sdate = $_POST["date"];
$sqldate = date("Y-m-d",strtotime($sdate));
$sql = "UPDATE comp_sche SET date = '$sqldate' WHERE cname ='$scname'";
$conn->query($sql);
$conn->close();

$date = date("d-F-Y",strtotime($sdate));
$msg = "This is to inform all students that ".$scname." is rescheduled to come on ".$date.".\n\n\nMr Rakesh Sharma\nTraining and Placement Incharge \nSVNIT, Surat\nContact.no- 9876543210\nEmail- tnp@svnit.ac.in ";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
$subject= "For Change of date of ".$scname; 
// send email
mail("asbt1000@gmail.com",$subject,$msg);
?>