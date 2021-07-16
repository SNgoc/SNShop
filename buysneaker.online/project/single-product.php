<?php
session_start();
include('db/dbhelper.php');
require_once('common/utility.php');
require_once('common/recaptchalib.php') ;
$id='';
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = 'select * from product where id ="'.$id.'"';
    $product=executeSingleResult($sql);
    $sql= 'select * from product_image where id_product ="'.$id.'"';
    $image= executeResult($sql);
    $sql= 'select * from product_thumbnail where id_product ="'.$id.'"';
    $thumbnail= executeResult($sql); 
}
//captcha
$siteKey = "6Ld2yk8bAAAAAMML1vISnQxXzDC4NGe5yJ8-N9aF";
$secret = "6Ld2yk8bAAAAACDFF5hSKEx8jUqfSJ1NxRukrJnd";
$lang = "en";
$resp = null;
$er='';
$reCaptcha = new ReCaptcha($secret);
//endcapcha

//review filter
$sql='select * from review_filter';
$reviewfilterList=executeResult($sql);

if(!empty($_POST)){
    if(isset($_SESSION['user'])){
        if ($_POST['g-recaptcha-response']) {
            $response = $reCaptcha->verifyResponse(
              $_SERVER['REMOTE_ADDR'],
              $_POST['g-recaptcha-response']
            );
            if ($response != null && $response->success) {
                $user= $_SESSION['user'];
                $star= $_POST['star']; 
                $review= $_POST['review'];
                date_default_timezone_set('Asia/Saigon');
                $created_at= date('Y-m-d');
                $count = 0;
                foreach($reviewfilterList as $keyword){
                    if(strpos($review, $keyword['keyword']) !== false){
                        $count = $count + 1;
                        break;
                    }
                }
                    if($count < 1){
                        $sql = 'insert into review(user,id_product,star,review,created_at) values
                        ("'.$user.'","'.$id.'","'.$star.'","'.$review.'","'.$created_at.'")';
                        execute($sql);  
                    }
                    else{
                        $message = "Your review contains one or more unsuitable words. Please try again!";
                        echo "<script type='text/javascript'>alert('$message'); window.location.reload();</script>";
                    }
            }
        }

        
    }else{
        echo '<script language="javascript">';
        echo 'alert("you have to sign in to post your review");';
        echo 'window.location="login.php";';
        echo '</script>';
    }    
}
//phan trang review
$limit = 4; // so san pham tren mot trang
$page = 1;
if(isset($_GET['page'])){
    $page = $_GET['page']; // trang can lay san pham
}
$firstIndex = ($page-1)*$limit;

//tinh review
$sql='select * from review where id_product='.$id.' ORDER BY id DESC limit '.$firstIndex.','.$limit;
$reviewList=executeResult($sql); 
$countRv = count($reviewList);
if ($countRv>0){
    $sumStar = 0;
    foreach($reviewList as $item){
        $sumStar += $item['star'];
    }
    $average = $sumStar/$countRv ;
}

//dem so trang
$sql='select count(id) as total from review where id_product='.$id;
$countResult = executeSingleResult($sql);
$number = 0;
if($countResult!=null){
    $count = $countResult['total'];
    $number = ceil($count/$limit); // chan tren
}
?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:04 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?=$product['name']?></title>
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
        #g-recaptcha-response {
    display: block !important;
    position: absolute;
    margin: -78px 0 0 0 !important;
    width: 302px !important;
    height: 76px !important;
    z-index: -999999;
    opacity: 0;
}
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
        <!-- single product area start -->
        <div class="Single-product-location home2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="product.php" title="go to homepage">Product<span>/</span></a></li>
                                <li><strong> <?=$product['name']?></strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single product area end -->
        <!-- single product details start -->
        <div class="single-product-details">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="single-product-img tab-content">
                            <div class="single-pro-main-image tab-pane active" id="pro-large-img-1">            
                                <a href="#"><img class="optima_zoom" src="<?=$image[0]['image']?>" 
                                data-zoom-image="<?=$image[0]['image']?>" alt="optima"/></a>
                            </div>
