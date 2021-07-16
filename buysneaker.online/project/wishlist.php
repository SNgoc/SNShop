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
?>
<?php

$sql = 'select * from user where user = "'.$_SESSION['user'].'"';
$result = executeSingleResult($sql);
$id_user = $result['id'];
$sql="select * from wishlist where id_user = $id_user";
$productList = executeResult($sql);
if(!isset($_SESSION['wishlist'])){
    $_SESSION['wishlist'] = array();
}
if(isset($_GET['action'])){ 
    switch ($_GET['action']){       
        case "add":
            $checkCart=true;
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
            }
        }
    }   
?>



<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/wishlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:37:21 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Wishlist || James </title>
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
        <!-- wishlist area start -->
        <div class="wishlist-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.html" title="go to homepage">Home<span>/</span></a>  </li>
                                <li><strong> wishlist </strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <!--menu left-->
                        <?=include('layout/menu-left-product.php')?>
                        <!--menu left-->
                    </div>
                    <div class="col-sm-9">
                        <div class="wishlist-banner">
                            <a href="#">
                                <img src="img/checkout/checkout_banner.jpg" alt="">
                            </a>
                        </div>
                        <div class="wishlist-heading">
                            <h2>Wishlist</h2>
                        </div>
                        <div class="wishlist-content">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Unit Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $sql="select * from wishlist where id_user = $id_user";
                                    $productList = executeResult($sql);
                                    foreach($productList as $item){
                                        $sql = 'select * from product_thumbnail where id_product ='.$item['id_product']; 
                                        $thumbnail = executeSingleResult($sql); 
                                        echo '
                                        <tr>
                                            <td class="cart-item-img">
                                                <a href="single-product.php?id='.$item['id_product'].'">
                                                    <img src="'.$thumbnail['thumbnail'].'" alt="">
                                                </a>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="single-product.php?id='.$item['id_product'].'">'.$item['name'].'</a>
                                            </td>
                                            <td class="unit-price">
                                                <span>$'.$item['price'].'</span>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <div class="wishlist-actions">
                                                    <a class="modal-view" data-target="#'.$item['id'].'" data-toggle="modal" href="#">
                                                        <button type="button" class="cart-btn"><i class="fa fa-shopping-cart"></i></button>
                                                    </a>
                                                    <button type="button" data-toggle="tooltip" title="Remove" onclick="deleteWishlist('.$item['id'].')"> <i class="fa fa-times"></i> </button>
                                                </div>
                                            </td>
                                        </tr>
                                        ';
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="wishlist-button">
                            <button onclick="deleteAllWishlist(<?=$id_user?>)" style="
                                background-color: transparent;
                                border: 1px solid #eee;
                                color: #959595;
                                font-size: 12px;
                                font-weight: 500;
                                line-height: 34px;
                                padding: 0 15px;
                                text-transform: uppercase;
                                transition: all 0.3s ease 0s;
                                margin-left: auto;
                                float: right;
                            " onMouseOver="this.style.backgroundColor='#E03550'; this.style.color='#FFF';" onMouseOut="this.style.backgroundColor='#FFF'; this.style.color='grey';" >
                            Clear Wishlist</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist area end -->
<!-- footer area start -->
<?=include('layout/footer.php')?>
<div id="quickview-wrapper">
            <!-- Modal -->
<?php
foreach($productList as $item){
$sql = 'select * from product_image where id_product ='.$item['id_product']; 
    $imageList = executeResult($sql); 
    $image1 = $imageList[0]['image'];
    echo'
            <div id="'.$item['id'].'" class="modal fade"  tabindex="-1" role="dialog">
                <div id="productModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="modal-product">
                                    <div class="product-images">
                                        <div class="main-image images">
                                            <img alt="" src="'.$image1.'">
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h1>'.$item['name'].'</h1>
                                        <div class="price-box">
                                            <p class="price">
                                                <span class="special-price">
                                                    <span class="amount">$'.$item['price'].'</span>
                                                </span>
                                            </p>
                                        </div>
                                        <a href="single-product.php?id='.$item['id_product'].'" class="see-all">See all features</a>
                                        <div class="quick-add-to-cart">
                                            <form method="post" class="cart" action="cart.php?action=add">
                                                <div class="numbers-row" style="width:100px; height:50px">
                                                    <input type="number" hidden id="french-hens" value="1" name="quantity">
                                                    <input type="number" hidden value="'.$item['price'].'" name="price">
                                                    <input type="number" hidden value="'.$item['id_product'].'" name="id_product">
                                                    <input type="text" hidden value="'.$item['name'].'" name="name">
                                                    <select name="size" required style="height:44px">
                                                        <option value="">--Size--</option>
                                                        <option value="size36">Size 36</option>
                                                        <option value="size37">Size 37</option>
                                                        <option value="size38">Size 38</option>
                                                        <option value="size39">Size 39</option>
                                                        <option value="size40">Size 40</option>
                                                        <option value="size41">Size 41</option>
                                                        <option value="size42">Size 42</option>
                                                        <option value="size43">Size 43</option>
                                                    </select>
                                                </div>
                                                <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                            </form>
                                        </div>
                                        <div class="quick-desc">
                                            <p>'.$item['content'].'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
}
?>
        </div>      
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
		function deleteWishlist(id){
			var option = confirm('Do you want to delete this wishlist?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/delete-wishlist.php',{
				'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
	</script>

<script>
        function deleteAllWishlist(id){
			var option = confirm('Do you want to delete all wishlist?')	
			if (!option){
				return;
			}
            console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/delete-all-wishlist.php',{
                'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
    </script>

<!-- Mirrored from preview.hasthemes.com/james-preview/james/wishlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:37:31 GMT -->

</html>