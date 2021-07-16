
<?php
require_once('../../db/dbhelper.php');
require_once('../../common/utility.php');
if(isset($_POST["submit"])){
$id= $_POST['id'];
 $title = $_POST['title'];
 $startingday = $_POST['startingday'];
 $endday = $_POST['endday'];
 $description = $_POST['description'];

 $picturedescription = NULL;
if ($_FILES['picturedescription']) {
    $fname = $_FILES['picturedescription']['name'];
    $ftmp = $_FILES['picturedescription']['tmp_name'];
    if (move_uploaded_file($ftmp, '../../image/blog/' . $fname)) {
        $picturedescription = $fname;
    }
}
$topic_id = $_POST['topic_id'];
$content = htmlentities($_POST['content']);
 }
if (!$link){
    die ('error connection database');
}
if($picturedescription){
$query = 'UPDATE event SET title = "'.$title.'",topic_id ="'.$topic_id.'", description = "'.$description.'", image = "'.$picturedescription.'", startingday = "'.$startingday.'", endday = "'.$endday.'", content = "'.$content.'" where id ="'.$id.'";';}
else{
$query = 'UPDATE event SET title = "'.$title.'",topic_id ="'.$topic_id.'", description = "'.$description.'", startingday = "'.$startingday.'", endday = "'.$endday.'", content = "'.$content.'" where id ="'.$id.'";';
}
// die($query);
// die($query);
$result = mysqli_query($link, $query);
            mysqli_close($link);     
if (!$result){
            die ('khong the ket noi vao db'); }  
if ($result > 0){
    header('location: ../event.php' );
}else{
    header('location: ../event.php?error=Error');
}
?>