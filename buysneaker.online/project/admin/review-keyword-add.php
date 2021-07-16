<?php
require_once('../db/dbhelper.php');
    //luu vao db
    if(!empty($_POST)){
        $keyword=$_POST['keyword'];
        $sql= 'select * from review_filter';
        $keywordList= executeResult($sql);
        $check = false;
        foreach($keywordList as $item){
            if($keyword === $item['keyword']){
                $check = true;
                break;
            }
        }
        if($check == true){
            header('Location: review-keyword-add.php?error1=1');
        }else{
                $sql = 'insert into review_filter (keyword) 
                values("'.$keyword.'")';            
                execute($sql);    
                header('Location:review.php');
            }
        }              
$error='';
if(isset($_GET['error1'])){
    $error = 'Keyword already exists';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Admin</title>
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
          
            <div class="panel-heading">
				<h2 class="text-center">Add Keyword</h2>
			</div>
            <div style="color:red; text-align:center;">
                <p><?php  $error?></p>
            </div>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="admin">Keyword:</label>
                        <p style="color: red;"> <?php echo $error; ?></p>
                        <input required="true" type="text" class="form-control" id="keyword" name="keyword">
                    </div>
                    <button class="btn btn-success">Save</button>
                </form>
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
</html>

