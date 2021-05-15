<?php
session_start();
if (!isset($_SESSION['user'])) {        //To prevent login using Back button of browser
    header('location:home.php');  //As session as already been destroyed in logout.php thus it should not be set
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Student</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="validate2.js"></script>
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
  <a  href="admin.php" class="fa fa-home"></a>
  <a  href="students.php" class="fa fa-vcard" > Students</a>
  <a  href="sched_admin.php" class="fa fa-calendar"> Scheduled Companies</a>
  <a  href="placed_stu.php" class="fa fa-graduation-cap"> Students Placed</a>
  <a  href="logout.php" class="fa fa-sign-out" style="float:right; "> Logout</a>
 </div>

    <div class="main-block main" style="width:1100px;background:url('img/add_student.jpg') no-repeat; background-size:1150px">
      <?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
?>
      <div style="width:550px;position:relative;left:-200px">
      <form action="success_student.php" method="post" name="s_register" onsubmit="return validate();">
        <div class="title" style="width:500px">
          <i class="fas fa-pencil-alt"></i> 
          <h2> Add Student</h2>
        </div>
        <div class="info" style="width:500px">
          <input type="text" name="name" placeholder="Name" required autocomplete="off">
          <input type="text" name="des" placeholder="Department" required autocomplete="off">
          <input type="email" name="email" placeholder="Email" required autocomplete="off">
          <input type="text" name="contact" placeholder="Contact" required autocomplete="off">
		  <input type="date" name="dob" required autocomplete="off">
          
		</div>
        
        <button type="submit" href="/" style="width:500px">Submit</button>
      </form>
    </div>
	</div>
	<div class="footer" style="top:700px">
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