<?php
require_once('../../db/dbhelper.php');
if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action = $_POST['action'];

        switch($action){
            case'nextStep':
                if(isset($_POST['id_order'])){
                    $id_order = $_POST['id_order'];
                    $id_process = $_POST['id_process'];
                    $id_process = $id_process + 1;
                    $sql ='update orders set id_process = "'.$id_process.'"  where id ='.$id_order;
                    execute($sql);
                    } 
                break;
        }
    }
    
}
