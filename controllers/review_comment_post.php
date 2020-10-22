<?php

session_start();
require 'db_credentials.php';

if(isset($_SESSION["email"])) 
{
    $email = $_SESSION["email"];
    if(isset($_POST["Comment"])) 
    {
        $reviewId = $_POST["Review_ID"];
        $comment = $_POST["Comment"];
        $commentId = '';

        $qry = "INSERT INTO `review_comment`(`Review_ID`, `Parent_ID` ,`Commentor`, `Comment`, `Comment_Time`) 
            VALUES ('$reviewId', '$commentId', '$email','$comment', CURRENT_TIME())";


        $mysqli->query($qry);

     } 
}

?>