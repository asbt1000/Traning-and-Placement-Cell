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

$sid = $_POST["sid"];
$scname = $_POST["company"];
$sql = "INSERT INTO $dbname.students_placed(sid,cname) VALUES ('$sid','$scname')";
$conn->query($sql);
?>