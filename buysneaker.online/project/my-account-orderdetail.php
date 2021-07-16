<?php
session_start();
if (empty($_SESSION['user'])){
    header('Location:login.php');  
}
include('db/dbhelper.php');
$sql = 'select * from user where user = "'.$_SESSION['user'].'"';
$userResult = executeSingleResult($sql);
$token = $userResult['token'];
if($token != $_SESSION['token']){
    header('Location: logout.php');
}
?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:37:21 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>My account || James </title>
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
        <?=include('layout/header.php')?> 
<?php
//lay thong tin id_order
if(isset($_GET['id'])){
    $id_order = $_GET['id'];
}
//lay thong tin user
$name=$aemail=$created_at=$update_at=$old_pass=$new_pass1=$new_pass2="";
if(!empty($_SESSION['user'])){
    $user= $_SESSION['user'];
    $sql = 'select * from user where user = "'.$user.'"';
    $userResult=executeSingleResult($sql);
    if($userResult!=null){
        $id= $userResult['id'];
        $email = $userResult['email'];
        $name = $userResult['name'];
        $password = $userResult['pass'];
        $created_at = $userResult['created_at'];
        $updated_at = $userResult['updated_at'];
    }
}else{
    echo '<script type="text/javascript">';
            echo 'window.location="login.php";';
            echo '</script>'; 
}

//lay thong tin ordered cua user
$sql='select orderdetail.*, orders.total, orders.name as user, orders.phone, orders.address, 
orders.note, orders.payment,orders.created_at,orders.discount
from orderdetail left join orders on orderdetail.id_order = orders.id 
where orderdetail.id_user='.$id.' and id_order = '.$id_order.' ORDER BY id DESC';  
$order = executeResult($sql);

?>
        <!-- header area end -->
        <!-- my account area start -->
        <div class="account-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.php" title="go to homepage">Home<span>/</span></a>  </li>
                                <li><strong> My account</strong></li>
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
                        <div class="my-account-accordion">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <i class="fa fa-list-ol"></i>
                                                Order history and details
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="account-title">
                                                        <h4>Here are the order detail.</h4>
                                                    </div>
<?php
if(count($order) == 0){
    echo'                                                  
                                                    <div class="order-history">
                                                        <p>You have not placed any orders.</p>
                                                    </div>
        ';}
?>     
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
foreach($order as $item){
    $sql = 'select * from product_thumbnail where id_product ='.$item['id_product']; 
    $thumbnail = executeSingleResult($sql);   

        echo'
                                                                    
                                                                    <tr>
                                                                        <td><a href="single-product.php?id='.$item['id_product'].'" class="text-center"><img src="'.$thumbnail['thumbnail'].'" alt=""> </a></td>
                                                                        <td> <a href="single-product.php?id='.$item['id_product'].'">'.$item['name'].'</a></td>
                                                                        <td>'.$item['size'].'</td>
                                                                        <td>'.$item['quantity'].'</td>
                                                                        <td>$'.$item['price'].'</td>
                                                                        <td>$'.$item['quantity']*$item['price'].'</td>
                                                                    </tr>
         '; 
}
?>                                                                  
                                                                    <tr>
                                                                        <th colspan="5">Discount</th>
                                                                        <td>$<?=$order[0]['discount']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th colspan="5">Total</th>
                                                                        <td>$<?=$order[0]['total'] - $order[0]['discount']?></td>
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
                                                                        <td><?=$order[0]['user']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Phone</th>
                                                                        <td><?=$order[0]['phone']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Address</th>
                                                                        <td><?=$order[0]['address']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Note</th>
                                                                        <td><?=$order[0]['note']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Created at</th>
                                                                        <td><?=$order[0]['created_at']?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Payment</th>
<?php
    if($order[0]['payment']==0){
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


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account-button">
                                <div class="back-btn"> <a href="my-account.php">Back to your Account</a> </div>
                                <div class="home"> <a href="index.php"> home</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account area end -->
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

<!-- Mirrored from preview.hasthemes.com/james-preview/james/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:37:21 GMT -->
<script>
    var container = document.getElementById("container")
    container.style.display = "none"
    function clicked() {
        if (container.style.display == "none") {
            container.style.display  = "block"
        }
        else {
            container.style.display = "none"
        }
    }      
</script>
</html>
