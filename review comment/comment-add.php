<?php
require 'controllers/db_credentials.php';

  if (isset($_SESSION['email'])) 
  {
  	 $email = $_SESSION['email'];
  }
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
$commentor = isset($_SESSION['email']) ? $_SESSION['email'] : "";
$date = date('Y-m-d H:i:s');
$reviewId = $_GET['Review_ID'];
$commentId = "";

$sql = "INSERT INTO `review_comment`(`Review_ID`, `Parent_ID`, `Commentor`, `Comment`, `Comment_Time`) VALUES ('" . $reviewId . "','" . $commentId . "','" . $comment . "','" . $commentor . "','" . $date . "')";

?>
