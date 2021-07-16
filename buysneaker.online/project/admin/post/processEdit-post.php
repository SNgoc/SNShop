<?php
//connect db
require_once('../../db/dbhelper.php');

$id = $_POST['id'];
$topic_id = $_POST['topic_id'];//lấy name của select là topic_id nhập vào
$title = $_POST['title']; //lấy value của name nhập vào
$published = $_POST['published'];//lấy name của input là published với value = 1 nhập vào
$content = htmlentities($_POST['content']);//phải có htmlentities để chuyển đổi trc thì mới add vào db đc

$image = NULL;
if ($_FILES['image']) {
    $fname = $_FILES['image']['name'];
    $ftmp = $_FILES['image']['tmp_name'];
    if (move_uploaded_file($ftmp, '../../image/blog/' . $fname)) {
        $image = $fname;
    }
}

$title_check = false;
$query_check = 'SELECT * FROM posts'; //query check duplicate title but ignore current title at edit
$titleList = executeResult($query_check);
//die($query_check);
foreach($titleList as $item){
    if (strtolower($title) == strtolower($item['title'])) {
        if ($id != $item['id']) {// bỏ qua title hiện tại khi update, chỉ xét các title còn lại trong db
            $title_check = true;
            break;
        }
    }
}
if ($title_check == true) {
    header(('Location: ../post-edit.php?id='.$id.'&title_check="'.$title.'"&error=1'));//use & parse multi value for GET
} else {
//dùng '' cho query và text phải có "" để sửa lỗi edit text too long ko vào db
    if ($image) {
        if (isset($published) == 1) {//published was checked
            $query = 'UPDATE posts SET topic_id = '.$topic_id.', title = "'.$title.'", content = "'.$content.'", image = "'.$image.'", published = '.$published.' WHERE id = '.$id;
            mysqli_query($link, $query);
            mysqli_close($link);

            header('Location:../manage-post.php');
        } else {
            $query = 'UPDATE posts SET topic_id = '.$topic_id.', title = "'.$title.'", content = "'.$content.'", image = "'.$image.'", published = 0 WHERE id ='. $id;
            mysqli_query($link, $query);
            mysqli_close($link);

            header('Location:../manage-post.php');
        }
    } else { //giữ lại image cũ trong table
        if (isset($published) == 1) {//published was checked
            $query = 'UPDATE posts SET topic_id = '.$topic_id.', title = "'.$title.'", content = "'.$content.'", published = '.$published.' WHERE id = '.$id;
            mysqli_query($link, $query);
            mysqli_close($link);

            header('Location:../manage-post.php');
        } else {
            $query = 'UPDATE posts SET topic_id = '.$topic_id.', title = "'.$title.'", content = "'.$content.'", published = 0 WHERE id ='. $id;
            mysqli_query($link, $query);
            mysqli_close($link);

            header('Location:../manage-post.php');
        }
    }
}
//die($query);
?>