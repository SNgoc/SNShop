<?php
include_once('../db/dbhelper.php');
session_start();
if(isset($_GET)){
    $user = $_GET['user'];
}
//lay token luu vao db
$token = substr(md5(uniqid(rand(),1)),3,10);
$sql = 'update user set token = "'.$token.'" where user = "'.$user.'"';
execute($sql);  
$_SESSION['user'] = $user;  
$_SESSION['token'] = $token; 
header('Location: ../index.php');