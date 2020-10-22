<?php
   
	session_start();
    require 'db_credentials.php';
   
	$list = array();
	$payloadObj = new stdClass();
	$length = 0;
	$index = 0;

	if(isset($_POST["Review_ID"]))
	{
	   $reviewId = $_POST["Review_ID"];
	  
	   $qry = "SELECT Name, User_Img , Review_ID, Comment, Comment_Time FROM `user`, `review_comment` WHERE Review_ID = '$reviewId' && Commentor = Email ORDER BY Comment_Time DESC";
	   
	   echo $qry;
	   $res = $mysqli->query($qry) or die('bad query');
	   $totalReviews = mysqli_num_rows($res);
	   
	   while($row = $res->fetch_assoc()) 
	   {
	   	    $name=$row["Name"];
		   	$image = $row["User_Img"];
			
			$comment=$row["Comment"];
			$date = date("Y-m-d H:i:s", strtotime($row["Comment_Time"])); //given time

			$singleObj = new stdClass();
			$singleObj->id = $reviewId;
			$singleObj->name = $name;
			$singleObj->cdate = $date;
			$singleObj->comment = $comment;
			$singleObj->image = $image;
			
			$list[$index++] = $singleObj;
            $length++;
	   }
		$payloadObj->data = $list;
        $payloadObj->size = $length;

        $jsonObj = json_encode($payloadObj);
        echo $jsonObj;
   }
   
?>