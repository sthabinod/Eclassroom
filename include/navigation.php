 <!-- Navigation -->
 <?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 0);
?>
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 	<div class="container">
 		<!-- Brand and toggle get grouped for better mobile display -->
 		<div class="navbar-header">
 			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
 				<span class="sr-only">Toggle navigation</span>
 				<span class="icon-bar"></span>
 				<span class="icon-bar"></span>
 				<span class="icon-bar"></span>
 			</button>
 			<a class="navbar-brand" href="index.php">E Classroom</a>
 		</div>
 		<!-- Collect the nav links, forms, and other content for toggling -->
 		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 			<ul class="nav navbar-nav">




 				<?php 
				if(isset($_SESSION['username']))
				{
					
					if($_SESSION["user_type"]=="admin")
					{
					echo "
					
					
					<li>
 						<a href='./index.php?subject=subject'>Unit</a>
 					</li>
					
					<li>
 						<a href='./index.php?check=class'>Class</a>
 					</li>
					
					<li>
 						<a href='./index.php?teacher=teacher'>Teacher</a>
 					</li>
					
					<li>";
					}
					else
					{
						echo "";
					}
					echo "<li>";
					
 						if($_SESSION["user_type"]=="student")
						{
							 echo "<a href='./routine.php'>My class routine</a>";
						}
					else
					{
						echo "";
					}
                     
					
					echo "
 				</li>
					";
				}
				?>




 			</ul>
 			<ul class="nav">
 				<li>
 					<?php 
						if(isset($_SESSION['username']))
						{
							 				echo	"<a style='float:right;color:#5cb85c;' class='glyphicon glyphicon-log-out' href='./logout.php'> Logout</a>";
							$username = $_SESSION['username'];
							echo	"<a style='float:right;color:#5cb85c;' class='glyphicon glyphicon-user' href=''> $username  </a>";

						}
						else
						{	
							echo	"<a style='float:right;color:#5cb85c;' class='glyphicon glyphicon-log-in' href='./logout.php'> Login  </a>";
						}
					?>



 				</li>
 			</ul>
 		</div>

 		<!-- /.navbar-collapse -->
 	</div>
 	<!-- /.container -->
 </nav>