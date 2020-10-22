<?php

   session_start();

   require 'db_credentials.php';

   if(isset($_POST['register']))
   {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        
        if ($password == $password2) 
        {
        	$hashpass = md5($password);
        	$mysqli->query("INSERT INTO `user` VALUES('', '$username', '$email',$phone, '$hashpass','', '')");
          // phpmailer
          require '../phpmailer/PHPMailerAutoload.php';

          $otp = rand(100000,999999);

   // php mailer
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
          $mail->Subject='OTP code';
          $message_body = "<p style='font-size: 14px;'>Hey, <br>Thank you for using my site.<br>Your Verification Code is: <b>". $otp . "</b></p>";
          $mail->MsgHTML($message_body);
          if(!$mail->send())
          {
            header("Location: ../error_successful_message.html");
          }
          else 
          {
            $mysqli->query("INSERT INTO `verification` VALUES ('$email', '$otp', '', CURRENT_TIMESTAMP())"); 
          // Verify Account
            header("Location: ../verify_account.php?Email=$email");
          }
        }
        else
        {
           exit();
           header('Location: '.'../index.php');
          
        }       
   }
   

?>