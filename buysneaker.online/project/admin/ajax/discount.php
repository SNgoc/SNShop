<?php
require_once('../../db/dbhelper.php');
if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action = $_POST['action'];

        switch($action){
            case'deactive':
                if(isset($_POST['id'])){
                    $id= $_POST['id'];
                    $sql ='update discount set status = "deactive" where id ='.$id;
                    execute($sql);
                    } 
                break;

            case'active':
                if(isset($_POST['id'])){
                    $id= $_POST['id'];
                    $sql ='update discount set status = "active" where id ='.$id;
                    execute($sql);
                    } 
                break;

            case'delete':
                if(isset($_POST['id'])){
                    $id= $_POST['id'];
                    $sql ='delete from discount where id ='.$id;
                    execute($sql);
                } 
                break;
        }
    }
    
}
