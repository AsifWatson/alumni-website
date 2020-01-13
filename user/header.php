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
				$user = $_SESSION['user_email'];
				$get_user = "select * from users where user_email = '$user'"; 
				$run_user = mysqli_query($con, $get_user);
				$row = mysqli_fetch_array($run_user);
						
				$user_id = $row['user_id']; 
				$user_name = $row['user_name'];
				$user_email = $row['user_email'];
				$user_pass = $row['user_pass'];

				$user_batch = $row['user_batch'];
				$user_gender = $row['user_gender'];

				$user_workplace = $row['user_workplace'];
				$user_designation = $row['user_designation'];
				$user_livingplace = $row['user_livingplace'];
				$user_contact = $row['user_contact'];
				
				$user_image = $row['user_image'];
				$recovery_info = $row['recovery_info'];
			?>

	        <li>
	        	<a href='profile.php?<?php echo "u_id=$user_id" ?>'><?php echo "$user_name"; ?></a>
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
									<a href='edit_profile.php?u_id=$user_id'>Edit Account</a>
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