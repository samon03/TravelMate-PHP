<?php
  session_start();
  require 'controllers/db_credentials.php';

?>  

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
				<a class="navbar-brand" href="index.php"><img src="images/emon4.png" alt="company logo" style="margin-top: -1em;" /></a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right custom-menu">
				<li class="active"><a href="index.php">Home</a></li>
                  <?php
                  if (isset($_SESSION['email'])) 
                  {
                    $email = $_SESSION['email'];
                    $sql = "SELECT Name FROM `user` WHERE Email = '$email'";
                    $res = $mysqli->query($sql);
                    while ($row = $res->fetch_assoc()) 
                    {
                        $username = $row['Name'];
                    }   
                    ?>
                    <li><a href="post_feed.php">Groups</a></li>
					<li><a href="review_feed.php">Reviews</a></li>
					<li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: transparent; ">
               <?php echo $username; ?>  
               <b class="caret"></b>
               </a>
                  <ul class="dropdown-menu">
                        <li><a href="profile.php">
                            <span class="glyphicon glyphicon-user" style="margin-right: 1em;"></span>Profile</a>
                        </li>
                        <li><a href="create_post.php">
                         <span class="glyphicon glyphicon-edit" style="margin-right: 1em;"></span>Create Group</a>
                        </li>
                        <li><a href="review.php">
                            <span class="glyphicon glyphicon-list-alt" style="margin-right: 1em;"></span>Give Review</a>
                        </li>
                        <li><a href="my_groups.php">
                            <span class="fa fa-group" style="margin-right: 1em;"></span>My Groups</a>
                        </li>
                        <li><a href="controllers/logout.php"><span class=" glyphicon glyphicon-log-out" style="margin-right: 1em;"></span>Logout</a>
                        </li>
                  </ul>
          </li>

                        <?php
                       }
                       else
                       { 
                       	?>
                           <li><a href="post_feed.php">Groups</a></li>
					 <li><a href="review_feed.php">Reviews</a></li>
 <!--          <li><a href="view.php">View</a></li>  
					 <li><a href="single-post.html">Details</a></li>  -->
					 <li><a href="#" data-toggle="modal" aria-pressed="false" data-target="#exampleModal">LogIn</a></li>
					 <li><a href="#" data-toggle="modal" aria-pressed="false" data-target="#exampleModal1">Register</a></li>
                       <?php
                       }
                     ?>
					</ul>
				</div>
			</div>
		</nav>