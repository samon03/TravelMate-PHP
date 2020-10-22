<?php
session_start();
require 'controllers/db_credentials.php';

if (isset($_SESSION['email'])) 
{
  $email = $_SESSION['email'];
  if(isset($_POST['postBtn']))
  {  
    $uploadImg = $_FILES['img-upload']['name'];
    $filetmpname = $_FILES['img-upload']['tmp_name'];
    $folder = 'images/';
    move_uploaded_file($filetmpname, $folder.$uploadImg);

    $postTitle = $_POST['post_title'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $totalBudget = $_POST['budget'];
    $vehical = $_POST['vehical_sel'];
    $pickupPoint = $_POST['pickup'];
    $totalMember = $_POST['member_limit'];
    $travelPlace = $_POST['Travel_place'];
    $currentLocation = $_POST['current_location'];
    $desPlan = $_POST['desc_plan'];

    $mysqli->query("INSERT INTO `create_post` VALUES('', '$email', CURRENT_TIMESTAMP(), '$uploadImg', '$postTitle', '$startDate', '$endDate',$totalBudget, '$vehical', '$pickupPoint', $totalMember , '$travelPlace', '$currentLocation', '$desPlan')");

    $selall = "SELECT Cpost_ID FROM `create_post` 
               WHERE Cuser = '$email'
               ORDER BY `Cpost_ID`  DESC LIMIT 1";

    $res  = $mysqli->query($selall);
    while ($row = $res->fetch_assoc()) 
    {
    	$cId = $row['Cpost_ID'];
    }

    $mysqli->query("INSERT INTO `group_info` VALUES ('', '$cId', '$email', CURRENT_TIMESTAMP())");
 
    header('Location: post_feed.php');
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

  <link rel="shortcut icon" type="png" href="images/logo-cut.png">
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/patros.css" >
</head>

<body>
  <!-- Navigation -->
  <?php include 'headers/navBar.php';?> 
  <!-- nav ends -->  

  <!-- Add card --> 
  <div class="container blog singlepost">
    <div class="row">
      <article class="col-md-8">
        <h1 class="page-header sidebar-title">Create A Post</h1>
        <form action="create_post.php" method="post" enctype="multipart/form-data">

          <!-- Create post -->
          <div class="comments">
           <div class="well" id="progress_total" style="background-color: white;">
            <div id="userImage" class="col-md-5">
              <div class="dashed" style="margin-top: 1.5em;">
               <img class="img-responsive" id="profile-img" name="profile-img" src="images/<?php echo $uploadImg; ?>"
               style="width: 280px; height: 175px; object-fit: cover; background-color: #EEE; text-align: center; margin-right: 2em;">
             </div>

             <input type="file" id="img-upload" name="img-upload" accept="image/*" style="display: none; margin-top: 1em;">
             <label for="img-upload" style="margin: 1em;">
               <i class="fa fa-upload" onmouseover="changeColor(this)" onmouseout="retainColor(this)"></i>
               <span style="font-weight: normal; color: blue; margin-left: 1em;">Select an image</span>
             </label>
           </div>

           <div class="form-group" style="padding: 2em;">
            <div class="row">
             <div class="col-md-12" style="margin-top: 1em;">
              <input type="text" name="post_title" id="post_title" class=" form-control input-sm" required=1 placeholder="Enter a title (Please avoid ' sign)" style="background-color: white; color: grey; padding: 1.5px;" />
            </div>
            <div class="col-md-12" style="margin-top: 1.5em;">
              <div class="col-md-4">
               <span style="color: #555;">Start from : </span>
               <input type="date" class="form-control input-sm"  name="start_date" id="start_date" style="background-color: white; color: grey; padding: 1.5px;" />       
             </div>
             <div class="col-md-4">
               <span style="color: #555;">End to : </span>
               <input type="date" class="form-control input-sm"  name="end_date" id="end_date" style="background-color: white; color: grey; padding: 1.5px;" />                     
             </div>
             <div class="col-md-4">
               <span style="color: #555;">Total budget : </span> 
               <input type="text" class="form-control input-sm"  name="budget" id="budget"/>    
             </div>
           </div>
           
           <div class="col-md-12" style="margin-top: 1.5em;">
            <div class="col-md-4">
              <span style="color: #555;">Choose vehicle : </span> 
              <select id="vehical_sel" name="vehical_sel" class="form-control input-sm" style="background-color: white; color: grey;">
               <option>None</option>
               <option value="Car">Car</option>
               <option value="Bus">Bus</option>
               <option value="Train">Train</option>
               <option value="Air">Air</option>
               <option value="Ship">Ship</option>
             </select>    
           </div>
           <div class="col-md-4">
             <span style="color: #555;">Pick up : </span>
             <select id="pickup" name="pickup" class="form-control input-sm" style="background-color: white; color: grey;">
               <option>None</option>
               <option value="Gulistan">Gulistan</option>
               <option value="Motijheel">Motijheel</option>
               <option value="Saydabad">Saydabad</option>
               <option value="Jatrabari">Jatrabari</option>
             </select>        
           </div>
           <div class="col-md-4">
             <span style="color: #555;">Member limit : </span>
             <select id="member_limit" name="member_limit" class="form-control input-sm" style="background-color: white; color: grey;">
               <option>0</option>
               <option value="5">5</option>
               <option value="10">10</option>
               <option value="15">15</option>
               <option value="20">20</option>
               <option value="25">25</option>
             </select>         
           </div>
         </div>
         <div class="col-md-12" style="margin-top: 2em;">
          <span style="color: #555;"> Where you want to travel? </span>
          <input type="text" name="Travel_place" id="Travel_place" class="form-control input-sm"  placeholder="Ex: Sundarban"/>
        </div>
        <div class="col-md-12" style="margin-top: 1.5em;">
          <span style="color: #555;"> 
            Select your current location 
          </span>
          <select id="current_location" name="current_location" class="form-control input-sm" style="margin-bottom: 2px; background-color: white; color: grey;">
            <option>None</option>
            <option value="Dhaka">Dhaka</option>
            <option value="Sylhet">Sylhet</option>
            <option value="Bandarban">Bandarban</option>
            <option value="Sundarban">Sundarban</option>
            <option value="Rangamati">Rangamati</option>
            <option value="Rajshahi">Rajshahi</option>
          </select>
        </div>

        <div class="col-md-12" style="margin-top: 1.5em;">
          <span style="color: #555;"> Describe your plan 
          </span>
          <textarea class="form-control input-sm" name="desc_plan" id="desc_plan" style="height: 100px;"> </textarea>
        </div>
        <div class="col-md-12" style="margin-top: 2em;">
          <button type="submit" class="btn btn-primary" name="postBtn" id="postBtn" style="float: right;">Post
          </button>
        </div>

      </div>
    </div>
    
  </form>
</div>
<hr>
</div>

<!-- Create post ends -->

</article>
<!-- Category Starts -->
<?php include 'headers/category.php' ;?>
<!-- Category Ends -->

</div>
</div>
</div>   
<script src="js/upload_image.js"> </script>
<!-- Footer -->
<?php include 'headers/footer.php' ;?>


</body>
</html>