
<?php
session_start();
include('../../db/dbhelper.php');
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
    $content = $_POST['content'];
 




if (!$link){
    die ('error connection database');
}
$query =" INSERT INTO event ( title, topic_id, description, image,  startingday, endday, content ) VALUES ('$title', '$topic_id', '$description', '$picturedescription', '$startingday', '$endday', '$content')";

$result = mysqli_query($link, $query);
            mysqli_close($link);     
if (!$result){
            die ('Not connection database'); }  
if ($result > 0){
    header('location: ../event.php' );
}else{
    header('location: ../event.php?error=Error');
}
?>