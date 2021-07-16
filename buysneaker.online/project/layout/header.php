<?php
//lay thong tin tu bang information
$sql='select * from information';
$infor = executeSingleResult($sql);
//lay danh sach cac danh muc tu db
$sql = 'select * from menu';
$categoryList = executeResult($sql);
// lấy danh sách cart
$count =0;
if(isset($_SESSION['user'])){
    $sql = 'select * from user where user = "'.$_SESSION['user'].'"';
    $result = executeSingleResult($sql);
    $token = $result['token'];
    if($token != $_SESSION['token']){
        header('Location: logout.php');
    }
    if(!empty($result)){
        $id_user = $result['id'];
        $sql="select * from cart where id_user = $id_user";
        $productList = executeResult($sql);
        $count= count($productList);
    } 
}
?>
<header>
            <div class="top-link">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-md-offset-3 col-sm-9 hidden-xs">
                            <div class="call-support">
                                <p>Call support free: <span> <?=$infor['phone']?></span></p>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <div class="dashboard">
                                <div class="account-menu">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                            <ul>                                               
<?php
if (!empty($_SESSION['user'])){
    echo'                                       
                                                <li><a href="wishlist.php">my wishlist</a></li>
                                                <li><a href="cart.php">my cart</a></li>
                                                <li><a href="checkout.php">Checkout</a></li>
                                                <li><a href="my-account.php">my account</a></li>                                             
                                                <li><a href="logout.php">Log out</a></li>
        ';}else{
    echo' 
                                                <li><a href="login.php">Log in</a></li>
                                                <li><a href="signup.php">Sign up</a></li>
        ';} 
?>                                                  
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart-menu">
                                    <ul>
                                        <li><a href="cart.php"> <img src="img/icon-cart.png" alt=""> <span><?=$count?></span> </a>
                                            <div class="cart-info">
                                                <ul>
<?php
$allTotal=0;
if(isset($productList)){
    foreach($productList as $item){
        $total= $item['price']*$item['quantity'];
        $allTotal += $total;
        $sql='select * from product_thumbnail where id_product = '.$item['id_product'];
        $result= executeSingleResult($sql);
        $thumbnailCart = $result['thumbnail'];
        echo'  
                                                    <li>
                                                        <div class="cart-img">
                                                            <img src="'.$thumbnailCart.'" alt="">
                                                        </div>
                                                        <div class="cart-details" style="max-width: 120px;">
                                                            <a href="single-product.php?id='.$item['id_product'].'">'.$item['name'].'</a>
                                                            <p>'.$item['quantity'].' x $'.$item['price'].'</p>
                                                        </div>
                                                    </li>
        ';
    }
}
?>
                                                </ul>
                                                <h3>Subtotal: <span> $<?=$allTotal?></span></h3>
                                                <a href="checkout.php" class="checkout">checkout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mainmenu-area product-  items">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="mainmenu">
                                <nav>
                                    <ul>
<?php
if($categoryList[0]['isActive']){
    echo' <li><a href="index.php">'.$categoryList[0]['title'].'</a></li>'; 
}
?>                                                             
<?php
if($categoryList[1]['isActive']){
    echo' <li class="mega-women"><a href="product.php">'.$categoryList[1]['title'].'</a>
                                            <div class="mega-menu women">
                                                <div class="part-1">
                                                    <span>
                                                        <a href="product.php?brand=Adidas">Adidas</a>                                                   
                                                    </span>
                                                    <span>
                                                        <a href="product.php?brand=Converse">Converse</a>                                                      
                                                    </span>
                                                    <span>
                                                        <a href="product.php?brand=Nike">Nike</a>                                                     
                                                    </span>
                                                    <span>
                                                        <a href="product.php?brand=Puma">Puma</a>                                                      
                                                    </span>
                                                </div>
                                                <div class="part-2">
                                                    <a href="product.php">
                                                        <img src="img/banner/menu-banner.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        ';
}
?>                                     
<?php
if($categoryList[2]['isActive']){
    echo' <li><a href="about-us.php">'.$categoryList[2]['title'].'</a></li></li>';
}
if($categoryList[3]['isActive']){
    echo' <li class="mega-footwear"><a href="blog.php">'.$categoryList[3]['title'].'</a></li>';
}
if($categoryList[4]['isActive']){
    echo' <li class="mega-jewellery"><a href="contact.php">'.$categoryList[4]['title'].'</a></li>';
}  
if($categoryList[5]['isActive']){
    echo' <li class="mega-jewellery"><a href="event.php">'.$categoryList[5]['title'].'</a></li>';
}  
?>                                                                            
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mobile-menu">
                                <nav>
                                    <ul>
                                    <?php
if($categoryList[0]['isActive']){
    echo' <li><a href="index.php">'.$categoryList[0]['title'].'</a></li>'; 
}
if($categoryList[1]['isActive']){
    echo' <li><a href="product.php">'.$categoryList[1]['title'].'</a>
                                            <ul>
                                                <li><a href="product.php?brand=Adidas">Adidas</a></li>                                               
                                                <li><a href="product.php?brand=Converse">Converse</a></li>                                               
                                                <li><a href="product.php?brand=Nike">Nike</a></li>
                                                <li><a href="product.php?brand=Puma">Puma</a></li>
                                            </ul>
                                        </li>
                                        '; 
                                    }
                                    ?>
<?php

if($categoryList[2]['isActive']){
    echo' <li><a href="about-us.php">'.$categoryList[2]['title'].'</a></li>'; 
}
if($categoryList[3]['isActive']){
    echo' <li><a href="blog.php">'.$categoryList[3]['title'].'</a> </li>'; 
}
if($categoryList[4]['isActive']){
    echo' <li><a href="contact.php">'.$categoryList[4]['title'].'</a></li>'; 
}
if($categoryList[5]['isActive']){
    echo' <li><a href="event.php">'.$categoryList[5]['title'].'</a></li>'; 
}
?>                                      
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>