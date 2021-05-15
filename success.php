<html>
<head>
<meta charset="UTF-8">
<title>Success !</title> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header1">
  <img src="img/logo.png" alt="logo" >
  <h1>Training and Placement Cell</h1>
  <h3>Sardar Vallabhbhai National Institute of Technology, Surat</h3>
  <i class='fa fa-envelope-o' style="position:absolute;left:920px;top:0px;border-bottom:1px solid #3d5c5c;border-left:1px solid #3d5c5c; padding-left:1px;padding-bottom:1px;border-radius:3px;
  color:#3d5c5c; font-size:15px;"> tpo@svnit.ac.in<span style="color:black"> | </span></i>
  <i class='fa fa-phone' style="font-size:15px;color:#3d5c5c;position:absolute;left:1042px;top:0px;border-bottom:1px solid #3d5c5c;border-right:1px solid #3d5c5c; padding-right:1px;padding-bottom:1px;border-radius:3px"> +91-542-2368160, 2369162</i>
 </div>
 <div class="topnav">
  <a  href="home.php" class="fa fa-home"></a>
  <a  href="register.php" class="fa fa-building-o" > For Recruiters</a>
  <a  href="sched.php" class="fa fa-calendar"> Scheduled Companies</a>
  <a  href="#Student Team" class="fa fa-group"> Student Team</a>
  <a  href="#Student Team" class="fa fa-envelope"> Contact Us</a>
 </div>

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
$sdes = $_POST["des"];
$semail = $_POST["email"];
$scontact = $_POST["contact"];
$sconfor = $_POST["con_for"];
?>
<div class="main">

<?php
$sql = "INSERT INTO $dbname.companies_register(cname,name,designation,email,contact,reason) VALUES ('$scname','$sname','$sdes','$semail','$scontact','$sconfor')";

if ($conn->query($sql) === TRUE) {
echo "<h3 style=\"color:#3d5c5c;; text-align:center; font-family:cursive;\"> Registered Successfully! Click to go to <a href=\"home.php\">HOME.</a></h3>";
}

$conn->close();
?>
</div>
<div class="footer" style="top:400px;">
<hr>
<br>
<span style="position:absolute;left:100px" class="foot">
<a href="#">Placement Brochure <i class="fa fa-download"></i></a>
<a href="#">TPC Policies</a>
<a href="#">Contact Us</a>
</span>
<p style="position:absolute;left:100px;top:60px;color:#85adad">© 2019 | Sardar Vallabhbhai National Institute of Technology, Surat. All Rights Reserved.</p>
</div>

</body>
</html>