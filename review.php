<?php
session_start();
require 'controllers/db_credentials.php';

if (isset($_SESSION['email'])) 
{

 //   echo "<script>window.alert('I am here')</script>";
  $email = $_SESSION['email'];
  if(isset($_POST['reviewBtn']))
  {  
    $reviewImg = $_FILES['img-upload']['name'];
    $filetmpname = $_FILES['img-upload']['tmp_name'];
    $folder = 'images/';
    move_uploaded_file($filetmpname, $folder.$reviewImg);
    // $target = "images/".basename($reviewImg);
    // main
   // $reviewImg = $_POST['profile-img'];
    $reviewTitle = $_POST['review_title'];
    $visited = $_POST['traveled'];
    $expShare = $_POST['experience'];

    $mysqli->query("INSERT INTO `review_post` VALUES('',CURRENT_TIMESTAMP(),'$email','$reviewImg','$reviewTitle','$visited','$expShare')");

    // echo "<script>window.alert('you have successfully posted a review')</script>";
    header('Location: review_feed.php');
  } 
}

?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Travel Mate - Find your travel mate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Seeking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" type="png" href="images/logo-cut.png">
  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/patros.css" >
</head>

<body>
  <!-- Navigation -->
  <?php include 'headers/navBar.php';?> 
  <!-- nav ends -->   

  <!-- add card --> 
  <div class="container blog singlepost">
    <div class="row">
      <article class="col-md-8">
        <h1 class="page-header sidebar-title">Post A Review</h1>
        <form action="review.php" method="post" enctype="multipart/form-data">
          
                     <script> 
                      function changeColor(cmp)
                      {
                       cmp.style.backgroundColor = "lightblue";
                     }
                     function retainColor(cmp) {
                       cmp.style.backgroundColor = "#fff";
                     } 
                   </script>
                   <!-- Blog Comments -->
                   <div class="comments">
                     <div class="well" id="progress_total" style="background-color: white;">
                      <!-- Image -->
                      <div id="userImage" class="col-md-5">
                        <div class="dashed">
                         <img class="img-responsive" id="profile-img" name="profile-img" src="images/<?php echo $reviewImg; ?>"
                         style="width: 280px; height: 175px; object-fit: cover; background-color: #EEE; text-align: center; margin-right: 2em;">
                       </div>

                       <input type="file" id="img-upload" name="img-upload" accept="image/*" style="display: none; margin-top: 1em;">
                       <label for="img-upload" style="margin: 1em;">
                         <i class="fa fa-upload" onmouseover="changeColor(this)" onmouseout="retainColor(this)"></i>
                         <span style="font-weight: normal; color: blue; margin-left: 1em;">Select an image</span>
                       </label>
                     </div>
                     <div class="form-group" style="padding: 1em;">
                      <div class="row">
                       <div class="col-md-12">
                        <input type="text" name="review_title" id="review_title" class=" form-control input-sm" required=1 placeholder="Enter a title (Please avoid ' sign)" style="background-color: white; color: grey; padding: 1.5px;" />
                      </div>
                      <div class="col-md-12" style="margin-top: 2em;">
                        <span style="color: #555;"> Where you have traveled? </span>
                        <input type="text" name="traveled" id="traveled" class="form-control input-sm"  placeholder="Ex: Sundarban"/>
                      </div>

                      <div class="col-md-12" style="margin-top: 1.5em;">
                        <span style="color: #555;"> Share your experience 
                        </span>
                        <textarea class="form-control input-sm" name="experience" id="experience" style="height: 100px;"> </textarea>
                      </div>
                      <div class="col-md-12" style="margin-top: 1.5em;">
                        <input type="submit" class="btn btn-primary" name="reviewBtn" id="reviewBtn" style="float: right;" value="Review">
                      </div>

                    </div>
                  </div>

                </form>
              </div>
              <hr>
            </div>
          </article>
          <!-- Category-->
          <?php include 'headers/category.php'; ?>
        </div>
      </div>

      <!----> 
    </div>  

    <script src="js/upload_image.js"> </script>
    <?php include 'headers/footer.php'; ?>
  </body>
  </html>