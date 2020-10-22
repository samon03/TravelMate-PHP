<?php
session_start();
require 'controllers/db_credentials.php';

if (isset($_SESSION['email'])) 
{
  $email = $_SESSION['email'];
  
}

$CheckMember = "SELECT Group_ID FROM `group_info`";
$res = $mysqli->query($CheckMember);

while ($row = $res->fetch_assoc()) 
{
    $grpExist = $row['Group_ID']; 
}

if (isset($grpExist) != '') 
{
  $del = "DELETE c.* , g.* FROM `create_post` as c 
  JOIN `group_info` as g
  WHERE c.Cpost_ID = g.Group_ID 
  AND (now() >= DATE_ADD(Cpost_Time, INTERVAL 10 DAY))";
}
else
{   
  $del = "DELETE FROM `create_post` WHERE now() >= DATE_ADD(Cpost_Time, INTERVAL 10 DAY)";
}
$mysqli->query($del);

$del2 = "DELETE p.*, c.* FROM `create_post` as c 
        JOIN `post_comment` as p 
        WHERE c.Cpost_ID = p.Cpost_ID";
$mysqli->query($del2); 

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
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/patros.css" >
	
</head>

<body data-spy="scroll">
	<!-- Navigation starts -->
	<?php include 'headers/navBar.php'; ?>
	<!-- Navigation ends -->

	<!-- Page Content -->
	<section class="container blog">
		<div class="row">
			<!-- Blog Column -->
			<div class="col-md-8">
				<h1 class="page-header sidebar-title">
					Group Feed
				</h1>

