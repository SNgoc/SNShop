
<?php
session_start();
include('../../db/dbhelper.php');

 $name = $_POST['Name'];
 $description = $_POST['description'];

if (!$link){
    die ('error connection database');
}
$query =" INSERT INTO event_tp ( name_tp, description_tp) VALUES ('$name','$description')";

$result = mysqli_query($link, $query);
            mysqli_close($link);     
if (!$result){
            die ('khong the ket noi vao db'); }  
if ($result > 0){
    header('location: ../event_Categories.php' );
}else{
    header('location: ../event_Categories.php?error=Error');
}
?>