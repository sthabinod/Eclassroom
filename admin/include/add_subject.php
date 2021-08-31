<?php 
include "./include/navigation.php";
include "./include/header.php";
include "./include/database.php";
?>

<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Unit
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i> <a style="color:#5cb85c;" href="">Units</a>
					</li>
					<li class="active">
						<i class="fa fa-file"></i> manipulation
					</li>
				</ol>
			</div>
		</div>

	</div>

	<?php

//Get units
$query_get_unit = "select * from subject ";
$result_get_unit = mysqli_query($connection, $query_get_unit );
	if(!$result_get_unit){
		die(mysqli_error());
	}

if(isset($_POST['submit'])){
	$title = $_POST['title'];
	
	

		$subject = "Insert into subject(title) ";
		$subject .= "values('$title')";
		
		$result = mysqli_query($connection, $subject);
			
		if(!$result)
		{
			die(mysqli_error($connection));
		}
		else{
			echo "
			<div class='container'>
			<div class='alert alert-success'>
				Unit created successfully!
			</div>
			</div>
			";
		}
} 

else {
	echo "
			
			";
}

?>
	<h1 style="margin-left:125px;" class="display-3">Add new unit</h1>

	<div class="container" style="margin-top:70px;">
		<div class="row">
			<div class="col-md-6">
				<form class="col-md-12" action="" method="POST">
					<div class="form-group">
						<input type="text" name="title" required class="form-control form-control-lg" placeholder="Subject name">
					</div>


					<div class="form-group">
						<input type="submit" class="btn btn-success btn-lg btn-block" name="submit">
						<br>

					</div>
				</form>
			</div>

			<div class="col-md-6">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col">Title</th>
							<th scope="col">Delete</th>
							<th scope="col">Edit</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						while($row=mysqli_fetch_assoc($result_get_unit))
						{
							echo "<tr>
							<td>$row[title]</td>
							<td><a href=''>Del</a></td>
							<td><a href=''>Edit</a></td>
						</tr>";
						}
						
					?>

					</tbody>
				</table>
			</div>

		</div>
	</div>

</div>
<!-- /#page-wrapper -->