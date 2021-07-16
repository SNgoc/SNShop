<?php
require_once('../db/dbhelper.php');
    //luu vao db
    if(!empty($_POST)){
        $admin=$_POST['admin'];
        $password1=$_POST['password1'];
        $password2=$_POST['password2'];
        $sql= 'select * from admin';
        $adminList= executeResult($sql);
        $check = false;
        foreach($adminList as $item){
            if(strtolower($admin) == strtolower($item['admin'])){
                $check = true;
                break;
            }
        }
        if($check == true){
            header('Location: admin-add.php?error1=1');
        }else{
            if( ($password1==$password2) ){
                date_default_timezone_set('Asia/Saigon');
                $created_at=$updated_at= date('Y-m-d H:s:i');
                $sql = 'insert into admin (admin,password,created_at) 
                values("'.$admin.'","'.$password1.'","'.$created_at.'")';            
                execute($sql);    
                header('Location:admin.php');
            }else{
                header('Location: admin-add.php?error2=2');
            }
        }              
}
$error='';
if(isset($_GET['error1'])){
    $error = 'Admin account already exists';
}
if(isset($_GET['error2'])){
    $error = 'Password does not match';
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
				<h2 class="text-center">Add Admin</h2>
			</div>
            <div style="color:red; text-align:center;">
                <p><?php  $error?></p>
            </div>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="admin">Admin:</label>
                        <p style="color: red;"> <?php echo $error; ?></p>
                        <input required="true" type="text" class="form-control" id="admin" name="admin">
                        <label for="password1">Password:</label>
                        <input type="password" class="form-control" id="password1" name="password1" required>
                        <label for="password2">Confirm Password:</label>
                        <input type="password" class="form-control" id="password2" name="password2" required>

                        <label for="showpass" style="margin-block-start: 10px;">Show Password:</label>
                        <input type="checkbox" class="form-control" onclick="myFunction()" id="showpass" style="width: 30px;">
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
  <!-- Show Password -->
  <script>
    function myFunction() {
        var pass1 = document.getElementById("password1");
        if (pass1.type === "password") {
            pass1.type = "text";
        } else {
            pass1.type = "password";
        }
    }
  </script>
</body>
</html>

