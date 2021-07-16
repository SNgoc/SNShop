<?php
session_start();
if (empty($_SESSION['user'])){
    header('Location:login.php');  
}
include('db/dbhelper.php');
$sql = 'select * from user where user = "'.$_SESSION['user'].'"';
$result = executeSingleResult($sql);
$token = $result['token'];
if($token != $_SESSION['token']){
    header('Location: logout.php');
}

$id_user = $result['id'];
$sql="select * from cart where id_user = $id_user";
$productList = executeResult($sql);
//check xem có san pham nao so luong = 0 khong?
foreach($productList as $item){
    if($item['quantity'] == 0){
        header('Location: ajax/delete-cart.php?id='.$item['id_product'].'&size='.$item['size'].'&id_user='.$id_user);
    }
}
if(isset($_GET['action']) && !empty($_GET['action']) ){ 
    switch ($_GET['action']){       
        case "add":
            date_default_timezone_set('Asia/Saigon');
            $checkCart=true;
            //delete from wishlist
            $sql= 'DELETE FROM wishlist WHERE id_product = '.$_POST['id_product'].' AND id_user = '.$id_user;
            execute($sql); 
            if(!empty($_POST)){                 
                $sql = 'select * from product where id = '.$_POST['id_product'];
                $checkQty = executeSingleResult($sql);
                //kiem tra xem san pham con khong?
                if($checkQty[$_POST['size']] == 0){
                    echo '<script type="text/javascript">';
                    echo 'alert("The product is sold out");';
                    echo 'window.location="product.php";';
                    echo '</script>';     
                    return;               
                }
                //kiem tra xem so luong order co lon hon so luong trong kho k? 
                if($checkQty[$_POST['size']] < $_POST['quantity']){
                    $_POST['quantity']=$checkQty[$_POST['size']];
                    echo '<script type="text/javascript">';
                    echo 'alert("The quantity is not enough! Only '.$_POST['quantity'].' products left");';
                    echo 'window.location="cart.php";';
                    echo '</script>';
                }               
                //kiem tra xem san pham da co trong gia hang chưa             
                foreach($productList as $item){                  
                    if($item['id_product']==$_POST['id_product'] && $item['size']==$_POST['size']){
                        $checkCart=false; 
                        break;  
                    }                   
                }
                if($checkCart==true){                    
                    $created_at=$updated_at= date('Y-m-d H:s:i');
                    $sql='insert into cart(id_product,quantity,price,size,name,created_at,updated_at,id_user) 
                    values("'.$_POST['id_product'].'","'.$_POST['quantity'].'","'.$_POST['price'].'",
                    "'.$_POST['size'].'","'.$_POST['name'].'","'.$created_at.'","'.$updated_at.'","'.$id_user.'")';
                    execute($sql);
                }
                if($checkCart==false){
                    $updated_at= date('Y-m-d H:s:i');
                    $sql='update cart set quantity = "'.$_POST['quantity'].'",updated_at="'.$updated_at.'", 
                    price="'.$_POST['price'].'", size="'.$_POST['size'].'" 
                    where id_product='.$_POST['id_product'].' and size="'.$_POST['size'].'"';
                    execute($sql); 
                }
            }                
    }
}
foreach($productList as $item){    
    if(isset($_GET[$item['id_product']])){
        //kiem tra xem so luong order co lon hon so luong trong kho k? 
        $sql = 'select '.$_GET['size'.$item['id_product'].''].' as checkQtyUpdate from product where id ='.$item['id_product']; 
        $result = executeSingleResult($sql);         
        if($result['checkQtyUpdate'] < $_GET[$item['id_product']] ){       
            $_GET[$item['id_product']] = $result['checkQtyUpdate'];
            echo '<script type="text/javascript">';
            echo 'alert("The quantity is not enough! Only '.$_GET[$item['id_product']].' products left");';
            echo 'window.location="cart.php";';
            echo '</script>';           
        }
        $quantity=$_GET[$item['id_product']];
        $updated_at= date('Y-m-d H:s:i');
        $sql='update cart set quantity = "'.$quantity.'",updated_at="'.$updated_at.'" where id_product='.$item['id_product'].' and size="'.$_GET['size'.$item['id_product'].''].'" and id_user='.$id_user; 
        execute($sql);
        echo '<script type="text/javascript">';
        echo 'window.location="cart.php";';
        echo '</script>';  
   }  
}     
?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:37:31 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Cart </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon
        ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="admin/images/favicon.png">

        <!-- Google Fonts
        ============================================ -->
        <link href='https://fonts.googleapis.com/css?family=Norican' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Bootstrap CSS
        ============================================ -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Bootstrap CSS
        ============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- owl.carousel CSS
        ============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
        <!-- jquery-ui CSS
        ============================================ -->
        <link rel="stylesheet" href="css/jquery-ui.css">
        <!-- meanmenu CSS
        ============================================ -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
        <!-- nivoslider CSS
        ============================================ -->
        <link rel="stylesheet" href="lib/css/nivo-slider.css">
        <link rel="stylesheet" href="lib/css/preview.css">
        <!-- animate CSS
        ============================================ -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- magic CSS
        ============================================ -->
        <link rel="stylesheet" href="css/magic.css">
        <!-- normalize CSS
        ============================================ -->
        <link rel="stylesheet" href="css/normalize.css">
        <!-- main CSS
        ============================================ -->
        <link rel="stylesheet" href="css/main.css">
        <!-- style CSS
        ============================================ -->
        <link rel="stylesheet" href="style.css">
        <!-- responsive CSS
        ============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- modernizr JS
        ============================================ -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!-- header area start -->
        <?php
        include_once('layout/header.php');
        ?>
        <!-- header area end -->
        <!-- cart item area start -->
        <div class="shopping-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.php" title="go to homepage">Home<span>/</span></a>  </li>
                                <li><strong> Shopping cart</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">                       
                        <div class="table-responsive">
                            <form action="" method="get">    
                                <table class="table-bordered table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="cart-item-img"></th>
                                            <th class="cart-product-name">Product Name</th>
                                            <th class="edit">Product Size</th>
                                            <th class="move-wishlist">Move to Wishlist</th>
                                            <th class="unit-price">Unit Price</th>
                                            <th class="quantity">Qty</th>
                                            <th class="subtotal">Subtotal</th>
                                            <th class="remove-icon"></th>
                                        </tr>
                                    </thead>                               
                                    <tbody class="text-center">
