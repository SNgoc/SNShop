<?php
require_once('../../db/dbhelper.php');
if(!empty($_POST)){
    if(isset($_POST['action'])){
        $action = $_POST['action'];

        switch($action){
            case'delete':
                if(isset($_POST['id'])){
                    $id= $_POST['id'];
                    $sql ='delete from review where id ='.$id;
                    execute($sql);
                } 
            break;

            case'deleteKeyword':
                if(isset($_POST['id'])){
                    $id= $_POST['id'];
                    $sql ='delete from review_filter where id ='.$id;
                    execute($sql);
                } 
            break;
        }
    }
    
}