<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
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
	.main-content
	{
		width: 50%;
		height: 40%;
		margin: 10px auto;
		background-color: #fff;
		border: 2px solid #e6e6e6;
		padding: 40px 50px;
	}
	.header
	{
		border: 0px solid #000;
		margin-bottom: 5px;
	}
	.well
	{
		background-color: #187FAB;
	}
	#signup
	{
		width: 60%;
		border-radius: 30px;
	}
</style>

<body>
	<div class = "row">
		<div class="col-sm-12">
			<div class="well">
				<center><h1 style="color: white;">CSTE Family</h1></center>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<div class="main-content">
				<div class="header">
					<h3 style="text-align: center;"><strong>Join Cste Family</strong></h3><hr>
				</div>
				<div class="l-part">
					<form action="" method="post">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
							<input type="text" class="form-control" placeholder="Full Name" name="user_name" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="email" type="text" class="form-control" placeholder="Email" name="user_email" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id = "password" type="password" class = "form-control" placeholder="Password" name="user_pass" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class = "form-control" placeholder="Batch" name="user_batch" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
							<select class = "form-control input-md" name="user_gender" required="required">
								<option disabled>Select Your Gender</option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
							<input type="text" class = "form-control" placeholder="Work Place" name="user_workplace" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
							<input type="text" class = "form-control" placeholder="Designation" name="user_designation" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
							<input type="text" class = "form-control" placeholder="Living Place" name="user_livingplace" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
							<input type="text" class = "form-control" placeholder="Contact" name="user_contact" required="required">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
							<input type="text" class = "form-control" placeholder="Your Favourite City" name="fav_city" required="required">
						</div><br>
						<a style="text-decoration: none; float: right; color: #187FAB;" data-toggle="tooltip" title="Signin" href="signin.php">Already have an account?</a><br><br>
						<center><button id = "signup" class="btn btn-info btn-lg" name="sign_up">Signup</button></center>
						<?php include("insert_user.php"); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>