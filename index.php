<?php 
include "include/header.php";
  ?>

<?php 
include "include/navigation.php";
  ?>

<?php 
session_start();

$username='';
$type = '';
if($_SESSION['username'] != '' && $_SESSION['user_type'] != '')
{
	$username = $_SESSION['username'];
	$type = $_SESSION['user_type'];
}
else {
	include "include/home.php";
}


if($type=="student")
{
include "include/student_dashboard.php";
	
}
else if($type=="teacher"){
	include "include/teacher_dashboard.php";
}


else if($type=="admin"){
	include "admin/index.php";
}
  ?>

<?php 
include "include/footer.php";
  ?>