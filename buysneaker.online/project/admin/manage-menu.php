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
  <title>Menu Management</title>
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
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="text-center">Menu Management</h2>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6">
						</div>
						<div class="col-lg-6">
							<form method="get">
								<div class="form-group" style="width: 200px; float: right;">
									<input type="text" class="form-control" placeholder="Searching..." id="s" name="s">
								</div>
							</form>
						</div>				
					</div>			
					<table class="table table-hover">
						<thead>
							<tr>
								<th width = 50px>No.</th>
								<th>Menu Title</th>
								<th width = 50px></th>
								<th width = 50px></th>
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
							$s='';
							if(isset($_GET['s'])){
								$s = $_GET['s'];  //lay tu khoa tim kiem bang phuong thuc get
							}
							$additional = '';
							if(!empty($s)){
								$additional=' and title like "%'.$s.'%"';
							}
							
							//lay danh sach cac danh muc tu db						
							$sql = 'select * from menu where 1 '.$additional.' limit '.$firstIndex.','.$limit;
							$categoryList = executeResult($sql);
							//dem so trang
							$sql='select count(id) as total from menu where 1'.$additional;
							$countResult = executeSingleResult($sql);
							$number = 0;
							if($countResult!=null){
								$count = $countResult['total'];
								$number = ceil($count/$limit); // chan tren
							}
							

							foreach($categoryList as $item){
								echo'<tr>
								<td>'.(++$firstIndex).'</td>
								<td>'.$item['title'].'</td>
								<td>
									<a href="manage-menu-edit.php?id='.$item['id'].'"><button class="btn btn-warning">Edit</button></a>
								</td>';
								if ($item['isActive']){
									echo'<td>
									<button class="btn btn-danger" onclick="deactive('.$item['id'].')">Deactivate</button>
									</td>';
								}else{
									echo'<td>
									<button class="btn btn-success" onclick="active('.$item['id'].')">Activate</button>
									</td>
									</tr>';
								}
								
								
							}
							?>						
						</tbody>
					</table>
					<!-- Bai toan phan trang-->
	<?php  Paginarion($number, $page, '&s='.$s)?>
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
		function deactive(id){
			var option = confirm('Do you want to deactive this menu?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/manage-menu.php',{
				'id':id,
				'action': 'deactive'
			},function(data){
				location.reload()
			})
		}

		function active(id){
			var option = confirm('Do you want to active this menu?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/manage-menu.php',{
				'id':id,
				'action': 'active'
			},function(data){
				location.reload()
			})
		}
	</script>

</html>

