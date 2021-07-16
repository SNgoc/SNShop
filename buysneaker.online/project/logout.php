<?php
include_once('db/dbhelper.php');
session_start();
$sql = 'select * from user where user = "'.$_SESSION['user'].'"';
$user = executeSingleResult($sql);
if($user['token'] != $_SESSION['token']){
    unset($_SESSION['token']);
    unset($_SESSION['user']);

    echo '<script type="text/javascript">';
    echo 'alert("Your account has been login from other device");'; 
    echo 'window.location="index.php"';
    echo '</script>';
}else{
    $token = '';
    $sql = 'update user set token = "'.$token.'" where user = "'.$_SESSION['user'].'"';
    execute($sql);
    session_destroy();
    header ('location: index.php');
}

?>