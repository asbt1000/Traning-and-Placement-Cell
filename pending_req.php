<?php
session_start();
if (!isset($_SESSION['user'])) {        //To prevent login using Back button of browser
    header('location:admin_login.php');  //As session as already been destroyed in logout.php thus it should not be set
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>PENDING REQUESTS</title>
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
</style>
</head>
  <body>
  <div id="ex1" class="modal">
  <p>Company scheduled Successfully and Mail sent.</p>
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
  <a  href="students.php" class="fa fa-vcard" > Students</a>
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
 <input type="button" value="SCHEDULE" id="rotate" >
 <iframe src="\testing/calender.php" id="ma" style="visibility:hidden;width:600px;height:500px;position:absolute;top:130px;left:100px" scrolling="no"></iframe>
<div class="main" style="padding:10px;width:1129px;display:block" >
 
 <center>
  <h1 style="color:#3d5c5c ;">REGISTERED COMPANIES</h1>
<input id="myInput" type="text" placeholder="Search.." style="float:right">
	<table id="mytable" class="display" >
      <thead>
        <tr>
          <th style="width:120px">COMPANY NAME</th>
          <th>NAME</th>
		  <th>DESIGNATION</th>
		  <th>EMAIL</th>
		  <th>CONTACT</th>
		  <th>REASON</th>
          <th id="da">DATE</th>
		  <th id="sub"></th
        </tr>
      </thead>
<?php
$sql = "SELECT cname,name,designation,email,contact,reason from companies_register";
$result = $conn->query($sql);
if ($result->num_rows >0 ) {
    while($row = $result->fetch_assoc()) { 
        echo "<tbody id='myTable'>";
        echo "<tr>";
         echo "<td class='cname'>" .$row["cname"]. "</td>";
          echo "<td class='name'>" .$row["name"]. "</td>";
          echo "<td class='designation'>" .$row["designation"]. "</td>";
          echo "<td class='email'>" .$row["email"]. "</td>";
          echo "<td class='contact'>" .$row["contact"]. "</td>";
          echo "<td class='reason'>" .$row["reason"]. "</td>";
		  echo "<td class='date'><input type='date' class='dates'  placeholder='Select Date'></td>";	
		  echo "<td><input type='submit' class='but' value='submit'></td>";	 
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
    $("#rotate").click(function(){
    if ( $('#ma').css('visibility') == 'hidden' )
    $('#ma').css('visibility','visible');
  else
    $('#ma').css('visibility','hidden');
    $('.main').toggle();
  });
    $('#mytable').DataTable();  	
    $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
	      
	    $('.but').click(function(){
        var cname_ = $(this).parent().siblings('.cname').text();
        var name_ = $(this).parent().siblings('.name').text();
		var designation_ = $(this).parent().siblings('.designation').text();
		var email_ = $(this).parent().siblings('.email').text();
		var contact_ = $(this).parent().siblings('.contact').text();
		var reason_ = $(this).parent().siblings('.reason').text();		        
        var date_ = $(this).parent().siblings('.date').children('.dates').val();
		$.ajax({  
        type: 'POST',  
        url: 'save.php', 
        data: { cname:cname_, name:name_, designation:designation_, email:email_, contact:contact_, reason:reason_, date:date_ },
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