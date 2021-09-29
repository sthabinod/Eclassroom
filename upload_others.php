<?php 

include "include/header.php";
include "include/database.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);

//2. select subject 
$show_subject_query =  "select * from subject";
	$result_subject = mysqli_query($connection, $show_subject_query);
	if(!$result_subject){
		die(mysqli_error());
	}

//for class
//select class where user id is
$show_class_query =  "select * from class";
$result_class = mysqli_query($connection, $show_class_query);
if(!$result_class){
	die(mysqli_error());
}


//POST request to add assignment
if(isset($_POST['submit'])){
	$title = $_POST['title'];
	$description = $_POST['description'];
	$file = $_FILES['file']['name'];
	$temp_file = $_FILES['file']['tmp_name'];
	$destination = 'uploads/'.$file;
	$type = $_POST['type'];
	$subject = $_POST['subject'];
	$class = $_POST['class'];
	

	
	//	get user from session
	$teacher = $_SESSION['username'];
	$show_teacher_query =  "select * from user where username='$teacher' ";
	$result_teacher = mysqli_query($connection, $show_teacher_query);
	if(!$result_teacher){
		die(mysqli_error());
	}
	$teacher_db = 0;
	while($row = mysqli_fetch_assoc($result_teacher))
	{
		$teacher_db = $row['id'];
	}

	if($title == '' && $deadline == '' && $file == '' && $subject == '' && $class=='')
	{
		echo "Empty is not accepted!";
	}
	else
	{
		$query_other = "Insert into upload_others(title,description,file, type,subject, teacher, class) ";
		$query_other .= "values('$title','$description','$file', '$type', '$subject',$teacher_db, $class)";
		
		$result = mysqli_query($connection, $query_other);
			
		if(!$result)
		{
			die(mysqli_error($connection));
		}
		else{
			move_uploaded_file($temp_file,$destination);
			if($type == 'study_material')
					echo "
			<div class='container'>
			<div class='alert alert-success'>
				Study material published successfully!
			</div>
			</div>
			";
					
			else{
				echo "
			<div class='container'>
			<div class='alert alert-success'>
				Routine for subject has been published successfully!
			</div>
			</div>
			";
				
			}
			
		}
		
	}
} 

else {
	echo "";
}
?>

<?php 
include "include/navigation.php";
  ?>
<h1 style="margin-left:125px;" class="display-3">Upload files</h1>
<center>

	<div class="container" style="margin-top:70px;">

		<div class="row">
			<div class="col-md-12">
				<form class="col-md-12" action="upload_others.php" enctype="multipart/form-data" method="POST">

					<div class="form-group">
						<input type="text" required name="title" class="form-control form-control-lg" placeholder="Title">
					</div>

					<div class="form-group">
						<textarea type="text" required name="description" class="form-control form-control-lg" placeholder="Description of the assignment..."> </textarea>
					</div>



					<div class="form-group">
						<input type="file" required name="file" class="form-control form-control-lg">
					</div>

					<div class="form-group">
						<label for="" style="float:left;"> select unit</label>
						<select class="form-control" required name="subject">
							<?php 
							while($row = mysqli_fetch_assoc($result_subject))
							{
								echo "<option value='$row[id]'>$row[title]</option>";
							}
							
							?>

						</select>
					</div>
					<div class="form-group">
						<label for="" style="float:left;"> select class</label>
						<select class="form-control" required name="class">
							<?php 
							while($row = mysqli_fetch_assoc($result_class))
							{
								echo "<option value='$row[id]'>$row[title]</option>";
							}
							
							?>

						</select>
					</div>
					<div class="form-group">
						<select required class="form-control" name="type">
							<option value="routine">Routine</option>
							<option value="study_material">Study Materials</option>
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
</center>
<?php include "include/footer.php" ?>
