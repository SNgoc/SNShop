<?php
session_start();
?>
<?php
include('../db/dbhelper.php');
$id = $_GET['id'];
$sql = 'select * from user where user = "'.$_SESSION['user'].'"';    
$result = executeSingleResult($sql);
$id_user = $result['id'];
$sql='select * from wishlist where id_user = "'.$id_user.'"';
$wishlist = executeResult($sql);
$isExist = false;
foreach($wishlist as $item){
    if($item['id_product'] == $id){
        $isExist = true;
        break;
    }
}
if($isExist == false){
    $query = "SELECT * FROM product WHERE id = $id";
    if($rows = mysqli_query($link, $query)){
            if(mysqli_num_rows($rows) > 0){
                if($row = mysqli_fetch_array($rows)){
                        $id_product = $row[0];
                        $price = $row[2];
                        $name = $row[1];
                        $name = str_replace('"', '\\"', $name);
                }
            }
        }


    $sql = 'select * from user where user = "'.$_SESSION['user'].'"';    
    if($rows = mysqli_query($link, $sql)){
        if(mysqli_num_rows($rows) > 0){
            if($row = mysqli_fetch_array($rows)){
                        $id_user = $row[0];
            }
        }
    }
}
    $id = $_GET['id'];
    $sql="select * from cart";
    $cart = executeResult($sql);
    $checkCart = false;
    foreach($cart as $item){
        if($item['id_product'] == $id){
            $checkCart = true;
            break;
        }
    }
    if($checkCart == true){
        $query = "DELETE FROM cart WHERE id_product = $id AND id_user = $id_user";
        execute($query);
    }
    $query = 'INSERT INTO wishlist (id_product, price, name, id_user) VALUES('.$id_product.', '.$price.', "'.$name.'", '.$id_user.')';
    mysqli_query($link,$query);
    mysqli_close($link);
header("location:javascript://history.go(-1)");
?>