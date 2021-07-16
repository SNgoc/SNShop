<?php
require_once('../db/dbhelper.php');
require_once('../common/utility.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>All Products</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/style-table.css">

  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php  require_once('layout/header.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
          <?php  require_once('layout/left-menu.php');?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product</h4>
                  <p class="card-description">
                    Product <code>. All Products</code>
                  </p>
                  <div class="row">
                    <div class="col-lg-6">
                      <a href="all-product-add.php">
                        <button class="btn btn-success" style="margin-bottom: 15px;">Add Product</button>
                      </a>
                    </div>
                    <div class="col-lg-6">
                      <form method="get">
                        <div class="form-group" style="width: 100px;float: right;">
                          <button type="submit" class="btn btn-dark">Search</button>
                        </div>
                        <div class="form-group" style="width: 150px; float: right;">
                          <input type="text" class="form-control" placeholder="Search by brand" id="b" name="b">
                        </div>
                        <div class="form-group" style="width: 150px; float: right;">
                          <input type="text" class="form-control" placeholder="Search by name" id="n" name="n">
                        </div>      
                      </form>                
                    </div>				
                  </div>
                  <!-- table -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th width = 5%>No</th>
                          <th width = 10%>Thumbnail</th>
                          <th width = 10%>Brand</th>
                          <th>Name</th>
                          <th width = 7%>Quantity</th>
                          <th width = 7%>Price</th>
                          <th width = 9%></th>
                          <th width = 13%></th>
                          <th width = 11%></th>
                        </tr>
                      </thead>
                      <tbody>
<?php
						//phan trang
						$limit = 8; // so san pham tren mot trang
						$page = 1;
						if(isset($_GET['page'])){
							$page = $_GET['page']; // trang can lay san pham
						}
						$firstIndex = ($page-1)*$limit;

						//tim kiem
						$n=$b ='';
						if(isset($_GET['n'])){
							$n = $_GET['n'];  //lay tu khoa tim kiem bang phuong thuc get name
						}
            if(isset($_GET['b'])){
							$b = $_GET['b'];  //lay tu khoa tim kiem bang phuong thuc get brand
						}
						$additional = '';
						if(!empty($n)){
							$additional=$additional.' and product.name like "%'.$n.'%"';
						}
            
            if(!empty($b)){
							$additional=$additional.' and brands.name like "%'.$b.'%"';
						}
						
						//lay danh sach cac danh muc tu db						
						$sql = 'select product.id, product.name, product.price,
            product.updated_at, product.content, brands.name brands_name,
            product.size36,product.size37,product.size38,product.size39,
            product.size40,product.size41,product.size42,product.size43
            from product left join brands on product.id_brand = brands.id 
						where 1 '.$additional.' ORDER BY id DESC limit '.$firstIndex.','.$limit;
						$productList = executeResult($sql);
						//dem so trang
						$sql='select count(id) as total from product where 1'.$additional;
						$countResult = executeSingleResult($sql);
						$number = 0;
						if($countResult!=null){
							$count = $countResult['total'];
							$number = ceil($count/$limit); // chan tren
						}
						foreach($productList as $item){
              //tinh quantity
              $quantity=$item['size36']+$item['size37']+$item['size38']+$item['size39']+$item['size40']+
              $item['size41']+$item['size42']+$item['size43'];
              //lấy thumbnail
              $sql = 'select * from product_thumbnail where id_product ='.$item['id']; 
              $thumbnailList = executeResult($sql); 
              $thumbnail = $thumbnailList[0]['thumbnail'];
							echo'<tr>
							<td>'.(++$firstIndex).'</td>
              <td><img src="../'.$thumbnail.'" style="max-width:100px"></td>
							<td>'.$item['brands_name'].'</td>
              <td>'.$item['name'].'</td>
              <td>
                <a class="nav-link" data-toggle="collapse" href="#a'.$item['id'].'" aria-expanded="false" aria-controls="'.$item['id'].'">
                '.$quantity.'
                </a>
              </td>
              <td>'.$item['price'].'</td>
							<td>
								<a href="all-product-add.php?id='.$item['id'].'"><button class="btn btn-light">Edit</button></a>
							</td>
              <td>
                <a href="all-product-add-stock.php?id='.$item['id'].'"><button class="btn btn-info">Add stock</button></a>
							</td>
							<td>
              ';
              $sql='select count(id) as total from orderdetail where id_product='.$item['id'];
              $countResult = executeSingleResult($sql);
              if($countResult!=null){
                  $count = $countResult['total'];
                  if($count >0){
                      echo'<button class="btn btn-danger" onclick="deleteProduct('.$item['id'].')" disabled>Xóa</button>';
                  }else{
                      echo'<button class="btn btn-danger" onclick="deleteProduct('.$item['id'].')">Xóa</button>';
                  }
              }
              echo'  								
							</td>
						</tr>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <div class="collapse" id="a'.$item['id'].'">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">Size 36 </li>
                        <li class="nav-item">Size 37 </li>
                        <li class="nav-item">Size 38 </li>
                        <li class="nav-item">Size 39 </li>
                        <li class="nav-item">Size 40 </li>
                        <li class="nav-item">Size 41 </li>
                        <li class="nav-item">Size 42 </li>
                        <li class="nav-item">Size 43 </li>                                      
                    </ul>
                </div>      
            </td>
            <td>
                <div class="collapse" id="a'.$item['id'].'">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">'.$item['size36'].'</li>
                        <li class="nav-item">'.$item['size37'].' </li>
                        <li class="nav-item">'.$item['size38'].'</li>
                        <li class="nav-item">'.$item['size39'].'</li>
                        <li class="nav-item">'.$item['size40'].'</li>
                        <li class="nav-item">'.$item['size41'].' </li>
                        <li class="nav-item">'.$item['size42'].' </li>
                        <li class="nav-item">'.$item['size43'].' </li>                                      
                    </ul>
                </div>                            
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            ';
						}
						?>
            <tr style="height:1px;"><td colspan="9" ></td> </tr>					
                      </tbody>
                    </table>
				<!-- Bai toan phan trang-->       
<?php  Paginarion($number, $page, '&n='.$n.'&b='.$b)?>
                  </div>
                </div>
              </div>
            </div>  
          
        
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php  include('layout/footer.php');?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
<script>
		function deleteProduct(id){
			var option = confirm('Do you want to delete this product?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('all-products/ajax.php',{
				'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
 	</script>

</html>

