<?php
require_once('../db/dbhelper.php');
$sql = 'select * from brands ORDER BY ordinal'; 
$brandList = executeResult($sql);
$ordinalList = array();

if(!empty($_POST)){
    //lay gia tri trong lenh post ra, add vao mang
    $index =1;
    foreach($brandList as $item){
        if(isset($_POST[$item['id']])){
            $ordinalList[$index] = $_POST[$item['id']];
            $index++;
        }      
    } 
    //check xem có gia trị nào trùng không
    $check = true;
    for($i=1; $i <= count($ordinalList); $i++){
        for($j = $i+1 ; $j<= count($ordinalList); $j++){
            if($ordinalList[$i] == $ordinalList[$j]){ 
                $check = false;
                break;
            }
        }
    }
    //add vào db
    if($check == true){ 
        foreach($brandList as $item){
            if(isset($_POST[$item['id']])){
                $sql ='update brands set ordinal = "'.$_POST[$item['id']].'" where id ="'.$item['id'].'"';  
                execute($sql); 
            }
        }          
        header('Location:brand.php');  
    }else{
        header('Location:brand-ordinal.php?error=1');  
    }
     
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Change Brand Ordinal</title>
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
				<h2 class="text-center">Change Brand Ordinal</h2>
			</div> 
            <div class="panel-body">
<?php
if(isset($_GET['error'])){
    echo '<div style="color:red;"> Ordinals cannot be duplicated</div>';
}
?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
<?php
foreach($brandList as $list){
    echo '                     
                        <label for="'.$list['name'].'">'.$list['name'].'</label>
                        <select class="form-control" name ="'.$list['id'].'" id="'.$list['name'].'">
         ';
    foreach($brandList as $item){
        if($item['ordinal'] == $list['ordinal']){
            echo '      <option selected value="'.$item['ordinal'].'"> '.$item['ordinal'].' </option>';
        }else{
            echo '      <option value="'.$item['ordinal'].'"> '.$item['ordinal'].' </option>';  
        }   
    }
    echo'
                        </select>
    ';
}    
?>                                                           
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

