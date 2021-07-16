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
//lay thong tin user
$name=$aemail=$created_at=$update_at=$old_pass=$new_pass1=$new_pass2=$phone=$address= "";
    if($userResult!=null){
        $id= $userResult['id'];
        $email = $userResult['email'];
        $name = $userResult['name'];
        $phone = $userResult['phone'];
        $address = $userResult['address'];
        $password = $userResult['pass'];
        $created_at = $userResult['created_at'];
        $updated_at = $userResult['updated_at'];
    }


//lay thong tin ordered cua user
$sql='select orders.*, order_process.process, order_process.color  
from orders left join order_process on order_process.id = orders.id_process
where orders.id_user='.$id.' ORDER BY id DESC';  
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
                                                        <h4>Here are the orders you've placed since your account was created.</h4>
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
                                                                        <th>No</th>
                                                                        <th>Time</th>
                                                                        <th>Total</th>
                                                                        <th>Process</th>
                                                                        <th>Detail</th>
                                                                        <th>Confirm</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
<?php
$index=1;
foreach($order as $item){
    $cancel = 'disabled';
    $finish = 'disabled';
    if($item['id_process'] == 1){
        $cancel = '';
    }
        echo'                                                                   
                                                                    <tr>
                                                                        <td>'.$index++.'</td>
                                                                        <td>'.$item['created_at'].'</td>
                                                                        <td class="unit-price">$'.($item['total'] - $item['discount']).'</td>
                                                                        <td><label>'.$item['process'].'</label></td>
                                                                        <th>
                                                                            <a href="my-account-orderdetail.php?id='.$item['id'].'">
                                                                                <button class="btn btn-info">Detail</button>
                                                                            </a>
                                                                        </th>
                                                                        <th>
                                                                            <button class="btn btn-danger" '.$cancel.' onclick="cancelOrder('.$item['id'].')">Cancel order</button>                                      
                                                                        </th>
                                                                    </tr>
         ';
}
?>                                                                  
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                <i class="fa fa-user"></i>
                                                My personal information
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                        <div class="panel-body">
                                            <div class="col-md-12">                                              
                                            <div class="col-md-4">
                                                <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" 
                                                src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario"> 
                                            </div>
                                            <div class="col-md-6">
                                                <strong>
                                                
                                    <?php
                                        // echo $admin_password;
                                        if(isset($_GET['success1'])){
                                            echo '<div style="color:green">Change infomation successful</div>';
                                            }
                                        if(isset($_GET['success2'])){
                                        echo '<div style="color:green">Change infomation and password successful</div>';
                                        }
                                        if(isset($_GET['error1'])){
                                            echo'<div style="color:red;">new passwords does not match</div>';
                                        }
                                        if(isset($_GET['error2'])){
                                            echo'<div style="color:red;">Wrong password</div>';
                                        }
                                    ?>
                            
<?php
    if(!empty($_POST)){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $name = str_replace('"', '\\"', $name);
        }
        if(isset($_POST['phone'])){
            $phone = $_POST['phone'];
            $phone = str_replace('"', '\\"', $phone);
        }
        if(isset($_POST['address'])){
            $address = $_POST['address'];
            $address = str_replace('"', '\\"', $address);
        }  
        if(isset($_POST['old_pass'])){
            $old_pass = $_POST['old_pass'];
        }
        if(isset($_POST['new_pass1'])){
            $new_pass1 = $_POST['new_pass1'];
        }
        if(isset($_POST['new_pass2'])){
            $new_pass2 = $_POST['new_pass2'];
        }
        $updated_at= date('Y=m-d H:s:i');

        //check xem co thay doi mat khau hay khong
        if(!$old_pass){ //truong hop nguoi dung khong nhap vao khung mat khau
            //luu vao db            
            $sql ='update user set phone = "'.$phone.'",address = "'.$address.'",name="'.$name.'",
            updated_at="'.$updated_at.'" where id ='.$id; 
            execute($sql);  
            echo '<script type="text/javascript">';
            echo 'window.location="my-account.php?success1=s";';
            echo '</script>';           
        }
        else{   //truong hop nugoi dung co nhap mat khau
            if($old_pass == $password){
                if($new_pass1 == $new_pass2){
                    $password = $new_pass1;
                    $sql ='update user set name = "'.$name.'",email="'.$email.'",
                    pass="'.$password.'", updated_at="'.$updated_at.'" where id ='.$id;
                    execute($sql);  
                    echo '<script type="text/javascript">';
                    echo 'window.location="my-account.php?success2=s";';
                    echo '</script>';                     
                }else{
                    echo '<script type="text/javascript">';
                    echo 'window.location="my-account.php?error1=e";';
                    echo '</script>'; 
                }
            }else{
                echo '<script type="text/javascript">';
                echo 'window.location="my-account.php?error2=e";';
                echo '</script>';
            }    
        }
        
    }
