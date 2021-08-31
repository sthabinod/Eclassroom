<?php
session_start();
//session destroy
if($_SESSION['username'] && $_SESSION['user_type'])
{
	$_SESSION['username']=null;
	$_SESSION['user_type']=null;
	$_SESSION['id']=null;
	echo "session destroyed";
	header('Location: login.php');
}
else{
	echo "No session found";
	header('Location: login.php');
}

?>