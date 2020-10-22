<?php

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

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/patros.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
			         <img src="images/sajek2.jpg" class="img-responsive" alt="photo" style="width: 800px; height: 300px;" />
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
								 	<span style="color: #0047b3; font-weight: bold;">
		             		         <?php echo  $admin; ?>
		                            </span>
								 </span>  
								 
								<div class="pull-right">
								  <span><i class="fa fa-comment"></i> 4
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
						   
						   <p style="font-size: 16px;">
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
		    <form id="frm-comment">
				<div class="form-group">
					<input type="hidden" name="Comment_ID" id="commentId"/>
					<input type="hidden" name="Review_ID" id="revId" value="<?php echo $reviewId; ?>" />
					
						<textarea name = "comment" class="form-control" rows="3" id="comment"></textarea>
				</div>
				<button type="submit" class="btn btn-primary" id="submit" >Submit</button>
			</form>
		</div>
		<hr>
						
	    <div class="media" id="output"></div>
				<script type="text/javascript" src="comment.js"></script>


	<!--						<?php require 'submitcomment.php'; ?>
						<div class="well">
							<h4>Leave a Comment:</h4>

							
							<form id="frm-comment">
								<div class="form-group">
									 <input type="hidden" name="comment_id" id="commentId"
                                      placeholder="Name" />
									<textarea class="form-control" rows="3" id="comment"></textarea>
								</div>
								<button type="submit" class="btn btn-primary" id="submit" >Submit</button>
							</form>   
						</div>
						<hr>
						
			<div class="media" id="output">
				<script type="text/javascript" src="comment.js"></script>
        -->
		<!--					<a class="pull-left" href="#">
							 	<img class="media-object" src="images/avatar1.png" alt="">
							</a>
							<div class="media-body">
								<h4 class="media-heading">Author Name
									<small>August 25, 2014 at 9:30 PM</small>
								</h4>
								Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
								<div ><a style="font-weight: bold;" class='btn-reply' onclick="postReply()">Reply</a>
								</div> 
							</div> -->
						</div>  
			        </div>
			    </div>
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