<?php
$indexImg=2;
for($i=1;$i<count($image);$i++){  
    echo'
                            <div class="single-pro-main-image tab-pane" id="pro-large-img-'.$indexImg.'">            
                                <a href="#"><img class="optima_zoom" src="../'.$image[$i]['image'].'" 
                                data-zoom-image="'.$image[$i]['image'].'" alt="optima"/></a>
                            </div>
        '; 
    $indexImg ++;                  
}
?>
                        </div>                        
                        <div class="product-page-slider">                            
<?php
$indexThumb=1;
foreach($thumbnail as $item){
    echo'
                            <div class="single-product-slider">
                                <a href="#pro-large-img-'.$indexThumb.'" data-toggle="tab">
                                    <img src="'.$item['thumbnail'].'" alt="">
                                </a>
                            </div>
        ';
        $indexThumb ++;
}
?>
                          
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <div class="single-product-details" style="height:750px;" >
                            <a href="#" class="product-name"><?=$product['name']?></a>
                            <div class="list-product-info">
                                <div class="price-rating">
                                    <div class="ratings">
<?php
if($countRv>0){
    for($i=0; $i<$average; $i++){
        echo'
      
                                        <i class="fa fa-star"></i>
            ';
    }
}
?>
                                        <a href="#tab2" class="review"><?=$countRv?> Review(s)</a>
                                        <a href="#tab2" class="add-review">Add Your Review</a>
                                    </div>
                                </div>
                            </div>
                            <div class="avalable">
                                <p>Availability:
<?php
if($product['size36']==0 && $product['size37']==0 && $product['size38']==0 && $product['size39']==0 && 
$product['size40']==0 && $product['size41']==0 && $product['size42']==0 && $product['size43']==0){
    echo'   
                                    <span> Out of stock</span>
        ';}else{
    echo'           
                                    <span> In stock</span>
        ';
}
?>
                                </p>
                            </div>
                            <div class="item-price">
                                <span>$<?=$product['price']?></span>
                            </div>
                            <div class="action">
                                <ul class="add-to-links">
                                    <li><?php
                                            echo '<a href="javascript:void(0)" onclick="wishlistMessage('.$product['id'].')">';
                                        ?>
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <form action="cart.php?action=add" method="post">
                                <div class="select-catagory">
                                    <div class="single-product-info">
                                        <p><?=$product['content']?> </p>
                                    </div>
                                    <div class="size-select">
                                        <label class="required">
                                            <em>*</em> Size
                                        </label>
                                        <div class="input-box"  >
                                            <select id="select-2" name="size" required>
                                                <option value="size36">Size 36 (<?=$product['size36']?>)</option>
                                                <option value="size37">Size 37 (<?=$product['size37']?>)</option>
                                                <option value="size38">Size 38 (<?=$product['size38']?>)</option>
                                                <option value="size39">Size 39 (<?=$product['size39']?>)</option>
                                                <option value="size40">Size 40 (<?=$product['size40']?>)</option>
                                                <option value="size41">Size 41 (<?=$product['size41']?>)</option>
                                                <option value="size42">Size 42 (<?=$product['size42']?>)</option>
                                                <option value="size43">Size 43 (<?=$product['size43']?>)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-item">
                                    <div class="price-box">
                                        <span>$<?=$product['price']?></span>
                                    </div>
                                    <div class="single-cart">
                                        <div class="cart-plus-minus">
                                            <label>Qty: </label>
                                            <input class="cart-plus-minus-box" type="number" name="quantity" value="1" min="1" required>
                                        </div>
                                        <input type="number" hidden value="<?=$id?>" name="id_product">
                                        <input type="text" hidden value="<?=$product['price']?>" name="price">
                                        <input type="text" hidden value="<?=$product['name']?>" name="name">
                                        <button class="cart-btn" type="submit">Add to cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single product details end -->
        <!-- single product tab start -->
        <div class="single-product-tab-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="single-product-tab">
                            <ul class="single-product-tab-navigation" role="tablist">
                                <li role="presentation" class="active"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">reviews</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content single-product-page">
                                <div role="tabpanel" class="tab-pane fade in active" id="tab2">
                                    <div class="single-p-tab-content">
                                        <div class="row">
                                            <div class="col-md-5">
