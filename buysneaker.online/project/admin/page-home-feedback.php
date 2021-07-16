<?php
require_once('../db/dbhelper.php');

$id=$feedback=$name=$image='';

if(!empty($_POST)){
  if(isset($_POST['name'])){
    $name = $_POST['name'];
    $name = str_replace('"', '\\"', $name);
  }
  if(isset($_POST['feedback'])){
    $feedback = $_POST['feedback'];
    $feedback = str_replace('"', '\\"', $feedback);
  }
  if(isset($_POST['id'])){
    $id = $_POST['id'];
  }
  if(!empty($_FILES['image']['name'])){
    $uploadPath = '../image/shop';
    move_uploaded_file($_FILES['image']['tmp_name'],$uploadPath.'/'.$_FILES['image']['name']);
    $image = $_FILES['image']['name'];
  }
  //luu vao db
      if($id==''){
          if(!empty($image)){
            $sql = 'insert into page_home_feedback (name,feedback,image) 
            values("'.$name.'","'.$feedback.'","'.$image.'")';  
          }else{
            $sql = 'insert into page_home_feedback (name,feedback) 
            values("'.$name.'","'.$feedback.'")'; 
          }                  
      }else{
        if(!empty($image)){
          $sql ='update page_home_feedback set name = "'.$name.'", feedback = "'.$feedback.'", 
            image = "'.$image.'" where id ='.$id;
        }else{
          $sql ='update page_home_feedback set name = "'.$name.'", feedback = "'.$feedback.'"
            where id ='.$id;
        }        
      }
      execute($sql); 
      header('Location:page-home.php');       
}

if(isset($_GET['id'])){
  $id = $_GET['id']; 
  $sql = 'select * from page_home_feedback where id = "'.$id.'"';
  $slider=executeSingleResult($sql);
  if($slider!=null){
    $name = $slider['name'];
    $feedback = $slider['feedback'];
    $image  = $slider['image'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Testimonial</title>
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
              <h2 class="text-center">Add/Edit Testimonial</h2>
            </div>
            <div class="panel-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" value="<?=$id?>" name="id" hidden="true">
                        <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
                        <label for="feedback">Content:</label>
                        <textarea class="form-control" name="feedback" id="feedback" cols="30" rows="10"><?=$feedback?></textarea>
                        <label for="name">Image:</label>
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

