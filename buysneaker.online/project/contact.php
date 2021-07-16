<?php
include('db/dbhelper.php');
?>
<!doctype html>
<html class="no-js" lang="">
    
<!-- Mirrored from preview.hasthemes.com/james-preview/james/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:04 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Contact Us</title>
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

        <style>
        iframe {
            width: 100%;
            height: 500px;
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
        <!-- contact area start -->
        <div class="contact-area " >
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="location">
                            <ul>
                                <li><a href="index.html" title="go to homepage"><b>Home</b><span>/</span></a>  </li>
                                <li><strong><b> Contact Us</b></strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid text-info" style="margin-left:100px; margin-right:100px; border:solid 1px;">
                <div class="row">
             
                <?php
                        $query = 'SELECT * FROM contact_us_addmap ORDER BY id DESC, location LIMIT 1';

                        $MANG = [];
                        $result = mysqli_query($link, $query);
                        if ($result){
                            
                        if(mysqli_num_rows($result)>0){
                            if($row = mysqli_fetch_array($result)){
                        echo '<div style ="width: 100%; height:500px; ">'.$row[1].'</div>';

                        }
                        mysqli_free_result($result);
                        }
                        else{
                            
                            echo '<tr>'.
                            '<td colspan = "4">No Records</td>'.
                            '</tr>';
                        }

                        }
                        else{
                        echo '<h4> Error with sql command, please';
                        }
                        mysqli_close($link);
                ?> 
                </div> 
            </div>
            <div class="container-fluid text-info" style="margin-left:100px; margin-right:100px;">
                <div class="row">                                                                                             
                    <div class="contact-details">
                        <div class="contact-title">
                                <h3><b>contact us</b></h3>
                        </div>
                        <form action="getcontact.php" method="post" style="border:solid 1px; margin-bottom: 200px;">
                                <div class="contact-form">
                                    <div class="form-title">
                                        <h4><b> contact information</b></h4>
                                    </div>
                                    <div class="form-content"  style="border:solid 1px;">
                                        <ul>
                                            <li>
                                                <div class="form-box" style="margin-left: 10px;">
                                                    <div class="form-name">
                                                        <label><b> Name </b><em>*</em> </label>
                                                        <input type="text" name="name" required placeholder=" Your Name">
                                                    </div>
                                                </div>
                                                <div class="form-box" style="margin-left: 10px;">
                                                    <div class="form-name">
                                                        <label><b>Email</b><em>*</em> </label>
                                                        <input type="email" name="email" required placeholder="example@gmail.com">
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-box" style="margin-left: 10px;">
                                                    <div class="form-name" style="margin-bottom: 5px;">
                                                        <label><b> Telephone </b></label>
                                                        <input type="tel" name="phone" required pattern="[0-9]{3}[0-9]{3}[0-9]{4}"  placeholder="039*******">
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-box">
                                                    <div class="form-name" style="margin-left: 10px;">
                                                        <label><b> Comment </b><em>*</em> </label>
                                                        <textarea name="comments" cols="5" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="buttons-set">
                                    <p> <em>*</em> Required Fields</p>
                                    <button type="submit" ><b>submit</b></button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
</div>

        <!-- contact area end -->
       
        <!-- footer top area start -->
        <?=include_once('layout/footer.php');?> 
                   <!-- footer area start -->
                <!-- footer area end -->

        <!-- jquery
        
        ============================================ -->
        <script>  
               var x = document.getElementsByTagName("ifr");
               x.style.width = "100%";
        </script>
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

        <!-- google map
        ============================================ -->
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuU_0_uLMnFM-2oWod_fzC0atPZj7dHlU"></script>
        <script>
            function initialize() {
                var mapOptions = {
                    zoom: 15,
                    scrollwheel: false,
                    center: new google.maps.LatLng(23.81033, 90.41252)
                };

                var map = new google.maps.Map(document.getElementById('googleMap'),
                                              mapOptions);


                var marker = new google.maps.Marker({
                    position: map.getCenter(),
                    animation:google.maps.Animation.BOUNCE,
                    icon: 'img/contact/map-marker.png',
                    map: map
                });

            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script> -->

        <!-- main JS
        ============================================ -->
        <script src="js/main.js"></script>
        
    </body>

<!-- Mirrored from preview.hasthemes.com/james-preview/james/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Jan 2021 00:39:04 GMT -->
</html>
