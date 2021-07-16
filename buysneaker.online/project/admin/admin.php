<?php
require_once('../db/dbhelper.php');
require_once('../common/utility.php');
session_start();
$admin_name = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
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
                      <h4 class="card-title">Admin page</h4> 
                      <a href="admin-add.php">
                        <button class="btn btn-success" style="margin-bottom: 15px;">Add Admin</button>
                      </a>            
                    </div>
                    <div class="col-lg-6">
                          <form method="get">
                            <div class="form-group" style="width: 200px; float: right;">
                              <input type="text" class="form-control" placeholder="Search admin..." id="n" name="n">
                            </div>
                          </form>            
                    </div>  
                  </div>
                  
                  <div class="table-responsive pt-3">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Admin</th>
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

//tim kiem
$n='';
if(isset($_GET['n'])){
  $n = $_GET['n'];  //lay tu khoa tim kiem bang phuong thuc get name
}
$additional = '';
if(!empty($n)){
  $additional=' and admin like "%'.$n.'%"';
}

//lay danh sach cac danh muc tu db						
$sql = 'select * from admin 
where 1 '.$additional.' limit '.$firstIndex.','.$limit;
$userList = executeResult($sql);
//dem so trang
$sql='select count(id) as total from admin where 1'.$additional;
$countResult = executeSingleResult($sql);
$number = 0;
if($countResult!=null){
  $count = $countResult['total'];
  $number = ceil($count/$limit); // chan tren
}
$index=1;
foreach($userList as $item){
    if(strtolower($admin_name) == strtolower($item['admin'])){
        $disabled = 'disabled';
      }else{
        $disabled = '';
      }
  
  echo'

                        <tr>
                          <td>'.$index.'</td>
                          <td>'.$item['admin'].'</td>
                          <td>
                            <button class="btn btn-danger" onclick="deleteAdmin('.$item['id'].')" '.$disabled.'>Delete</button>
                          </td>
                        </tr>
      ';
  $index++;  
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
		function deleteAdmin(id){
			var option = confirm('Do you want to delete this admin?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/admin.php',{
				'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
	</script>
</html>

