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
  <title>Brands</title>
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
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Brand List</h4>
                  <p class="card-description">
                    Product <code>.Brand</code>
                  </p>
                  <a href="brand-add.php">
                    <button class="btn btn-success" style="margin-bottom: 15px;">Add Brand</button>
                  </a>    
                  <a href="brand-ordinal.php">
                    <button class="btn btn-info" style="margin-bottom: 15px;">Change Ordinal</button>
                  </a>  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Logo</th>
                          <th>Brand</th>
                          <th>Status</th>
                          <th> </th>
                          <th> </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php	
						//lay danh sach cac danh muc tu db						
						$sql = 'select * from brands ORDER BY ordinal';
						$categoryList = executeResult($sql);
            
						foreach($categoryList as $item){
              $sql = 'select * from product where id_brand = '.$item['id'];
              $result = executeResult($sql);
              if(count($result)== 0){
                $disabled = '';
              }else{
                $disabled = 'disabled';
              }
              if($item['isActive'] == 1){$status = 'Active';}else{$status = 'Deactive';}
							echo'<tr>
							<td class="py-1"><img src="../image/shop/'.$item['image'].'" alt="image"/</td>
							<td>'.$item['name'].'</td>
              <td>'.$status.'</td>
							<td>
								<a href="brand-add.php?id='.$item['id'].'"><button class="btn btn-warning">Edit</button></a>
							</td>
							<td>
								<button class="btn btn-danger" onclick="deleteBrand('.$item['id'].')" '.$disabled.'>Delete</button>
							</td>
						</tr>';
						}
						?>					                                              
                      </tbody>
                    </table>
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
		function deleteBrand(id){
			var option = confirm('Do you want to delete this brand?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/brand.php',{
				'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
	</script>
</html>

