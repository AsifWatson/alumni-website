<?php
	$con = mysqli_connect("localhost","root","","csteFamily") or die("Connection was not established");

	if(isset($_GET['id']))
	{
		$post_id = $_GET['id'];

		$delete_post = "delete from achievements where id = '$post_id'";
		$run_delete = mysqli_query($con, $delete_post);

		if($run_delete)
		{
			echo "<script>alert('Achievement has been deleted!')</script>";
			echo "<script>window.open('achievements.php','_self')</script>";
		}
	}
?>