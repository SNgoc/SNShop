<?php
require_once('../db/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>About Us</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <style>
        table {
            border-spacing: 0px;
            table-layout: fixed;
        }

        td {
            overflow: hidden;
            text-overflow: ellipsis;
            border: 1px solid black;
        }
    </style>
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
          <div class="panel-heading">
            <h2 class="text-center">About Us Page Information</h2>
          </div>
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Content</h4>
                    <div class="row">
                      <div class="col-lg-6">
                        <a href="page-about-us-content.php">
                          <button class="btn btn-success" style="margin-bottom: 15px;">Add Content</button>
                        </a>
                      </div>
                    </div>
                <!-- table -->
                    <div class="table-responsive">
                          <table class="table table-hover">
                          <thead>
                          <col style="width: 5%;"/>
                          <col style="width: 25%;"/>
                          <col style="width: 41%;"/>
                          <col style="width: 16%;"/>
                          <col style="width: 13%">
                            <tr>
                              <th width = 50px>No</th>
                              <th>Title</th>
                              <th>Content</th>
                              <th width = 50px></th>
                              <th width = 50px></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $sql = 'select * from aboutus_content ';
                              $aList = executeResult($sql);
                              $index =1;
                              foreach($aList as $item){
                                echo'<tr>
                                <td>'.$index++.'</td>
                                <td>'.$item['title'].'</td>
                                <td>'.$item['content'].'</td>
                                <td>
                                  <a href="page-about-us-content.php?id='.$item['id'].'"><button class="btn btn-warning">Detail/Edit</button></a>
                                </td>
                                <td>
                                  <button class="btn btn-danger" onclick="deleteContent('.$item['id'].')">Delete</button>
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
          
        <div class="content-wrapper">      
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Member</h4>
                    <div class="row">
                    <div class="col-lg-6">
                      <a href="page-about-us-member.php">
                        <button class="btn btn-success" style="margin-bottom: 15px;">Add Member</button>
                      </a>
                    </div>
                  </div>
                <!-- table -->
                <div class="table-responsive" width="600">
                        <table class="table table-hover">
                        <thead>
                            <col style="width: 5%;"/>
                            <col style="width: 8%;"/>
                            <col style="width: 20%;"/>
                            <col style="width: 20%;">
                            <col style="width: 9%;"/>
                            <col style="width: 9%;">
                            <col style="width: 16%;">
                            <col style="width: 13%;">
                          <tr>
                            <th width = 50px>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th width = 50px></th>
                            <th width = 50px></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql = 'select * from aboutus_member';
                            $aList = executeResult($sql);
                            $index = 1;
                            foreach($aList as $item){
                              echo'<tr style="text-align: center;">
                              <td>'.$index++.'</td>
                              <td><img src="../image/shop/'.$item['image'].'"></td>
                              <td>'.$item['name'].'</td>
                              <td>'.$item['job'].'</td>
                              <td><a href="'.$item['facebook'].'">Link</a></td>
                              <td><a href="'.$item['twitter'].'">Link</a></td>
                              <td>
                                <a href="page-about-us-member.php?id='.$item['id'].'"><button class="btn btn-warning">Detail/Edit</button></a>
                              </td>
                              <td>
                                <button class="btn btn-danger" onclick="deleteMember('.$item['id'].')">Delete</button>
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
		function deleteContent(id){
			var option = confirm('Do you want to delete this content?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/page-about-us-content.php',{
				'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}

      function deleteMember(id){
			var option = confirm('Do you want to delete this member?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/page-about-us-member.php',{
				'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
	</script>
</html>

