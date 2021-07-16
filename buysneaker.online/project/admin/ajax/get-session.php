<?php
include_once('../../db/dbhelper.php');
session_start();
if(isset($_GET)){
    $admin = $_GET['admin'];
}
//lay token luu vao db
$token = substr(md5(uniqid(rand(),1)),3,10);
$sql = 'update admin set token = "'.$token.'" where admin = "'.$admin.'"';
execute($sql);  
setcookie('admin', $admin);
$_SESSION['admin'] = $admin;  
$_SESSION['adminToken'] = $token; 
header('Location: ../index.php');