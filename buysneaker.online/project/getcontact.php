<?php
require_once ('db/dbhelper.php');
 $name = $_POST['name'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $comments = $_POST['comments'];
if (!$link){
    die ('khong the ket noi vao database');
}
$query = " INSERT INTO contact_form_info_table (name, email, phone, comment) VALUES ('$name','$email','$phone','$comments')";
$result = mysqli_query($link, $query);    
            mysqli_close($link);     
if (!$result){
            die ('khong the ket noi vao db'); }  
if ($result > 0){
    header('location: contact.php' );
}else{
    header('location: contact.php?error=Error');
}
?>