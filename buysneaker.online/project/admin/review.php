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
  <title>Review</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
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
         
        <div class="card">
            <div class="card-body">
                <p class="card-title mb-0">Review</p>
                <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Product</th>
                          <th>Review Number</th>
                          <th>Star</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
<?php
//phan trang
$limit = 10; // so san pham tren mot trang
$page = 1;
if(isset($_GET['page'])){
    $page = $_GET['page']; // trang can lay san pham
}
$firstIndex = ($page-1)*$limit;

$sql='select review.id, review.id_product, product.name, count(review.id) as num, sum(review.star) as sum
from review left join product on review.id_product = product.id 
where 1 group by review.id_product ORDER BY id DESC limit '.$firstIndex.','.$limit; 
$review = executeResult($sql); 
//dem so trang
$sql='select review.id from review left join product on review.id_product = product.id group by review.id_product';
    $countResult = executeResult($sql);
    $number = 0;
    if($countResult!=null){
        $count = count($countResult); 
        $number = ceil($count/$limit); // chan tren
    }
foreach($review as $item){
    $sql='select * from product_thumbnail where id_product = '.$item['id_product'];
    $thumbnail = executeSingleResult($sql);
    $countStar = ceil($item['sum']/$item['num']);
    $star = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>';
    echo'
                        <tr>
                          <td><a href="../single-product.php?id='.$item['id_product'].'">
                            <img src="../'.$thumbnail['thumbnail'].'" alt="image"/>
                          </td></a>
                           <td><a href="../single-product.php?id='.$item['id_product'].'">'.$item['name'].'</a></td>
                          <td> '.$item['num'].'</td>
                          <td>';
    for($i = 0;$i < $countStar; $i++ )  {
      echo $star;
    }  
    echo'                
                          </td>
                          <td><a href="review-detail.php?id_product='.$item['id_product'].'"><button class="btn btn-info">Detail</button></a></td>
                        </tr>
      ';
}
?>
                      </tbody>
                    </table>
<!-- Bai toan phan trang-->       
<?php  Paginarion($number, $page, '')?>
                  </div>
                </div>
            </div>
</div>
<!-- partial -->
<div class="content-wrapper">
          <div class="card">
            <div class="card-body">
                <p class="card-title mb-0">Forbidden Word<i class="fa fa-wordpress" aria-hidden="true"></i></p><br>
                <div class="table-responsive" style="text-align: center;">
                    <table class="table table-hover">
                    <a href="review-keyword-add.php" style="float: left;">
                        <button class="btn btn-success" style="margin-bottom: 15px;">Add Keyword</button>
                      </a>
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Word</th>
                          <th></th>
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
                              $sql = 'select * from review_filter ORDER BY id DESC limit '.$firstIndex.','.$limit;
                              $reviewfilterList = executeResult($sql);
                              foreach($reviewfilterList as $item){
                                echo'<tr>
                                <td>'.(++$firstIndex).'</td>
                                <td style="color: red; font-weight: bold;">'.$item['keyword'].'</td>
                                <td>
                                  <button class="btn btn-danger" onclick="deleteKeyword('.$item['id'].')">Delete</button>
                                </td>
                              </tr>';
                              }
                            ?>
                      </tbody>
                    </table>
<!-- Bai toan phan trang-->       
<?php  Paginarion($number, $page, '')?>
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
function deleteKeyword(id){
			var option = confirm('Do you want to delete this keyword?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/review.php',{
				'id':id,
				'action': 'deleteKeyword'
			},function(data){
				location.reload()
			})
		}
</script>
</html>

