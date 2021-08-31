<?php 

include "include/header.php";
include "include/database.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
//for teacher class
$class = $_GET['class'];

	$subject =  "select subject.id,subject.title from subject_class join subject on subject.id = subject_class.subject_ where class_='$class'";
	$subject_result = mysqli_query($connection, $subject);
	if(!$subject_result){
		die(mysqli_error());
	}

//2. Same as student POST view frontend same
//3. send class id GET
//4.Display data and download
?>

<?php 
include "include/navigation.php";
  ?>


<h1 style="margin-left:125px;" class="display-3">Select subject</h1>
<center>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<?php 
			if(mysqli_num_rows($subject_result)!=0)
			{
			while($row = mysqli_fetch_assoc($subject_result))
			{
				echo "
				<div class='col-md-4'>
				<div class='thumbnail'>
					<div class='caption'>
						<h3>$row[title]</h3>
						<p>Class $row[title] assignment. </p>
						<p><a style='width:100%;' href='./select_assignment.php?class=$_GET[class]&subject=$row[id]' class='btn btn-success' role='button'>List Assignment</a></p>
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
			<div class='alert alert-warning'>
				There are no subject for this class!
			</div>
			</div>
			";
			}
			?>
		</div>

	</div>
	<!-- /.row -->
</center>
<?php include "include/footer.php" ?>