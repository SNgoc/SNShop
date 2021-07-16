<?php
session_start();
include('../db/dbhelper.php');
require_once('../common/utility.php');
?>
<?php

$id_product = $_GET['id'];
$size = $_GET['size'];

$query = "SELECT * FROM product WHERE id = $id_product";
if($rows = mysqli_query($link, $query)){
    if(mysqli_num_rows($rows) > 0){
        if($row = mysqli_fetch_array($rows)){
            $id_product = $row[0];
            $price = $row[2];
            $name = $row[1];
            $name = str_replace('"', '\\"', $name);
        }
    }
}

$sql = 'select * from user where user = "'.$_SESSION['user'].'"';    
if($rows = mysqli_query($link, $sql)){
    if(mysqli_num_rows($rows) > 0){
        if($row = mysqli_fetch_array($rows)){
            $id_user = $row[0];
        }
    }
}
$query = "DELETE FROM cart WHERE id_product = $id_product AND id_user = $id_user and size = '$size'";
execute($query);

$sql='select * from wishlist';
$wishlist = executeResult($sql);
$isExist = false;
foreach($wishlist as $item){
    if($item['id_product'] == $id_product){
        $isExist = true;
        break;
    }
}
if($isExist == false){
    $query = 'INSERT INTO wishlist (id_product, price, name, id_user) VALUES('.$id_product.', '.$price.', "'.$name.'", '.$id_user.')';
    mysqli_query($link,$query);
    mysqli_close($link);
}
header('Location:../wishlist.php')
?>