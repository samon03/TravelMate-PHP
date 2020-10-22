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

	</head>

    <body data-spy="scroll">
	<!-- Navigation -->
        <?php include 'headers/navBar.php';?>
    <!-- Nav ends -->

    <!-- php starts -->
     <?php

         $reviewId = $_GET['Review_ID'];

         $sql = "SELECT * FROM `user`, `review_post` WHERE user.Email = Reviewer && Review_ID = '$reviewId'";

         $res = $mysqli->query($sql);

         while ($row = $res->fetch_assoc()) 
         {
        	   $admin = $row['Name'];
               $rTitle = $row['Review_Title'];
               $rImg = $row['Review_Image'];
               $rTime = date("F d, Y", strtotime($row['Review_Time']));
               $traveledPlace = $row['Traveled'];
               $experience = $row['Experience'];
         }

          $com = "SELECT COUNT(Comment_ID) FROM `review_comment` WHERE Review_ID = '$reviewId'";
          $rescom = $mysqli->query($com);
          while ($row = $rescom->fetch_assoc()) 
          {
          	$totalComment = $row['COUNT(Comment_ID)'];
          }

     ?>
    <!-- php ends -->

    <!-- Group details -->
	    <div class="container blog singlepost">
			<div class="row">
				<article class="col-md-8">
			        <div class="col-md-12">
			         <h1 class="page-header sidebar-title">
			         	<?php echo  $rTitle ;?>	
			         </h1>
			         <?php
                        if($rImg == '')
                        {
                        	?>
                             <img src="images/background1.png" class="img-responsive" alt="photo" style="width: 800px; height: 300px;" />
                            <?php
                        }
                        else
                        {
                        	?>
                             <img src="images/<?php echo  $rImg; ?>" class="img-responsive" alt="photo" style="width: 800px; height: 300px;" />
                        	<?php
                        }
			         ?>
			         
			        </div>
			        <hr>
					<div class="row">
						<div class="col-md-12" style="margin-top: 1em;">
						  <div class="col-md-12">
							<div class="blog-title" style="font-size: 14px; color: grey;">
								 <span style="margin-right: 2em;">
								 	<i class="fa fa-calendar-o"></i> 
								 	<?php echo  $rTime; ?>	
								 </span>
								 <span style="margin-right: 2em;">
								 	<i class="fa fa-user"></i> Posted by 
								 	<span style="color: #3366cc; font-weight: bold;">
		             		         <?php echo  $admin; ?>
		                            </span>
								 </span>  
								 
								<div class="pull-right">
								  <span><i class="fa fa-comment"></i>  
								  	<?php echo  $totalComment; ?>
								  </span>
								</div>
							</div>
					    </div>
                       </div>
					
					<div class="col-md-12" style="margin-top: 2em;">
						<div class="col-md-6">
							<div class="sidebar-title">
								 <span class="sidebar-title" style="font-weight: bold; font-size: 18px;">
								 	<i class="fa fa-road"></i>
								 	Traveled Place : 
								 	<span style="color: #8c8c8c; margin-left: 0.5em;">
		             		         <?php echo  $traveledPlace; ?>
		                            </span>
								 </span>
							
						    </div>
					    </div>
						
					</div>
					
					
					<div class="col-md-12" style="margin-top: 1.5em;">
						<div class="col-md-12">
						<h3>Experience</h3>
						<div class="blog-title">
						   
						   <p style="font-size: 16px; color: #8c8c8c;">
						   	<?php echo  $experience; ?>
						   </p>
						</div>
                      </div>
					</div>

    <!-- Group details ends --> 

	<!-- Comments starts -->
	
					<div class="col-md-12">
						<div class="comments1">
						<div class="well">
							<h4>Leave a Comment:</h4>
						
								<div class="form-group">
									<textarea class="form-control" id="review_comment" name="review_comment" rows="3"></textarea>
								</div>
								<button type="button" id="review_submit" name="review_submit" class="btn btn-primary" 
                                onclick="submitReview('<?php echo $email ?>', <?php echo $reviewId; ?>)"
								>Submit</button>
						
						</div>
						<?php

						$showSql = "SELECT *  FROM `user` , `review_comment` WHERE (Review_ID = '$reviewId' && Parent_ID = '0') && (user.Email = Commentor) ORDER BY Comment_Time DESC";

						$showRes = $mysqli->query($showSql);
						while ($row = $showRes->fetch_assoc()) 
						{
							$showComment = $row['Comment'];
							$showCommentor = $row['Name'];
							$showCommentTime = date("g:ia M d, y", strtotime($row['Comment_Time']));
							$showParent = $row['Parent_ID'];
							$showChild = $row['Comment_ID']; 
							$showImg = $row['User_Img'];

						?>
						<div class="media">
							<a class="pull-left" href="#">
                                  
							<?php
							   if($showImg == '')
							   {
                                 ?>
                                 
                                  <img class="media-object" src="user_images/avatar1.png" alt="" style="border-radius: 50%;">
                                 
                                 <?php
							   }
							   else
							   {
							   	 ?>
							   	
                                  <img class="media-object" src="user_images/<?php echo $showImg;?>" alt="" style="border-radius: 50%;">
                                  
                                 <?php
							   }
							?>	
							    
							</a>
							<div class="media-body">
								<h4 class="media-heading">
									<?php echo $showCommentor;?>
								
									<small><?php echo $showCommentTime;?></small>
									</h4>
								<?php echo $showComment;?>
							</div>
						</div>
                        
                        <?php
                          }  
						?>
					</div>
				</div>
				</div>
						<hr>
						
			
				<script type="text/javascript" src="js/review_comment.js"></script>
		<!-- Comments ends -->	        
			    </article>
				<!-- Category Starts -->
                 <?php include 'headers/category.php' ;?>
                <!-- Category Ends -->
				
			</div>
	    </div>
    <!-- Footer ends-->
       <?php include 'headers/footer.php' ;?>
    <!-- Footer starts -->
    </body>
</html>