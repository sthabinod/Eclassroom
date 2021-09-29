<?php 
include "./include/navigation.php";
include "./include/header.php";
include "./include/database.php";
?>


<?php 
//display class
	$show_class =  "select * from class";
	$class_result = mysqli_query($connection, $show_class);
	if(!$class_result){
		die(mysqli_error());
	}

//subject
	$show_subject =  "select * from subject";
	$subject_result = mysqli_query($connection, $show_subject);
	if(!$subject_result){
		die(mysqli_error());
	}


//subject
	$show_teacher =  "select * from user where user_type='teacher' ";
	$teacher_result = mysqli_query($connection, $show_teacher);
	if(!$teacher_result){
		die(mysqli_error());
	}

//add permission

if(isset($_POST['submit'])){
	$class = $_POST['class'];
	$subject = $_POST['subject'];
	$teacher = $_POST['teacher'];
	
	$permission_query = "Insert into class_subject_teacher(class_,subject_,teacher_) ";
	$permission_query .= "values('$class','$subject','$teacher')";
		
		$result = mysqli_query($connection, $permission_query);
			
		if(!$result)
		{
			die(mysqli_error($connection));
		}
		else{
			echo "Permission given successfully!";
		}
		
} 

else {
	echo "No post";
}

?>
<div id="page-wrapper">

	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Permission to teacher
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-file"></i> Teacher
					</li>
				</ol>
			</div>
		</div>

	</div>
	<h1 style="margin-left:125px;" class="display-3">Permission to teacher</h1>

	<div class="container" style="margin-top:70px;">
		<div class="row">
			<div class="col-md-12">
				<form class="col-md-12" action="" method="POST">


					<div class="form-group">
						<select class="form-control" name="class">
							<option selected>Class</option>
							<?php 
							while($row = mysqli_fetch_assoc($class_result))
							{
								echo "<option value='$row[id]'>$row[title]</option>";
							}
								

							?>

						</select>
					</div>


					<div class="form-group">
						<select class="form-control" name="subject">
							<option selected>Subject</option>
							<?php 
							while($row = mysqli_fetch_assoc($subject_result))
							{
								echo "<option value='$row[id]'>$row[title]</option>";
							}
								

							?>
						</select>
					</div>


					<div class="form-group">
						<select class="form-control" name="teacher">
							<option selected>Teacher</option>
							<?php 
							while($row = mysqli_fetch_assoc($teacher_result))
							{
								echo "<option value='$row[id]'>$row[username]</option>";
							}
								

							?>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-success btn-lg btn-block" name="submit">
						<br>

					</div>
				</form>
			</div>

		</div>
	</div>

</div>