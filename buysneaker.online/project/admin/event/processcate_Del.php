
<?php
session_start();
include('../../db/dbhelper.php');
 $id =$_GET['id'];
 
if (!$link){
    die ('error connection database');
}
$query =' DELETE FROM event_tp where id ='.$id;

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