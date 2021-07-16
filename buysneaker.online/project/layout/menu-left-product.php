<?php
$sql = 'select product.id, product.name, product.price,
product.updated_at, product.content, product.id_special, brands.name brand_name
from product left join brands on product.id_brand = brands.id';
$productAll = executeResult($sql);
?>

                        <div class="product-sidebar">
                            <div class="sidebar-title">
                                <h2>Shopping Options</h2>
                            </div>
                            <div class="single-sidebar">
                                <div class="single-sidebar-title">
                                    <h3>Brands</h3>
                                </div>
                                <div class="single-sidebar-content">               
                                    <ul>
<?php
$sql = "select * from brands where isActive = 1 ORDER BY ordinal";
$brandList = executeResult($sql);
foreach($brandList as $item){
    $count=0;
    foreach($productAll as $product){
        if ($product['brand_name']==$item['name']){
            $count ++;
        }
    }
    echo'<li><a href="product.php?brand='.$item['name'].'">'.$item['name'].'('.$count.')</a></li>

    ';
}
?>                                       
                                    </ul>
                                </div>
                            </div>
                            <div class="single-sidebar">
                                <div class="single-sidebar-title">
                                    <h3>Function</h3>
                                </div>
                                <div class="single-sidebar-content">
                                    <ul> 
<?php
$sql = "select * from product_special";
$specList = executeResult($sql);
foreach($specList as $item){
    $count=0;
    foreach($productAll as $product){
        if ($product['id_special']==$item['id']){         
            $count ++;
        }
    }
    echo'<li><a href="product.php?spec='.$item['id'].'">'.$item['special'].'('.$count.')</a></li>
    ';
}
?>     
                                    </ul>
                                </div>
                            </div>
                            <div class="single-sidebar price">
                                <div class="single-sidebar-title">
                                    <h3>Price</h3>
                                </div>
                                <div class="single-sidebar-content">
                                    <form action="product.php" method="GET">
                                    <div class="price-range">
                                        <div class="price-filter">                                        
                                            <div id="slider-range"></div>
                                            <div class="price-slider-amount">
                                                <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                            </div>  
                                        </div>
                                        <button type="submit"> <span>search</span> </button>
                                    </div>
                                    </form> 
                                </div>
                            </div>
                            <div class="banner-left">
                                <a href="javascript:void(0)">
                                    <img src="img/product/banner_left.jpg" alt="">
                                </a>
                            </div>
                        </div>
                