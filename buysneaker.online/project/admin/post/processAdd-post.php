<?php
//connect db
require_once('../../db/dbhelper.php');
//lấy user admin lưu bằng session
session_start();
$admin_user = $_SESSION['admin'];//admin_user của bảng admin

$topic_id = $_POST['topic_id'];//lấy name của select là topic_id nhập vào
$title = $_POST['title']; //lấy name của input là title nhập vào
$content = htmlentities($_POST['content']);//phải có htmlentities để chuyển đổi trc thì mới add vào db đc
$published = $_POST['published'];//lấy name của input là published với value = 1 nhập vào


$image = NULL;
if ($_FILES['image']) {
    $fname = $_FILES['image']['name'];
    $ftmp = $_FILES['image']['tmp_name'];
    if (move_uploaded_file($ftmp, '../../image/blog/' . $fname)) {
        $image = $fname;
    }
}
$title_check = false;
$query_check = 'SELECT * FROM posts';
$titleList = executeResult($query_check);
foreach($titleList as $item){
    if (strtolower($title) == strtolower($item['title'])) {
        $title_check = true;
        break;
    }
}
if ($title_check == true) {
    header(('Location: ../post-add.php?error=1&title_check='.$title));
} else {
    //dùng '' cho query và text phải có "" để sửa lỗi add text too long ko vào db
    if (isset($published)) {//published was checked
        $query = 'INSERT INTO posts (admin_user, topic_id , title, content, image, published) VALUES ("'.$admin_user.'",'.$topic_id.', "'.$title.'", "'.$content.'", "'.$image.'",'.$published.')';

        mysqli_query($link, $query);
        mysqli_close($link);

        header('Location:../manage-post.php');
    } else {
        $query = 'INSERT INTO posts (admin_user, topic_id, title, content, image) VALUES ("'.$admin_user.'",'.$topic_id.', "'.$title.'", "'.$content.'", "'.$image.'")';

        mysqli_query($link, $query);
        mysqli_close($link);

        header('Location:../manage-post.php');
    }
}

//die($query);
?>