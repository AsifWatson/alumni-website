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
	<?php
		$user = $_SESSION['admin_email'];
		$get_user = "select * from admin where admin_email = '$user'";
		$run_user = mysqli_query($con, $get_user);
		$row = mysqli_fetch_array($run_user);
	?>
	<title>User Profile</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>

<body>
	<div class="row">
		<?php
			if(isset($_GET['u_id']))
			{
				$u_id = $_GET['u_id'];
			}

			if($u_id < 0 || $u_id == "")
			{
				echo "<script>window.open('home.php','_self')</script>";
			}
		?>

		<div class="col-sm-12">
			<?php
				if(isset($_GET['u_id']))
				{
					global $con;

					$user_id = $_GET['u_id'];

					$select = "select * from users where user_id = '$user_id'";
					$run = mysqli_query($con, $select);
					$row = mysqli_fetch_array($run);

					$name = $row['user_name'];
				}
			?>

			<?php
				if(isset($_GET['u_id']))
				{
					global $con;

					$user_id = $_GET['u_id'];

					$select = "select * from users where user_id = '$user_id'";
					$run = mysqli_query($con, $select);
					$row = mysqli_fetch_array($run);

					$user_id = $row['user_id'];
					$user_image = $row['user_image'];
					$user_name = $row['user_name'];
					$user_batch = $row['user_batch'];
					$user_gender = $row['user_gender'];

					$user_email = $row['user_email'];
					$user_workplace = $row['user_workplace'];
					$user_designation = $row['user_designation'];
					$user_livingplace = $row['user_livingplace'];
					$user_contact = $row['user_contact'];

					echo"
						<div class = 'row'>
							<div class='col-sm-1'>
							</div>
							<center>
								<div style='background-color: #e6e6e6; width: 85%; p' class='col-sm-3'>
									<h2>Information About</h2>
									<img src='../cover/$user_image' class='img-circle' height='250px' width='250px'>
									<br><br>
									<ul class='list-group'>
										<li class='list-group-item'><strong>$user_name</strong></li>
									</ul>
									<ul class='list-group'>
										<li class='list-group-item'><strong>CSTE $user_batch batch</strong></li>
									</ul>
									<ul class='list-group'>
										<li class='list-group-item'><strong>Gender : $user_gender</strong></li>
									</ul>
									<ul class='list-group'>
										<li class='list-group-item'><strong>$user_designation at $user_workplace</strong></li>
									</ul>
									<ul class='list-group'>
										<li class='list-group-item'><strong>Lives in $user_livingplace</strong></li>
									</ul>
									<ul class='list-group'>
										<li class='list-group-item'><strong>Contact $user_contact</strong></li>
									</ul>
								</div>
							</center>
						</div><br>
					";
				}
			?>
		</div>
	</div>
</body>
</html>