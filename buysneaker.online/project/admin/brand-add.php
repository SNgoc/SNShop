<?php
require_once('../db/dbhelper.php');
$id=$name=$image=$href_param=$isActive='';
if(!empty($_POST)){
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $name = str_replace('"', '\\"', $name);
    }
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    if(isset($_POST['isActive'])){
        $isActive = $_POST['isActive'];
    }
    if(!empty($_FILES['image']['name'])){
        $uploadPath = '../image/shop';
        move_uploaded_file($_FILES['image']['tmp_name'],$uploadPath.'/'.$_FILES['image']['name']);
        $image = $_FILES['image']['name'];
      }   
    $href_param=convert_name($name);

    //luu vao db
    if(!empty($name)){
        date_default_timezone_set('Asia/Saigon');
        $created_at=$updated_at= date('Y=m-d H:s:i');
        $sql = 'select * from brands'; 
        $brandList = executeResult($sql);
        $ordinal = count($brandList) + 1;
        if($id==''){
            $sql = 'insert into brands (name,image,created_at,updated_at,href_param,isActive,ordinal) 
            values("'.$name.'","'.$image.'","'.$created_at.'","'.$updated_at.'","'.$href_param.'","'.$isActive.'","'.$ordinal.'")';          
        }else{
            if(!empty($image)){
                $sql ='update brands set name = "'.$name.'", image = "'.$image.'",updated_at="'.$updated_at.'",
                href_param="'.$href_param.'",isActive="'.$isActive.'" where id ='.$id;
            }else{
                $sql ='update brands set name = "'.$name.'",updated_at="'.$updated_at.'",
                href_param="'.$href_param.'",isActive="'.$isActive.'" where id ='.$id; 
            }
        } 
        execute($sql);    
        header('Location:brand.php');
    }
}

//lay db tu id bang get
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = 'select * from brands where id = "'.$id.'"';
    $category=executeSingleResult($sql);
    if($category!=null){
        $name = $category['name'];
        $image = $category['image'];
        $isActive = $category['isActive'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Brand</title>
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
				<h2 class="text-center">Add/Edit Brand</h2>
			</div>
            <div class="panel-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Brand Name:</label>
                        <input type="text" name="id" value="<?=$id?>" hidden="true">
                        <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">                    
                        <label for="isActive">Status</label>
                        <select class="form-control" name ="isActive" id="isActive">
<?php
    if($id != ''){
        if($isActive == 1){
            echo'
                        <option selected value="1"> Active </option>
                        <option value="0"> Deactive </option>
                ';
        }
        if($isActive == 0){
            echo'
                        <option value="1"> Active </option>
                        <option selected value="0"> Deactive </option>
                ';
        }
    }else{
        echo'
                        <option value="1"> Active </option>
                        <option value="0"> Deactive </option>
        ';
    }
?>
                        </select>
                        <label for="name">Brand Image:</label>
                        <input type="file" class="form-control" id="input-image" name="image" onchange="delete_oldImage()">
                                <div id="preview-image"></div> 
                                <div id="oldImage"> 
<?php
  if($id != ''){
  echo'<img src="../image/shop/'.$image.'" style="max-width:100px" id="img_image">';}
?>                      
                                </div>
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

