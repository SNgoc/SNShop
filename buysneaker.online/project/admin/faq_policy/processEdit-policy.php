<?php
//connect db
require_once('../../db/dbhelper.php');

$id = $_POST['id'];
$pp_title = $_POST['pp_title']; //lấy value của name nhập vào
$pp_content = htmlentities($_POST['pp_content']);//lấy từ db ra và tự thêm vào tag html

//dùng '' cho query và text phải có "" để sửa lỗi add text too long ko vào db
$query = 'UPDATE policy SET pp_title = "'.$pp_title.'", pp_content = "'.$pp_content.'" WHERE id ='. $id;

//die($query);
mysqli_query($link, $query);
mysqli_close($link);

header('Location:../manage-faq-policy.php');
?>