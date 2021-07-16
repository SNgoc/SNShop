<?php
session_start();
include('db/dbhelper.php');
if (!empty($_SESSION['user'])){
    header('location: index.php');
}
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset")){
    $key = $_GET["key"];
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';";
    $result = executeSingleResult($sql);
    if (count($result) == 0){
    $error = '<h2>Invalid Link</h2>
    <p>The link is invalid/expired. Either you did not copy the correct link
    from the email, or you have already used the key in which case it is 
    deactivated.</p>'; 
    die($error);
    }else{
        $expDate = $result['expDate'];
        if ($expDate < $curDate){
            $error .= "<h2>Link Expired</h2>
            <p>The link is expired. You are trying to use the expired link which 
            as valid only 24 hours (1 days after request).<br /><br /></p>";
            die($error);    
        }
    }   // isset email key validate end			

    
} 
if(isset($_POST) && !empty($_POST)){
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    $curDate = date("Y-m-d H:i:s");
    if ($pass1!=$pass2){
        header('Location: reset-password.php?key='.$key.'&email='.$email.'&action=reset&error=1');
    }
    else{
    // $pass1 = md5($pass1);
    $sql = "UPDATE `user` SET `pass`='".$pass1."'WHERE `email`='".$email."';";
    execute($sql);
    $sql = "DELETE FROM `password_reset_temp` WHERE `email`='".$email."';"; 
    execute($sql);
    echo '<script type="text/javascript">';
    echo 'alert("Congratulations! Your password has been updated successfully!");';
    echo 'window.location="login.php";';
    echo '</script>';
    }		
}
// else{die('<p>The link is invalid/expired. Either you did not copy the correct link
//     from the email, or you have already used the key in which case it is 
//     deactivated.</p>');}


 
?>
  <!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:06 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Reset Password </title>
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
        <link rel="stylesheet" href="css/login.css">
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
        <!-- header area end -->
        <!-- cart item area start -->
        <div class="shopping-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.php" title="go to homepage">Home<span>/</span></a>  </li>
                                <li><strong>Forgot Password</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>         
        
        <div class="container">
            <div class="row">
            <div class="col-sm-1 col-md-2 col-lg-3"></div>
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
                <div class="card card-signin my-5">
                <div class="card-body">

                    <h5 class="card-title text-center">Enter Your New Password</h5>
                    <form class="form-signin" method="post">
<?php
if(isset($_GET['error'])){
    echo'
                        <div class="error">Password do not match, both password should be same!</div>
        ';
}
?>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="pass1" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">New Password</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword2" name="pass2" class="form-control" placeholder="Password" required>
                            <label for="inputPassword2">Confirm New Password</label>
                        </div>              

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Reset Password</button>                                       
                    </form>                
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- footer area start -->
        <?=include('layout/footer.php')?>
        <!-- footer area end -->
        <!-- jquery
        ============================================ -->
        <script src="js/vendor/jquery-1.12.1.min.js"></script>
        <!-- bootstrap JS
        ============================================ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- nivoslider JS
        ============================================ -->
        <script src="lib/js/jquery.nivo.slider.js"></script>
        <script src="lib/home.js"></script>
        <!-- meanmenu JS
        ============================================ -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- scrollUp JS
        ============================================ -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- main JS
        ============================================ -->
        <script src="js/main.js"></script>
    </body>

<!-- Mirrored from preview.hasthemes.com/james-preview/james/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:06 GMT -->
</html>