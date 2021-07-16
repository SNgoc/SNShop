<?php
require_once('config.php');

function execute($sql){
    //open connection
    $con = mysqli_connect('localhost','root','','project');
    //insert, update, delete
    mysqli_query($con,$sql);
    //close connection
    mysqli_close($con);
}

function executeResult($sql){
    //open connection
    $con = mysqli_connect('localhost','root','','project');
    //select
    $result = mysqli_query($con,$sql);
    $data = [];
    if($result != null){
        while ($row = mysqli_fetch_array($result,1)){
            $data []= $row;  
        } 
    }
    //close connection
    mysqli_close($con);
    return $data;
}

function executeSingleResult($sql){
    //open connection
    $con = mysqli_connect('localhost','root','','project');
    //select
    $result = mysqli_query($con,$sql);
    $row = null;
    if($result != null){
        $row = mysqli_fetch_array($result,1);
    } 
    //close connection
    mysqli_close($con);
    return $row;
}

function convert_name($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
    $str = preg_replace("/( )/", '-', $str);
    return $str;
}

//connectdb for BLOG
$link = mysqli_connect('localhost','root','','project');
if(!$link){
    die('Errors connect to db.');
}
//function_blog
function executeResult_post($sql){
    //open connection
    $con = mysqli_connect('localhost','root','','project');
    //select
    $result = mysqli_query($con,$sql);
    $data = [];
    if($result != null){
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result,1)){
                $data []= $row;  
            }
        } else {
            echo '<tr><td colspan="12" style="text-align:center">No data match keyword search</td></tr>';
        }
    }
    //close connection
    mysqli_close($con);
    return $data;
}