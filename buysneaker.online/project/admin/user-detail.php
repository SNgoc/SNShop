<?php
require_once('../db/dbhelper.php');
if(isset($_GET['id'])){
  $id= $_GET['id'];
  $sql = 'select * from user where id = "'.$id.'"';
  $userResult=executeSingleResult($sql);
  if($userResult!=null){
    $id= $userResult['id'];
    $email = $userResult['email'];
    $name = $userResult['name'];
    $password = $userResult['pass'];
    $created_at = $userResult['created_at'];
    $updated_at = $userResult['updated_at'];
    $login = $userResult['login'];
  }
  $sql='select * from orderdetail where id_user='.$id;  
  $order = executeResult($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User Detail</title>
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
              <div class="panel-heading">
                <h2 class="text-center">User Detail</h2>
              </div>
              
                <div class="panel-body">
             
                                  <div style="height:20px;"></div>                          
                                <div class="panel-heading">
                                  <h4 class="panel-title"> User information  </h4>
                                </div>                                   
                                <div>
                                        <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                      <tbody>
                                                            <tr>        
                                                                <td><strong> User</strong></td>
                                                                <td><?=$name?></td>
                                                            </tr>
                                                            <tr>    
                                                                <td><strong> Full Name </strong></td>
                                                                <td><?=$name?>  </td>
                                                            </tr>
                                                            <tr>        
                                                                <td><strong> Email </strong></td>
                                                                <td ><?=$email?></td>
                                                            </tr>
                                                            <tr>        
                                                                <td><strong> Created At </strong></td>
                                                                <td><?=$created_at?></td>
                                                            </tr>
                                                            <tr>        
                                                                <td><strong> Updated At </strong></td>
                                                                <td> <?=$updated_at?></td>
                                                            </tr>  
                                                            <tr>        
                                                                <td><strong> Login with </strong></td>
                                                                <td><?=$login?></td>
                                                            </tr>                                                                                                                                                
                                                      </tbody>
                                                    </table>
                                                </div>                                            
                                        </div>
                                </div>

                                </div>
                              </div>
                            </div>
                          </div>
        <div class="content-wrapper">
          <div class="card">  
            <div class="card-body">
              <div class="panel-heading">
                <h3 class="text-center"> Order history </h3>
              </div> 

          <!-- <div style="height:50px;"></div> -->
        
                                    <div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12">                                                   
                                                <div class="wishlist-content">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover">
                                                                <thead>                                                            
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Image</th>
                                                                        <th>Product</th>
                                                                        <th>Size</th>  
                                                                        <th>Unit Price</th>  
                                                                        <th>Quantity</th> 
                                                                        <th>Price</th>              
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
<?php
$index=1;
foreach($order as $item){
  $sql = 'select * from product_thumbnail where id_product ='.$item['id_product']; 
  $thumbnail = executeSingleResult($sql); 
        echo'                                                                   
                                                                    <tr>
                                                                        <td>'.$index++.'</td>
                                                                        <td><img src="../'.$thumbnail['thumbnail'].'" alt=""></td>
                                                                        <td>'.$item['name'].'</td>
                                                                        <td>'.$item['size'].'</td>
                                                                        <td>'.$item['price'].'</td>
                                                                        <td>'.$item['quantity'].'</td>
                                                                        <td>'.$item['quantity']*$item['price'].'</td>                                                              
                                                                    </tr>
         ';
}
?>                                                                  
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
         
        </div>
      
        
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

