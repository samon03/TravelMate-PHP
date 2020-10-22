<aside class="col-md-4 sidebar-padding">
	<div class="blog-sidebar">
		<?php
		require 'controllers/db_credentials.php';

		if(isset($_POST['serchTxt']))
		{
			$searchKey = $_POST['serchTxt'];
			$groups = "SELECT * FROM `create_post` WHERE Travel_Place LIKE '%$searchKey%' ORDER BY Cpost_Time DESC LIMIT 4";

			$review = "SELECT Review_ID, Review_Title , Experience, Review_Image, Traveled FROM `review_post` WHERE  Traveled LIKE '%$searchKey%' ORDER BY Review_Time DESC LIMIT 4";
		}
		else
		{
			$groups = "SELECT Title , Travel_Place, Plan, Upload_Img , Cpost_ID FROM `create_post` ORDER BY Cpost_Time DESC LIMIT 4";

			$review = "SELECT Review_ID, Review_Title , Experience, Review_Image, Traveled FROM `review_post` ORDER BY Review_Time DESC LIMIT 4";
			$searchKey = "";
		}
		?>
		<form action="" method="POST">
			<div class="input-group searchbar">
				<input type="search" class="form-control searchbar" placeholder="Search for..." name="serchTxt" id="serchTxt" value="<?php echo $searchKey ;?>">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit"
					name="serchBtn" id="serchBtn">Search</button>
				</span>

			</div><!-- /input-group -->
		</form>

	</div>
	<!-- Recent Posts -->
	<div class="blog-sidebar">
		<h4 class="sidebar-title"><i class="fa fa-group"></i> Recent Groups</h4>
		<hr style="margin-bottom: 5px;">

		<?php

		$grp = $mysqli->query($groups);
		while ($row = $grp->fetch_assoc()) 
		{
			$cId = $row['Cpost_ID'];
			$title = $row['Title'];
			$cimg = $row['Upload_Img'];
			$travel = $row['Travel_Place'];
			$plan = $row['Plan'];

			?>
			<div class="media">
				<?php
				if (isset($_SESSION['email'])) 
				{
					?>
					<a class="pull-left" href="post_details.php?Cpost_ID=<?php echo $cId; ?>">
						<?php		
					}
					else
					{

						?>
						<a class="pull-left" href="#">

							<?php
						}
						?>


						<?php
						if ($cimg == '') 
						{
							?>
							<img class="img-responsive media-object" src="images/background1.png" alt="Media Object">
							<?php
						}
						else
						{
							?>
							<img class="img-responsive media-object" src="images/<?php echo $cimg;?>" alt="Media Object">
							<?php
						}
						?>

					</a>
					<div class="media-body">
						<h4 class="media-heading">
							<?php
							if (isset($_SESSION['email'])) 
							{
								?>
								<a href="post_details.php?Cpost_ID=<?php echo $cId; ?>">
									<?php		
								}
								else
								{

									?>
									<a href="#">

										<?php
									}
									?>
									<?php echo $title;?>
								</a>
							</h4>
							<?php echo $plan;?>
						
					</div>
                </div>
					<?php	   
				}
				?>
    </div>
    <!--Recent Reviews-->
    <div class="blog-sidebar">
		<h4 class="sidebar-title"><i class="fa fa-pencil-square"></i> Recent Reviews</h4>
		<hr style="margin-bottom: 5px;">

		<?php

		$rev = $mysqli->query($review);
		while ($row = $rev->fetch_assoc()) 
		{
			$vId = $row['Review_ID'];
			$vtitle = $row['Review_Title'];
			$vimg = $row['Review_Image'];
			$vtravel = $row['Traveled'];
			$vplan = $row['Experience'];

		                     	//	<?php echo ;

			?> 
			<div class="media">
				<?php
				if (isset($_SESSION['email'])) 
				{
					?>
					<a class="pull-left" href="review_details.php?Review_ID=<?php echo $vId; ?>">
						<?php		
					}
					else
					{

						?>
						<a class="pull-left" href="#">

							<?php
						}
						?>


						<?php
						if ($vimg == '') 
						{
							?>
							<img class="img-responsive media-object" src="images/background1.png" alt="Media Object">
							<?php
						}
						else
						{
							?>
							<img class="img-responsive media-object" src="images/<?php echo $vimg;?>" alt="Media Object">
							<?php
						}
						?>

					</a>
					<div class="media-body">
						<h4 class="media-heading">
							<?php
							if (isset($_SESSION['email'])) 
							{
								?>
								<a href="review_details.php?Review_ID=<?php echo $vId; ?>">
									<?php		
								}
								else
								{

									?>
									<a href="#">

										<?php
									}
									?>
									<?php echo $vtitle;?>
								</a>
							</h4>
							<?php echo $vplan;?>
						
					</div>
                </div>
					<?php	   
				}
				?>
    </div>
</aside>
