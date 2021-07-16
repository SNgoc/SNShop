<?php
//connect db
require_once('../../db/dbhelper.php');

$id = $_GET['id'];
$sql_count_post = 'SELECT COUNT(topic_id) AS total_id FROM posts WHERE topic_id ='.$id;
$result = mysqli_query($link,$sql_count_post);
$row = mysqli_fetch_assoc($result);
$count_id = $row['total_id'];

if ($count_id == 0) {
    $sql ='DELETE from topics WHERE id ='.$id;
    execute($sql);
    mysqli_close($link);
    header('Location:../manage-topic.php');
}
else {
    header('Location:../manage-topic.php?alert=1');
    mysqli_close($link);
}
?>