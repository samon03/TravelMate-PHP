<?php
require 'controllers/db_credentials.php';
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
					<h2>Forget your password?</h2>
					<br>
					<img class="img-responsive displayed" src="images/short.png" alt="Company about"/>
					<div class="row">
						<br>
						<div class="col-md-12">
							<form action="forget_password.php" method="POST">
								<p style="font-size: 16px;">
									If you do not have account then <a href="index.php" style="font-weight: bold; color: black;">Click here</a> to set a new account.
									<br>
									If you can't login in your account then recover you account by give a email below.
								</p>
								<center>
									<input type="email" name="femail" class="form-control custom-labels" id="femail" placeholder="Enter your email here" style="color: white; font-size: 16px; text-align: center; width: 300px;" />
									
									<br><br>
									<input type="submit" class="btn btn-custom" value="Send Code" name="sendBtn" style="background-color: #0033cc; width: 300px; color: white; text-transform: capitalize;" />
									<br><br>
									<?php
									if (isset($_POST['sendBtn'])) 
									{
										$email = $_POST['femail'];
										require 'phpmailer/PHPMailerAutoload.php';

										$sql = "SELECT * FROM `user` WHERE Email = '$email' LIMIT 1";
										$result = $mysqli->query($sql);

										if (mysqli_num_rows($result) == 1) 
										{
											echo $email;
											$mail = new PHPMailer;
											$mail->isSMTP();
          //  $mail->SMTPDebug = 4;
											$mail->Host='smtp.gmail.com';
											$mail->Port=587;
											$mail->SMTPSecure='tls';
											$mail->SMTPAuth=true;


											$mail->Username='Enter your mail';
											$mail->Password='Enter your password';

											$mail->setFrom('Enter your mail', 'Travelmate');
											$mail->addAddress($email);
											$mail->addReplyTo('Enter your mail');

											$mail->isHTML(true);
											$mail->Subject='Password Recovery';
											$message_body = "<p style='font-size: 14px;'>
											Click the link for reset your password.</p>
											<a href='http://localhost/TravelMate/reset_password.php?Email=$email'>http://localhost/TravelMate/reset_password.php?Email=$email</a>";
											$mail->MsgHTML($message_body);
											if (!$mail->send()) 
											{
          		// echo '<script>alert("Something is wrong!\nPlease try again.")</script>';
												?>
												<h4 style="font-weight: bold; color: black;">
													Something is wrong! Please try again.
												</h4>
												<?php
											}
											else
											{
          		// echo '<script>alert("You have successfully got the mail.\nPlease check your inbox.")</script>';
												?>
												<h4 style="font-weight: bold; color: black;">
													Please check your inbox.
												</h4>
												<?php
											}   
										}
										else
										{
											?>
											<h4 style="font-weight: bold; color: black;">
												Something is wrong! Please try again.
											</h4>
											<?php

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




