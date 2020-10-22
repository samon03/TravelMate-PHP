<?php  
require 'controllers/db_credentials.php';
$email = $_GET['Email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Travel Mate - Find your travel mate</title>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" type="png" href="images/logo-cut.png">
	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/patros.css" >
</head>

<body data-spy="scroll">
	<div class="orangeback" id="services">
		<div class="container">

			<div class="col-md-offset-1 col-md-10" style="margin-top: 5em; margin-bottom: 8em;">
				<div class="text-center">
					<h2>Reset your password</h2>
					<br>
					<img class="img-responsive displayed" src="images/short.png" alt="Company about"/>
					<br>
					<div class="row" style="box-sizing: content-box;">
						<br><br>
						<div class="col-md-12">
							<form action="reset_password.php?Email=<?php echo $email;?>" method="POST">	
								<center>
									<input type="password" name="pass" class="form-control custom-labels" id="pass" placeholder="Password" style="color: white; font-size: 16px; text-align: center; width: 300px;" />
									<br><br>
									<input type="password" name="cpass" class="form-control custom-labels" id="cpass" placeholder="Confirm Password" style="color: white; font-size: 16px; text-align: center; width: 300px;" />

									<br><br>
									<input type="submit" class="btn btn-custom" value="Submit" name="subBtn" style="background-color: #0033cc; width: 300px; color: white; text-transform: capitalize;" />
									<br><br>
									<?php
									if (isset($_POST['subBtn'])) 
									{
										if (!empty($_POST['pass']) && !empty($_POST['cpass'])) 
										{
											if ($_POST['pass'] == $_POST['cpass']) 
											{
												$password = md5($_POST['pass']);
												$mysqli->query("UPDATE `user`SET `Password` = '$password' WHERE `Email` = '$email'") or die(mysql_error());
												?>
												<h4 style="font-weight: bold; color: black;">
													You password is reset successfully.
													<a href="index.php" style="color: white;">Click here to Login</a> 
												</h4>

												<?php
											}
											else
											{
												?>
												<h4 style="font-weight: bold; color: black;">
													Passwords do not match. Please try again.
												</h4>

												<?php 
											}
										}

									}
									?>  

									<br><br>
								</center>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Content -->
	<section id="about" style="background-color: #333;">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<div class="text-center color-elements">
						<h2>About Us</h2>
						<img class="img-responsive displayed" src="images/short.png" alt="Company about"/>
						<div class="row">
							<div class="col-md-12">
								<p style="color: #fff;">
									In our life, whenever we want to go for a trip  everyone is busy around us so we can't go for a trip and also we feeling down for the pressure of
									this monitorius life so, our goal is to find a mate who can travel with you. <span class="color-elements">Stay relex and meet new people.</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer id="footer">
		<div class="container">
			<div class="row myfooter">
				<div class="col-sm-6"><div class="pull-left">
					© Samon Company 2018 | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a>
				</div></div>
				<div class="col-sm-6">
					<div class="pull-right">Designed by <a href="#">Samsun Nahar Samon</a></div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>