<?php
$sql="select * from cart where id_user = $id_user";
$productList = executeResult($sql);
$total=0;
foreach($productList as $item){
    $sql = 'select * from product_thumbnail where id_product ='.$item['id_product']; 
    $thumbnail = executeSingleResult($sql); 
    $sum= $item['price'] * $item['quantity'];
    echo '      
                                        <tr>
                                            <td class="cart-item-img">
                                                <a href="single-product.php?id='.$item['id_product'].'">
                                                    <img src="'.$thumbnail['thumbnail'].'" alt="">
                                                </a>
                                            </td>
                                            <td class="cart-product-name">
                                                <a href="single-product.php?id='.$item['id_product'].'">'.$item['name'].'</a>
                                            </td>
                                            <td class="quantity"> 
                                                <span>'.$item['size'].'</span>
                                            </td>
                                            <td class="move-wishlist">
                                                <a href="ajax/move-cart-to-wishlist.php?id='.$item['id_product'].'&size='.$item['size'].'">Move</a>
                                            </td>
                                            <td class="unit-price">
                                                <span>$'.$item['price'].'</span>
                                            </td>
                                            <td class="quantity">
                                                <span>
                                                    <input type="number" min="0" value="'.$item['quantity'].'" name="'.$item['id_product'].'">
                                                    <input type="text" value="'.$item['size'].'" name="size'.$item['id_product'].'" hidden>  
                                                </span>
                                            </td>
                                            <td class="subtotal">
                                                <span>$'.$sum.'</span>
                                            </td>                               
                                            <td class="remove-icon">
                                                <a href="ajax/delete-cart.php?id='.$item['id_product'].'&size='.$item['size'].'&id_user='.$id_user.'"> 
                                                    <img src="img/cart/btn_remove.png" alt="">
                                                </a>
                                            </td>
                                        </tr>
        ';
    $total+=$sum;
    }
