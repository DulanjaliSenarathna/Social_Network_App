<!DOCTYPE html>
<?php
	session_start();
	include("includes/header.php");

	if(!isset($_SESSION['user_email'])){
		header("location: index.php");
	}
 ?>
<html>
<head>
	<?php
		$user = $_SESSION['user_email'];
				$get_user = "select * from users where user_email='$user'";
				$run_user = mysqli_query($con,$get_user);
				$row = mysqli_fetch_array($run_user);

				$user_name = $row['user_name'];
	 ?>
	<title><?php echo "$user_name"; ?></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
	#cover-img{
		height: 400px;
		width: 100%;
	}
</style>
<body>
	<div class="row">
		<div class="col-sm-2">
			
		</div>
		<div class="col-sm-8">
			<?php
			echo 
			"<div>
				<div><img id='cover-img' class='img-rounded' src='cover/$user_cover' alt='cover'</div>
				<form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>

				<ul class='nav pull-left' style='position:absolute;top:10px;left:40px;'>
					<li class='dropdown'>
					<button class='dropdown-toggle btn btn-default' data-toggle='dropdown'>Change Cover</button>
					<div class='dropdown-menu'>
					<center>
					<p>Click<strong>Select Cover</strong> and then click the <br> <strong>Update Cover</strong></p>
					<label class='btn btn-info'>Select Cover
					<input type='file' name='u_cover' size='60'></label><br><br>
					<button name='submit' class='btn btn-info'>Update Cover</button>
					</center>
					</div>
					</li>
				</ul>

				</form>
			</div>";
			?>
		</div>
	</div>
</body>
</html>