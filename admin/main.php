<!DOCTYPE html>

<html>
<head>
	<title>Login and Signup</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<style>
	body
	{
		overflow-x: hidden;
	}


	#centered1
	{
		position: absolute;
		font-size: 10px;
		top: 5%;
		left: 60%;
		transform: translate(-50%, -50%);
	}	
	#centered2
	{
		position: absolute;
		font-size: 10px;
		top: 50%;
		left: 30%;
		transform: translate(-50%, -50%);
	}	
	#centered3
	{
		position: absolute;
		font-size: 10px;
		top: 70%;
		left: 30%;
		transform: translate(-50%, -50%);
	}	
	#signup
	{
		width: 60%;
		border-radius: 30px;
	}
	#login
	{
		width: 60%;
		background-color: #fff;
		border: 1px solid #1da1f2;
		color: #1da1f2;
		border-radius: 30px;
	}
	#login : hover
	{
		width: 60%;
		background-color: #fff;
		color: #1da1f2;
		border: 2px solid #1da1f2;
		border-radius: 30px;
	}
	.well
	{
		background-color: #187FAB;
	}
</style>

<body>
	<div class = "row">
		<div class = "col-sm-12">
			<div class = "well">
				<CENTER><h1>CSTE Family</h1></CENTER>
			</div>
		</div>
	</div>
	<div class = "row">
		<div class = "col-sm-6" style = "left: 0.5%;">
			<img src = "../images/campus.jpg" class = "img-rounded" title = "campus" width = "650px" height = "505px">
			
			<div id = "centered1" class = "centered">
				<h3 style = "color: white">
					<strong></strong>
				</h3>
			</div>
		</div>

		<div class = "col-sm-6" style = "left: 5%">
			<img src="../images/logo.jpg" class = "img-rounded" title = "logo" width = "80px" height = "80px">
			<h2><strong>This is CSTE Familly. <br> Let's explore.</strong></h2> <br><br>

			<form method = "post" action = "">
				<button id = "login" class="btn btn-info btn-lg" name="login">Login</button>
				<?php
					if (isset($_POST['login'])) 
					{
						echo "<script>window.open('signin.php', '_self')</script>";
					}
				?>
			</form>
		</div>
	</div>
</body>
</html>