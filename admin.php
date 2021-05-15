<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user'])) {        //To prevent login using Back button of browser
    header('location:home.php');  //As session as already been destroyed in logout.php thus it should not be set
}
?>
<html>
<head>
<title>Training and Placement Cell</title>
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/admin_login.css">
<style>
.image_hash
{
	width:25%;height:250px;margin-left:24px;margin-top:100px;border-radius: 8px;
	border: 1px solid #3d5c5c;
    padding: 5px;
}
</style>
</head>
<body style="background-image:url("img/form.jpg")">
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
<div>
<div class="bg" style="background-image:url('img/adminbackground.jpg'); background-size:1150px 1000px;position:relative;top:20px;height:600px;left:90px">
<div class="container" style="width:1110px;top:700px">
  <div class="content">
    <h1><center>WELCOME ADMIN</center></h1>
    </div>
</div>
<br>
<br>

<a href="pending_req.php"><img src="img/pending.JPG" class="image_hash"></a>
<a href="add_student.php"><img src="img/add.jpg"class="image_hash"></a>
<a href="update.php"><img src="img/update.jpg"class="image_hash"></a>

</div>

</div>
<div class="footer" style="top:30px">
<hr>
<br>
<span style="position:absolute;left:100px;" class="foot">
<a href="#">Placement Brochure <i class="fa fa-download"></i></a>
<a href="#">TPC Policies</a>
<a href="#">Contact Us</a>
</span>
<p style="position:absolute;left:100px;top:40px;color:#85adad">© 2019 | Sardar Vallabhbhai National Institute of Technology, Surat. All Rights Reserved.</p>
</div>

</body>
</html>