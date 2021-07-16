<?php
require('../db/dbhelper.php');
if(!empty($_POST)){
    if(isset($_POST['code'])){
        $code = $_POST['code'];
        $code = str_replace('"', '\\"', $code);
    }
    if(isset($_POST['amount'])){
        $amount = $_POST['amount'];
    }
    if(isset($_POST['used'])){
        $used = $_POST['used'];
    }
    if(isset($_POST['required'])){
        $required = $_POST['required'];
    }
    if(isset($_POST['discount'])){
        $discount = $_POST['discount'];
    }
    $token = substr(md5(uniqid(rand(),1)),3,10);
    //luu vao db
    $sql = 'insert into discount(code,amount,used,required,discount,token) 
    values ("'.$code.'","'.$amount.'","'.$used.'","'.$required.'","'.$discount.'","'.$token.'")';
    execute($sql); 
        
    header('Location:discount.php');   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Discount Code</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
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
            
            <div class="row">
                <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-name">Add Discount Code</h4>
                    <form class="form-sample" method="post">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="code">Code:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" required="true" id="code" name="code"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="status">Status:</label>
                            <div class="col-sm-9">
                                <select class="form-control" name ="status" id="status">
                                <option> -- Select Status -- </option>
                                <option selected value="active">Active</option>
                                <option value="active">Deactive</option>                                
                                </select>                               
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="discount">Discount Value </label>
                                <div class="col-sm-9">
                                    <input required="true" type="number" class="form-control" 
                                    id="discount" name="discount" min="1">
                                </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="required">required value:</label>
                                <div class="col-sm-9">
                                <input required="true" type="number" class="form-control" 
                                    id="required" name="required" min="0"> 
                                </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="amount">Amount Code:</label>
                                <div class="col-sm-9">
                                    <input required="true" type="number" class="form-control" 
                                    id="amount" name="amount" min="1"> 
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                <button class="btn btn-success">Lưu</button>
                                </div>
                                </div>
                            </div>
                        </div>                         
                    </form>
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
</body>

<script> 
    function delete_oldImage(){
        var oldImage = document.getElementById('oldImage');
        oldImage.remove(); 
    }
    function previewImages() {
        var $preview = $('#preview-image').empty();
        if (this.files) $.each(this.files, readAndPreview);
        function readAndPreview(i, file) {        
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
                return alert(file.name +" is not an image");
                file.delete();
            } // else...    
            var reader = new FileReader();
            $(reader).on("load", function() {
                $preview.append($("<img/>", {src:this.result, height:100}));
                });
                reader.readAsDataURL(file);        
        }
    }   
    $('#input-image').on("change", previewImages);
</script>

</html>

