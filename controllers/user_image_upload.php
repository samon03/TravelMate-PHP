<?php
//$chapter=$_POST['chapter'];
$file=$_FILES['file'];

move_uploaded_file($file['tmp_name'],'user_images/'.$file['name']);
echo "yes";
//html/element/input file
var_dump($file);
?>