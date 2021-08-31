<?php 

include "include/header.php";
include "include/database.php";
session_start();	

error_reporting(E_ALL);
ini_set('display_errors', 0);

//user query
	$show_user_query =  "select * from user";
	$result = mysqli_query($connection, $show_user_query);

//show student query
	$show_student_query =  "select * from student";
	$result_student = mysqli_query($connection, $show_student_query);
	if(!$result_student && !$result){
		die(mysqli_error());
	}
	else{
	
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
		
		while($row = mysqli_fetch_assoc($result_student))
		{
			$user = $row['username'];
			$pass= $row['password'];
			
			if($user == $username && $password == $pass)
			{
				$_SESSION["username"] = $user;
				$show_user =  "select * from student where username='$user' ";
				$user_id= mysqli_query($connection, $show_user);
				
				while($user = mysqli_fetch_assoc($user_id) )
				{
					$_SESSION["id"] = $user['id'];
					
				}
				
				$_SESSION["user_type"] = "student";
				header('Location: index.php');
			}
			else{
				echo "No login";
			}
}
	
		while($row = mysqli_fetch_assoc($result))
		{
			$user = $row['username'];
			$pass= $row['password'];
			
			if($user == $username && $password == $pass)
			{
				$show_user =  "select user_type,id from user where username='$user' ";
				$user_type = mysqli_query($connection, $show_user);
				$_SESSION["username"] = $user;
				if(!$user_type){
				die(mysqli_error());
				}
				while($user = mysqli_fetch_assoc($user_type) )
				{
					$_SESSION["user_type"] = $user['user_type'];
					$_SESSION["id"] = $user['id'];
					
				}
				
				echo "redirect to login";
				
				header('Location: index.php');
			}
			else{
				echo "No login";
			}
		}
	}	
	}

?>

<?php
		
		?>

<?php 
include "include/navigation.php";
  ?>
<h1 style="margin-left:125px;" class="display-3">Login</h1>
<center>

	<div class="container" style="margin-top:70px;">

		<div class="row">
			<div class="col-md-6">
				<form class="col-md-12" method="POST">
					<div class="form-group">
						<input type="text" required name="username" class="form-control form-control-lg" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
					</div>

					<div class="form-group">
						<input type="submit" required class="btn btn-success btn-lg btn-block" name="submit">
						<br>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<img src="https://i.pinimg.com/originals/d1/54/66/d154660a6ae3104de2b0a314667a5ab6.png" style="height:300px;margin-top:-30px;margin-left:-40px;" class="img-responsive" alt="">
			</div>
		</div>
	</div>
</center>