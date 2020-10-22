<?php
session_start();
require 'controllers/db_credentials.php';

if (isset($_SESSION['email'])) 
{
  $email = $_SESSION['email'];
}  

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="ATIS">

  <title>Travel Mate - Find your travel mate</title>
  
  <link rel="shortcut icon" type="png" href="images/logo-cut.png">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="css/patros.css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
*
{
  margin:0px; 
  padding:0px;
  font-family: 'Open Sans';
}

#result-wrapper{width:100%; margin:auto; height:780px;}
#result
{
  height:780px; 
  overflow: auto; 
  overflow-x: hidden;
  padding: 4px;
}


.alert {
  padding: 8px;
  background-color: #339966;
  color: white;
  text-align: center;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}

.dot {
  margin-left: 80%;
}
.sets
{
  border: 1px solid #555;
  font-size: 18px;
  border-radius: 5px;
  padding: 10px;
  background-color: white;
  margin: 10px 0;
  height: 60px;
}

</style>

<body data-spy="scroll">
  <!-- Navigation -->
  <?php include 'headers/navBar.php';?>
  <!-- Nav ends -->

<div class="container blog singlepost" >
<div class="row">
<article class="col-md-8">
<!-- <div id="container" style="background-color: #2D2D2D; padding: 5px; margin-top: 4em;"> -->

<!-- <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>You have successfully Joined</strong>
</div> -->
<h1 class="page-header sidebar-title">My Groups</h1>
<div id="result-wrapper">
  <div id="result">
    <?php
    $sql = "SELECT Title, Group_ID FROM `create_post` ,`group_info` WHERE (Cpost_ID = Group_ID && Joined_Member = '$email') ORDER BY Joined_Time DESC";

    $res = $mysqli->query($sql);
    while ($row = $res->fetch_assoc()) 
    {
      $gTitle = $row['Title'];
      $gId = $row['Group_ID'];

    ?>

    <div class="col-md-12">
     <div class="sets">

        <div class="col-md-6">

          <label style="padding: 5px; color: #333;"><?php echo $gTitle; ?></label> 
        </div>
        <div class="col-md-6">
          <span class="dot">
            <a href="group_page.php?Cpost_ID=<?php echo $gId;?>">
            <input type="submit" class="btn btn-primary" value="Open" name="openChat"
            ></a>
            <?php
       //      if (isset($_GET['openChat'])) 
       //      {

       //        echo "<script>window.location.assign('../../TravelMate/group_page.php?Cpost_ID=$gId')</script>";
       // // header("Location: group_page.php?Cpost_ID=$gId");
       //      }   

            ?>
          </span>
        </div>
      </div>
    </div>  
    <?php

   
  }

  ?>
      
  </div>
  </div>
</article>


<?php include 'headers/category.php' ;?> 

  </div>
</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Footer ends-->
  <?php include 'headers/footer.php' ;?> 
<!-- Footer starts -->
<!-- <script type="text/javascript">

   function groupOpen()
   {
      window.location.assign('../../TravelMate/group_page.php?Cpost_ID=$gId');
   }
</script> -->
</body>
</html>