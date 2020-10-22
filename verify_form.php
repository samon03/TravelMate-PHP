<?php
   require 'controllers/db_credentials.php';

   $email = $_GET['User_Id'];
   $vry = "SELECT * FROM `verification` WHERE User_Id = '$email'";
   $res2 = $mysqli->query($vry);
    while ($row = $res2->fetch_assoc()) 
    {
    	$vemail = $row['User_Id'];
    	$votp = $row['OTP'];

    	 if(isset($_POST['verifyBtn']))
    	 {
    	 	$otpCode = $_POST['vcode'];

    	 	if ($otpCode == $votp && $vemail == $email) 
    	 	{
    	 		$mysqli->query("UPDATE `verification` SET `Verified`= 1 WHERE `User_Id`= '$vemail' && Verified = 0");
    	 		header('Location: index.php');
    	 	}
    	 }
    }

?>