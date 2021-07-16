<?php
require_once('../db/dbhelper.php');
require_once('../common/utility.php');
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = 'select * from event_tp where id = "'.$id.'"';
    $product=executeSingleResult($sql);
    if($product!=null){
        $id=$product['id'];
        $name = $product['name_tp'];
        $description = $product['description_tp'];
    }
}
?>
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
  <title>Category Edit</title>
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
    <div class="container-fluid page-body-wrapper" >
      <!-- partial:partials/_sidebar.html -->
      <?php  require_once('layout/left-menu.php');?>
      <!-- partial -->
        <div class="container-fluid p-3 mb-2 bg-light text-dark" style="margin-top: 25px;">
        <div class="row" style="margin-top:15px;margin-bottom:15px;display:inline-block;" >
            <div style ="display:inline-block;" class="col-sm-12 text-left" ><a href="event_Categories.php" style="color:black; margin-right:12px;" ><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg></a></div>
                
            </div>
            <div class="row">
            <div class="col-sm-12">
            <h3>Edit Category</h3></div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-left" style=" margin-top:10px;">
                    <form style=" margin-top:15px;" method="post" action="event/processcate_Edit.php">
                            <input type="text" class="form-control" name = "id" value="<?=$id?>" hidden>
                            <div class="form-group text-left">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name Categories" value="<?php echo $name?>" >
                                <p>The name is how it appears on your site.</p>
                            </div>
                            <div class="form-group text-left">
                                <label for="exampleFormControlTextarea1" >Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Description Categories"><?php echo $description; ?></textarea>
                                </textarea>
                                <p>The description is not prominent by default; however, some themes may show it.</p>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>              
                </div> 
            </div>
        </div>  
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
