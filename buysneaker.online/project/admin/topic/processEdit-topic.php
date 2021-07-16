<?php
//connect db
require_once('../../db/dbhelper.php');

$id = $_POST['id'];
$topic_name = $_POST['topic_name']; //lấy value của name nhập vào
$topic_description = htmlentities($_POST['description']);//lấy từ db ra và tự thêm vào tag html
// Check duplicate
$topic_check = false;
$query_check = 'SELECT * FROM topics';
$topicList = executeResult($query_check);
foreach($topicList as $item){
    if (strtolower($topic_name) == strtolower($item['topic_name'])) {
        if ($id != $item['id']) {// bỏ qua topic_name hiện tại khi update, chỉ xét các topic_name còn lại trong db
            $topic_check = true;
            break;
        }
    }
}
if ($topic_check == true) {
    header('Location: ../topic-edit.php?id='.$id.'&topic_check="'.$topic_name.'"&error=1');
} else {
    //dùng '' cho query và text phải có "" để sửa lỗi add text too long ko vào db
    $query = 'UPDATE topics SET topic_name = "'.$topic_name.'", description = "'.$topic_description.'" WHERE id ='. $id;
    //die($query);
    mysqli_query($link, $query);
    mysqli_close($link);

    header('Location:../manage-topic.php');
}
?>