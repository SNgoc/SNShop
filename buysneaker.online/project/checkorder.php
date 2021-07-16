<?php
include('db/dbhelper.php');
require_once('common/recaptchalib.php') ;
//captcha
$siteKey = "6Ld2yk8bAAAAAMML1vISnQxXzDC4NGe5yJ8-N9aF";
$secret = "6Ld2yk8bAAAAACDFF5hSKEx8jUqfSJ1NxRukrJnd";
$lang = "en";
$resp = null;
$er='';
$reCaptcha = new ReCaptcha($secret);
//endcapcha
?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:38:52 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Check Order || James </title>
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
        <?php
        include_once('layout/header.php');
        ?>
        <!-- header area end -->
        <!-- cart item area start -->
        <div class="about-us">
            <div class="container">
                <div class="row">
                <div class="col-sm-1 col-md-2 col-lg-3"></div>
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Enter Order Code</h5>
                            <form class="form-signin" method="post">
        <?php
    if(isset($_GET['error'])){
        echo'
                            <div style="color:red; text-align:center;">Invalid Code!</div>
            ';
    }
    ?>
                            <div class="form-label-group">
                                <input type="text" name="code" class="form-control" required autofocus/>
                            </div>                
                            <div class="g-recaptcha" data-sitekey="<?php echo $siteKey;?>"></div>
                                <script type="text/javascript"
                                    src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang;?>">
                                </script>
                            <div style="color:red;"><?=$er?></div>
                            <br/>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Check Order</button>
                                                
                            </form>                
                        </div>
                    </div>
                </div>
                </div>
                <div class="row" style="margin-top:60px">
<?php
if(isset($_POST) && !empty($_POST) && $_POST['g-recaptcha-response']){
    $response = $reCaptcha->verifyResponse( 
        $_SERVER['REMOTE_ADDR'],
        $_POST['g-recaptcha-response']
      ); 

        $code = $_POST['code'];
        $sql= 'select * from orders where code = "'.$code.'"';
        $order= executeSingleResult($sql); 
        if(empty($order)){
            echo '<script type="text/javascript">';
            echo 'window.location="checkorder.php?error=1";';
            echo '</script>'; 
        }else{
            $sql = 'select * from orderdetail where id_order ='.$order['id'];
            $orderdetail = executeResult($sql);
?>       
                
                                                <div class="col-sm-12">
                                                    <div class="account-title">
                                                        <h4>Here are the order detail.</h4>
                                                    </div>    
                                                    <div class="wishlist-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover">
                                                                <thead>                                                            
                                                                    <tr>
                                                                        <th>Image Product</th>
                                                                        <th>Name Product</th>
                                                                        <th>Size</th>
                                                                        <th>Quantity</th>
                                                                        <th>Unit Price</th>
                                                                        <th>Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
<?php       
foreach($orderdetail as $item){
    $sql = 'select * from product_thumbnail where id_product ='.$item['id_product']; 
    $thumbnail = executeSingleResult($sql);   
?>                                                                   
                                                                    <tr>
                                                                        <td><a href="single-product.php?id=<?=$item['id_product']?>" class="text-center"><img src="<?=$thumbnail['thumbnail']?>" alt=""> </a></td>
                                                                        <td> <a href="single-product.php?id=<?=$item['id_product']?>"><?=$item['name']?></a></td>
                                                                        <td><?=$item['size']?></td>
                                                                        <td><?=$item['quantity']?></td>
                                                                        <td>$<?=$item['price']?></td>
                                                                        <td>$<?=$item['quantity']*$item['price']?></td>
                                                                    </tr>
<?php
}//end foreach
?>                                                                  
                                                                    <tr>
                                                                        <th colspan="5">Discount</th>
                                                                        <td>$<?=$order['discount']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="5">Total</th>
                                                                        <td>$<?=$order['total'] - $order['discount']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="5">Order status</th>
<?php
if($order['id_process'] ==1){
    $status = 'Waiting for confirmation'; 
}elseif($order['id_process'] ==2){
    $status = 'Order has been confirmed'; 
}
elseif($order['id_process'] ==3){
    $status = 'Orders are being delivered';    
}elseif($order['id_process'] ==4){
    $status = 'The order has been completed';   
}elseif($order['id_process'] ==5){
    $status = 'Order has been cancelled';  
}else{
    $status = 'Unknown'; 
}
 ?>                                                                       
                                                                        <td><?=$status?></td>
                                                                    </tr>   
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="account-title">
                                                        <h4>Here are the receiver's information.</h4>
                                                    </div>   
                                                    <div class="wishlist-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover">
                                                                <thead>                                                            
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <td><?=$order['name']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Phone</th>
                                                                        <td><?=$order['phone']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Address</th>
                                                                        <td><?=$order['address']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Note</th>
                                                                        <td><?=$order['note']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Created at</th>
                                                                        <td><?=$order['created_at']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Payment</th>
<?php
    if($order['payment']==0){
        $payment = 'by delivery';
    }else{
        $payment = 'online';
    }
?>    
                                                                        <td><?=$payment?></td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>                                                                                                                               
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
<?php

}//end else  

}//end if post
?>

                </div>
            </div>
        </div>
        <!-- cart item area end -->
        <!-- footer top area start -->
        <?=include_once('layout/footer.php');?> 
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
        window.onload = function() {
            var $recaptcha = document.querySelector('#g-recaptcha-response');

            if($recaptcha) {
                $recaptcha.setAttribute("required", "required");
            }
        };
    </script>

<!-- Mirrored from preview.hasthemes.com/james-preview/james/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:02 GMT -->
</html>
