<?php
//connect db
require_once('../../db/dbhelper.php');

$id = $_POST['id'];
$faq_title = $_POST['faq_title']; //lấy value của name nhập vào
$faq_content = htmlentities($_POST['faq_content']);//lấy từ db ra và tự thêm vào tag html
//dùng '' cho query và text phải có "" để sửa lỗi add text too long ko vào db
$query = 'UPDATE faq SET faq_title = "'.$faq_title.'", faq_content = "'.$faq_content.'" WHERE id ='. $id;

//die($query);
mysqli_query($link, $query);
mysqli_close($link);

header('Location:../manage-faq-policy.php');
?>