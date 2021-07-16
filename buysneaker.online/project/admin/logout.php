<?php
include_once('../db/dbhelper.php');
session_start();
$sql = 'select * from admin where admin = "'.$_SESSION['admin'].'"';
$admin = executeSingleResult($sql);
setcookie('admin','',time()-1);
if($admin['token'] != $_SESSION['adminToken']){
    unset($_SESSION['adminToken']);
    unset($_SESSION['admin']);
    echo '<script type="text/javascript">';
    echo 'alert("Your account has been login from other device");'; 
    echo 'window.location="login.php"';
    echo '</script>';
}else{
    $token = '';
    $sql = 'update admin set token = "'.$token.'" where admin = "'.$_SESSION['admin'].'"';
    execute($sql);
    unset($_SESSION['adminToken']);
    unset($_SESSION['admin']);
    header ('location: login.php');
}
?>



