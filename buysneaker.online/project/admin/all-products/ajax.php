<?php
require_once('../../db/dbhelper.php');
if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action = $_POST['action'];

        switch($action){
            case'delete':
                if(isset($_POST['id'])){
                    $id= $_POST['id'];
                        $sql ='delete from product where id ='.$id;
                        execute($sql);
                        $sql = 'delete from product_image where id_product='.$id;
                        execute($sql);
                        $sql = 'delete from product_thumbnail where id_product='.$id;
                        execute($sql);
                    }                 
            break;
        }
    }
    
}