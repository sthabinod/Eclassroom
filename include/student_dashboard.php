<?php
include "include/database.php";
//for getting all subjects
$id = $_SESSION['id'];


$show_class_query =  "select class_ from student where id=$id ";
	$result_class= mysqli_query($connection, $show_class_query);
	if(!$result_class){
		die(mysqli_error());
	}

$class = Null;
while($row = mysqli_fetch_assoc($result_class))
{
	$class = $row['class_'];
}
$show_subject_query = "SELECT subject.title,subject.id FROM subject_class join class on class.id = subject_class.class_ join subject on subject.id = subject_class.subject_ where class_ = $class";
	$result_subject= mysqli_query($connection, $show_subject_query);
	if(!$result_subject){
		die(mysqli_error($connection));
	}
?>
<div style="margin-bottom:40px;" class="container">

	<h1 class="display-3">My units</h1>


</div>
<div class="container">

	<div class="row">


		<?php 
		while($row = mysqli_fetch_assoc($result_subject))
			{
				echo "<div class='col-md-3'>
			<div class='thumbnail'>
				<div class='caption'>
					<h3>$row[title]</h3>
					<p><a href='./posts.php?id=$row[id]'  style='width:100%;' class='btn btn-success' role='button'>View assignment of $row[title]</a></p>
				</div>
			</div>
		</div>";
			}
		
	
		?>


	</div>

</div>

<hr>