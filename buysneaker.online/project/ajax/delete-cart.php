<?php
require_once('../db/dbhelper.php');
if(!empty($_GET)){
    $id= $_GET['id'];
    $size = $_GET['size'];    
    $id_user = $_GET['id_user'];      
    $sql ='delete from cart where id_product ='.$id.' and size="'.$size.'" and id_user = '.$id_user;
    execute($sql);   
    header('Location:../cart.php');
}   