<?php
foreach($reviewList as $item){
    echo'

                                                            <div class="product-review">
                                                                <p> <span>Review by</span> '.$item['user'].' </p>
                                                                <div class="product-rating-info">
                                                                    <p>Ratings</p>
                                                                    <div class="ratings">
                    ';
                for($i=0; $i< $item['star'];$i++){
                    echo'<i class="fa fa-star"></i>';
                }
                echo'

                                                                    </div>
                                                                </div>
                                                                <div><p>Review: '.$item['review'].' </p> </div>
                                                                <div class="review-date">
                                                                    <p> <em> (Posted on '.$item['created_at'].')</em></p>
                                                                </div>
                                                            </div>
                    ';
}
PaginarionRv($number, $page, '',$id);
?>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="rate-product hidden-xs">
                                                    <div class="rate-product-heading">
                                                        <h3>You're reviewing: <?=$product['name']?></h3>
                                                        <h3>How do you rate this product? <em>*</em></h3>
                                                    </div>
                                                    <form action="#" method="post">
                                                        <table class="product-review-table">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th>1 star</th>
                                                                    <th>2 star</th>
                                                                    <th>3 star</th>
                                                                    <th>4 star</th>
                                                                    <th>5 star</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Ratings</th>
                                                                    <td> <input type="radio" class="radio" name="star" value="1" required> </td>
                                                                    <td> <input type="radio" class="radio" name="star" value="2" required> </td>
                                                                    <td> <input type="radio" class="radio" name="star" value="3" required> </td>
                                                                    <td> <input type="radio" class="radio" name="star" value="4" required> </td>
                                                                    <td> <input type="radio" class="radio" name="star" value="5" required> </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <ul class="form-list">
                                                            <li>
                                                                <label> Review <em>*</em> </label>
                                                                <textarea cols="3" rows="5" name="review" required></textarea>
                                                            </li>
                                                        </ul>
                                                        <div class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>"></div>
                                                        <script type="text/javascript"
                                                            src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
                                                        </script>
                                                        <div style="color:red;"><?=$er?></div>
                                                        <br/>
                                                        <button type="submit"> submit review</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single product tab end -->
  
        <!-- related product area start-->
        <div class="related-product home2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-title">
                            <h2>similar product</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="related-slider">
<?php
$sql = 'select * from product where id_brand = '.$product['id_brand'].' ORDER BY id DESC limit 8';
$similar = executeResult($sql);
foreach($similar as $item){
    $sql= 'select * from product_image where id_product ="'.$item['id'].'"';
    $image= executeResult($sql); 
    echo'                   
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.php?id='.$item['id'].'">
                                        <img src="'.$image[0]['image'].'" alt="" class="primary-img">
                                        <img src="'.$image[1]['image'].'" alt="" class="secondary-img">
                                    </a>
                                </div>
                                <div class="product-price">
                                    <div class="product-name">
                                        <a href="single-product.php?id='.$item['id'].'" title="Fusce aliquam">'.$item['name'].'</a>
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
        </div>
        <!-- related product area end-->
        <!-- footer area start -->
        <?=include('layout/footer.php')?>
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

        window.onload = function() {
            var $recaptcha = document.querySelector('#g-recaptcha-response');

            if($recaptcha) {
                $recaptcha.setAttribute("required", "required");
            }
        };
    </script>

<!-- Mirrored from preview.hasthemes.com/james-preview/james/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:06 GMT -->
</html>
