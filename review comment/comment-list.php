<?php
require 'controllers/db_credentials.php';

$sql = "SELECT * FROM `review_comment` ORDER BY  Parent_ID DESC, Comment_ID DESC";

$result = mysqli_query($mysqli, $sql);
$record_set = array();
while ($row = mysqli_fetch_assoc($result)) 
{
    array_push($record_set, $row);
}
mysqli_free_result($result);

mysqli_close($mysqli);
echo json_encode($record_set);
?>