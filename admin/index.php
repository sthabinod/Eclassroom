<?php 
include "./include/header.php";
include "./include/database.php";
?>


<?php

if($_GET['check'])
{
	include "include/permit_teacher_class_subject.php"; 
}

elseif($_GET['subject'])
{
	include "include/add_subject.php"; 

}
elseif($_GET['teacher'])
{
	include "include/add_teacher.php"; 
}
else
{
	include "include/admin_dashboard.php"; 

}

?>

