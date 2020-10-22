<?php
session_start();
require 'controllers/db_credentials.php';

if (isset($_SESSION['email'])) 
{
  $email = $_SESSION['email'];
  $gId = $_GET['Cpost_ID'];

   
  // Remaining
  $limitSql = "SELECT COUNT(Joined_Member) , Members, Cpost_Time FROM `create_post` , `group_info` WHERE (Cpost_ID = Group_ID || Members = 'NULL') && Cpost_ID = '$gId'";
                    // echo $limitSql;
                    // echo "<script>window.alert('work2')</script>";
  $res = $mysqli->query($limitSql);
  while ($row = $res->fetch_assoc())
  {
    $limit = $row['Members'];
    $joined = $row['COUNT(Joined_Member)'];
    $joinedtime = $row['Cpost_Time'];

    $remainingMem = $limit - $joined;
  } 
//  Leave Group
 if (isset($_GET['leaveBtn']) && $_GET["leaveBtn"]==1) 
 {
   $leaveSql = "DELETE FROM `group_info` 
   WHERE (Group_ID ='$gId') && (Joined_Member = '$email')";

  $mysqli->query($leaveSql);
  echo "<script>window.location.assign('../TravelMate/post_feed.php')</script>";
 
 // window.location.assign('../../TravelMate/ post_feed.php');
 }

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
#logout{width:60px; height:20px; position:absolute; top:6px; right:20px; margin-bottom:40px; text-align:center; color:#fff}
#container{width: 40%; height:auto; position:relative; top:8px; margin:auto;}

#session-name{width:100%; height:36px; margin-bottom:30px; font-size:20px}
.session-text{width:300px; height:30px;padding:6px 10px;margin: 8px 0;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box; font-size:24px}

#result-wrapper{width:100%; margin:auto; height:480px;}
#result
{
  height:480px; 
  overflow: auto; 
  overflow-x: hidden;
}

#form-container{width:100%; margin:auto; height:80px;}
.form-text
{
	float:left; 
	width:85%; 
	height:80px;
}
#comment
{
	width:100%; 
	height: 65px; 
}
.form-btn
{
	float:left; 
	width:15%; 
	height:80px;
}
#btn
{
	border: none; 
	height: 65px; 
	width:100%; 
	background: #0047b3; 
	color:#fff; 
	font-size:22px;
	border-radius: 5%;
}

.chats{width:100%; margin-bottom:6px;}
.chats strong{color:#6d84b4}
.chats p{ font-size:14px; color:#aaa; margin-right:10px}

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
  height: 8px;
  width: 8px;
  background-color: #46d252;
  border-radius: 50%;
  display: inline-block;
  margin-left: 50%;
}
.sets
{
  border: 1px solid #555;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}
.high
{
	height: 530px; 
    overflow: auto; 
    overflow-x: hidden;
}
h2, h4, i
{
   font-weight: bold;
   color: white;
}

</style>

    <body data-spy="scroll" style="background-color: #2D2D2D">
	<!-- Navigation -->
        <?php include 'headers/navBar.php';?>
    <!-- Nav ends -->
    <input type="hidden" id="post_id" name="post_id" value="<?php echo $gId; ?>">

    <!-- Group details -->
	<div class="container blog singlepost">
		<div class="row" style="margin: 4px; border-style: solid #EEE; height: 700px; border: solid #EEE;  " >
            
			<div class="col-md-3" style=" 
			     border-right: solid #EEE;">
			  
				<h4 style="margin: 1em;">Members</h4>
				
				<div class="high">
          <?php
          $sql = "SELECT Name, User_Img FROM `group_info` , `user` WHERE Joined_Member = Email && Group_ID = '$gId'";
          $res = $mysqli->query($sql);
          while ($row = $res->fetch_assoc()) 
          {
            $user = $row['Name'];
            $userImg = $row['User_Img'];
         ?>
            <div class="sets">
             <img src="user_images/<?php echo $userImg; ?>" width="30" height="30"
             style="border-radius: 50%; margin-right: 5px;"> 
             <label><?php echo $user; ?></label> 
      <!--   online / offline --> 
      <!--
            <?php
             if (isset($_SESSION['email'])) 
             {
                $email = $_SESSION['email'];
                $logQry = "SELECT `Email`, `Last_Loggedin` FROM `user` WHERE Email = '$email'";

                $logRes = $mysqli->query($logQry);
                while ($row = $logRes->fetch_assoc()) 
                {
                  $last_loggedTime = $row['Last_Loggedin'];
                }
                
                $calcuMins = "SELECT DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 120 MINUTE) as subTwoMins";

                $timeRes = $mysqli->query($calcuMins);
                while ($row = $timeRes->fetch_assoc()) 
                {
                  $loggedTime = $row['subTwoMins'];
                

                if($last_loggedTime > $loggedTime)
                {
                  ?>
                  <span class="dot"></span>
                  <?php
                }
                else
                {
                  ?>
                  <span class="dot" style="background-color: red"></span>
                <?php
                }
               } 
              }
             ?>     -->      
           </div>
           <?php
         }  
         ?> 
         
       </div>
			    <i class="fa fa-group"></i>
			    <label style="font-size: 16px; margin-bottom: 1em; color: white;">Remaining member :
			        <button class="btn" style="font-size: 16px;
			           color: white; background-color: #0047b3; border-radius: 40%;">
               <?php echo $remainingMem; ?>
              </button> 
			    	
			    </label>
          <script>
            function deleteAction() {
              window.location = "group_page.php?Cpost_ID=<?php echo $gId; ?>&&leaveBtn=1";
            }
          </script>
			    <button type="button" class="btn btn-danger" name="leaveBtn" id="leaveBtn" style="font-size: 16px; background-color: red; width: 100%;" onclick="deleteAction();">
			    	<span class="glyphicon glyphicon-log-out"></span>
			       Leave
          </button><!-- </a> -->
			</div>
            
			<article class="col-md-8">
			   <div class="col-md-12" style="margin-left: 3em;">	
                <h2>Chat</h2>
                <div id="result-wrapper">
                 	<div id="result">
	            	<?php
                   include "load.php";
                   echo $_GET['Cpost_ID'];
                  // myFileFunction($gId);
                   // readfile("../../TravelMate/load.php?Cpost_ID=$gId"); 
		            ?>
	                </div>			
                </div>
                <hr>
                <form method='post' action="#" id="my_form" name="my_form">
                  <div id="form-container">
                	<div class="form-text">
                    	<input type="text" style="display:none" id="username" value="<?php echo $username; ?>">
                     	<textarea id="comment"></textarea>
                    </div>
                    <div class="form-btn">
                         <a href="commentajax.php?Cpost_ID=<?php echo $gId;?>">
                        <button
                        class="btn btn-info btn-lg" id="btn" name="btn" onclick="post()"> 
                            <span class="glyphicon glyphicon-send"></span> 
                        </button> </a>
                    </div>
                  </div>
                </form>
                <br>
              </div>   <!-- ends-->
            </article>

		</div>
	</div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function()
    {
        $(document).bind('keypress', function(e) {
            if(e.keyCode==13){
                 $('#my_form').submit();
				 $('#comment').val("");
             }
        });
	});
</script>

<script type="text/javascript">
function post()
{ 
//  alert("working");
  var comment = document.getElementById("comment").value;
  var name = document.getElementById("username").value;
  var postId = document.getElementById("post_id").value;

//  document.write(name , comment);
  if(comment && name)
  {
    $.ajax
    ({
      type: 'post',
      url: 'commentajax.php',
      data: 
      {
          Cpost_ID: postId,
          user_comm: comment,
	        user_name:name
      },
      success: function (response) 
      {
	    document.getElementById("comment").value="";
      }
    });
  }
  
  return false;
}
</script>
<script>
 function autoRefresh_div()
 {
      $("#result").load("load.php").show();// a function which will load data from other file after x seconds
      location.refresh();
  }
 
 // setInterval('autoRefresh_div()', 2000);
</script>
     <?php include 'headers/footer.php' ;?> 
    
    </body>
</html>