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
	<title>Admin</title>
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
			<center><h2><strong>Important Posts From CSTEians</strong></h2><br></center>
			<?php get_posts(); ?>
		</div>
	</div>
</body>
</html>