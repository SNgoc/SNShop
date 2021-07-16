<?php
session_start();
include('db/dbhelper.php');
if(empty($_SESSION['user'])){
    header('Location:login.php');
}
?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:37:33 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Checkout</title>
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
//check xem cart cos product k?
if(count($productList) < 1){  
    echo '<script type="text/javascript">';
    echo 'alert("Your cart is empty! Please select some items to add to cart");';
    echo 'window.location="product.php";';
    echo '</script>';
}
//check discount
$discount=0;

if(isset($_GET['t']) && !empty($_GET['t'])){
    $token = $_GET['t'];
    $sql = 'select * from discount where token = "'.$token.'"';
    $resultDiscount = executeSingleResult($sql);
    $discount = $resultDiscount['discount'];
    $discountAmount = $resultDiscount['amount'];
    $discountUsed = $resultDiscount['used'];
    $discountStatus = $resultDiscount['status'];
    $discountID = $resultDiscount['id'];
}
$sql = 'select * from user where user = "'.$_SESSION['user'].'"';
$result = executeSingleResult($sql);
$phone = $result['phone'];
$name = $result['name'];
$address = $result['address'];
$id_user = $result['id'];
$payment = false;
if(!empty($_POST)){
    //nhan form
    if(!empty($_POST) && $allTotal>0){
        //check xem san pham con khong
        foreach($productList as $item){                   
                $sql = 'select '.$item['size'].' as count from product where id = "'.$item['id_product'].'"'; 
                $countSize=executeSingleResult($sql);           
                $countSize['count'] = $countSize['count'] - $item['quantity']; 
                if($countSize['count'] < 0){ 
                echo '<script type="text/javascript">';
                echo 'alert("The product '.$item['name'].' with '.$item['size'].' is not enough quantity!");';
                echo 'window.location="cart.php?'.$item['id_product'].'='.$item['quantity'].'&size'.$item['id_product'].'='.$item['size'].'";';
                echo '</script>';
                die();
                }
        }
        if(isset($_POST['payment'])){
            $payment=$_POST['payment'];
        }
        date_default_timezone_set('Asia/Saigon');
        $created_at= date('Y-m-d');
        $code = substr(md5(uniqid(rand(),1)),3,10); 
        //them vao bang order       
        $sql='insert into orders(name,phone,address,note,total,created_at,id_user,payment,id_process,code,discount) 
        values("'.$_POST['name'].'","'.$_POST['phone'].'","'.$_POST['address'].'","'.$_POST['note'].'",
        "'.$allTotal.'","'.$created_at.'","'.$id_user.'","'.$payment.'",1,"'.$code.'","'.$discount.'")';      
        execute($sql);
        $sql='SELECT * FROM orders WHERE id = (SELECT max(id) FROM orders)';//lấy ra dòng vừa mới nhập 
        $order=executeSingleResult($sql); 
        $id_order=$order['id']; //lấy ra id dòng vừa mới nhập của bẳng product để add bảng orderdetail    
        foreach($productList as $item){
            $sql='INSERT INTO orderdetail(id_product,quantity,price,size,name,id_user,id_order) values 
            ("'.$item['id_product'].'","'.$item['quantity'].'","'.$item['price'].'","'.$item['size'].'",
            "'.$item['name'].'","'.$id_user.'","'.$id_order.'")';    
            execute($sql);      
            //update lại quantity trong bang product
            $sql ='update product set '.$item['size'].' = '.$countSize['count'].' where id ='.$item['id_product']; 
            execute($sql);       
        } 
        //xóa cart
        $sql = 'delete from cart where id_user ='.$id_user;   
        execute($sql);  
        //update so luong discount code
        if($discount != 0){
            $discountUsed ++;
            if($discountAmount == $discountUsed){
             $discountStatus = 'used up';
            }
        $sql = 'update discount set used = '.$discountUsed.', status = "'.$discountStatus.'"
        where id = '.$discountID;
        execute($sql);  
        }           
       //gui email xac nhan don hang cho khach hang va admin
       echo '<script type="text/javascript">';
       echo 'window.location="mail/orderConfirm.php?receiver='.$result['email'].'&code='.$code.'"';
       echo '</script>';  
    }
}
?>
        <!-- header area end -->

        <!-- checkout area start -->
        <div class="checkout-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.html" title="go to homepage">Home<span>/</span></a>  </li>
                                <li><strong> checkout</strong></li>
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
                        <div class="checkout-banner hidden-xs">
                            <a href="#">
                                <img src="img/checkout/checkout_banner.jpg" alt="">
                            </a>
                        </div>
                        <div class="checkout-heading">
                            <h2>Checkout</h2>
                        </div>
                        <div class="checkout-accordion">
                            <form action="" method="post" id="theForm">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" aria-expanded="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Step 1: Delivery Details
                                                <i class="fa fa-caret-down"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="delivery-details">                                                        
                                                        <div class="list-style">
                                                            <div class="form-name">
                                                                <label>Full Name <em>*</em> </label>
                                                                <input type="text" placeholder="Full Name" name ="name" value="<?=$name?>" required>
                                                            </div>
                                                            <div class="form-name">
                                                                <label>Phone<em>*</em> </label>
                                                                <input type="text" placeholder="Phone" name="phone" value="<?=$phone?>" required>
                                                            </div>
                                                            <div class="form-name">
                                                                <label>Address <em>*</em> </label>
                                                                <input type="text" placeholder="Address" name ="address" value="<?=$address?>" >
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingSix">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                Step 2: Confirm Order
                                                <i class="fa fa-caret-down"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                        <div class="panel-body">
                                            <div class="confirm-order">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Product Name</th>
                                                                <th>Size</th>
                                                                <th>Quantity</th>
                                                                <th>Unit Price</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php
