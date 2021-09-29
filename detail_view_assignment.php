<?php 
include "include/header.php";
include "include/database.php";
  ?>

<?php 
include "include/navigation.php";
  ?>
<?php

//Get global id for class
$class = $_GET['class'];

//get global id for subject
$subject = $_GET['subject'];

//get global id for assignment
$assignment = $_GET['assignment'];


//get class query
$class_query =  "select * from class where id='$class' ";
	$result_class = mysqli_query($connection, $class_query);
	if(!$result_class){
		die(mysqli_error());
	}
//get subject query
$subject_query =  "select * from subject where id='$subject' ";
	$result_subject = mysqli_query($connection, $subject_query);
	if(!$result_subject){
		die(mysqli_error());
	}

//get student query
$student_query =  "select * from student where class_='$class' ";
	$result_student = mysqli_query($connection, $student_query);
	if(!$result_student){
		die(mysqli_error());
	}

//insert into submission
$submission_assignment = "select submission.file,submission.assignment,submission.student_ from submission join assingment on assingment.id = submission.assignment where subject=$subject and class_=$class";
$result_submission = mysqli_query($connection, $submission_assignment);
if(!$result_submission){
		die(mysqli_error($connection));
	}
?>


<!-- Page Content -->
<div class="container">
	<h3> Class: <b> <?php
	while($row=mysqli_fetch_assoc($result_class))
	{
		echo $row['title'];
	}
	?></b></h3>
	<h3> Subject: <b> <?php
	while($row=mysqli_fetch_assoc($result_subject))
	{
		echo $row['title'];
	}
	?></b></h3>
	<hr>
	<div class="row">

		<!-- Blog Post Content Column -->
		<div style="margin-right:80px;" class="col-lg-7">
			<h4 style="color:#5cB85c;"> <b>Submitted students</b></h4>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">First name</th>
						<th scope="col">Last name</th>
						<th scope="col">Username</th>
						<th scope="col">Assignment</th>
						<th scope="col">Submission file</th>
					</tr>
				</thead>
				<tbody>
					<?php
	  while($row=mysqli_fetch_assoc($result_submission))
		  
	  {
//		  Getting username
		$username =  "select * from student where id=$row[student_] ";
		$username_result = mysqli_query($connection, $username);
		if(!$username_result){
			die(mysqli_error());
		}
		  
		  //		  Getting assesment
		$assignment =  "select * from assingment where id=$row[assignment] ";
		$assignment_result = mysqli_query($connection, $assignment);
		if(!$assignment_result){
			die(mysqli_error());
		}
		  			echo "<tr>";
		  if(mysqli_num_rows($username_result)!=0)
		  {
			   while($stu = mysqli_fetch_assoc($username_result))
		  {
			  echo "<td>$stu[first_name]</td>";
			  echo "<td>$stu[last_name]</td>";
			  echo "<td>$stu[username]</td>";
		  }
		  }
		  else
		  {
			   echo "<td>No students</td>";
		  }
		  
		  
       while($assign = mysqli_fetch_assoc($assignment_result))
		  {
			  echo "<td>$assign[title]</td>";
		  }
	  
		 
		  echo "<td>$row[file] <button style='float:right;' class='btn btn-success'>      <a href='download.php?file=$row[file]' style='color:white;'>Download</a> </button></td>";
    echo "</tr>";
		  
		  
	  }
		?>

				</tbody>
			</table>
		</div>
		<div class="col-lg-4">
			<h4 style="color:#5cB85c;"> <b>Total students</b></h4>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Firstname</th>
						<th scope="col">Lastname</th>
						<th scope="col">username</th>
					</tr>
				</thead>
				<tbody>
					<?php 
	   while($std = mysqli_fetch_assoc($result_student))
		  {  		echo "<tr>";
		   echo "<td>$std[first_name]</td>";
		   echo "<td>$std[last_name]</td>";
			  echo "<td>$std[username]</td>";
		       echo "</tr>";

		  }
	  ?>
				</tbody>
			</table>
		</div>
	</div>

	<hr>

	<?php 
include "include/footer.php";
  ?>