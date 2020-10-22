<?php
include("config.php");

$comm = "select name,comment,post_time from comments";
$res = $mysqli->query($comm);
while($row = $res->fetch_assoc()){
	$name=$row['name'];
	$comment=$row['comment'];
    $time=$row['post_time'];
?>
<div class="chats"><strong><?=$name?>:</strong> <?=$comment?> <p style="float:right"><?=date("j/m/Y g:i:sa", strtotime($time))?></p></div>
<?php
}
?>