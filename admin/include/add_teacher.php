<?php 
include "./include/navigation.php";
include "./include/header.php";
include "./include/database.php";
?>


<?php


//Get teacher
$query_get_teacher = "select * from user where user_type='teacher' ";
$result_get_teacher = mysqli_query($connection, $query_get_teacher);
	if(!$result_get_teacher){
		die(mysqli_error());
	}

?>
<div id="page-wrapper">

	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Teacher
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i> <a style="color:#5cb85c;" href="">Teacher</a>
					</li>
					<li class="active">
						<i class="fa fa-file"></i> Manipulation
					</li>
				</ol>
			</div>
		</div>

	</div>

	<?php 
if(isset($_POST['submit'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email_address = $_POST['email_address'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$c_password = $_POST['c_password'];
	$user_type = $_POST['type'];
	
	if($password != $c_password)
	{
		echo "
			<div class='container'>
			<div class='alert alert-danger'>
				Password does not match!
			</div>
			</div>
			";
	}
	else
	{
		$query_user = "Insert into user(username,password,user_type,first_name,last_name,email) ";
		$query_user .= "values('$username','$password','$user_type', '$first_name', '$last_name','$email_address')";
		
		$result = mysqli_query($connection, $query_user);
		header("Location:add_teacher.php");

		if(!$result)
		{
			die(mysqli_error($connection));
		}
		else{
			echo "
			<div class='container'>
			<div class='alert alert-success'>
				User created successfully!
			</div>
			</div>
			";
		}
		
	}
} 

else {
	echo "
			
			";
}
				?>
	<h1 style="margin-left:125px;" class="display-3">Add teacher class</h1>

	<div class="container" style="margin-top:70px;">
		<div class="row">
			<div class="col-md-6">
				<form class="col-md-12" action="" method="POST">
					<div class="form-group">
						<input type="text" name="first_name" required class="form-control form-control-lg" placeholder="First name">
					</div>
					<div class="form-group">
						<input type="text" name="last_name" required class="form-control form-control-lg" placeholder="Last name">
					</div>
					<div class="form-group">
						<input type="email" name="email_address" required class="form-control form-control-lg" placeholder="Email Address">
					</div>
					<div class="form-group">
						<input type="text" name="username" required class="form-control form-control-lg" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password" name="password" required class="form-control form-control-lg" placeholder="Password">
					</div>



					<div class="form-group">
						<input type="password" name="c_password" required class="form-control form-control-lg" placeholder="Confirm Password">
					</div>

					<input name="type" type="text" value="teacher" hidden="true">
					<div class="form-group">
						<input type="submit" class="btn btn-success btn-lg btn-block" name="submit">
						<br>

					</div>
				</form>
			</div>


			<div class="col-md-6">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col">First name</th>
							<th scope="col">Last name</th>
							<th scope="col">Username</th>
							<th scope="col">Email</th>
							<th scope="col">Edit</th>
							<th scope="col">Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						while($row=mysqli_fetch_assoc($result_get_teacher))
						{
							echo "<tr>
							<td>$row[first_name]</td>
							<td>$row[last_name]</td>
							<td>$row[username]</td>
							<td>$row[email]</td>
							<td><a href=''>Del</a></td>
							<td><a href=''>Edit</a></td>
						</tr>";
						}
						
					?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
