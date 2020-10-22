<?php
    require 'controllers/db_credentials.php';

    $email = $_GET['Email'];
    $qry = "SELECT Name FROM `user` WHERE Email = '$email'";
    $res = $mysqli->query($qry);
    while ($row = $res->fetch_assoc()) 
    {
    	$name = $row['Name'];
    }
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
		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/patros.css" >
	</head>

	<body data-spy="scroll">	
		<!-- Page Content -->
		<div class="orangeback" id="services">
			<div class="container">

			<!--		<div class="text-center homeport2">
				<h2 style="">Verification</h2></div>  -->
				<div class="row">
					<div class="col-md-12 homeservices1">
						<div class="col-md-3 portfolio-item">
							<div class="text">
								
								<a href="javascript:void(0);">
									<h2>
										Hey, <?php echo $name;?>
									</h2>
									<form method="POST" action="verify_form.php?User_Id=<?php echo $email?>">
									<p style="font-size: 16px;">You have successfully regstred.<br>
										Please verify your account. <br>We have already send a code to your email.</p>
										<br>
										<h4><b>Verification Code</b></h4>
										<hr>
										<input type="text" name="vcode" class="form-control custom-labels" id="vcode" placeholder="Enter your code here" required data-validation-required-message="Please write your name!" style="color: white; font-size: 16px; text-align: center;" />
										<p class="help-block text-danger"></p>
										<input type="submit" class="btn btn-custom" value="Verify" name="verifyBtn" id="verifyBtn" style="background-color: #0033cc;" />
										</form>
									</div>
								</div>
								<div class="col-md-4 portfolio-item">
									<div class="text-center">
										<a href="javascript:void(0);">
										</div>
									</div>  
									<div class="col-md-3 portfolio-item">
										<div class="text">
											<a href="javascript:void(0);">	
						<span class="fa-stack fa-lg">
						 <img src="images/SA.png" style="width: 450px; height: 420px;">
						</span>
											</a>
										</div>
									</div>
								</div>
							</div>
		</div>
	</div>
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




