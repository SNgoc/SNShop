
<?php
require_once('../../db/dbhelper.php');
require_once('../../common/utility.php');
if(isset($_POST["submit"])){
    $id= $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

}
if (!$link){
    die ('error connection database');
}

$query = 'UPDATE event_tp SET name_tp = "'.$name.'", description_tp = "'.$description.'" where id ="'.$id.'";';
// die($query);
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