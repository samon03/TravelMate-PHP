<?php
require 'controllers/db_credentials.php';

$gId = $_GET['Cpost_ID'];
$comm = "SELECT Messager, Message, Message_Time , User_Img
         FROM `message_box` , `user` WHERE Group_ID = '$gId' && Name = Messager";

$res = $mysqli->query($comm);
while($row = $res->fetch_assoc())
{
	$name=$row['Messager'];
	$comment=$row['Message'];
    $time=$row['Message_Time'];
    $uimg=$row['User_Img']; 
?>

<div class="chats" style="border: 2px solid #dedede; background-color: #f1f1f1; border-radius: 5px; padding: 10px; margin: 10px 0;">
	<img src="user_images/<?=$uimg?>" width="30" height="30"
			         style="border-radius: 50%; margin-right: 5px;"> 
	    <strong style="color: #0047b3; font-size: 16px"><?=$name?>
	      <span> : </span>
	    </strong> <span style="color: black;"><?=$comment?></span> 
    <span style="float:right; color: grey;">
     	<?=date("g:ia M d, y", strtotime($time))?>
    </span>
</div>
<?php
}
?>