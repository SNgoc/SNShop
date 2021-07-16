<?php
require_once('../db/dbhelper.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql='select* from product where id='.$id;
    $product=executeSingleResult($sql);
    if($product!=null){
        $name = $product['name'];
        $size36 = $product['size36'];
        $size37 = $product['size37'];
        $size38 = $product['size38'];
        $size39 = $product['size39'];
        $size40 = $product['size40'];
        $size41 = $product['size41'];
        $size42 = $product['size42'];
        $size43 = $product['size43'];
    }
}
if(!empty($_POST)){
    if(isset($_POST['size36'])){
        $size36 = $size36 + $_POST['size36'];
    }
    if(isset($_POST['size37'])){
        $size37 = $size37 + $_POST['size37'];
    }
    if(isset($_POST['size38'])){
        $size38 = $size38 + $_POST['size38'];
    }
    if(isset($_POST['size39'])){
        $size39 = $size39 + $_POST['size39'];
    }
    if(isset($_POST['size40'])){
        $size40 = $size40 + $_POST['size40'];
    }
    if(isset($_POST['size41'])){
        $size41 = $size41 + $_POST['size41'];
    }
    if(isset($_POST['size42'])){
        $size42 = $size42 + $_POST['size42'];
    }
    if(isset($_POST['size43'])){
        $size43 = $size43 + $_POST['size43'];
    }
    date_default_timezone_set('Asia/Saigon');
    $updated_at= date('Y-m-d H:s:i');
    $sql ='update product set updated_at="'.$updated_at.'", size36='.$size36.',size37='.$size37.',
        size38='.$size38.', size39='.$size39.',size40='.$size40.',size41='.$size41.',size42= '.$size42.',
        size43='.$size43.' where id ='.$id; 
    execute($sql); 
    header('Location: all-products.php');
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
          
        <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Stock Management</h4>
                  <p class="card-description">
                    <?=$name?>
                  </p>
                  <form class="forms-sample" method="post">
                    <div> size 36</div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Already Available</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?=$size36?>" disabled>
                      </div>
                      <label for="size36" class="col-sm-3 col-form-label">Stock You Want To Add</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="size36" name="size36" min=0 value=0>
                      </div>
                    </div>
                    <div> size 37</div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Already Available</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?=$size37?>" disabled>
                      </div>
                      <label for="size37" class="col-sm-3 col-form-label">Stock You Want To Add</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="size37" name="size37" min=0 value=0>
                      </div>
                    </div>
                    <div> size 38</div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Already Available</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?=$size38?>" disabled>
                      </div>
                      <label for="size38" class="col-sm-3 col-form-label">Stock You Want To Add</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="size38" name="size38" min=0 value=0>
                      </div>
                    </div>
                    <div> size 39</div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Already Available</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?=$size39?>" disabled>
                      </div>
                      <label for="size39" class="col-sm-3 col-form-label">Stock You Want To Add</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="size39" name="size39" min=0 value=0>
                      </div>
                    </div>
                    <div> size 40</div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Already Available</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?=$size40?>" disabled>
                      </div>
                      <label for="size40" class="col-sm-3 col-form-label">Stock You Want To Add</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="size40" name="size40" min=0 value=0>
                      </div>
                    </div>
                    <div> size 41</div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Already Available</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?=$size41?>" disabled>
                      </div>
                      <label for="size41" class="col-sm-3 col-form-label">Stock You Want To Add</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="size41" name="size41" min=0 value=0>
                      </div>
                    </div>
                    <div> size 42</div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Already Available</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?=$size42?>" disabled>
                      </div>
                      <label for="size42" class="col-sm-3 col-form-label">Stock You Want To Add</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="size42" name="size42" min=0 value=0>
                      </div>
                    </div>
                    <div> size 43</div>
                    <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Already Available</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?=$size43?>" disabled>
                      </div>
                      <label for="size43" class="col-sm-3 col-form-label">Stock You Want To Add</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="size43" name="size43" min=0 value=0>
                      </div>
                    </div>
                    
                   
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
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

