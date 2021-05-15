<?php
session_start();
if (!isset($_SESSION['user'])) {        //To prevent login using Back button of browser
    header('location:home.php');  //As session as already been destroyed in logout.php thus it should not be set
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Students Pending</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	
	<script src="jquery/jquery-3.4.1.js"></script>
   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	 <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>


<style>
.dataTables_filter, .dataTables_info { display: none; }
.comp{
   border: 0;
   color: #3d5c5c;
   background: transparent;
   font-size: 20px;
   font-weight: bold;
   padding: 2px 10px;
   width: 100x;

}

.option {
   overflow:hidden;
   width:100px;
   -moz-border-radius: 9px 9px 9px 9px;
   -webkit-border-radius: 9px 9px 9px 9px;
   border-radius: 9px 9px 9px 9px;
   box-shadow: 1px 1px 11px #330033;
   background: #f0b890 url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 319px center;
}
</style>
</head>
  <body>
  <div id="ex1" class="modal">
  <p>Updation Done Successfully</p>
  </div>
  <div class="header1">
  <img src="img/logo.png" alt="logo" >
  <h1>Training and Placement Cell</h1>
  <h3>Sardar Vallabhbhai National Institute of Technology, Surat</h3>
  <i class='fa fa-envelope-o' style="position:absolute;left:920px;top:0px;border-bottom:1px solid #3d5c5c;border-left:1px solid #3d5c5c; padding-left:1px;padding-bottom:1px;border-radius:3px;
  color:#3d5c5c; font-size:15px;"> tpo@svnit.ac.in<span style="color:black"> | </span></i>
  <i class='fa fa-phone' style="font-size:15px;color:#3d5c5c;position:absolute;left:1042px;top:0px;border-bottom:1px solid #3d5c5c;border-right:1px solid #3d5c5c; padding-right:1px;padding-bottom:1px;border-radius:3px"> +91-542-2368160, 2369162</i>
 </div>
 <div class="topnav" style="display:block">
    <a  href="admin.php" class="fa fa-home"></a>
    <a  href="sched_admin.php" class="fa fa-calendar"> Scheduled Companies</a>
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
<div class="main" style="padding:10px;width:1129px;display:block" >
 
 <center>
  <h1 style="color:#3d5c5c ;">Students</h1>
<input id="myInput" type="text" placeholder="Search.." style="float:right">
	<table id="mytable" class="display" >
      <thead>
        <tr>
          <th>STUDENT ID</th>
          <th>NAME</th>
		  <th>DEPARTMENT</th>
		  <th>EMAIL</th>
		  <th>CONTACT</th>
		  <th>DOB</th>
		  <th>COMPANY</th>
		  <th id="sub"></th
        </tr>
      </thead>
<?php
$sql = "SELECT sid,sname,dept,email,contact,dob from students where sid not in (select sid from students_placed)";
$result = $conn->query($sql);
$sql2= "SELECT cname from comp_sche";
if ($result->num_rows >0 ) {
    while($row = $result->fetch_assoc()) { 
        echo "<tbody id='myTable'>";
        echo "<tr>";
         echo "<td class='sid'>" .$row["sid"]. "</td>";
          echo "<td class='sname' style='width:200px'>" .$row["sname"]. "</td>";
          echo "<td class='dept' style='width:250px'>" .$row["dept"]. "</td>";
          echo "<td class='email'>" .$row["email"]. "</td>";
          echo "<td class='contact'>" .$row["contact"]. "</td>";
          echo "<td class='dob' style='width:150px'>" .$row["dob"]. "</td>";
		  echo "<td class='company'><select class='comp'>";
		  echo"<option value='' selected>Select Company</option>";
		  $cnames= $conn->query($sql2);

          while ($x = $cnames->fetch_assoc())
		{
			echo "<option class='option' value='".$x['cname']."'>".$x['cname']."</option>";
		}
		echo "</select></td>";
		  echo "<td><input type='submit' class='but' value='Placed'></td>";	 
		 echo "</tr>";
        echo "</tbody>";
    }
}    
?>
<!-- </tbody>-->

</center>
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
        { "bSortable": false, "aTargets": [0,1,2,3,4,5,6,7 ] }, 
        { "bSearchable": false, "aTargets": [0,1,2,3,4,5,6,7] }
		
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
	      
	    $('.but').click(function(){
        var sid_ = $(this).parent().siblings('.sid').text();
        var e_comp = $(this).parent().siblings('.company').children('.comp').children('option:selected').val();
				$.ajax({  
        type: 'POST',  
        url: 'save_student.php', 
        data: { sid:sid_, company:e_comp },
        success: function(response) {
			$("#ex1").modal('show');
			$('#ex1').on($.modal.AFTER_CLOSE,function (event,modal) {
            location.reload();
        })
			
        }
		
});
	});
	  });
</script>

 </body>
</html>