?>
                            
                                                </strong>
                                                <div class="table-responsive">

                                                <form action="" method="post">
                                                    <table class="table table-user-information">
                                                        <tbody>
                                                            <tr>        
                                                                <td><strong> User</strong></td>
                                                                <td class="text-primary">
                                                                    <input type="text" name="id" value="<?=$id?>" hidden> 
                                                                    <input type="text" value="<?=$_SESSION['user']?>" disabled> 
                                                                </td>
                                                            </tr>
                                                            <tr>    
                                                                <td>
                                                                <strong> Full Name </strong>
                                                                </td>
                                                                <td class="text-primary">
                                                                    <input type="text" name="name" value="<?=$name?>">     
                                                                </td>
                                                            </tr>
                                                            <tr>    
                                                                <td>
                                                                <strong> Phone Number </strong>
                                                                </td>
                                                                <td class="text-primary">
                                                                    <input type="text" name="phone" value="<?=$phone?>">     
                                                                </td>
                                                            </tr>
                                                            <tr>    
                                                                <td>
                                                                <strong> Address</strong>
                                                                </td>
                                                                <td class="text-primary">
                                                                    <input type="text" name="address" value="<?=$address?>">     
                                                                </td>
                                                            </tr>
                                                            <tr>        
                                                                <td>
                                                                    <strong> Email </strong>
                                                                </td>
                                                                <td class="text-primary">
                                                                    <input type="email" name="email" value="<?=$email?>" disabled>   
                                                                </td>
                                                            </tr>
                                                            <tr>        
                                                                <td><strong> Created At </strong></td>
                                                                <td> <input type="text" value="<?=$created_at?>" disabled></td>
                                                            </tr>
                                                            <tr>        
                                                                <td><strong> Updated At </strong></td>
                                                                <td>
                                                                    <input type="text" value="<?=$updated_at?>" disabled>
                                                                </td>
                                                            </tr> 
                                                            <tr>        
                                                                <td>
                                                                    <strong>
                                                                        <a href="#" onclick="clicked()">
                                                                            <span class="glyphicon glyphicon-calendar text-primary" >
                                                                            Change password</span>
                                                                        </a>                                                                                   
                                                                    </strong> </br>
                                                                </td>
                                                                
                            <td>
                                <div id="container">
                                    <input type="password" name ="old_pass" placeholder="Password"> <br/> 
                                    <input type="password" name ="new_pass1" placeholder="New password" 
                                        style="margin-top:15px"><br/>
                                    <input type="password" name ="new_pass2" placeholder="New password" 
                                        style="margin-top:15px">
                                </div>
                            </td>      
                        </tr>
                        <tr>
                        <td><button class="btn btn-primary">Save</button></td>
                        </tr>                                                                                      
                    </tbody>
                </table>
            </form>
            </div>
         
        </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account-button">
                                <div class="back-btn"> <a href="product.php">Continue Shopping</a> </div>
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
<script>
		function cancelOrder(id){
			var option = confirm('Do you want to cancel this order?' )	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/my-account.php',{
				'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
</script>
</html>
