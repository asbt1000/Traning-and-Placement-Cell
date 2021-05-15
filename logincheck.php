<?php

session_start();

$conn = mysqli_connect('localhost', 'root');


$db = mysqli_select_db($conn, 'tnp'); //DATABASE NAME TO BE PUT HERE

if (isset($_POST['submit'])) {
    $username = $_POST['username'];     //THIS SHOULD BE SAME AS name='user' field in adminlogin.php page
    $password = $_POST['password'];     //THIS SHOULD BE SAME AS name='pass' field in adminlogin.php page

    $sql = " select * from admin where username = '$username' and password = '$password' "; // user column same as in table and pass column same as in table

    $query = mysqli_query($conn, $sql); //MYSQLi command to fire the query

    $row = mysqli_num_rows($query);  //Get the number of rows in table obtained from query
    if ($row == 1) {
        $_SESSION['user'] = $username;  //This is a SESSION VARIABLE that can be used anywhere
		echo ' <script type="text/javascript">alert("LOGIN SUCCESSFULLY");
		window.location.replace("admin.php");
		</script>';
    } else {
        echo ' <script type="text/javascript">alert("LOGIN FAILED");
		window.location.replace("admin_login.php");
		</script>';
    }
}
