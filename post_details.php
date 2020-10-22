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
	if (isset($_SESSION['email'])) 
{
	$email = $_SESSION['email'];

	$groupId = $_GET['Cpost_ID'];

	$sql = "SELECT * FROM `user`, `create_post` WHERE user.Email = create_post.Cuser && Cpost_ID = '$groupId'";
	$res = $mysqli->query($sql);
	while ($row = $res->fetch_assoc()) 
	{
		$admin = $row['Name'];
		$pTitle = $row['Title'];
		$pImg = $row['Upload_Img'];
		$pTime = date("F d, Y", strtotime($row['Cpost_Time']));
		$strtTime = date("M d, Y", strtotime($row['Start_Date']));
		$endTime = date("M d, Y", strtotime($row['End_Date']));
		$totalBudget = $row['Total_Budget'];
		$vehical= $row['Vehical'];
		$pickUp = $row['Pick_Point'];
		$memLimit = $row['Members'];
		$trvlPlace = $row['Travel_Place'];
		$planDesc = $row['Plan'];

		$perBudget = ($totalBudget / $memLimit);
	}
         // echo "<script>window.alert('You have successfully selected this post!')</script>";
	$com = "SELECT COUNT(Gcomment_ID) FROM `post_comment` WHERE Cpost_ID = '$groupId'";
	$rescom = $mysqli->query($com);
	while ($row = $rescom->fetch_assoc()) 
	{
		$totalComment = $row['COUNT(Gcomment_ID)'];
	}

   // Group Joined code 
	$limitSql = "SELECT COUNT(Joined_Member) , Members FROM `create_post` , `group_info` WHERE (Cpost_ID = Group_ID && Members >= '0') && (Cpost_ID = '$groupId')";
                		
	$res = $mysqli->query($limitSql);
	while ($row = $res->fetch_assoc())
	{
		$limit = $row['Members'];
		$joined = $row['COUNT(Joined_Member)'];

		$remainingMem = $limit - $joined;
		if ($joined != $limit) 
		{
			if (isset($_GET['joinBtn'])) 
			{ 
                	 	// echo "<script>window.alert('work1')</script>";	
				$grpJoin = "INSERT INTO `group_info` VALUES ('','$groupId', '$email', CURRENT_TIMESTAMP)";
				$mysqli->query($grpJoin);

				// echo "<script>window.alert('You have successfully joined!')</script>";	
				header("Location: group_page.php?Cpost_ID=$groupId");
			}

		}
		else
		{

			echo "<script>window.alert('Sorry, Member limit is full')</script>";
		}

	}
	// group joined ends

	//Already a memeber 
	$alSql = "SELECT Joined_Member, Joined_Time FROM `group_info` WHERE Group_ID= '$groupId' && Joined_Member = '$email'"; 

	//echo "<script> console.log('".$alSql."'); </script>";
	// echo "<script> alert('".$alSql."')</script>";

	$alRes = $mysqli->query($alSql);
	while ($row = $alRes->fetch_assoc()) 
	{
		$alreadyJoined = $row['Joined_Member'];
		$joinedTime = $row['Joined_Time'];
		//echo "<script>alert('Work')</script>";
	}

    }
	?>
	<!-- php ends -->

	<!-- Group details -->
	<div class="container blog singlepost">
		<div class="row">
			<article class="col-md-8">
				<div class="col-md-12">
					<h1 class="page-header sidebar-title">
						<?php echo  $pTitle ;?>	
					</h1>
					<?php
					if ($pImg == '') 
					{

						?>	
						<img src="images/sajek3.jpg" class="img-responsive" alt="photo" style="width: 800px; height: 300px;" />

						<?php	
					}
					else
					{
						?>	
						<img src="images/<?php echo  $pImg ;?>" class="img-responsive" alt="photo" style="width: 800px; height: 300px;" />

						<?php
					}
					?>
					
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12" style="margin-top: 1em;">
						<div class="col-md-12">
							<div class="blog-title" style="color: grey;">
								<span style="margin-right: 2em;">
									<i class="fa fa-calendar-o"></i> 
									<?php echo  $pTime; ?>	
								</span>
								<span style="margin-right: 2em;">
									<i class="fa fa-user"></i> Posted by 
									<span style="color: #3366cc; font-weight: bold;">
										<?php echo  $admin; ?>
									</span>
								</span>  
								
								<div class="pull-right">
									<span><i class="fa fa-comment"></i> 
										<?php echo $totalComment;?>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12" style="margin-top: 2.5em;">
						<div class="col-md-5">
							<div class="sidebar-title">
								<span class="sidebar-title" style="font-weight: bold;">
									<i class="fa fa-calendar-o"></i> 
									Journey starts from : 
									<span style="color: #8c8c8c; margin-left: 0.5em;">
										<?php echo  $strtTime; ?>
									</span>
								</span>
								
							</div>
						</div>
						<div class="col-md-5">
							<div class="sidebar-title">
								<span class="sidebar-title" style="font-weight: bold;">
									<i class="fa fa-calendar-o"></i> 
									Journey ends at : 
									<span style="color: #8c8c8c; margin-left: 0.5em;">
										<?php echo  $endTime; ?>
									</span>
								</span>
								
							</div>
						</div>
						
					</div>
					
					<div class="col-md-12" style="margin-top: 1em;">
						<div class="col-md-5">
							<div class="sidebar-title">
								<span class="sidebar-title" style="font-weight: bold;">
									<i class="fa fa-road"></i>
									Intrested Place : 
									<span style="color: #8c8c8c; margin-left: 0.5em;">
										<?php echo  $trvlPlace; ?>
									</span>
								</span>
								
							</div>
						</div>
						<div class="col-md-5">
							<div class="sidebar-title">
								<span class="sidebar-title" style="font-weight: bold;">
									<i class="fa fa-money"></i>
									Budget per person :
									<span style="color: #8c8c8c; margin-left: 0.5em;">
										<?php echo  $perBudget; ?>
									</span>
								</span>
								
							</div>
						</div>
					</div>
					<div class="col-md-12" style="margin-top: 1em;">
						<div class="col-md-5">
							<div class="sidebar-title">
								<span class="sidebar-title" style="font-weight: bold;">
									<i class="fa fa-map-marker"></i>
									Pick up point : 
									<span style="color: #8c8c8c; margin-left: 0.5em;">
										<?php echo  $pickUp; ?>
									</span>
								</span>
								
							</div>
						</div>
						<div class="col-md-5">
							<div class="sidebar-title">
								<span class="sidebar-title" style="font-weight: bold;">
									<i class="fa fa-bus"></i>
									By : 
									<span style="color: #8c8c8c; margin-left: 0.5em;">

										<?php echo  $vehical; ?>
									</span>
								</span>
								
							</div>
						</div>
					</div>
					
					<div class="col-md-12" style="margin-top: 2em;">
						<div class="col-md-12">
							<h3>Description</h3>
							<div class="blog-title">
								
								<p style="font-size: 16px; color: #8c8c8c;">
									<?php echo  $planDesc; ?>
								</p>
							</div>
							<form>
								<!-- <input type="hidden" name="Cpost_ID" value="post_details.php?Cpost_ID=<?php echo $_GET['Cpost_ID']; ?>"> -->

								<span class="sidebar-title" style="font-weight: bold; color: #3366cc;">
									<i class="fa fa-users"> </i>
									<span class="sidebar-title" style="font-size: 16px; margin-right: 0.5em; color: #0047b3;">
										<?php echo $remainingMem; ?>
									</span>
									person remaining  
								</span>

								<?php
								
							    if (!isset($alreadyJoined)) 
								{
									?>
									<input type="hidden" name="Cpost_ID" value="<?php echo $_GET['Cpost_ID'] ?>">	
									<button type="submit" class="btn btn-primary" name="joinBtn" id="joinBtn" style="float: right; background-color: #29a329;">Join
									</button>
									<?php
								}
								else   
								{
									?>
									<button type="button" class="btn btn-primary" name="alBtn" id="alBtn" style="float: right; background-color: red;">
										Already Joined
									</button>
									
									<?php
								}
								
								
								?>


							</form>
						</div>
					</div>
					<!-- Group details ends --> 

					<!-- Comments starts -->
					<div class="col-md-12">
						<div class="comments1">
							<div class="well">
								<h4>Leave a Comment:</h4>
								<form>
									<div class="form-group">
										<textarea class="form-control" rows="3" name="gcomment" id="gcomment"></textarea>
									</div>
									<input type="hidden" name="Cpost_ID" value="<?php echo $_GET['Cpost_ID'] ?>">
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
							<hr>

							<?php
                           // comment  insert ar query 
							if(isset($_GET['gcomment']))
							{  
								$groupId = $_GET['Cpost_ID'];
								$groupComment = $_GET['gcomment'];

								$sql = $mysqli->query("INSERT INTO `post_comment`(`Cpost_ID`, `Gparent_ID`, `Group_Commentor`, `Group_Comment`, `Gcomment_Time`) VALUES ('$groupId','','$email','$groupComment',CURRENT_TIMESTAMP())");

							} 

							$showSql = "SELECT *  FROM `user` , `post_comment` WHERE (Cpost_ID = '$groupId' && Gparent_ID = '0') && (user.Email = Group_Commentor) ORDER BY Gcomment_Time DESC";

							$showRes = $mysqli->query($showSql);
							while ($row = $showRes->fetch_assoc()) 
							{
								$pro = $row['User_Img'];
								$showComment = $row['Group_Comment'];
								$showCommentor = $row['Name'];
								$showCommentTime = date("g:ia M d, y", strtotime($row['Gcomment_Time']));
								$showParent = $row['Gparent_ID'];
								$showChild = $row['Gcomment_ID'];  
								?>
								<div class="media">
									<a class="pull-left" href="#">
										<!-- <img class="media-object" src="images/avatar1.png" alt="" style="border-radius: 50%;"> -->
										<?php
										if ($pro == '') 
										{

											?>	
											<img class="media-object" src="user_images/avatar1.png" alt="" style="border-radius: 50%;">

											<?php	
										}
										else
										{
											?>	
											<img class="media-object" src="user_images/<?php echo $pro;?>" alt="" style="border-radius: 50%;">

											<?php
										}
										?>

									</a>
									<div class="media-body">
										<h4 class="media-heading"><?php echo $showCommentor;?>
										<small><?php echo $showCommentTime;?></small>
									</h4>
									<?php echo $showComment;?>
								</div>
							</div>

							<?php
						}  
						?>
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