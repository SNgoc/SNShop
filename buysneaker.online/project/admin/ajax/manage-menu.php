<?php
require_once('../../db/dbhelper.php');
if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action = $_POST['action'];

        switch($action){
            case'deactive':
                if(isset($_POST['id'])){
                    $id= $_POST['id'];
                    $sql ='update menu set isActive = 0 where id ='.$id;
                    execute($sql);
                    } 
                break;

            case'active':
                if(isset($_POST['id'])){
                    $id= $_POST['id'];
                    $sql ='update menu set isActive = 1 where id ='.$id;
                    execute($sql);
                    } 
                break;
        }
    }
    
}
