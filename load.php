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
 
    $sql = "SELECT cname,date FROM comp_sche";
    $result = $conn->query($sql);  // Returning array
    $events = array();

    // Fetch results
    while ($row = $result->fetch_assoc()) {

        $e = array();
        $e['title'] = $row['cname'];
        $e['start'] = $row['date'];
        $e['allDay'] = true;
        // Merge the event array into the return array
        array_push($events, $e);

    }
	echo json_encode($events);

?>