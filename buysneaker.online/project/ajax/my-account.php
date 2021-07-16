<?php
require_once('../db/dbhelper.php');
if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action = $_POST['action'];

        switch($action){
            case'delete':
                if(isset($_POST['id'])){
                    $id= $_POST['id'];                   
                    //tra lai so luong san pham
                    $sql = 'select * from orderdetail where id_order='.$id;
                    $result = executeResult($sql);
                    foreach ($result as $item){
                        $sql = 'select * from product where id ='.$item['id_product'];
                        $product = executeSingleResult($sql);
                        $qty = $product[$item['size']] + $item['quantity'];
                        $sql = 'update product set '.$item['size'].' = '.$qty.' where id = '.$item['id_product'];
                        execute($sql);
                    }
                    //cap nhat db
                    $sql ='update orders set id_process = 5  where id ='.$id;
                    execute($sql);
                } 
            break;

            case'finish':
                if(isset($_POST['id'])){
                    $id= $_POST['id']; 
                    $sql ='update orders set id_process = 4  where id ='.$id;
                    execute($sql);
                }     
            break;
        }
    }
    
}