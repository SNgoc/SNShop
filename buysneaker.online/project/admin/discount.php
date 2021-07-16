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
  <title>Discount Code</title>
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
    <?php require_once('layout/header.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php require_once('layout/left-menu.php');?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          

        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Discount Code</h4>
                  <div class="row">
                    <div class="col-lg-6">
                      <a href="discount-add.php">
                        <button class="btn btn-success" style="margin-bottom: 15px;">Add Code</button>
                      </a>
                    </div>
                    <div class="col-lg-6">
                      <form method="get">
                        <div class="form-group" style="width: 100px;float: right;">
                          <button type="submit" class="btn btn-dark">Search</button>
                        </div>
                        <div class="form-group" style="width: 150px; float: right;">
                          <input type="text" class="form-control" placeholder="Search code" id="n" name="n">
                        </div>      
                      </form>                
                    </div>				
                  </div>
                  <!-- table -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Code</th>
                          <th width = 10%>Discount</th>
                          <th width = 10%>Amount</th>
                          <th width = 10%>Used</th>
                          <th width = 17%>Required Order Value</th>
                          <th width = 13%>Status</th>
                          <th width = 26%></th>
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
						$n='';
						if(isset($_GET['n'])){
							$n = $_GET['n'];  //lay tu khoa tim kiem bang phuong thuc get name
						}
						$additional = '';
						if(!empty($n)){
							$additional=$additional.' and code like "%'.$n.'%"';
						}						
						//lay danh sach cac danh muc tu db						
						$sql = 'select * from discount  where 1 '.$additional.' ORDER BY id DESC limit '.$firstIndex.','.$limit;
						$codeList = executeResult($sql);
						//dem so trang
						$sql='select count(id) as total from discount where 1'.$additional;
						$countResult = executeSingleResult($sql);
						$number = 0;
						if($countResult!=null){
							$count = $countResult['total'];
							$number = ceil($count/$limit); // chan tren
						}
						foreach($codeList as $item){
							echo'<tr>
                            <td>'.$item['code'].'</td>
                            <td>$'.$item['discount'].'</td>
                            <td>'.$item['amount'].'</td>
                            <td>'.$item['used'].'</td>
                            <td>'.$item['required'].'</td>
                            <td>'.$item['status'].'</td>
                            <td>';       
if ($item['status'] == 'active'){
                                echo'
                                <button class="btn btn-warning" onclick="deactive('.$item['id'].')">Deactivate</button>
                                ';
}elseif($item['status'] == 'deactive'){
                                echo'
                                <button class="btn btn-success" onclick="active('.$item['id'].')">Activate</button>
                                ';}                              
    echo'
                                <button class="btn btn-danger" onclick="deleteCode('.$item['id'].')">Delete</button>
							</td>
							</tr>
              ';}
						?>					
                      </tbody>
                    </table>
				<!-- Bai toan phan trang-->       
<?=Paginarion($number, $page, '&n='.$n)?>
                  </div>
                </div>
              </div>
            </div>  
          
        
       

        
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include('layout/footer.php');?>
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
  <script>
        
		function deactive(id){
			var option = confirm('Do you want to deactive this code?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/discount.php',{
				'id':id,
				'action': 'deactive'
			},function(data){
				location.reload()
			})
		}

		function active(id){
			var option = confirm('Do you want to active this code?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/discount.php',{
				'id':id,
				'action': 'active'
			},function(data){
				location.reload()
			})
		}

        function deleteCode(id){
			var option = confirm('Do you want to delete this code?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/discount.php',{
				'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
        
</script>
</body>

</html>

