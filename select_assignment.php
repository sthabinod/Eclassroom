<?php 
include "include/header.php";
include "include/database.php";
  ?>

<?php 
include "include/navigation.php";
  ?>
<?php

session_start();

//for assignment
$subject = $_GET['subject'];
$class = $_GET['class'];
$teacher = $_SESSION['id'];
$show_assignment_query =  "select * from assingment where subject='$subject' and class_='$class'  and teacher='$teacher'";
	$result_assignment = mysqli_query($connection, $show_assignment_query);
	if(!$result_assignment){
		die(mysqli_error());
	}
?>

<!-- Page Content -->
<div class="container">
	<div class="row">

		<!-- Blog Post Content Column -->
		<div class="col-lg-12">
			<h2> Assignments</h2>


			<?php
			if(mysqli_num_rows($result_assignment)!=0)
			{
					while($row = mysqli_fetch_assoc($result_assignment))
					{
						//for upload_others
						$teacher_query =  "select * from user where id=$row[teacher]";
						$result_teacher = mysqli_query($connection, $teacher_query);
						if(!$result_teacher){
							die(mysqli_error());
							}

						echo "	
						<div class='thumbnail'>
							<div class='caption'>
								<div>
									<h3> $row[title]</h3>";
									 while($tea = mysqli_fetch_assoc($result_teacher))
									{
										echo "<p> -By <b> $tea[username] </b></p>";
									}
									echo "
								</div>
								<div style='float:right;margin-left:30px;'>
									<p><span class='glyphicon glyphicon-ok'></span> Assignment</p>

									<p><span class='glyphicon glyphicon-hand-up'></span> Posted on: $row[upload_date]</p>
									<p><span class='glyphicon glyphicon-time'></span> <span style='color:#cc3300;'>Deadline: $row[deadline]</span></p>
								</div>

								<p style='margin-right:100px;text-align:justify;'>$row[description]</p>
								<p> <a href='$row[file]'>$row[file]</a>	 <span><i>Download</i></span></p>
								<p> <a style='width:100%;' href='detail_view_assignment.php?assignment=$row[id]&subject=$subject&class=$class' class='btn btn-success' role='button'>Select assignment</a>
								</p>
							</div>
						</div>
					";							
					}
			}
			else
			{
				echo "
			<div class='container'>
			<div class='alert alert-warning'>
				There are no assignment for this subject!
			</div>
			</div>
			";
			}
					?>
		</div>
	</div>
</div>
<hr>

<?php 
include "include/footer.php";
  ?>