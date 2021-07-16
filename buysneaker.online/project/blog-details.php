<?php
require_once('db/dbhelper.php');
require_once('common/utility.php');
?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:02 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Blog Details || James </title>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
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
        <?php include_once('layout/header.php'); ?>
        <!-- header area end -->
        <!-- blog details area start -->
        <div class="blog-details-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.php" title="go to homepage">Home<span>/</span></a>  </li>
                                <li><a href="blog.php"><strong> Back News Page</strong></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sidebar-title">
                                    <h2> News Details</h2>
                                </div>
                                <div class="blog-area">

                                    <!-- ADD NEWS FROM DATABASE POSTS -->
                                    <?php
                                    $id = $_GET['id'];
                                    $title = $content = $admin = $time = $topic_name = "";

                                    $query = "SELECT p.*, t.topic_name FROM posts AS p JOIN topics as t ON p.topic_id = t.id
                                    WHERE p.id = $id";
                                    $result = mysqli_query($link, $query);

                                    if ($result) {
                                        if (mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_array($result);
                                            $title = $row['title'];
                                            $content = $row['content'];
                                            $admin = $row['admin_user'];
                                            $time = $row['created_at'];
                                            $topic_name = $row['topic_name'];
                                    ?>
                                    <input type="hidden" name = "id" value = "<?php echo $id; ?>">
                                    <div class="blog-post-details">
                                        
                                        <div class="blog-content" style="text-align: justify;">
                                            <h2 class="blog-title" style="text-align: center;"><?php echo $title ?></h2>
                                            <span style="font-size: 90%; text-align: right;"> <?php echo $topic_name; ?> - Added by <?php echo $admin; ?> - <?php echo date('F j, Y', strtotime($time)); //retrieve date time from db and transform ?></span>
                                            <div class="blog-img">
                                                <div>
                                                    <?php
                                                    if ($row['image'] && $row['image'] != '') {
                                                    ?>
                                                    <img src="image/blog/<?php echo $row['image']; ?>" alt="image-blog">
                                                    <?php }//end if image ?>
                                                </div>
                                            </div>
                                            <p><?php echo html_entity_decode($content) //decoding htmlentities from db to normal text ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- RELATED NEWS -->
                            <div class="col-md-12" style="margin-block-start: 15px; margin-block-end: 15px;">
                                <div class="blog-post">
                                    <h4 style="color: teal;">Related News</h4>

                                <!-- RELATED NEWS -->
                                <!-- ADD DATA POST FROM DATABASE POST -->
                                <?php
                                    $query = "SELECT p.*, t.topic_name FROM posts AS p JOIN topics as t ON p.topic_id = t.id
                                    WHERE p.published = 1 AND not p.id = $id AND t.topic_name = '$topic_name' ORDER BY created_at DESC";
                                    $result = executeResult($query);
                                    //die($query);
                                    $index = 1;
                                    foreach ($result as $display) {
                                    ?>
                                    <div class="single-blog-post" style="width: 32%; padding: 7px 7px -7px 7px;">
                                        <div class="blog-img">
                                            <a href="blog-details.php?id=<?php echo $display['id'] ?>">
                                                <img src="image/blog/<?php echo $display['image'] ?>" alt="image-blog" style="width: 100px; height: 100px;">
                                            </a>
                                        </div>
                                        <div class="blog-content" style="height: 150px; max-width: 250px; font-size: 13px;">
                                            <a href="blog-details.php?id=<?php echo $display['id'] ?>" class="blog-title"><?php echo $display['title'] ?></a>
                                            <span style="font-size: 10px;"><?php echo $display['topic_name']; ?> - Added by <?php echo $display['admin_user'] ?> - <?php echo date('F j, Y', strtotime($display['created_at'])); //retrieve date time from db and transform ?></span>
                                        </div>
                                    </div>
                                    <?php
                                    $index++;
                                        if ($index > 3) {
                                            break;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- END RELATED NEWS -->

                            <!-- Share post -->
                            <?php $url = 'https://buysneaker.online/blog-details.php?id='.$id ?>
                            <div style="text-align: right;">
                                <!-- Share with Facebook -->
                                <a style="color: white; background-color: #3b5998;" 
                                    href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" 
                                    target="_blank" class="btn btn-social btn-facebook link-in-popup">
                                    <i class="fa fa-facebook"></i> Share
                                </a>
                                <!-- Share with Twitter -->
                                <a style="color: white; background-color: #55acee;" 
                                    href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>" 
                                    target="_blank" class="btn btn-social btn-twitter link-in-popup">
                                    <i class="fa fa-twitter"></i> Tweet
                                </a>
                                <!-- Reddit Share Button -->
                                <a style="color: white; background-color: #dd4b39;" 
                                    href="https://www.reddit.com/submit?url=<?php echo $url; ?>" 
                                    target="_blank" class="btn btn-social btn-rd link-in-popup">
                                    <i class="fab fa-reddit-alien"></i>
                                </a>
                            </div>
                            <!-- END SHARE POST -->
                            
                            <!-- CONTINUE CODE NEWS -->
                            <?php
                                } else {//end if mysqli_num_rows($result)
                                    echo "<h4> Can't find the post which has id = $id.</h4>";
                                }
                            } else {//enf if ($result)
                                echo "<h4> Error read data from post database.</h4>";
                            }
                            ?>
                            <!-- END CODE NEWS -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog details area end -->
        <!-- footer top area start -->
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

<!-- Mirrored from preview.hasthemes.com/james-preview/james/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:04 GMT -->
</html>
