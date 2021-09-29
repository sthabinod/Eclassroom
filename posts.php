<?php 
include "include/header.php";
include "include/database.php";
  ?>

<?php 
include "include/navigation.php";
  ?>
<?php


//for assignment
$id = $_GET['id'];
$show_assignment_query =  "select * from assingment where subject='$id' ";
	$result_assignment = mysqli_query($connection, $show_assignment_query);
	if(!$result_assignment){
		die(mysqli_error());
	}

//for upload_others
$show_others_query =  "select * from upload_others where subject='$id' and type='study_material' ";
	$result_others = mysqli_query($connection, $show_others_query);
	if(!$result_others){
		die(mysqli_error());
	}



//for submitted assignment
$submitted_query =  "select * from submission";
	$result_submitted = mysqli_query($connection, $submitted_query);
	if(!$result_submitted){
		die(mysqli_error());
	}
?>

<!-- Page Content -->
<div class="container">
	<div class="row">

		<!-- Blog Post Content Column -->
		<div class="col-lg-9">
			<h2> Assignments</h2>

			<?php
			if (mysqli_num_rows($result_assignment)!=0)
			{
					while($row = mysqli_fetch_assoc($result_assignment))
					{
						//for teacher
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
										echo "<p> -By $tea[username]</p>";
									}
						
										
									$query2 = "SELECT * FROM assingment";
									$run2 = mysqli_query($connection, $query2);
									
								echo "</div>
								<div style='float:right;margin-left:30px;'>
									<p><span class='glyphicon glyphicon-ok'></span> Assignment</p>

									<p><span class='glyphicon glyphicon-hand-up'></span> Posted on: $row[upload_date]</p>
									<p><span class='glyphicon glyphicon-time'></span> <span style='color:#cc3300;'>Deadline: $row[deadline]</span></p>
								</div>	

								<p style='margin-right:100px;text-align:justify;'>$row[description]</p>
								<p> File format: <a href='download.php?file=$row[file]'>$row[file]</a>	 <span></span></p>
													";
																$date = date("Y-m-d");
																$dead = $row['deadline'];
															if($date >= $dead )
																{
																	echo "";
																}
						
									
							else {
								
								echo "
								<div >";
								
										
									echo "
										<p> <a style='width:100%;' href='submit_assignment.php?assignment=$row[id]' class='btn btn-link' role='button'>Submit assignment</a> </div>" ;
							}
								echo "
								
								</p>
							</div>
						</div>

				
					";							

						if(empty($row))
						{
							echo "The file is empty";
						}
						else{
							
						}
					}
			}
			else
			{
				echo "<br/>";
				echo "<b> There are no assignments for this subject</b>";
			}
					?>




		</div>
		<div style="margin-top:30px;" class="col-lg-3">
			<h4> Subject materials</h4>
			<?php
						if (mysqli_num_rows($result_others)!=0)
						{
					while($row = mysqli_fetch_assoc($result_others))
					{
						echo "	
						<div class='thumbnail'>
							<div class='caption'>
								<div>
									<h3> $row[title]</h3>
								</div>


								
								<p>$row[file] <span><i>Download</i></span></p>
								<p> <a style='width:100%;'  class='btn btn-success' role='button' href='download.php?file=$row[file]'>Download routine</a> </p>
						</div>

					
					";
					}
						}
						else
						{
							echo "<br/>";
							echo "<b>There are subject materials. </b>";
						}
					?>


		</div>


	</div>
</div>
<hr>

<?php 
include "include/footer.php";
  ?>