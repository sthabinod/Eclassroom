<?php 

include "include/header.php";
include "include/database.php";
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 0);	

//POST request to add assignment
if(isset($_POST['submit'])){

	$file = $_FILES['file']['name'];
	$temp_file = $_FILES['file']['tmp_name'];
	$destination = 'uploads/'.$file;
	
//	$file_temp = $FILES['file']['tmp_name'];
	$assignment = $_GET['assignment'];
	$current_date = date("Y/m/d");
	echo $current_date;
	move_uploaded_file($file_temp,"./files/$file");
//	get user from session
	$student = $_SESSION['username'];
	$show_student_query =  "select * from student where username='$student' ";
	$result_student = mysqli_query($connection, $show_student_query);
	if(!$result_student){
		die(mysqli_error());
	}
	$student_db = 0;
	while($row = mysqli_fetch_assoc($result_student))
	{
		$student_db = $row['id'];
	}

	if($file == '')
	{
		echo "
			<div class='container'>
			<div class='alert alert-danger'>
				Please import the file from your pc!
			</div>
			</div>
			";
		
	}
	else
	{
		$query_assignment = "Insert into submission(file, assignment,student_,date) ";
		$query_assignment .= "values('$file', $assignment ,$student_db,'$current_date')";
		
		$result = mysqli_query($connection, $query_assignment);
			
		if(!$result)
		{
			die(mysqli_error($connection));
		}
		else{
			move_uploaded_file($temp_file,$destination);
			echo "
			<div class='container'>
			<div class='alert alert-success'>
				Assignment submitted successfully
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

<?php 
include "include/navigation.php";
  ?>
<h1 style="margin-left:125px;" class="display-3">Submit assignment</h1>
<center>

	<div class="container" style="margin-top:70px;">

		<div class="row">
			<div class="col-md-12">
				<form class="col-md-12" action="" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<input type="file" name="file" class="form-control form-control-lg">
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