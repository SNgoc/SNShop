<?php
session_start();
?>
<?php
include('db/dbhelper.php');
require_once('common/utility.php');
?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:38:50 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Product</title>
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
        <style>
        .product-name{
            display: block;
            width: 250px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;}      
        </style>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!-- header area start -->
        <?=include('layout/header.php')?>  
        <!-- header area end -->
        <!-- product items banner start -->
        <div class="product-banner">
            <img src="img/product/banner.jpg" alt="">
        </div>
        <!-- product items banner end -->
        <!-- product main items area start -->
        <div class="product-main-items">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.php" title="go to homepage">Home<span>/</span></a>  </li>
                                <li><strong>Product</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <!--menu left-->
                        <?php include('layout/menu-left-product.php')?>
                        <!--menu left-->
                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="product-content">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active fade in home2" id="gird">
<?php
//phan trang
$limit = 9; // so san pham tren mot trang
$page = 1;
if(isset($_GET['page'])){
    $page = $_GET['page']; // trang can lay san pham
}
$firstIndex = ($page-1)*$limit; 

//tim kiem
$spec=$brand=$sprice='';
if(isset($_GET['spec'])){
    $spec = $_GET['spec'];  //lay tu khoa tim kiem bang phuong thuc get name
}
if(isset($_GET['brand'])){
    $brand = $_GET['brand'];  //lay tu khoa tim kiem bang phuong thuc get brand
}
if(isset($_GET['price']) && $_GET['price'] != ''){
    $sprice = $_GET['price'];  //lay tu khoa tim kiem bang phuong thuc get price
    $minPrice = intval(substr( $sprice,  0, 3));
    $maxPrice = intval(substr( $sprice,  7, 3)); 
}
$additional = '';
if(!empty($spec)){
    $additional=' and product.id_special = "'.$spec.'"';
}

if(!empty($brand)){
    $additional=' and brands.name like "%'.$brand.'%"';
}
if(!empty($sprice)){
    $additional .=' and product.price >= "'.$minPrice.'" and product.price <= "'.$maxPrice.'" ';
}
//lay danh sach cac danh muc tu db						
$sql = 'select product.id, product.name, product.price,
product.updated_at, product.content, brands.name brand_name, brands.isActive,
product.size36,product.size37,product.size38,product.size39,
product.size40,product.size41,product.size42,product.size43
from product left join brands on product.id_brand = brands.id 
where 1 '.$additional.' and isActive = 1 ORDER BY id DESC limit '.$firstIndex.','.$limit;
$productList = executeResult($sql);
//dem so trang
$sql = 'select count(product.id) as total
from product left join brands on product.id_brand = brands.id 
where 1 '.$additional.' and isActive = 1';
$countResult = executeSingleResult($sql);
$number = 0;
if($countResult!=null){
    $count = $countResult['total'];
    $number = ceil($count/$limit); // chan tren 
}
foreach($productList as $item){
    $sql = 'select * from product_image where id_product ='.$item['id']; 
            $imageList = executeResult($sql); 
            $image1 = $imageList[0]['image'];
            $image2 = $imageList[1]['image'];
echo'
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="single-product">
                                                <div class="level-pro-new">
                                                    <span>'.$item['brand_name'].'</span>
                                                </div>
                                                <div class="product-img">
                                                    <a href="single-product.php?id='.$item['id'].'">
                                                        <img src="'.$image1.'" alt="" class="primary-img">
                                                        <img src="'.$image2.'" alt="" class="secondary-img">
                                                    </a>
                                                </div>                                               
                                                <div class="actions">
                                                    <a class="modal-view" data-target="#'.$item['id'].'" data-toggle="modal" href="#">
                                                        <button type="submit" class="cart-btn" title="Add to cart">add to cart</button>
                                                        </a>
                                                    <ul class="add-to-link">
                                                        <li><a href="javascript:void(0)" onclick="wishlistMessage('.$item['id'].')"><i class="fa fa-heart-o"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="product-price">
                                                    <div class="product-name">
                                                        <a href="single-product.php?id='.$item['id'].'" title="'.$item['name'].'"> '.$item['name'].'</a>
                                                    </div>
                                                    <div class="price-rating">
                                                        <span>$'.$item['price'].'</span>                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    ';
}
?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
<!-- Bai toan phan trang-->
<?=Paginarion($number, $page, '&spec='.$spec.'&brand='.$brand.'&price='.$sprice)?>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product main items area end -->

        <!-- footer area start -->
        <?=include('layout/footer.php')?>
        <!-- footer area end -->
        <!-- quickview product start -->
        <div id="quickview-wrapper">
            <!-- Modal -->
<?php
foreach($productList as $item){
$sql = 'select * from product_image where id_product ='.$item['id']; 
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
                                        <a href="single-product.php?id='.$item['id'].'" class="see-all">See all features</a>
                                        <div class="quick-add-to-cart">
                                            <form method="post" class="cart" action="cart.php?action=add">
                                                <div class="numbers-row" style="width:100px; height:50px">
                                                    <input type="number" hidden id="french-hens" value="1" name="quantity">
                                                    <input type="number" hidden value="'.$item['price'].'" name="price">
                                                    <input type="number" hidden value="'.$item['id'].'" name="id_product">
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
    function wishlistMessage(id) {
    var user = "<?php if(isset($_SESSION['user'])){
            echo $_SESSION['user'];
        }else{
            echo "";
        }
        ?>";
    var option = confirm('Do you want to add this wishlist?');
        if (option == true) {
            if (user == ""){
                window.alert("Please login first !");
                location.href = "login.php";
            }else{
                console.log(id);
                location.href = "ajax/wishlist-add.php?id=" + id;
                return;
            }
        } else {
        }
	}
</script>

<!-- Mirrored from preview.hasthemes.com/james-preview/james/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:38:52 GMT -->
</html>
