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
                  <div class="row">
                    <div class="col-lg-6">
                      <h4>Reviews from customers</h4>
                      <!-- <a href="sentmail.php">
                        <button class="btn btn-success" style="margin-bottom: 15px;">Sentmail</button>
                      </a> -->
                    </div>                  
                  </div>
                  <!-- table -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        
                          <th >Full Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Comment</th>
                          <th width = 40px></th>
                        </tr>
                      </thead>
                      <tbody>
<?php

                        $query = 'SELECT * FROM contact_form_info_table ORDER BY id DESC';
                     
                        $MANG = [];
                        $result = mysqli_query($link, $query);
                        if ($result){
                            
                        if(mysqli_num_rows($result)>0){
                               while($row = mysqli_fetch_array($result)){
                    echo '<tr>'
                    
                            
                            .'<td>'.$row[1].'</td>'
                            .'<td>'.$row[2].'</td>'
                            .'<td>'.$row[3].'</td>'
                            .'<td>'.$row[4].'</td>'
                       
                        .'</tr>';
                    
                    }
                        mysqli_free_result($result);
                        }
                        else{
                            
                            echo '<tr>'.
                            '<td colspan = "4">No Records</td>'.
                            '</tr>';
                        }
                     
                        }
                        else{
                        echo '<h4> Error with sql command, please';
                        }
                        mysqli_close($link);
                        ?>
            <tr style="height:1px;"><td colspan="9" ></td> </tr>					
                      </tbody>
                    </table>
				<!-- Bai toan phan trang-->       

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
  <script>
    var container = document.getElementById("detail")
    container.style.display = "none"
    function clicked() {
        if (container.style.display == "none") {
            container.style.display  = "block"
        }
        else {
            container.style.display = "none"
        }
    }      
</script> 

</html>

