<!DOCTYPE html>

<?php
	session_start();
	include("header.php");

	if(!isset($_SESSION['user_email'])){
		header("location: index.php");
	}	
?>

<html>
<head>
	<title>Edit Account</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>

<script>
	function show_password()
	{
		var x = document.getElementById("myPass");

		if(x.type == "password")
		{
			x.type = "text";
		}
		else if(x.type == "text")
		{
			x.type = "password";
		}
	}
</script>

<body>
	<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-8">
			<form action="" method="post" enctype="multipart/form-data">
				<table class="table table-bordered table-hover">
					<tr align="center">
						<td colspan="6" class="active"><h2>Edit Your Profile</h2></td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change your name</td>
						<td>
							<input class="form-control" type="text" name="u_name" required value="<?php echo $user_name; ?>">
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change your batch</td>
						<td>
							<input class="form-control" type="text" name="u_batch" required value="<?php echo $user_batch; ?>">
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change your email</td>
						<td>
							<input class="form-control" type="text" name="u_email" required value="<?php echo $user_email; ?>">
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change your password</td>
						<td>
							<input id = "myPass" class="form-control" type="password" name="u_pass" required value="<?php echo $user_pass; ?>">
							<input type="checkbox" onclick="show_password()"><strong>Show Password</strong>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change your gender</td>
						<td>
							<select class="form-control" name="u_gender">
								<option disabled>Change your gender</option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change your workplace</td>
						<td>
							<input class="form-control" type="text" name="u_workplace" required value="<?php echo $user_workplace; ?>">
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change your designation</td>
						<td>
							<input class="form-control" type="text" name="u_designation" required value="<?php echo $user_designation; ?>">
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change your living place</td>
						<td>
							<input class="form-control" type="text" name="u_livingplace" required value="<?php echo $user_livingplace; ?>">
						</td>
					</tr>	
					<tr>
						<td style="font-weight: bold;">Change your contact info</td>
						<td>
							<input class="form-control" type="text" name="u_contact" required value="<?php echo $user_contact; ?>">
						</td>
					</tr>
					<tr>
						<td style="font-weight: bold;">Change your favorite city</td>
						<td>
							<input class="form-control" type="text" name="u_recovery" required value="<?php echo $recovery_info; ?>">
						</td>
					</tr>
					<tr align="center">
						<td colspan="6">
							<input type="submit" class="btn btn-info" name="update" style="width: 250px;" value="Update">
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div class="col-sm-2">
		</div>
	</div>
</body>
</html>

<?php
	if(isset($_POST['update']))
	{
		$user_name = htmlentities(mysqli_real_escape_string($con, $_POST['u_name']));
		$user_email = htmlentities(mysqli_real_escape_string($con, $_POST['u_email']));
		$user_pass = htmlentities(mysqli_real_escape_string($con, $_POST['u_pass']));
		$user_batch = htmlentities(mysqli_real_escape_string($con, $_POST['u_batch']));
		$user_gender = htmlentities(mysqli_real_escape_string($con, $_POST['u_gender']));
		$user_workplace = htmlentities(mysqli_real_escape_string($con, $_POST['u_workplace']));
		$user_designation = htmlentities(mysqli_real_escape_string($con, $_POST['u_designation']));
		$user_livingplace = htmlentities(mysqli_real_escape_string($con, $_POST['u_livingplace']));
		$user_contact = htmlentities(mysqli_real_escape_string($con, $_POST['u_contact']));
		$recovery_info = htmlentities(mysqli_real_escape_string($con, $_POST['u_recovery']));

		$update = "update users set user_name = '$user_name', user_email = '$user_email', user_pass = '$user_pass', user_batch = '$user_batch', user_gender = '$user_gender', user_workplace = '$user_workplace', user_designation = '$user_designation', user_livingplace = '$user_livingplace', user_contact = '$user_contact', recovery_info = '$recovery_info' where user_id = '$user_id'";

		$run = mysqli_query($con, $update);

		if($run)
		{
			echo "<script>alert('Your Profile Updated Successfully')</script>";
			echo "<script>window.open('edit_profile.php?u_id=$user_id','_self')</script>";												
		}
	}
?>