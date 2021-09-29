<?php 
include "./include/navigation.php";
include "./include/header.php";
include "./include/database.php";
?>

<div id="page-wrapper">

	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Class
				</h1>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i> <a style="color:#5cb85c;">Class</a>
					</li>
					<li class="active">
						<i class="fa fa-file"></i> Manipulation
					</li>
				</ol>
			</div>
		</div>

	</div>

	<?php
if(isset($_GET['edit_class']))
{	
	echo $_GET['edit_class'];
	$id = $_GET['edit_class'];
	$query = "select * from class where id='$id'";
	$edit_query = mysqli_query($connection,$query);
	if(!$edit_query)
	{
		die(mysqli_error());
	}
}
else
{
	echo "";
}


if(isset($_GET['delete_class']))
{	
	echo $_GET['delete_class'];
	$id = $_GET['delete_class'];
	$query = "delete from class where id='$id'";
	$delete_query = mysqli_query($connection,$query);
	if(!$delete_query)
	{
		die(mysqli_error());
	}
	else
	{
		echo "
			<div class='container'>
			<div class='alert alert-success'>
				Successfully deleted class!
			</div>
			</div>
			";
	}
}
else
{
	echo "";
}
//Get class
$query_get_class = "select * from class ";
$result_get_class = mysqli_query($connection, $query_get_class);
	if(!$result_get_class){
		die(mysqli_error());
	}



?>
	<?php
	if(isset($_POST['submit'])){
	$title = $_POST['title'];
	
		$query= "select * from class where title='$title' ";
		$result_class = mysqli_query($connection, $query);
		if(mysqli_num_rows($result_class))
		{
			echo "
			<div class='container'>
			<div class='alert alert-warning'>
				Class already exists!
			</div>
			</div>
			";
		}
		else
		{
			$query_class = "Insert  into class(title) ";
			$query_class .= "values('$title')";
		
			$result = mysqli_query($connection, $query_class);
			
			if(!$result)
			{
				die(mysqli_error($connection));
			} 
			else{
				echo "
			<div class='container'>
			<div class='alert alert-success'>
				Class created successfully!
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
	if(isset($_POST['update'])){
	$title = $_POST['title'];
	$id = $_GET['edit_class'];
		echo $id;

		$query_class = "UPDATE class set title='$title' where id=$id";
		
		$result = mysqli_query($connection, $query_class);
			
		if(!$result)
		{
			die(mysqli_error($connection));
		} 
		else{
			echo "
			<div class='container'>
			<div class='alert alert-success'>
				Class updated successfully!
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
	<!-- /.container-fluid -->
	<h1 style="margin-left:125px;" class="display-3">Add new class</h1>

	<div class="container" style="margin-top:70px;">
		<div class="row">
			<div class="col-md-6">
				<form class="col-md-12" action="" method="POST">
					<div class="form-group">
						<input type="text" required name="title" class="form-control form-control-lg" placeholder="Class name">
					</div>


					<div class="form-group">
						<?php 
							if(isset($_GET['edit_class']))
							{
								echo "<input type='submit' class='btn btn-success btn-lg btn-block' value='Update class' name='update'>";
							}
						else
						{
							echo"<input type='submit' class='btn btn-success btn-lg btn-block' value='Add class' name='submit'>";
						}
							?>
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
						while($row=mysqli_fetch_assoc($result_get_class))
						{
							echo "<tr>
							<td>$row[title]</td>
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