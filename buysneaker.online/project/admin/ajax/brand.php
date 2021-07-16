<?php
require_once('../../db/dbhelper.php');
if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action = $_POST['action'];

        switch($action){
            case'delete':
                if(isset($_POST['id'])){
                    $id= $_POST['id'];
                    //thay đoi lại thứ tự vì có thể brand xóa nằm ở thứ tự không phải cuối cùng
                    $sql = 'select * from brands ORDER BY ordinal';
                    $categoryList = executeResult($sql);
                    foreach($categoryList as $item){
                        if($id == $item['id']){
                            $ordinal = $item['ordinal'];
                        }
                    } 
                    foreach($categoryList as $item){                 
                        if($ordinal < $item['ordinal']){
                            $item['ordinal'] = $item['ordinal'] - 1;
                            $sql ='update brands set ordinal = "'.$item['ordinal'].'" where id ="'.$item['id'].'"'; 
                            execute($sql); 
                        }                                             
                    }
                    $sql ='delete from brands where id ='.$id;
                    execute($sql);
                } 
            break;
        }
    }
    
}