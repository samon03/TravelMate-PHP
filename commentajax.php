<?php
 
require 'controllers/db_credentials.php';

if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
  $comment=$_POST['user_comm'];
  $name=$_POST['user_name'];
  $gId=$_POST['Cpost_ID'];

  $insert = $mysqli->query("INSERT INTO `message_box` VALUES 
  	('$gId','', '$name', '$comment', CURRENT_TIMESTAMP)");

}

?>