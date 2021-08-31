<?php 
	$connection = mysqli_connect('localhost','root','','school');
	if($connection)
	{
		echo "";
	}
	else{
		die("No database connected.");
	}
?>