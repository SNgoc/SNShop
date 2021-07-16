<?php
include('../db/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <name></name>
  <title>Location Store</title>
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
    <?=require_once('layout/header.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?=require_once('layout/left-menu.php');?>
      <!-- partial -->
      <div class="main-panel" style="margin-bottom:10px;"  >
        <div class="content-wrapper p-3 mb-2 bg-secondary text-white">
            
            <div class="row" style="margin-top:60px;">
                    <div class="col-sm-12" >
                        <h4 class="text-center">Input Location of Store in Google Map</h4>
                        <form action="get_map.php" method="post" style="margin-top:60px; margin-left:160px; margin-right:100px;">
                        <div class="input-group mb-3">                           
                            <input type="text" class="form-control" id="location" aria-label="Recipient's username" aria-describedby="basic-addon2"type="text" name="location" placeholder="Location with map " required >
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" style="background-color:cadetblue; color:black;">Button</button>
                            </div>
                        </div>
                        </form>
                        <hr class="mt-5">
                        <h5>Instruction</h5>
                        <p>* Access to the website <a href="https://www.google.com/maps/@9.779349,105.6189045,11z?hl=vi-VN">Google Map</a></p>
                        <p>* Search Your Store Location in tool bar</p>
                        <p>* Select Share Map & copy link HTML of Address Store</p>
                        <p>* Pass value in to Input Address of Store in Google Map </p>
                    </div>      
            </div>
        
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <?=include('layout/footer.php');?>
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

<!-- <script> 
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
</script> -->

</html>

