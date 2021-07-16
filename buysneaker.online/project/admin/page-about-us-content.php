<?php
require('../db/dbhelper.php');
$id=$title=$content='';
    if(!empty($_POST)){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if(isset($_POST['title'])){
            $title = $_POST['title'];
        }
        if(isset($_POST['content'])){
            $content = $_POST['content'];
        }
        if(!empty($title)){
            if($id==''){
                $sql = 'INSERT INTO aboutus_content(title, content) VALUES ("'.$title.'", "'.$content.'")';
                execute($sql);
            }else{
                $sql ='UPDATE aboutus_content SET title = "'.$title.'", content = "'.$content.'" WHERE id ='.$id;
                execute($sql); 
            }
        }
    header('Location:page-about-us.php');
    die();
    }

//lay du lieu bang phuong thuc get truyen qua
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = 'select * from aboutus_content where id = "'.$id.'"';
    $ab=executeSingleResult($sql);
    if($ab!=null){
        $id = $ab['id'];
        $title = $ab['title'];
        $content = $ab['content'];
    }
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
  <!-- Summernote-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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
                        <h4 class="card-name">Detail/Edit About-us</h4>
                        <form class="form-sample" method="post" enctype="multipart/form-data">
                            <p class="card-description">
                            About-us Information
                            </p>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="title">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="id" value="<?=$id?>" hidden>
                                            <textarea  class="form-control" name="title" id="title" rows="2"><?=$title?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="content">Content</label>
                                        <div class="col-sm-9">
                                            <textarea  class="form-control" name="content" id="content" rows="7"><?=$content?></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-success">Save</button>
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

  <script>
  $('#content').summernote({
        placeholder: 'Add content',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
  </script>
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

