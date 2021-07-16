<?php
require_once('../db/dbhelper.php');
require_once('../common/utility.php');
if(isset($_GET['id_product'])){
    $id_product = $_GET['id_product'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Review Detail</title>
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
          
        <div class="card">
            <div class="card-body">
                <p class="card-title mb-0"> Review Detail</p>
                <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>User</th>
                          <th>Star</th>
                          <th>Review</th>
                          <th>Time</th>
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
    $sql = 'select * from review where id_product = "'.$id_product.'"  limit '.$firstIndex.','.$limit;
    $review=executeResult($sql);
    //dem so trang
    $sql='select count(id) as total from review where id_product = '.$id_product;
    $countResult = executeSingleResult($sql);
    $number = 0;
    if($countResult!=null){
        $count = $countResult['total'];
        $number = ceil($count/$limit); // chan tren
    }
foreach($review as $item){
    echo'
                        <tr>
                          <td>'.$item['user'].'</td>
                          <td>'.$item['star'].'</td>
                          <td> '.$item['review'].'</td>
                          <td> '.$item['created_at'].'</td>
                          <td><button class="btn btn-danger" onclick="deleteRv('.$item['id'].')">Delete</button></td>
                        </tr>
      ';
}
?>
                      </tbody>
                    </table>
                    <!-- Bai toan phan trang-->       
<?php  Paginarion($number, $page, '&id_product='.$id_product)?>
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
		function deleteRv(id){
			var option = confirm('Do you want to delete this review?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/review.php',{
				'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
	</script>
</html>

