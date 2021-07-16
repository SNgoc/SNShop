<?php
require_once('db/dbhelper.php');
require_once('common/utility.php');
?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:37:33 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> News || James </title>
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
        <!-- Sidebar Title Responsive -->
        <style>
            @media(max-width: 767px){
                .sidebar-title .lastest-news{
                    margin-top: 20px;
                }
            }
        </style>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!-- header area start -->
        <?php include_once('layout/header.php'); ?>
        <!-- header area end -->
        <!-- blog  banner start -->
        <div class="blog-banner">
            <img src="img/product/banner.jpg" alt="">
        </div>
        <!-- blog banner end -->
        <!-- blog area start -->
        <div class="blog-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.php" title="go to homepage">Home<span>/</span></a>  </li>
                                <li><a href="blog.php" title="News Page"><strong> News</strong></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3" style="overflow-wrap: break-word;">
                        <!--menu left-->
                        <?php include('layout/menu-left-topics.php');?>
                        <!--menu left-->
                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sidebar-title">
                                    <h2 class="lastest-news">Lastest News</h2>
                                </div>
                                <div class="blog-area">

                                    <!-- CODE PHÂN TRANG -->
                                    <?php
                                    //phan trang
                                    $limit = 5; // so News tren mot trang
                                    $page = 1;
                                    if(isset($_GET['page'])){
                                    $page = $_GET['page']; // trang can lay News
                                    }
                                    $firstIndex = ($page-1)*$limit;
                                    // phân loại theo topic
                                    $topic_id = "";
                                    if(isset($_GET['topic_id'])){
                                        $topic_id = $_GET['topic_id'];  //lay id topic tim kiem bang phuong thuc get topic
                                    }
                                    // tìm theo title
                                    $titlename = "";
                                    if(isset($_GET['titlename'])){
                                        $titlename = $_GET['titlename'];  //lay tu khoa tim kiem bang phuong thuc get name
                                    }
                                    // tạo query sort topic hoặc search by title (id and name để get nằm trong menu-left-topics.php)
                                    $sort_search = '';
                                    if(!empty($topic_id)){
                                        $sort_search=' AND posts.topic_id = '.$topic_id.'';
                                    }
                                    if(!empty($titlename)){
                                    $sort_search=' AND posts.title LIKE "%'.$titlename.'%"';
                                    }
                                    //lay danh sach cac danh muc tu db						
                                    $sql = 'SELECT posts.*, topics.topic_name FROM posts JOIN topics ON posts.topic_id = topics.id 
                                    WHERE published = 1'.$sort_search.' ORDER BY created_at DESC '.' LIMIT '.$firstIndex.','.$limit;
                                    $newsList = executeResult_post($sql);

                                    // TEST query:
                                    //die($sql);

                                    //dem so trang
                                    $sql_page='SELECT COUNT(id) AS total FROM posts WHERE published =1'.$sort_search;//thêm $sort_search để auto chia page đúng trong sort/search
                                    $countResult = executeSingleResult($sql_page);
                                    $number = 0;
                                    if($countResult!=null){
                                    $count = $countResult['total'];
                                    $number = ceil($count/$limit); // chan tren
                                    }
                                    //END

                                    //<!-- CODE CONTENT FOR PAGINATOR -->
                                    $index=1;
                                    foreach ($newsList as $display) {
                                        echo '
                                        <div class="single-blog-post-page">
                                        <div class="blog-img">
                                            <a href="blog-details.php?id='.$display['id'].'" title="'.$display['title'].'">
                                            <img style="width: 300px; height: 200px;" src="image/blog/'.$display['image'].'" alt="image-blog">
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <a href="blog-details.php?id='.$display['id'].'" class="blog-title">'.$display['title'].'</a>
                                            <span>'.$display['topic_name'].' - Added by '.$display['admin_user'].' on '.date('F j, Y', strtotime($display['created_at'])).'</span>
                                            <p>'.html_entity_decode(substr($display['content'], 0, 150)) . '...' .'</p>
                                            <a href="blog-details.php?id='.$display['id'].'" class="readmore" title="'.$display['title'].'">read more ></a>
                                            </div>
                                        </div>
                                        ';
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- Bai toan phan trang-->
                                <!-- thêm '&topic_id='.$topic_id.'&titlename='.$titlename để chuyển trang khi sort or search ko bị refresh -->
                                <?php Paginarion($number, $page, '&topic_id='.$topic_id.'&titlename='.$titlename)?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog area end -->
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

<!-- Mirrored from preview.hasthemes.com/james-preview/james/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:37:41 GMT -->
</html>
