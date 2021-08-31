<?php 

include "include/header.php";
include "include/database.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);

//for teacher class
$id = $_SESSION['id'];
$teacher_class =  "select class.id,class.title,class_subject_teacher.subject_ from class_subject_teacher join class on class.id = class_subject_teacher.class_ where teacher_='$id'";
	$teacher_class_result = mysqli_query($connection, $teacher_class);
	if(!$teacher_class_result){
		die(mysqli_error());
	}

?>

<?php 
include "include/navigation.php";
  ?>


<h1 style="margin-left:125px;" class="display-3">Select classes</h1>
<center>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<?php 
			if (mysqli_num_rows($teacher_class_result)!=0)
			{
			while($row = mysqli_fetch_assoc($teacher_class_result))
			{
				echo "
				<div class='col-md-4'>
				<div class='thumbnail'>
					<div class='caption'>
						<h3>$row[title]</h3>
						<p>Class $row[title] assignment. </p>
						<p><a style='width:100%;' href='./subject_assignment.php?class=$row[id]' class='btn btn-success' role='button'>Select unit</a></p>
					</div>
				</div>
			</div>
				";
			}
			}
			else
			{
				echo "
			<div class='container'>
			<div class='alert alert-success'>
				There are no classes for you!
			</div>
			</div>
			";
			}
			?>
		</div>

	</div>
</center>
<?php include "include/footer.php" ?>