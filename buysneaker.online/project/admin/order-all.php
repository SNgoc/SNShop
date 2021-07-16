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
  <title>All Order</title>
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
                  <div class="row">
                    <div class="col-lg-6">
                      <h4 class="card-title">Order</h4>
                      <p class="card-description">
                        Order <code>. All Orders</code>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <form method="get">
                        <div class="form-group" style="width: 100px;float: right;">
                          <button type="submit" class="btn btn-dark">Search</button>
                        </div>
                        <div class="form-group" style="width: 150px; float: right;">
                          <input type="text" class="form-control" placeholder="Search by name" id="n" name="n">
                        </div>      
                      </form> 
                    </div>  
                  </div>               
                          
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th width = 40px>No</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Total</th>
                          <th>Discount</th>
                          <th>Process</th>
                          <th width = 40px></th>
                          <th width = 40px></th>
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

						//tim kiem
						$n='';
						if(isset($_GET['n'])){
							$n = $_GET['n'];  //lay tu khoa tim kiem bang phuong thuc get name
						}
						$additional = '';
						if(!empty($n)){
							$additional=' and orders.name like "%'.$n.'%"';
						}
						//lay danh sach cac danh muc tu db						
						$sql = 'select orders.*, order_process.process, order_process.color
            from orders left join order_process on orders.id_process = order_process.id 
            where 1 '.$additional.' ORDER BY id DESC limit '.$firstIndex.','.$limit; 
						$orderList = executeResult($sql);
						//dem so trang
						$sql='select count(id) as total from orders where 1'.$additional;
						$countResult = executeSingleResult($sql);
						$number = 0;
						if($countResult!=null){
							$count = $countResult['total'];
							$number = ceil($count/$limit); // chan tren
						}
						foreach($orderList as $item){ 
							echo'<tr>
							<td>'.(++$firstIndex).'</td>
              <td>'.$item['name'].'</td>
              <td>'.$item['phone'].'</td>
              <td>'.$item['total'].'</td>
              <td>'.$item['discount'].'</td>            
              <td><label class="badge '.$item['color'].'">'.$item['process'].'</label></td>                  
              <td>
								<a href="order-edit.php?id='.$item['id'].'"><button class="btn btn-warning">Detail/Edit</button></a>
							</td>
							<td>
								<button class="btn btn-danger" onclick="deleteOrder('.$item['id'].')">Delete</button>
							</td>
						</tr>           
            ';
            }
						?>			
                      </tbody>
                    </table>
				<!-- Bai toan phan trang-->       
<?php  Paginarion($number, $page, '&n='.$n)?>                      
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
		function deleteOrder(id){
			var option = confirm('Do you want to delete this order?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/order.php',{
				'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
	</script>

</html>

