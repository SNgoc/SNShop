<?php
require_once('../db/dbhelper.php');
$user=$phone=$email=$address=$payment=$note='';
//lay db tu id bang get
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = 'select orders.*, order_process.process, order_process.color, user.email
            from orders left join order_process on orders.id_process = order_process.id
            left join user on orders.id_user = user.id
            where orders.id ='.$id; 
    $result=executeSingleResult($sql);
    if($result!=null){
        $user = $result['name'];
        $phone = $result['phone'];
        $email = $result['email'];
        $address = $result['address'];
        $payment = $result['payment'];
        $note = $result['note'];
        $total = $result['total'];
        $id_process =$result['id_process'];
        $process =$result['process'];
        $discount =$result['discount'];
        $created_at = $result['created_at'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Order Detail</title>
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
				<h2 class="text-center">Order Information</h2>
			</div>
            <div class="panel-body">        
                <div class="col-md-12">  
                <div class="row">                                                                                        
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <form action="" method="post">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>        
                                            <td width="25%"><strong> User</strong></td>
                                            <td class="text-primary">
                                                <input type="text" value="<?=$user?>" disabled  class="form-control"> 
                                                <input type="text" name="id" value="<?=$id?>" hidden>
                                            </td>
                                        </tr>
                                        <tr>    
                                            <td> <strong> Phone</strong></td>
                                            <td class="text-primary">
                                                <input type="text" name="phone" value="<?=$phone?>"  class="form-control">     
                                            </td>
                                        </tr>
                                        <tr>        
                                            <td><strong> Email </strong></td>
                                            <td class="text-primary">
                                                <input type="email" name="email" value="<?=$email?>"  class="form-control">   
                                            </td>
                                        </tr>
                                        <tr>        
                                            <td><strong> Address </strong></td>
                                            <td><textarea name="note"  rows="6" class="form-control"><?=$address?> </textarea></td>
                                        </tr>
                                        <tr>        
                                            <td><strong> Payment </strong></td>
                                            <td> 
<?php
if($payment == 0){
    $payment = 'by delivery';
}else{
    $payment = 'online';
}
?> 
                                                <input type="text" value="<?=$payment?>" disabled  class="form-control">
                                            </td>
                                        </tr> 
                                        <tr>        
                                            <td><strong> Note </strong></td>
                                            <td><textarea name="note"  rows="6"  class="form-control"><?=$note?></textarea></td>
                                        </tr>  
                                        <tr>        
                                            <td><strong> Created at </strong></td>
                                            <td class="text-primary">
                                                <input type="email" name="email" value="<?=$created_at?>"  class="form-control" disabled>   
                                            </td>
                                        </tr>                                                                
                                        <tr>
                                            <td><button class="btn btn-primary">Edit</button></td>
                                        </tr>                                                                                     
                                    </tbody>
                                </table>
                            </form>
                        </div>       
                    </div>

                    <div class="col-md-6">
                        <table class="table table-bordered table-hover" style="background-color:white; margin-top:30px">
                            <thead>
                                <tr style="background-color:#CDC0B0">
                                    <th width ="5%">No.</th>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
$sql='select * from orderdetail where id_order='.$id; 
$detail= executeResult($sql);
$index=1;
foreach($detail as $item){
    echo'                     
                                <tr>
                                    <td>'.$index++.'</td>
                                    <td>'.$item['name'].'</td>
                                    <td>'.$item['size'].'</td>
                                    <td>'.$item['quantity'].'</td>
                                    <td>'.$item['price'].'</td>
                                </tr>
                                '; }
?>                              
                                <tr>
                                    <td colspan="4" text style="text-align: center">Discount</td>
                                    <td><?=$discount?></td>
                                </tr>
                                <tr>
                                    <th colspan="4" text style="text-align: center">Total</th>
                                    <td><?=$total - $discount?></td>
                                </tr>
                            </tbody>
                        </table>  

                        <div class="panel-heading">
                            <h4 class="text-center" style="margin-top:30px">Order status: <?=$process?> </h4>
<?php
$sql = 'select * from order_process';
$process = executeResult($sql);
$count = 1; 
foreach($process as $item){
    $count++;
    $disabled ='disabled';
    if((($id_process + 1) == $item['id'])){
        $disabled ='';
    }
    echo'                           
                            <button class="btn btn-success" '.$disabled.' onclick="nextStep('.$id.','.$id_process.')">'.$item['process'].'</button>
         ';
    if($count == 5){ break;}
}
?>                               
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
function nextStep(id_order, id_process){
			var option = confirm('Do you want to go to the next step?')	
			if (!option){
				return;
			}
			console.log(id_order,id_process)
			//ajax - xu ly lenh post
			$.post('ajax/order-processing-edit.php',{
				'id_order':id_order,
                'id_process':id_process,
				'action': 'nextStep'
			},function(data){
				location.reload()
			})
		}
</script>
</html>

