<?php

//importing from include
include "include/header.php";
include "include/database.php";
include "include/navigation.php";



//Get student
$query_get_student = "select * from student ";
$result_get_student = mysqli_query($connection, $query_get_student);
	if(!$result_get_student){
		die(mysqli_error());
	}

//show class query
$show_class =  "select * from class";
	$class_result = mysqli_query($connection, $show_class);
	if(!$class_result){
		die(mysqli_error());
	}


//Add student 
if(isset($_POST['submit'])){

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$c_password = $_POST['c_password'];
	$class = $_POST['class'];
	echo $firstname.$lastname.$email;
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
		$query_user = "Insert into student(username,password,class_,first_name,last_name,email_address)";
		$query_user .= "values('$username','$password',$class, $firstname, $lastname,$email)";
		
		$result = mysqli_query($connection, $query_user);
		
		if(!$result)
		{
			header("location:add_student.php");
			die(mysqli_error($connection));
		}
		else{
			
				echo "
			<div class='container'>
			<div class='alert alert-success'>
			Student user created successfully!
			</div>
			</div>
			";
		}
		
	}
} 

else {
	echo "";
}

?>


<!--html work starts-->
<h1 style="margin-left:125px;" class="display-3">Add student</h1>

<div class="container" style="margin-top:70px;">
	<div class="row">
		<div class="col-lg-6">
			<form class="col-md-12" action="" method="POST">
			
				<div class="form-group"> 
					<input type="text" name="username" required class="form-control form-control-lg" placeholder="Username">
				</div>
					<div class="form-group">
					<input type="text" name="firstname" required class="form-control form-control-lg" placeholder="First name">
				</div>
				<div class="form-group">
					<input type="text" name="lastname" required  class="form-control form-control-lg" placeholder="Last name">
				</div>
				<div class="form-group">
					<input type="email" name="email" required  class="form-control form-control-lg" placeholder="Email addresss">
				</div>
				<div class="form-group">
					<input type="password" name="password" required  class="form-control form-control-lg" placeholder="Password">
				</div>



				<div class="form-group">
					<input type="password" required  name="c_password" class="form-control form-control-lg" placeholder="Confirm Password">
				</div>

				<div class="form-group">
					<label for="" style="float:left;"> select class</label>
					<select class="form-control" name="class">
						<?php 
							while($row = mysqli_fetch_assoc($class_result))
							{
								echo "<option value='$row[id]'>$row[title]</option>";
							}
								

							?>

					</select>
				</div>


				<input name="type" type="text" value="teacher" hidden="true">
				<div class="form-group">
					<input type="submit" class="btn btn-success btn-lg btn-block" name="submit">
					<br>

				</div>
			</form>
		</div>

		<div class="col-md-6">
			<div class="col-lg-6">
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
						while($row=mysqli_fetch_assoc($result_get_student))
						{
							echo "<tr>
							<td>$row[first_name]</td>
							<td>$row[last_name]</td>
							<td>$row[username]</td>
							<td>$row[email_address]</td>
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