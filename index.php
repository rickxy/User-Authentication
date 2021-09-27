<?php include 'includes/session.php'; 

if(isset($_SESSION['user'])){
		header('location: ../index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Travel | Login</title>
	<link type="text/css" href="../styles/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="../styles/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="../styles/login.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="../index.php">
			  		Travel
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">

				
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form action="verify.php" method="POST" class="form-vertical" >
						<div class="module-head">
							<center> <h3>Sign In</h3>  </center>
						</div>
						<b>
						<center>
					    <span  >
						
						<?php
							if(isset($_SESSION['error'])){
								echo "
								<div class='callout callout-danger text-center' style='color:red;'>
									<p>".$_SESSION['error']."</p> 
								</div>
								";
								unset($_SESSION['error']);
							}
							if(isset($_SESSION['success'])){
								echo "
								<div class='callout callout-success text-center' style='color:green;'>
									<p>".$_SESSION['success']."</p> 
								</div>
								";
								unset($_SESSION['success']);
							}
						?>
						<?php
						      
							  if(isset($_SESSION['admin_message'])):?>
								<div class="alert alert-danger">
									<?php
									
									echo $_SESSION['admin_message'];
									unset($_SESSION['admin_message']);
									
									?>
								</div>
							<?php endif ?>
					    </span> 
						
						</center>
						</b>
						<div class="module-body">
						  <div class="control-group">
						      <div class="controls row-fluid">
							  <input class="span12" type="text" id="UserName" name="UserName" placeholder="Email">
						      </div>
						  </div>

						  <div class="control-group">
						       <div class="controls row-fluid">
						             <input class="span12" type="password" id="Pass" name="Pass" placeholder="Password">
						       </div>
						  </div>
						</div>

						<div class="module-head">
							<p>Don't have an account? <a href="register.php"> Create </a></p>
						</div>

						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
								<center> <button type="submit" class="btn btn-primary" name="login">Login</button> </center>


								</div>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">

	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>
