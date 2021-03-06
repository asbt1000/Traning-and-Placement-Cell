<?php
session_start();
if (!isset($_SESSION['user'])) {        //To prevent login using Back button of browser
    header('location:home.php');  //As session as already been destroyed in logout.php thus it should not be set
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Company registration form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/form.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="validate.js"></script>
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
  <a  href="register_admin.php" class="fa fa-building-o" > For Recruiters</a>
  <a  href="sched_admin.php" class="fa fa-calendar"> Scheduled Companies</a>
  <a  href="#Student Team" class="fa fa-group"> Student Team</a>
  <a  href="#Student Team" class="fa fa-envelope"> Contact Us</a>
  <a  href="logout.php" class="fa fa-sign-out" style="float:right; "> Logout</a>
 </div>

    <div class="main-block main" style="width:1100px;background:url('img/form2.jpg') no-repeat; background-size:1200px">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Register for our placement process</h1>
        <p style="color:white;text-align:center">We will get in touch with you</p>
      </div>
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
      <form action="success_admin.php" method="post" name="c_register" onsubmit="return validate();">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2> Register here</h2>
        </div>
        <div class="info">
          <input class="fname" type="text" name="cname" placeholder="Company Name" required autocomplete="off">
          <input type="text" name="name" placeholder="Name" required autocomplete="off">
          <input type="text" name="des" placeholder="Designation" required autocomplete="off">
          <input type="email" name="email" placeholder="Email" required autocomplete="off">
          <input type="text" name="contact" placeholder="Contact" required autocomplete="off">
          <select name="con_for" required>
            <option value="" selected>Contacting For</option>
            <option value="Full Time Recruitment">Full Time Recruitment</option>
            <option value="Internship/Training">Internship/Training </option>
            <option value="Workshops">Workshops</option>
          </select>
		</div>
        <div class="checkbox">
          <input type="checkbox" name="checkbox" required><span>I agree to the <a href="#" style="text-decoration:none;">TPC Policies of SVNIT.</a></span>
        </div>
        <button type="submit" href="/">Submit</button>
      </form>
    </div>
	<div class="footer" style="top:700px">
<hr>
<br>
<span style="position:absolute;left:100px" class="foot">
<a href="#">Placement Brochure <i class="fa fa-download"></i></a>
<a href="#">TPC Policies</a>
<a href="#">Contact Us</a>
</span>
<p style="position:absolute;left:100px;top:60px;color:#85adad">?? 2019 | Sardar Vallabhbhai National Institute of Technology, Surat. All Rights Reserved.</p>
</div>
  </body>
</html>