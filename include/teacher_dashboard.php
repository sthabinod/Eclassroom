<div style="margin-top:-30px;" class="jumbotron">
	<div class="container">
		<h3 class="display-3">Welcome <b> <?php echo $_SESSION['username'] ?></b> </h3>
		<p class="lead">You are authorized to add student, upload and view assignments.</p>
		<hr class="m-y-md">
		<p class="lead">
			<a class="btn btn-success btn-lg" href="./upload_assingment.php" role="button">Upload assignment</a>
		</p>
	</div>
</div>
<div class="container">

	<div class="row">

				<div class="col-md-4">
			<div class="thumbnail">
				<div class="caption">
					<h3>Assignment</h3>
					<p>Here you can upload assingment</p>
					<p><a href="./upload_assingment.php" style="width:100%;" class="btn btn-success" role="button">Upload Assignment</a></p>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="row">
				<div class="thumbnail">
					<div class="caption">
						<h3>Time table and materials</h3>
						<p>Here you can upload time table and other materials</p>
						<p><a href="./upload_others.php" style="width:100%;" class="btn btn-success" role="button">Upload others</a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="thumbnail">
				<div class="caption">
					<h3>Student Assingment</h3>
					<p>Here you can check the assignment</p>
					<p><a href="./view_assignment.php" style="width:100%;" class="btn btn-success" role="button">View assignement</a></p>
				</div>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="thumbnail">
				<div class="caption">
					<h3>Add student</h3>
					<p>Here you can add student</p>
					<p><a href="./add_student.php" style="width:100%;" class="btn btn-success" role="button">Add student</a></p>
				</div>
			</div>
		</div>
		
	</div>

</div>

<hr>