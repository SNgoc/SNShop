<?php
require_once('../db/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Page-home</title>
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

        
            <div class="panel-heading">
              <h2 class="text-center">Home Page Information</h2>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Slider</h4>
                  <a href="page-home-slider.php">
                    <button class="btn btn-success" style="margin-bottom: 15px;">Add Slide</button>
                  </a> 
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th width=5%>#</th>
                          <th width=20%>Image</th>
                          <th width=15%>Title1</th>
                          <th>Title2</th>
                          <th>Title3</th>
                          <th width=6%>Link</th>
                          <th width=21%></th>
                        </tr>
                      </thead>
                      <tbody>
<?php
$sql = 'select * from page_home_slider';
$slider=executeResult($sql);
$index= 1;
foreach($slider as $item){
    echo'
                         
                        <tr>
                          <td width="5%" height="100px">'.$index++.'</td>
                          <td width="8%"><img style="width: 150px; height: auto;" src="../image/shop/'.$item['image'].'" height="200px" alt=""></td>
                          <td width="20%"> '.$item['title1'].' </td>
                          <td width="20%"> '.$item['title2'].' </td>
                          <td width="20%"> '.$item['title3'].' </td>
                          <td width="20%"><a href="'.$item['link'].'">link</a>  </td>
                          <td>
                                <a href="page-home-slider.php?id='.$item['id'].'"><button class="btn btn-warning">Edit</button></a>
                                <button class="btn btn-danger" onclick="deleteSlider('.$item['id'].')">Delete</button>
                          </td>
                        </tr>
        ';}
?>                    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Testimonial</h4>
                  <a href="page-home-feedback.php">
                    <button class="btn btn-success" style="margin-bottom: 15px;">Add Testimonial</button>
                  </a> 
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th width=5%>#</th>
                          <th width=7.5%>Image</th>
                          <th width=15%>Name</th>
                          <th>Testimonial</th>
                          <th  width=21%></th>
                        </tr>
                      </thead>
                      <tbody>
<?php
$sql = 'select * from page_home_feedback';
$feedback=executeResult($sql);
$index= 1;
foreach($feedback as $item){
  if(strlen($item['feedback'])>70){
    $item['feedback'] = (substr($item['feedback'],0,70));
  }
    echo'
                         
                        <tr>
                          <td width="5%" height="10 0px">'.$index++.'</td>
                          <td><img src="../image/shop/'.$item['image'].'" height="200px" alt=""></td>
                          <td> '.$item['name'].' </td>
                          <td> '.$item['feedback'].'... </td>
                          <td>
                                <a href="page-home-feedback.php?id='.$item['id'].'"><button class="btn btn-warning">Edit</button></a>
                                <button class="btn btn-danger" onclick="deleteFeedback('.$item['id'].')">Delete</button>
                          </td>
                        </tr>
        ';}
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
		function deleteSlider(id){
			var option = confirm('Do you want to delete this slide?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/page-home-slider.php',{
				'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
    function deleteFeedback(id){
			var option = confirm('Do you want to delete this feedback?')	
			if (!option){
				return;
			}
			console.log(id)
			//ajax - xu ly lenh post
			$.post('ajax/page-home-feedback.php',{
				'id':id,
				'action': 'delete'
			},function(data){
				location.reload()
			})
		}
	</script>

</html>