<!--pagination starts-->
    <?php
      $qry = "SELECT * FROM `user`, `create_post` WHERE user.Email = create_post.Cuser ORDER BY Cpost_Time DESC";
      $total = $mysqli->query($qry);
      $numOfRows = mysqli_num_rows($total);
      // echo $numOfRows;
      $items_per_page = 4;
      $total_pages = ceil($numOfRows/$items_per_page);
      //  echo $total_pages;
      if(isset($_GET['page']) && !empty($_GET['page']))
      {
        $page = $_GET['page'];
      }
      else
      {
       $page = 1; 
     }
     $offset = ($page - 1) * $items_per_page;
     $selpage = "SELECT * FROM `user`, `create_post` WHERE user.Email = create_post.Cuser ORDER BY Cpost_Time DESC LIMIT $items_per_page OFFSET $offset"; 
     $result = $mysqli->query($selpage);
     $rowCount = mysqli_num_rows($result);
     while ($row = $result->fetch_assoc()) 
     {
      $gpostId = $row['Cpost_ID']; //edit
               $username = $row['Name'];
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
               $currLoc = $row['Current_Location'];

               $perBudget = ($totalBudget / $memLimit);
      //      $totalComment = $row['COUNT(review_comment.Comment_ID)'];
               
      ?>        
                   <!-- Group Post -->
               <div class="well" style="padding: 1em; background-color:  #f2f2f2;">  
                <!-- card  starts -->
                <div class="row blogu">
                  <div class="col-sm-4 col-md-4 ">
                    <div class="blog-thumb">
                      <?php
                      if (isset($_SESSION['email'])) 
                      {
                        ?>
                        <a href="post_details.php?Cpost_ID=<?php echo $gpostId; ?>">
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
                          if($pImg == '')
                          {
                            ?>
                            <img class="img-responsive" src="images/sajek2.jpg" alt="photo">
                            <?php
                          }
                          else
                          {
                            ?>
                            <img class="img-responsive" src="images/<?php echo $pImg;?>" alt="photo">
                            <?php  
                          }
                          ?>
                          <!--  <img class="img-responsive" src="images/sajek2.jpg" alt="photo"> -->
                          
                        </a>
                      </div>
                    </div>
                    <div class="col-sm-8 col-md-8">
                      <h3 class="blog-title">
                        <?php
                        if (isset($_SESSION['email'])) 
                        {
                          ?>
                          <a href="post_details.php?Cpost_ID=<?php echo $gpostId; ?>">
                            <?php
                          }
                          else
                          {
                            ?>
                            <a href="#">
                              <?php  
                            }
                            ?>
                            
                            <?php echo $pTitle; ?>
                          </a>
                        </h2>
                        <p>
                          <i class="fa fa-calendar-o"></i>
                          <?php echo $pTime; ?>
                          <span class="comments-padding" ></span>
                          <i class="glyphicon glyphicon-user"></i> 
                          Posted by 
                          <span style="color: #3366cc; font-weight: bold;">
                            <?php echo $username; ?>
                          </span>
                        </p>
                        <p style="margin-bottom: -25px;">
                          <span class="sidebar-title" style="font-weight: bold;"> Journey starts from :
                            <span style="color: #8c8c8c; margin-left: 0.5em;">
                              <?php echo $strtTime; ?>
                            </span>
                          </span>
                          <span class="comments-padding" ></span>
                          <span class="sidebar-title" style="font-weight: bold;"> Journey ends at : 
                            <span style="color: #8c8c8c; margin-left: 0.5em;">
                              <?php echo $endTime; ?>
                            </span>
                          </span>
                        </p>
                        <p style="margin-bottom: -25px;">
                          <span class="sidebar-title" style="font-weight: bold;"> Place :
                            <span style="color: #8c8c8c; margin-left: 1em;">
                              <?php echo $trvlPlace; ?>
                            </span> 
                          </span>
                        </p>
                        <p style="margin-bottom: -25px;">
                          <span class="sidebar-title" style="font-weight: bold;"> Per person budget : 
                            <span style="color: #8c8c8c; margin-left: 1em;">
                              <?php echo $perBudget; ?>
                            </span>
                          </span>
                        </p>
                        <p>
                          <span class="sidebar-title" style="font-weight: bold;"> Pick up point : 
                            <span style="color: #8c8c8c; margin-left: 1em;">
                              <?php echo $pickUp; ?>
                            </span>
                          </span>
                          <span style="float: right;">
                            
                            <span class="comments-padding" ></span>
                            <?php
                            if (isset($_SESSION['email'])) 
                            {
                              ?>
                              <a style="color: blue;" href="post_details.php?Cpost_ID=<?php echo $gpostId; ?>">
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
                    <!-- <?php 
                      if (isset($_SESSION['email'])) 
                      {
                        ?>
                        <input type="hidden" name="Cpost_ID" value="<?php echo $_GET['Cpost_ID'] ?>">
                         <button type="submit" class="btn btn-primary" name="joinBtn" id="joinBtn" style="float: right; background-color: #0047b3;">Join
                        </button>
                        <?php
                      }
                      else
                      {
                        ?>
                       <button type="submit" class="btn btn-primary" name="leaveBtn" id="leaveBtn" style="float: right; background-color: #e60000;">Not available
                        </button>
                        <?php
                      }
                    ?>  
                </p> -->

                
                <!-- <p> -->
                <!-- <span class="sidebar-title" style="font-weight: bold; color: #339966;">
                  <i class="fa fa-users"></i>
                  <span class="sidebar-title" style="font-size: 14px; margin-right: 0.5em; color: #0047b3;">
                    <?php echo $remainingMem; ?>
                    </span>
                 person remaining  
             </span> -->
                <!-- <span style="float: right;">
                  
                 <span class="comments-padding" ></span>
                 <a style="color: blue;" href="post_details.php?Cpost_ID=<?php echo $gpostId; ?>">
                  <i class="glyphicon glyphicon-link"></i> Details
                 </a>  -->
                     <!-- <span class="comments-padding" ></span>
                 <input type="submit" class="btn btn-primary" name="Btn" id="joinBtn" style="float: right; background-color: #0047b3;" value="Join">
                     <?php
                      if (isset($_SESSION['email'])) 
                      {
                        $email = $_SESSION['email'];
                        if(isset($_POST['Btn']))
                        {  
                          echo "<script>window.alert('Sorry, Member limit is full')</script>";
                        }
                      }

                      ?>    -->
                      
               <!--  </span> 
               </p> -->
           </p>
           <?php
             $exp = $mysqli->query("SELECT DATEDIFF(DATE_ADD(Cpost_Time, INTERVAL 10 DAY), CURRENT_TIMESTAMP) as rem FROM `create_post` WHERE Cpost_ID = '$gpostId'");

               while ($row = $exp->fetch_assoc()) 
               {
                   $exprtime = $row['rem'];
           ?>
           <p style="margin-bottom: -15px; margin-top: -15px;">
             <span class="sidebar-title" style="font-weight: bold; color: blue;"> 
                <i class="glyphicon glyphicon-time"></i>
                 Expired in <?php echo $exprtime;  ?> days
             </span>
           </p>
           <?php
              }
           ?>
       </div>
    </div>   <!-- card ends -->
  </div>
  <hr>
     <?php
     }
     ?>
		<div class="text-center"> 
		    <ul class="pagination"> 
          <li><a href="/TravelMate/post_feed.php?page=<?php echo ($page-1);?>">Prev</a></li>
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
    <li> <a href="/TravelMate/post_feed.php?page=<?php echo $i;?>"><?php echo $i;?></a> 
    </li> 

    <?php
  }
} 
?>
<li><a href="/TravelMate/post_feed.php?page=<?php echo ($page+1);?>">Next</a></li>
		    </ul> 
		</div> 

		

	</div>
	<!-- Category -->
	<?php include 'headers/category.php' ;?>
</div>
</section>

<!-- Footer -->
<?php include 'headers/footer.php' ;?>
</body>
</html>