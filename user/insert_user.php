<?php
	include("connection.php");

	if(isset($_POST['sign_up'])){

		$name = htmlentities(mysqli_real_escape_string($con,$_POST['user_name']));
		$email = htmlentities(mysqli_real_escape_string($con,$_POST['user_email']));
		$pass = htmlentities(mysqli_real_escape_string($con,$_POST['user_pass']));
		$batch = htmlentities(mysqli_real_escape_string($con,$_POST['user_batch']));
		$gender = htmlentities(mysqli_real_escape_string($con,$_POST['user_gender']));
		$workplace = htmlentities(mysqli_real_escape_string($con,$_POST['user_workplace']));
		$designation = htmlentities(mysqli_real_escape_string($con,$_POST['user_designation']));
		$livingplace = htmlentities(mysqli_real_escape_string($con,$_POST['user_livingplace']));
		$contact = htmlentities(mysqli_real_escape_string($con,$_POST['user_contact']));
		$city = htmlentities(mysqli_real_escape_string($con,$_POST['fav_city']));

		$check_username_query = "select user_name from users where user_email = '$email'";
		$run_username = mysqli_query($con, $check_username_query);

		if(strlen($pass) < 6)
		{
			echo"<script>alert('Password should be minimum 6 characters!')</script>";
			exit();
		}

		$check_email = "select * from users where user_email = '$email'";
		$run_email = mysqli_query($check_email);

		$check = mysqli_num_rows($run_email);

		if($check == 1){
			echo "<script>alert('Email already exist, Please try using another email')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
		}
				
		$user_image = "user_image.png";

		$insert = "insert into users (user_name,user_email,user_pass,user_batch,user_gender,user_workplace,user_designation,user_livingplace,user_contact,user_image,recovery_info)
		values('$name', '$email','$pass','$batch','$gender','$workplace','$designation','$livingplace','$contact','$user_image','$city')";
		
		$query = mysqli_query($con, $insert);

		if($query){
			echo "<script>alert('Well Done $name, you are good to go.')</script>";
			echo "<script>window.open('signin.php', '_self')</script>";
		}
		else{
			echo "<script>alert('Registration failed, please try again!')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
		}
	}
?>