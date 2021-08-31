<?php 
include "include/header.php";
include "include/database.php";
  ?>

<?php 
include "include/navigation.php";
  ?>
<?php

session_start();

$id = $_SESSION['id'];


//for upload_others
$show_user =  "select * from student where id='$id'";
	$result_user = mysqli_query($connection, $show_user);
	if(!$show_user){
		die(mysqli_error());
	}

//for routine
while($row=mysqli_fetch_assoc($result_user))
{
	$id_c = $row['class_'];
	$show_others_query =  "select * from upload_others where class='$id_c' and type='routine' ";
	$result_others = mysqli_query($connection, $show_others_query);
	if(!$result_others){
		die(mysqli_error());
	}
}


?>

<!-- Page Content -->

<div class="container">
	<div class="row">

		<!-- Blog Post Content Column -->
		<div class="col-lg-12">
			<h2> All time table updates</h2>
			<?php
					while($row = mysqli_fetch_assoc($result_others))
					{
						
						echo "	
						<div class='thumbnail'>
							<div class='caption'>
								<div>
									<h3> $row[title]</h3>
								</div>
								<div style='float:right;margin-left:30px;'>

								</div>

								<p style='margin-right:100px;text-align:justify;'>$row[description]</p>
								<p> <a href='$row[file]'>$row[file]</a>	</span></p>
							

										<p> <a style='width:100%;' href='' class='btn btn-success	' role='button'>Download routine</a>
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
					?>
		</div>
	</div>
</div>
<hr>

<?php 
include "include/footer.php";
  ?>