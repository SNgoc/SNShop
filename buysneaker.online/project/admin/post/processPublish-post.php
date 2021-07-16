<?php
require_once('../../db/dbhelper.php');
if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action = $_POST['action'];

        switch($action){
            case'publish':
                if(isset($_POST['id'])){
                    $id= $_POST['id'];
                    $sql ='UPDATE posts set published = 1 WHERE id ='.$id;
                    execute($sql);
                    } 
                break;

            case'unpublish':
                if(isset($_POST['id'])){
                    $id= $_POST['id'];
                    $sql ='UPDATE posts set published = 0 WHERE id ='.$id;
                    execute($sql);
                    } 
                break;
        }
    }
    
}
