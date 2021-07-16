<?php
require_once('../db/dbhelper.php');

$phone=$email=$slogan='';
//lay thong tin tu db
$sql = 'select * from information';
$information=executeSingleResult($sql);
if($information!=null){
  $id = $information['id'];
  $phone = $information['phone'];
  $email = $information['email'];
  $slogan = $information['slogan'];
}

if(!empty($_POST)){
  if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
  }
  if(isset($_POST['email'])){
    $email = $_POST['email'];
    $email = str_replace('"', '\\"', $email);
  }
  if(isset($_POST['slogan'])){
    $slogan = $_POST['slogan'];
    $slogan = str_replace('"', '\\"', $slogan);
  }
  if(isset($_POST['id'])){
    $id = $_POST['id'];
  }
  if(!empty($_FILES['logoHeader']['name'])){
    $uploadPath = '../image/shop';
    move_uploaded_file($_FILES['logoHeader']['tmp_name'],$uploadPath.'/'.$_FILES['logoHeader']['name']);
    $logoHeader = $_FILES['logoHeader']['name'];
    $sql ='update information set logoHeader="'.$logoHeader.'" where id ='.$id;
    execute($sql);
  }
  if(!empty($_FILES['logoFooter']['name'])){
    move_uploaded_file($_FILES['logoFooter']['tmp_name'],$uploadPath.'/'.$_FILES['logoFooter']['name']);
    $logoFooter = $_FILES['logoFooter']['name'];
    $sql ='update information set logoFooter="'.$logoFooter.'" where id ='.$id;
    execute($sql);
  }
  
  //luu vao db
  $sql ='update information set email = "'.$email.'", slogan = "'.$slogan.'", phone = "'.$phone.'" where id ='.$id;  
  execute($sql);
  header('Location:information.php');          
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shop Information</title>
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
				<h2 class="text-center">Shop Information</h2>
			</div>
            <div class="panel-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="text">Phone number:</label>
                        <input type="text" name="id" value="<?=$id?>" hidden="true">
                        <input type="text" class="form-control" id="phone" name="phone" value="<?=$phone?>">

                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$email?>">

                        <label for="slogan">Slogan:</label>
                        <textarea name="slogan" id="slogan" class="form-control" rows="10"><?=$slogan?></textarea>
                        
                        <label>Logo Header: </label>
                        <input type="file" class="form-control" id="input-image-header" name="logoHeader" onchange="delete_oldImage_header()">
                                <div id="preview-image-header"></div> 
                                <div id="oldImageHeader"> 
<?php
$sql = 'select * from information';
$logo = executeSingleResult($sql); 
  echo'<img src="../image/shop/'.$logo['logoHeader'].'" style="max-width:100px" id="img_image">';
?>                      
                                </div>

                                <label>Logo Footer: </label>
                        <input type="file" class="form-control" id="input-image-footer" name="logoFooter" onchange="delete_oldImage_footer()">
                                <div id="preview-image-footer"></div> 
                                <div id="oldImageFooter"> 
<?php
$sql = 'select * from information';
$logo = executeSingleResult($sql); 
  echo'<img src="../image/shop/'.$logo['logoFooter'].'" style="max-width:100px" id="img_image">';
?>                      
                                </div>

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
<script> 
    function delete_oldImage_header(){
        var oldImageHeader = document.getElementById('oldImageHeader');
        oldImageHeader.remove(); 
    }
    function previewImagesHeader() {
        var $preview = $('#preview-image-header').empty();
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
    $('#input-image-header').on("change", previewImagesHeader);
</script>
<script> 
    function delete_oldImage_footer(){
        var oldImageFooter = document.getElementById('oldImageFooter');
        oldImageFooter.remove(); 
    }
    function previewImagesFooter() {
        var $preview = $('#preview-image-footer').empty();
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
    $('#input-image-footer').on("change", previewImagesFooter);
</script>

</html>

