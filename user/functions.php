<?php

$con = mysqli_connect("localhost","root","","csteFamily") or die("Connection was not established");

//function for inserting post

function insertPost()
{
	if(isset($_POST['sub']))
	{
		global $con;
		global $user_id;

		$content = htmlentities(mysqli_real_escape_string($con, $_POST['content']));
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		$random_number = rand(1, 100);

		if(strlen($content) > 250)
		{
			echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
			echo "<script>window.open('home.php', '_self')</script>";
		}
		else
		{
			if(strlen($upload_image) >= 1 && strlen($content) >= 1)
			{
				move_uploaded_file($image_tmp, "../imagepost/$random_number.$upload_image");
				$insert = "insert into posts (user_id, post_content, upload_image, post_date) values('$user_id', '$content', '$random_number.$upload_image', NOW())";

				$run = mysqli_query($con, $insert);

				if($run)
				{
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}

				exit();
			}
			else
			{
				if($upload_image=='' && $content == '')
				{
					echo "<script>alert('Write Something or Select Photo!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}
				else
				{
					if($content=='')
					{
						move_uploaded_file($image_tmp, "../imagepost/$random_number.$upload_image");
						$insert = "insert into posts (user_id,post_content,upload_image,post_date) values ('$user_id','No','$random_number.$upload_image',NOW())";
						$run = mysqli_query($con, $insert);

						if($run)
						{
							echo "<script>alert('Your Post Updated Successfully!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";
						}

						exit();
					}
					else
					{
						$insert = "insert into posts (user_id, post_content, post_date) values('$user_id', '$content', NOW())";
						$run = mysqli_query($con, $insert);

						if($run)
						{
							echo "<script>alert('Your Post Updated Successfully!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";
						}
					}
				}
			}
		}
	}
}

function get_posts()
{
	global $con;
	$per_page = 4;

	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
	{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($con, $get_posts);

	while($row_posts = mysqli_fetch_array($run_posts))
	{

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = substr($row_posts['post_content'], 0, 40);
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select * from users where user_id='$user_id'";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		//now displaying posts from database

		if($content=="No" && strlen($upload_image) >= 1)
		{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='../cover/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='../imagepost//$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>View</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1)
		{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='../cover/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='../imagepost//$upload_image' style='height:350px;'>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>View</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else
		{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='../cover/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
						</div>
					</div><br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>View</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
	}

	include("pagination.php");
}

function get_achievements()
{
	global $con;
	$per_page = 4;

	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
	{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "select * from achievements ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($con, $get_posts);

	while($row_posts = mysqli_fetch_array($run_posts))
	{

		$post_id = $row_posts['id'];
		$content = substr($row_posts['post_content'], 0, 40);
		$upload_image = $row_posts['upload_image'];

		//now displaying achievements from database

		if($content=="No" && strlen($upload_image) >= 1)
		{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='../imagepost//$upload_image' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1)
		{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='../imagepost//$upload_image' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else
		{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
	}

	include("pagination.php");
}

function single_post()
{
	if(isset($_GET['post_id']))
	{
		global $con;

		$get_id = $_GET['post_id'];

		$get_posts = "select * from posts where post_id = '$get_id'";
		$run_posts = mysqli_query($con, $get_posts);
		$row_posts = mysqli_fetch_array($run_posts);

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = $row_posts['post_content'];
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select * from users where user_id = '$user_id'";
		$run_user = mysqli_query($con, $user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		$user_com = $_SESSION['user_email'];

		$get_com = "select * from users where user_email = '$user_com'";
		$run_com = mysqli_query($con, $get_com);
		$row_com = mysqli_fetch_array($run_com);

		$user_com_id = $row_com['user_id'];
		$user_com_name = $row_com['user_name'];

		if(isset($_GET['post_id']))
		{
			$post_id = $_GET['post_id'];
		}

		$get_posts = "select post_id from posts where post_id = '$post_id'";
		$run_user = mysqli_query($con, $get_posts);

		$post_id = $_GET['post_id'];
		$get_user = "select * from posts where post_id = '$post_id'";
		$run_user = mysqli_query($con, $get_user);
		$row = mysqli_fetch_array($run_user);

		$p_id = $row['post_id'];

		if($p_id != $post_id)
		{
			echo "<script>alert('ERROR')</script>";
			echo "<script>window.open('home.php','_self')</script>";
		}
		else
		{
			if($content=="No" && strlen($upload_image) >= 1)
			{
				echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='../cover/$user_image' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
								<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<img id='posts-img' src='../imagepost//$upload_image' style='height:350px;'>
							</div>
						</div><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
				";
			}

			else if(strlen($content) >= 1 && strlen($upload_image) >= 1)
			{
				echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='../cover/$user_image' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
								<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<p>$content</p>
								<img id='posts-img' src='../imagepost//$upload_image' style='height:350px;'>
							</div>
						</div><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
				";
			}

			else
			{
				echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='../cover/$user_image' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
								<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<h3><p>$content</p></h3>
							</div>
						</div><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
				";
			}

			include("comments.php");

			echo "
			<div class='row'>
				<div class='col-md-6 col-md-offset-3'>
					<div class='panel panel-info'>
						<div class='panel panel-body'>
							<form action='' method='post' class='form-inline'>
								<textarea style='resize: none;padding: 20px;height: 110px;width: 100%;border:1px solid #F2F2F2;' placeholder='Write your comment here' class='pb-cmnt-textarea' name='comment'>
								</textarea>
								<button class='btn btn-info pull-right' name='reply'>Comment</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			";

			if(isset($_POST['reply']))
			{
				$comment = htmlentities($_POST['comment']);

				$size = strlen($comment);
				$coun = 0;
				for($x = 0; $x < $size; $x++)
				{
		    		if($comment[$x] >= '!' && $commment[$x] <= '~') $coun++;
				}

				if($coun == 0)
				{
					echo "<script>alert('Enetr your comment!')</script>";
					echo "<script>window.open('single.php?post_id=$post_id','_self')</script>";
				}
				else
				{
					$insert = "insert into comments (post_id, user_id, comment, comment_author, date)
					values ('$post_id','$user_id','$comment','$user_com_name', NOW())";

					$run = mysqli_query($con, $insert);

					echo "<script>alert('Your comment added!')</script>";
					echo "<script>window.open('single.php?post_id=$post_id','_self')</script>";
				}
			}
		}
	}
}

function results()
{
	global $con;

	if(isset($_GET['search']))
	{
		$search_query = htmlentities(mysqli_real_escape_string($con, $_GET['user_query']));

		$get_posts = "select * from posts where post_content like '%$search_query%' OR upload_image like '%$search_query%'";

		$run_posts = mysqli_query($con, $get_posts);

		while($row_posts = mysqli_fetch_array($run_posts))
		{
			$post_id = $row_posts['post_id'];
			$user_id = $row_posts['user_id'];
			$content = $row_posts['post_content'];
			$upload_image = $row_posts['upload_image'];
			$post_date = $row_posts['post_date'];

			$user = "select * from users where user_id = '$user_id'";

			$run_user = mysqli_query($con, $user);
			$row_user = mysqli_fetch_array($run_user);

			$user_name = $row_user['user_name'];
			$user_image = $row_user['user_image'];

			## displaying posts
			if(strlen($content) >= 1 && strlen($upload_image) >= 1)
			{
				echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='../cover/$user_image' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
								<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<p>$content</p>
								<img id='posts-img' src='../imagepost//$upload_image' style='height:350px;'>
							</div>
						</div><br>
						<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>View</button></a><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
				";
			}

			else if(strlen($content) >= 1 && strlen($upload_image) == 0)
			{
				echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div id='posts' class='col-sm-6'>
						<div class='row'>
							<div class='col-sm-2'>
							<p><img src='../cover/$user_image' class='img-circle' width='100px' height='100px'></p>
							</div>
							<div class='col-sm-6'>
								<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
								<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
							</div>
							<div class='col-sm-4'>
							</div>
						</div>
						<div class='row'>
							<div class='col-sm-12'>
								<h3><p>$content</p></h3>
							</div>
						</div><br>
						<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>View</button></a><br>
					</div>
					<div class='col-sm-3'>
					</div>
				</div><br><br>
				";
			}
		}
	}
}

function search_user()
{
	global $con;

	if(isset($_GET['search_user_btn']))
	{
		$search_query = htmlentities(mysqli_real_escape_string($con, $_GET['search_user']));
		$get_user = "select * from users where user_name like '%$search_query%' or user_workplace like '%$search_query%'";

		$run_user = mysqli_query($con, $get_user);

		while ($row_user = mysqli_fetch_array($run_user))
		{
			$user_id = $row_user['user_id'];
			$user_name = $row_user['user_name'];
			$user_image = $row_user['user_image'];
			$user_designation = $row_user['user_designation'];
			$user_workplace = $row_user['user_workplace'];

			echo "
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div class='col-sm-6'>
					<div class='row' id='find_people' style='border:5px solid #e6e6e6; padding: 40px 50px;'>
						<div class='col-sm-4'>
							<a href='user_profile.php?u_id=$user_id'>
							<img src='../cover/$user_image' width='150px' height='160px' title='$user_name' style='float:left; margin:1px;'/>
							</a>
						</div><br><br>
						<div class='col-sm-6'>
							<a style='text-decoration: none; cursor: pointer; color: #3897f0;' href='user_profile.php?u_id=$user_id'>
							<strong><h2>$user_name</h2></strong>
							</a>
							<strong>$user_designation at $user_workplace</strong>
						</div>
						<div class='col-sm-3'>
						</div>
					</div>
				</div>
				<div class='col-sm-4'>
				</div>
			</div><br>
			";
		}
	}
}

?>
