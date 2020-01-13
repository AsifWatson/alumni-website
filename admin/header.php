<?php
    include("connection.php");
    include("functions.php");
?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php">CSTE Family</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	
	      	<?php 
				$admin_email = $_SESSION['admin_email'];
				$get_admin = "select * from admin where admin_email = '$admin_email'"; 
				$run_admin = mysqli_query($con, $get_admin);
				$row = mysqli_fetch_array($run_admin);
						
				$id = $row['id']; 
				$admin_email = $row['admin_email'];
				$admin_pass = $row['admin_pass'];
				$recovery_info = $row['recovery_info'];
			?>

	        <li>
	        	<a href="#"> Admin </a>
	        </li>
			<li>
				<a href="home.php">Home</a>
			</li>
			<li>
				<a href="members.php">Find People</a>
			</li>
			<li>
				<a href="achievements.php">Achievements</a>
			</li>
					<?php
						echo"

						<li class='dropdown'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
							<ul class='dropdown-menu'>
								
								<li>
									<a href='edit_profile.php'>Edit Account</a>
								</li>
								<li role='separator' class='divider'></li>
								<li>
									<a href='logout.php'>Logout</a>
								</li>
							</ul>
						</li>

						";
					?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<form class="navbar-form navbar-left" method="get" action="results.php">
						<div class="form-group">
							<input type="text" class="form-control" name="user_query" placeholder="Search for posts" required>
						</div>
						<button type="submit" class="btn btn-info" name="search">Search</button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>