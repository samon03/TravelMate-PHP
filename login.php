<?php
   require 'controllers/db_credentials.php';
?>

<div class="modal fades" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="width: 35%; padding: 10px;">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel" style="color: #006bb3; font-weight: bold;">Login</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -1em;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background-color: #e6eeff">
          <form action="" method="post">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Email</label>
              <input type="email" class="form-control border" placeholder=" " name="email" id="recipient-email" required="" style="color: grey;">
            </div>
            <div class="form-group">
              <label for="password" class="col-form-label">Password</label>
              <input type="password" class="form-control border" placeholder=" " name="password" id="password" required="" style="color: grey;">
            </div>
            <div class="right-w3l">
              <input type="submit" class="form-control border text-white btn-theme" value="Login" name="Login" style="background-color: #006bb3; color: white;">
            </div>
            <p class="text-center" style="font-weight: bold;">
              <a href="forget_password.php" style="color: #006bb3">
                Forget Password?</a>
               <br>
               Don't have an account?
              <a href="#" data-toggle="modal" data-target="#exampleModal1" class="text-secondary font-weight-bold" style="color: #006bb3">
                Register Now</a>
          <?php  
                if(isset($_POST['Login']))
                {
                  $email = $_POST['email'];
                  $password = md5($_POST['password']);
                  $sql = "SELECT Name, Email, Password FROM `user` WHERE Email = '$email' && Password = '$password' LIMIT 1";
                  $result = $mysqli->query($sql);
                  if (mysqli_num_rows($result) == 1) 
                  {

                    $_SESSION["email"] = $email;
                    $mysqli->query("UPDATE `user` SET `Last_Loggedin` = now() WHERE Email = '$email'");

                    header('Location: post_feed.php');        
                  }
                  
                  else
                  {
                    ?>
                    <br>
                    <a href="" data-toggle="modal" data-target="#exampleModal1" class="text-secondary font-weight-bold" style="color: red;">
                      You have entered wrong email/password!
                    </a>
                    <?php           
                  }
               }
            ?>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>