<?php
require_once('../db/dbhelper.php');
$id=$title=$href_param='';
if(!empty($_POST)){
    if(isset($_POST['title'])){
        $title = $_POST['title'];
        $title = str_replace('"', '\\"', $title);
    }
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    $href_param=convert_name($title);

    //luu vao db
    if(!empty($title)){
        date_default_timezone_set('Asia/Saigon');
        $updated_at= date('Y=m-d H:s:i');
        $sql ='update menu set title = "'.$title.'",updated_at="'.$updated_at.'",
        href_param="'.$href_param.'" where id ='.$id;
        execute($sql);    
        header('Location:manage-menu.php');
        die();
    }
}

//lay db tu id bang get
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = 'select * from menu where id = "'.$id.'"';
    $category=executeSingleResult($sql);
    if($category!=null){
        $title = $category['title'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RoyalUI Admin</title>
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
          
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="text-center">Edit Menu</h2>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">Menu Title:</label>
                                <input type="text" name="id" value="<?=$id?>" hidden="true">
                                <input required="true" type="text" class="form-control" id="title" name="title" value="<?=$title?>">
                            </div>
                            <button class="btn btn-success">Save</button>
                        </form>
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

</html>

