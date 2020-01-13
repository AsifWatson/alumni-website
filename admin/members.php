<!DOCTYPE html>

<?php
	session_start();
	include("header.php");

	if(!isset($_SESSION['admin_email'])){
		header("location: index.php");
	}	
?>

<html>
<head>
	<title>Find People</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>

<body>
	<div class="row">
		<div class="col-sm-12">
			<center><h2>Find People</h2></center><br>
			<div class="row">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<center>
						<form class="navbar-form navbar-left" action="">
							<input class="form-control" style="width: 300px; height: 35px;" type="text" placeholder="Search" name="search_user" required>
							<button class="btn btn-info" type="submit" name="search_user_btn">Search</button>
						</form>
					</center>
				</div>
				<div class="col-sm-4">
				</div>
			</div><br><br>
			<?php search_user(); ?>
		</div>
	</div>
</body>
</html>