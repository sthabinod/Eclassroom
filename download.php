<?php 

include "include/database.php";

if(isset($_GET['student']))
{
	$s =  $_GET['student'];
	$a = $_GET['assignment'];
	$query = "SELECT * from submission where assingment=$a and student_=$s";
	$result = mysqli_query($connection,$query);
	
	
	$file = 'media/'.$data['file'];
}


?>