foreach($productList as $item){
    echo'       
                                                            <tr>
                                                                <td>
                                                                    <a href="#">'.$item['name'].'</a>
                                                                </td>
                                                                <td>'.$item['size'].'</td>
                                                                <td>'.$item['quantity'].'</td>
                                                                <td>$'.$item['price'].'</td>
                                                                <td>$'.$item['quantity']*$item['price'].'</td>
                                                            </tr>
        ';
}
?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td class="text-right" colspan="4">
                                                                    <strong>Sub-Total:</strong>
                                                                </td>
                                                                <td>$<?=$allTotal?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right" colspan="4">
                                                                    <strong>Discount:</strong>
                                                                </td>
                                                                <td>$<?=$discount?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right" colspan="4">
                                                                    <strong>Grand Total:</strong>
                                                                </td>
                                                                <td>$<?=$allTotal - $discount?></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFive">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                Step 3: Payment Method
                                                <i class="fa fa-caret-down"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                        <div class="panel-body">
                                            <p> <strong> Add Comments About Your Order</strong></p>
                                            <p> <textarea name="note" rows="8" cols="52"></textarea> </p>
                                            <div id="payment"></div>
                                            <div class="patment-method">
                                                <p>Please select the preferred payment method to use on this order.</p>
                                                <div class="radio"> <!-- 0 là thanh toán sau, 1 là thanh toán online-->

        <script
            src="https://www.paypal.com/sdk/js?client-id=ATm7GR6Tr2ulSZ7sqXcSnRPY0f3So7T6fsvOgHWUaLCI_kzwS_UQobBBXRnWj59jXeUvIJUMfmsFXcoe"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
        </script>
        <div id="paypal-button-container" type="submit"></div>           
        <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: "<?php echo ($allTotal - $discount); ?>"
                }
                }]
            });
            },
            onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                alert('Transaction completed by ' + details.payer.name.given_name);
                document.getElementById('payment').innerHTML = '<input name="payment" value="true" hidden>'
                document.getElementById('theForm').submit();
            });
            }
        }).render('#paypal-button-container');
        //This function displays Smart Payment Buttons on your web page.
        </script>
                                                </div>
                                                
                                                <button type="submit" class="check-button">Or payment on delivery</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- checkout area end -->
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
<!-- Mirrored from preview.hasthemes.com/james-preview/james/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:37:33 GMT -->
</html>