?>                                  
                                    </tbody>                                
                                </table>
                                <div class="shopping-button">
                                    <div class="continue-shopping">
                                        <button><a href="product.php">continue shopping</a></button>                               
                                    </div>
                                    <div class="shopping-cart-left">
                                        <button onclick="deleteCart(<?=$id_user?>)">Clear Shopping Cart</button>
                                    <div class="shopping-cart-left">
                                        <button type="submit">Update Shopping Cart</button>
                                    </div>
                                    </div>
                                </div>
                               
                            </form>
                        </div>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
<?php
//discount$
$grandtotal = $total;
$code = '';
$discountValue = 0;
$token = '';
if(isset($_POST['discount']) && !empty($_POST['discount'])){
    $code = $_POST['discount'];
    $sql = 'select * from discount where code = "'.$code.'"';
    $discount = executeSingleResult($sql);
    if (empty($discount) ){
        echo '<script type="text/javascript">';
        echo 'alert("The code is invalid");';
        echo '</script>';
    }else{
        if($discount['amount'] == $discount['used'] || $discount['status'] == 'deactive' || $discount['status'] == 'used up'){
            echo '<script type="text/javascript">';
            echo 'alert("The code has expired");';
            echo '</script>';
        }else{
            if($total < $discount['required']){
                echo '<script type="text/javascript">';
                echo 'alert("Your order has not reached the required value");';
                echo '</script>';
            }else{
                $token = $discount['token'];
                $discountValue = $discount['discount'];
                $grandtotal = $total - $discountValue;
                
            }
        }
    }
}
?>                    
                        <div class="discount-code">
                            <h3>Discount Codes</h3>
                            <p>Enter your coupon code if you have one.</p>
                            <form method="POST" action="cart.php">
                            <input type="text" name="discount"  value="<?=$code?>">
                            <div class="shopping-button">
                                <button type="submit">apply coupon</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <div class="totals">
                            <h5>Subtotal Total <span>$<?=$total?></span></h5>
                            <h5>Discount <span>$<?=$discountValue?></span></h5>
                            <h3>Grand Total <span>$<?=$grandtotal?></span></h3>
                            <div class="shopping-button">
                                <a href="checkout.php?t=<?=$token?>"><button type="submit">proceed to checkout</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart item area end -->
        <!-- footer area start -->
        <?php include_once('layout/footer.php');?>
        <!-- footer area end -->
        <!-- jquery
        ============================================ -->
        <script src="js/vendor/jquery-1.12.1.min.js"></script>
        <!-- bootstrap JS
        ============================================ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- wow JS
        ============================================ -->
        <script src="js/wow.min.js"></script>
        <!-- price-slider JS
        ============================================ -->
        <script src="js/jquery-price-slider.js"></script>
        <!-- nivoslider JS
        ============================================ -->
        <script src="lib/js/jquery.nivo.slider.js"></script>
        <script src="lib/home.js"></script>
        <!-- meanmenu JS
        ============================================ -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- owl.carousel JS
        ============================================ -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- elevatezoom JS
        ============================================ -->
        <script src="js/jquery.elevatezoom.js"></script>
        <!-- scrollUp JS
        ============================================ -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- plugins JS
        ============================================ -->
        <script src="js/plugins.js"></script>
        <!-- main JS
        ============================================ -->
        <script src="js/main.js"></script>
    </body>
    <script>
        function deleteCart(id){
			var option = confirm('Do you want to delete all product?')	
			if (!option){
				return;
			}
            console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/delete-all-cart.php',{
                'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
    </script>
<!-- Mirrored from preview.hasthemes.com/james-preview/james/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:37:33 GMT -->
</html>
