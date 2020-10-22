<?php

session_start();
require 'controllers/db_credentials.php';

if (isset($_SESSION['email'])) 
  {
      $email = $_SESSION['email'];
	//$chapter=$_POST['chapter'];
	$file=$_FILES['img-upload'];

	move_uploaded_file($file['tmp_name'],' ../../../TravelMate/user_images ../'.$file['name']);
	$imgUp = $_FILES['img-upload']['name'];

	$sql = "UPDATE `user`
	SET User_Img = '$imgUp'
	WHERE (Email = '$email')";

	$profile =  $mysqli->query($sql);
	
//html/element/input file
	var_dump($file);

}

?>