<?php
require_once('db/dbhelper.php');
require_once('common/utility.php');
?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:04 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon
        ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

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

        <?=include('layout/header.php')?>  
        <div class="blog-post-details">
        <?php
        if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = 'select * from event where id = "'.$id.'"';
    $product=executeSingleResult($sql);
    if($product!=null){
        $id=$product['id'];
        $title = $product['title'];
        $description = $product['description'];
        $startingday = $product['startingday'];
        $endday = $product['endday'];
        $content = $product['content'];
        $image = $product['image'];
        $id_discount = $product['id_discount'];
      
    }
}?>
                                    <input type="hidden" name = "id" value = "<?php echo $id; ?>">
                                    <div style="margin-bottom: 150px; position: relative; top: 50px;">
                                        <div class="blog-img container-fluid img-jumbotron" style="max-width: 1100px;">
                                            <a href="#"><img src="image/blog/<?php echo $image; ?>" class="img-thumbnail" style =" min-height:250px; max-height: 250px; min-width: 755px; max-width:1300px;" alt="image-blog"> </a>  
                                            <div style="position:absolute; top:100px; left:400px; right:400px; color:white;  font-size:32px;"><?php echo $title?></div>                                                                               
                                        </div>
                                        <h1 style="text-align: center; border-bottom:solid 1px; padding-bottom: 8px;box-shadow:cadetblue 3px 3px"><?php echo $title?></h1>
                                        <div class="container-fluid" style="text-align: left; margin-left:400px; margin-right:400px"><b><?php echo $description?></b></div> 
                                        <div class="container-fluid" style="text-align:left; margin-left:150px; margin-right:150px">                                           
                                            <p><?php echo html_entity_decode($content) //decoding htmlentities from db to normal text ?></p>
                                            
                                        </div>
                                    </div>
        
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
                    window.alert("Successful !");
                    console.log(id);
                    location.href = "ajax/wishlist-add.php?id=" + id;
                    return;
                }
            } else {
            }
        }
    </script>

<!-- Mirrored from preview.hasthemes.com/james-preview/james/single-product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:06 GMT -->
</html>
