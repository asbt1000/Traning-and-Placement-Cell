<?php
session_start();
if (!isset($_SESSION['user'])) {        //To prevent login using Back button of browser
    header('location:home.php');  //As session as already been destroyed in logout.php thus it should not be set
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ADMIN lOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<script src="jquery/jquery-3.4.1.js"></script>
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
 <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<style>
th{
	text-align:left;
}
.dataTables_filter, .dataTables_info { display: none; }

</style>
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
  <a  href="placed_stu.php" class="fa fa-graduation-cap"> Students Placed</a>
  <a  href="logout.php" class="fa fa-sign-out" style="float:right; "> Logout</a>
  </div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tnp";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 
?>
<div class="main" style="padding:10px;width:1129px" >
  <center>
  <h1 style="color: #3d5c5c ;">SCHEDULED COMPANIES</h1>
  <input id="myInput" type="text" placeholder="Search.." style="float:right">

<center>
    <table id="mytable" class="display" >
      <thead>
        <tr>
          <th>COMPANY NAME</th>
          <th>COMING FOR</th>
          <th>DATE</th>
        </tr>
      </thead>

<?php
$sql = "SELECT cname,reason,date from comp_sche order by date";
$result = $conn->query($sql);
if ($result->num_rows >0 ) {
    while($row = $result->fetch_assoc()) { 
        echo "<tbody id='myTable'>";
        echo "<tr>";
         echo "<td>" .$row["cname"]. "</td>";
          echo "<td>" .$row["reason"]. "</td>";
          echo "<td>" .$row["date"]. "</td>";
         echo "</tr>";
        echo "</tbody>";
    }
}else {
     echo "0 results";
 }    
?>
<!-- </tbody>-->
</table>

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
<script>
$(document).ready( function () {
	 
	var oTable = $('#mytable').dataTable( {
    "aoColumnDefs": [
        { "bSortable": false, "aTargets": [0,1,2] }, 
        { "bSearchable": false, "aTargets": [0,1,2] }
		
    ],
	"aaSorting": []
	 
}); 
   
    $('#mytable').DataTable();  	
    $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
	      
	   
	  });
</script>
  </body>
</html>