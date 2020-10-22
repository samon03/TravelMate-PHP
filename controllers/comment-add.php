<?php
  require 'db_credentials.php';

  if (isset($_SESSION['email'])) 
  {
  	 $email = $_SESSION['email'];

     $sql = "SELECT Name FROM `user` WHERE Email = '$email'";
     $res = $mysqli->query($sql);
     while ($row = $res->fetch_assoc()) 
     {
            $username = $row['Name'];
     }   
  }
$commentId = isset($_POST['comment_id']) ? $_POST['comment_id'] : "";
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
$commentor = isset($row['Name']) ? $row['Name'] : "";
$date = date('Y-m-d H:i:s');
$reviewId = $_GET['Review_ID'];

$sql = "INSERT INTO `review_comment`(`Review_ID`, `Parent_ID`, `Commentor`, `Comment`, `Comment_Time`) VALUES ('" . $reviewId . "','" . $commentId . "','" . $comment . "','" . $commentor . "','" . $date . "')"

$result = mysqli_query($mysqli, $sql);

if (! $result) {
    $result = mysqli_error($mysqli);
}
echo $result;
?>
