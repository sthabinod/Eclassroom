<?php 

include "./include/header.php";
include "./include/database.php";
?>


<div id="page-wrapper">

	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">
					Admin Dashboard
				</h3>
				<ol class="breadcrumb">
					<li>
						<i class="fa fa-dashboard"></i> <a style="color:#5cb85c;" href="index.php">Dashboard</a>
					</li>
					<li class="active">
						<i class="fa fa-file"></i> Welcome <?php  echo $_SESSION['username']; ?>
					</li>
				</ol>
			</div>
		</div>
		<div class='col-md-3'>
			<div class='thumbnail'>
				<div class='caption'>
					<h3>Class</h3>
					<p><a href='./index.php?check=class' class='btn btn-success' role='button'>Change classes</a></p>
				</div>
			</div>
		</div>
		<div class='col-md-3'>
			<div class='thumbnail'>
				<div class='caption'>
					<h3>Units</h3>
					<p><a href='./index.php?subject=subject' class='btn btn-success' role='button'>Change Unit</a></p>
				</div>
			</div>
		</div>

		<div class='col-md-3'>
			<div class='thumbnail'>
				<div class='caption'>
					<h3>Teachers</h3>
					<p><a href='./index.php?teacher=teacher' class='btn btn-success' role='button'>Change Teacher</a></p>
				</div>
			</div>
		</div>

	</div>

</div>