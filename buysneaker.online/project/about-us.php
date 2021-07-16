<?php
session_start();
include('db/dbhelper.php');
?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:38:52 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>About us || James </title>
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
        <div class="about-us">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.php" title="go to homepage">Home<span>/</span></a>  </li>
                                <li><strong> About us</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="about-page">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="about-page-profile" style="padding-top: 250px;">
                                <div class="company-word" style="color: black; line-height: 17px; letter-spacing: 1.2px; font-size: 13px;">COMPANY</div>
                                <h1 class="profile-word" style="color: black; font-size: 36px; line-height: 32px; letter-spacing: .4px;">PROFILE</h1>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <div class="about-img">
                                <img src="image/shop/about-us.jpg" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-content" style="margin: auto; width: 80%;">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                                $query = 'SELECT * FROM aboutus_content';
                                $rows = mysqli_query($link, $query);
                                if (mysqli_num_rows($rows)) {
                                    while ($row = mysqli_fetch_array($rows)) {
                                        ?>
                                            <div class="about-content-title" style="margin-top: 60px;">
                                                <h3 style="font-size: 28px; color: black;"><?php echo $row[1] ?></h3>
                                            </div>
                                            <div class="about-content-content" style="font-size: 18px; color: black;">
                                                <p><?php echo $row[2]?></p>
                                            </div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="team-title">
                                <h3>meet the team</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            $query = 'SELECT * FROM aboutus_member';
                            $rows = mysqli_query($link, $query);
                            if (mysqli_num_rows($rows)) {
                            while ($row = mysqli_fetch_array($rows)) {
                                ?>
                                    <div class="col-md-3 col-sm-4">
                                        <div class="single-member">
                                            <div class="member-info">
                                                <img src="image/shop/<?php echo $row[1]?>">
                                                    <div class="member-social-profile">
                                                        <a href="<?php echo $row[4] ?>"> <i class="fa fa-facebook"></i> </a>
                                                        <a href="<?php echo $row[5] ?>"> <i class="fa fa-twitter"></i> </a>
                                                    </div>
                                            </div>
                                                <h3><?php echo $row[2] ?></h3>
                                                <p><?php echo $row[3] ?></p>
                                        </div>
                                    </div>
                                <?php
                                }
                            }
                        ?>
                    </div>    
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

<!-- Mirrored from preview.hasthemes.com/james-preview/james/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:02 GMT -->
</html>
