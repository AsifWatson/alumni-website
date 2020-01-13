<?php
	$get_id = $_GET['post_id'];

	$get_com = "select * from comments where post_id='$get_id' ORDER by 1 DESC";
	$run_com = mysqli_query($con, $get_com);

	while($row = mysqli_fetch_array($run_com))
	{
		$com = $row['comment'];
		$com_name = $row['comment_author'];
		$date = $row['date'];

		echo "
		<div class='row'>
			<div class='col-md-6 col-md-offset-3'>
				<div class='panel panel-info'>
				    <div class='panel panel-body'>
				    	<div>
				    		<h4><strong><a style='text-decoration: none;' href='user_profile.php?u_id=$user_id'>$com_name</a></strong> <br> $date</h4>
				    		<p class = 'text-primary' style='font-size:20px;'>$com</p>
				    	</div>
					</div>
				</div>
			</div>
		</div>
		";
	}
?>