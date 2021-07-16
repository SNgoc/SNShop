<?php
//connect db
require_once('../../db/dbhelper.php');

$topic_name = $_POST['topic_name']; //lấy name của input là topic_name nhập vào
$description = $_POST['description'];//lấy name của input là description nhập vào
// Check duplicate
$topic_check = false;
$query_check = 'SELECT * FROM topics';
$topicList = executeResult($query_check);
foreach($topicList as $item){
    if (strtolower($topic_name) == strtolower($item['topic_name'])) {
        $topic_check = true;
        break;
    }
}
if ($topic_check == true) {
    header('Location: ../topic-add.php?error=1&topic_check='.$topic_name);
} else {
    //dùng '' cho query và text phải có "" để sửa lỗi add text too long ko vào db
    $query = 'INSERT INTO topics (topic_name, description) VALUES ("'.$topic_name.'", "'.$description.'")';
    //die($query);
    mysqli_query($link, $query);
    mysqli_close($link);

    header('Location:../manage-topic.php');
}
?>