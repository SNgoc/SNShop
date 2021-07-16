<?php
require('../db/dbhelper.php');
$id=$image=$name=$job=$facebook=$twitter='';
    if(!empty($_POST)){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if(isset($_POST['image'])){
            $image = $_POST['image'];
        }
        if(isset($_POST['name'])){
            $name = $_POST['name'];
        }
        if(isset($_POST['job'])){
            $job = $_POST['job'];
        }
        if(isset($_POST['facebook'])){
            $facebook = $_POST['facebook'];
        }
        if(isset($_POST['twitter'])){
            $twitter = $_POST['twitter'];
        }
        if(!empty($_FILES['image']['name'])){
            $uploadPath = '../image/shop';
            move_uploaded_file($_FILES['image']['tmp_name'],$uploadPath.'/'.$_FILES['image']['name']);
            $image = $_FILES['image']['name'];
          }
        if(!empty($name)){
            if($id==''){
                $sql = 'INSERT INTO aboutus_member(image, name, job, facebook, twitter) VALUES ("'.$image.'", "'.$name.'", "'.$job.'", "'.$facebook.'", "'.$twitter.'")';
            }else{
                if(!empty($image)){
                    $sql ='UPDATE aboutus_member SET image = "'.$image.'", name = "'.$name.'", job = "'.$job.'", facebook = "'.$facebook.'", twitter = "'.$twitter.'" WHERE id ='.$id;
                }else{
                    $sql ='UPDATE aboutus_member SET name = "'.$name.'", job = "'.$job.'", facebook = "'.$facebook.'", twitter = "'.$twitter.'" WHERE id ='.$id;
                }                
            }
        }
    execute($sql);
    header('Location:page-about-us.php');
    die();
    }

//lay du lieu bang phuong thuc get truyen qua
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = 'select * from aboutus_member where id = "'.$id.'"';
    $member=executeSingleResult($sql);
    if($member!=null){
        $id = $member['id'];
        $image = $member['image'];
        $name = $member['name'];
        $job = $member['job'];
        $facebook = $member['facebook'];
        $twitter = $member['twitter'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add/Edit Member</title>
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
          
        <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                        <h4 class="card-name">Detail/Edit Member</h4>
                        <form class="form-sample" method="post" enctype="multipart/form-data">
                            <p class="card-description">
                            Member Information
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-2" style="margin: auto;">
                                        <?php
                                            $sql = 'select * from aboutus_member_image where member_id ='.$id;
                                            $imageList = executeResult($sql); 
                                            foreach($imageList as $item){
                                                echo'<span><img src="../../'.$item['image'].'" style="max-width:100px" id="img_image"></span>';
                                            }
                                        ?>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="name">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?=$id?>" name="id" hidden="true">
                                            <input type="text" class="form-control" required="true" 
                                                id="name" name="name" value="<?=$name?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="job">Job</label>
                                        <div class="col-sm-9">
                                                <input type="text" class="form-control" required="true" 
                                                    id="job" name="job" value="<?=$job?>" />          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="facebook">Facebook</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" required="true" 
                                                id="facebook" name="facebook" value="<?=$facebook?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="twitter">Twitter</label>
                                        <div class="col-sm-9">
                                                <input type="text" class="form-control" required="true" 
                                                    id="twitter" name="twitter" value="<?=$twitter?>" />          
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="image">Image</label>
                                        <div class="col-sm-9">
                                                <input type="file" class="form-control" required="true" 
                                                    id="image" name="image"/> 
                                                    <div id="preview-image"></div> 
                                                    <div id="oldImage"> 
<?php
  echo'<img src="../image/shop/'.$image.'" style="max-width:100px" id="img_image">';
?>                      
                                                     </div>         
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                                <button class="btn btn-success">Save</button>
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

