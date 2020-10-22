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
  <meta name="author" content="">

  <title>Travel Mate - Find your travel mate</title>
  <link rel="shortcut icon" type="png" href="images/logo-cut.png">
  <!-- Bootstrap Core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/patros.css" >

</head>

<body data-spy="scroll">
  <!-- Navigation -->
  <?php include 'headers/navBar.php';?> 
  <!-- nav ends -->

  <!-- Page Content -->
  <section class="container blog">
   <div class="row">
    <!-- Blog Column -->
    <div class="col-md-8">
      <h1 class="page-header sidebar-title">
        Review Feed
      </h1>

      <!--pagination starts-->
      <?php
      $qry = "SELECT * FROM `user` , `review_post`  WHERE (user.Email = review_post.Reviewer) ORDER BY Review_Time DESC";
      $total = $mysqli->query($qry);
      $numOfRows = mysqli_num_rows($total);
       // echo $numOfRows;
      $items_per_page = 5;
      $total_pages = ceil($numOfRows/$items_per_page);
       // echo $total_pages;
      if(isset($_GET['page']) && !empty($_GET['page']))
      {
        $page = $_GET['page'];
      }
      else
      {
       $page = 1; 
     }
     $offset = ($page - 1) * $items_per_page;
     $selpage = "SELECT * FROM `user` , `review_post`  WHERE (user.Email = review_post.Reviewer) ORDER BY Review_Time DESC LIMIT $items_per_page OFFSET $offset"; 
     $result = $mysqli->query($selpage);
     $rowCount = mysqli_num_rows($result);
     while ($row = $result->fetch_assoc()) 
     {
       $rpostId = $row['Review_ID'];
       $username = $row['Name'];
       $retitle = $row['Review_Title'];
       $reTime = date("F d, Y", strtotime($row['Review_Time']));
       $reImg = $row['Review_Image'];
       $reExp = $row['Experience'];
       $visited = $row['Traveled'];
      //      $totalComment = $row['COUNT(review_comment.Comment_ID)'];
       ?>
     <div class="well" style="padding: 1em; background-color:  #f2f2f2;">   
       <div class="row blogu">
        <div class="col-sm-4 col-md-4 ">
          <div class="blog-thumb">
           <?php
           if (isset($_SESSION['email'])) 
           {
             ?>
             <a href="review_details.php?Review_ID=<?php echo $rpostId; ?>">
              <?php	
            }
            else
            {
             ?>
             <a href="#">
              <?php	
            }
            ?>
            <?php
            if($reImg == '')
            {
              ?>
              <img class="img-responsive" src="images/background1.png" alt="photo">

              <?php
            }
            else
            {
             ?>
             <img class="img-responsive" src="images/<?php echo $reImg; ?>" alt="photo">
             <?php
           }
           ?>

         </a>
       </div>
     </div>
     <div class="col-sm-8 col-md-8">
      <h3 class="blog-title">
       <?php
       if (isset($_SESSION['email'])) 
       {
         ?>
         <a href="review_details.php?Review_ID=<?php echo $rpostId; ?>">
          <?php	
        }
        else
        {
         ?>
         <a href="#">
          <?php	
        }
        ?>

        <?php echo $retitle; ?>
      </a>
    </h3>
    <p class="sidebar-title">
      <i class="fa fa-calendar-o"></i>
      <?php echo $reTime; ?>
      <span class="comments-padding" ></span>
      <i class="glyphicon glyphicon-user"></i> 
      Posted by 
      <span style="color: #3366cc; font-weight: bold;">
       <?php echo $username; ?>
     </span>
   </p>
   <p class="sidebar-title" style="font-size: 16px;">
    <?php echo $reExp; ?>
    <p>
     <p class="sidebar-title">	
      <i class="fa fa-bus"></i> 
      Visited place :  
      <span style="color: #3366cc; font-weight: bold;">
       <?php echo $visited; ?>
     </span>
     <span style="float: right;">

       <span class="comments-padding" ></span>
       <?php
       if (isset($_SESSION['email'])) 
       {
         ?>
         <a style="color: blue;" href="review_details.php?Review_ID=<?php echo $rpostId; ?>">
          <?php	
        }
        else
        {
         ?>
         <a style="color: red;" href="#">
          <?php	
        }
        ?>

        <i class="glyphicon glyphicon-link"></i> Details
      </a> 
    </span> 
  </p> 
</p>
</div>
</div>
</div>
<hr>
<?php
}

?>
<div class="text-center"> 
  <ul class="pagination"> 
    <li><a href="/TravelMate/review_feed.php?page=<?php echo ($page-1);?>">Prev</a></li>
    <?php

    for ($i=1; $i < $total_pages; $i++) 
    { 
     if ($i == $page) 
     {
      ?>

      <li class="active"> 
       <a href="#"><?php echo $i;?></a> 
     </li> 
     <?php
   }
   else
   {
    ?>
    <li> <a href="/TravelMate/review_feed.php?page=<?php echo $i;?>"><?php echo $i;?></a> 
    </li> 

    <?php
  }
} 

?>
<li><a href="/TravelMate/review_feed.php?page=<?php echo ($page+1);?>">Next</a></li>
</ul> 
</div> 
<!--pagination end -->

</div>
<!-- Category-->
<?php include 'headers/category.php'; ?>
</div>
</section>

<?php include 'headers/footer.php'; ?>

</body>
</html>