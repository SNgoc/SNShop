<?php
session_start();
include('db/dbhelper.php');
?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:37:41 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Home </title>
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

        <!-- All css -->

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
        <!-- slider area start -->
        <div class="slider-area home1">
            <div class="bend niceties preview-2">
                <div id="nivoslider" class="slides">
<?php
$sql='select * from page_home_slider';
$slider=executeResult($sql);
foreach ($slider as $item){
    echo'    
                    <img src="image/shop/'.$item['image'].'" alt="" title="#slider-direction-1"  />
        ';
}
?>            
                </div>
                <!-- direction 1 -->
<?php
foreach ($slider as $item){
    echo'
   
                <div id="slider-direction-1" class="t-cn slider-direction">
                    <div class="slider-progress"></div>
                    <div class="slider-content t-lfl s-tb slider-1">
                        <div class="title-container s-tb-c title-compress">
                            <h1 class="title1">'.$item['title1'].'</h1>
                            <h2 class="title2">'.$item['title2'].'</h2>
                            <h3 class="title3">'.$item['title3'].'</h3>
                            <a href="'.$item['link'].'"><span>read more</span></a>
                        </div>
                    </div>
                </div>
';}
?>            
            </div>
        </div>
        <!-- slider area end -->
        <!-- products area start -->
        <div class="products-area">
            <div class="container">
                <div class="products">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="product-menu">
                                <div class="menu-title">
                                    <h2>New <strong>Products</strong></h2>
                                </div>
                                <div class="side-menu">
                                     <!-- Nav tabs -->
                                    <ul class="tab-navigation" role="tablist">
<?php
$sql= 'select * from brands where isActive = 1 ORDER BY ordinal';
$brandList = executeResult($sql);
$count =1;
$active='class="active"';
foreach($brandList as $item){
    if($count != 1){
        $active = '';
    }
    echo'<li role="presentation" '.$active.'><a href="#tab'.$count.'" aria-controls="'.$item['name'].'" role="tab" data-toggle="tab">'.$item['name'].'</a></li>';
    $count++;
}
?>                                    

                                        <li> <img src="img/banner/banner-5.jpg" alt=""> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <!-- Tab panes -->
                                <div class="tab-content">
<?php
$count = 1;
foreach($brandList as $item){
    if($count == 1){
        $active='in active';
    }else{
        $active = '';
    } 
    echo'
    
                                <div role="tabpanel" class="tab-pane fade '.$active.'" id="tab'.$count.'">
        ';
    $sql = 'select * from product where id_brand = '.$item['id'].' ORDER BY id DESC limit 6';
    $newProduct = executeResult($sql);
    foreach($newProduct as $new){
        $sql = 'select * from product_image where id_product ='.$new['id']; 
        $imageList = executeResult($sql); 
        $image1 = $imageList[0]['image'];
        $image2 = $imageList[1]['image'];
        echo'
        
                                            <div class="col-md-4">
                                                <div class="single-product">
                                                    <div class="level-pro-new">
                                                        <span>'.$item['name'].'</span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="single-product.php?id='.$new['id'].'">
                                                            <img src="'.$image1.'" alt="" class="primary-img">
                                                            <img src="'.$image1.'" alt="" class="secondary-img">
                                                        </a>
                                                    </div>
                                                    <div class="product-name">
                                                        <a href="single-product.php?id='.$new['id'].'" title="Fusce aliquam">'.$new['name'].'</a>
                                                    </div>
                                                    <div class="price-rating">
                                                        <span>$'.$new['price'].'</span>                                                        
                                                    </div>                                           
                                                </div>
                                            </div>
                                            ';
                                        }
        echo'                               
                                    </div>                                             
        ';
    $count ++;   
}
?>                              
                                        
                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- products area end -->

        <!-- another banner area start -->
        <div class="another-banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="big-banner">
                            <a href="javascript:void(0)">
                                <img src="img/banner/banner-10.jpg" alt="">
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- another banner area end -->
        <!-- new products area start -->
        <div class="new-products-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>BEST SELLER PRODUCTS</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="new-product-slider">
<?php
$sql = 'select product.id, count(product.id) as count , product.name, product.price, brands.name brand
from product right join orderdetail on orderdetail.id_product = product.id
left join brands on  product.id_brand = brands.id
group by product.id ORDER BY count DESC limit 8';
$saleProduct = executeResult($sql);
foreach($saleProduct as $item){
    $sql = 'select * from product_image where id_product ='.$item['id']; 
        $imageList = executeResult($sql); 
        $image1 = $imageList[0]['image'];
        $image2 = $imageList[1]['image'];
    echo'
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="level-pro-new">
                                    <span>'.$item['brand'].'</span>
                                </div>
                                <div class="product-img">
                                    <a href="single-product.php?id='.$item['id'].'">
                                        <img src="'.$image1.'" alt="" class="primary-img">
                                        <img src="'.$image2.'" alt="" class="secondary-img">
                                    </a>
                                </div>
                                <div class="product-name">
                                    <a href="single-product.php?id='.$item['id'].'" title="'.$item['name'].'">'.$item['name'].'</a>
                                </div>
                                <div class="price-rating">
                                    <span>$'.$item['price'].'</span>     
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
        <!-- new products area end -->
        <!-- new event starting -->
        <div class="new-products-area" style="margin-bottom: 30px;">
            <div class="container" >
                <div class="row">
                    <div class="col-md-12" >
                        <div class="section-heading">
                            <h2 style="position:absolute;">NEW EVENT</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
               
<?php

$sql = 'select * from event ORDER BY id DESC limit 2 ';
$result = mysqli_query($link, $sql); 
if ($result){                           
    if(mysqli_num_rows($result)>0){
         while($row = mysqli_fetch_array($result)){
            echo '  
                        <div class="col-md-6">
                            <div>
                                <div class = "container-fluid" style="position: relative; top: 50px;">
                                    <a href="event-detail.php?id='.$row['id'].'">
                                        <img src="image/blog/'.$row['image'].'" alt="No Image, Please input Image" class="img-thumbnail " style =" min-height:250px; max-height: 250px; min-width: 555px; min-width:555; ">
                                    </a>
                                    <div style="position:absolute; top:100px; left:100px; right:100px; color:white;">
                                    <a href="event-detail.php?id='.$row['id'].'" title="'.$row['title'].'" style= "color:white; font-size:28px ;">'.$row['title'].'</a>
                                </div>
                                </div>
                                
                            </div>
                        </div>
        ';
    }}}

?>      

</div>
</div>    
</div>     <!-- new event end -->
        <!-- testimonial area start -->
        <div class="testimonial-area" id="feedback">
            <div class="container">
                <div class="row">
                    <div class="testimonial-slider">
<?php
$sql ='select * from page_home_feedback';
$feedback=executeResult($sql);
foreach($feedback as $item){
    echo'
   
                        <div class="single-testimonial">
                            <div class="spech">
                                <a href="javascript:void(0)">“'.$item['feedback'].'”</a>
                            </div>
                            <div class="avater">
                                <img src="image/shop/'.$item['image'].'" alt="">
                            </div>
                            <div class="post-by">
                                <span>'.$item['name'].'</span>
                            </div>
                        </div>
';}
?>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial area end -->
            
        <!-- blog area start -->
        <div class="blog-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-heading">
                            <h2>From <strong> The News</strong></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-post">

                        <!-- CONTENT BLOG -->
                        <!-- ADD DATA POST FROM DATABASE POST -->
                        <?php
                            $query = "SELECT p.*, t.topic_name FROM posts AS p JOIN topics as t ON p.topic_id = t.id
                            WHERE p.published = 1 ORDER BY created_at DESC";
                            $result = executeResult($query);
                            $index = 1;
                            foreach ($result as $display) {
                            ?>
                            <div class="single-blog-post">
                                <div class="blog-img">
                                    <a href="blog-details.php?id=<?php echo $display['id'] ?>">
                                        <img src="image/blog/<?php echo $display['image'] ?>" alt="image-blog">
                                    </a>
                                </div>
                                <div class="blog-content" style="min-height: 250px;">
                                    <a href="blog-details.php?id=<?php echo $display['id'] ?>" class="blog-title"><?php echo $display['title'] ?></a>
                                    <span><?php echo $display['topic_name']; ?> - Added by <?php echo $display['admin_user'] ?> - <?php echo date('F j, Y', strtotime($display['created_at'])); //retrieve date time from db and transform ?></span>
                                    <p><?php echo html_entity_decode(substr($display['content'], 0, 150)) . '...' //decoding htmlentities from db to normal text ?></p>
                                    <a href="blog-details.php?id=<?php echo $display['id'] ?>" class="readmore">read more ></a>
                                </div>
                            </div>
                            <?php
                            $index++;
                                if ($index > 4) {
                                    break;
                                }
                            }
                            ?>
                        <!-- END BLOG -->
                    </div>
                </div>
            </div>
        </div>
        <!-- blog area end -->

        <div style="height: 90px;"> </div>


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

<!-- Mirrored from preview.hasthemes.com/james-preview/james/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:38:50 GMT -->
</html>
