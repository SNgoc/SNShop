

<?php
require_once('../db/dbhelper.php');
require_once('../common/utility.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Create New Event</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
  
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php require_once('layout/header.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php require_once('layout/left-menu.php');?>
      <!-- partial -->
      <div class="main-panel">
       <div class="container-fluid bg-light text-dark">
       <div class="row" style="margin-top:15px;margin-left:20px;">
            <div class="col-sm-12 text-left" ><a href="event.php" style="color:black; margin-right:12px;" ><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg></a></div>
                
            </div>
          <div class="row">
            <h3 class="text-left" style="margin-top:20px;margin-left:20px;">Create Event</h3>
          </div>
          <hr class="mt-5" style="background-color: black;">
          <div class="row" style="margin-bottom:50px;">                 
                    <div class="col-sm-12">
                      <form method="post"  enctype="multipart/form-data" action="event/processadd.php" style="margin-top:60px; margin-left:120px; margin-right:120px;">
                          <!-- <div><b>Compaign Name</b></div>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">                           
                            <span class="input-group-text"></span>
                          </div>
                          <input type="text" class="form-control"name = "compaign">
                          </div>
                        // -->

                          <div><b>Event Name</b></div>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <input type="text" class="form-control"name = "title" placeholder="Add Name Event" required>
                          </div>
                          <!-- / -->
                          <div><b>Topic</b></div>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <select class="form-control" name ="topic_id" id="topic_id" required >
                            <option value="">Choose one...</option>
                              <?php
                              $sql = 'select * from event_tp';
                              $brandList = executeResult($sql);
                              foreach($brandList as $item){

                                      echo '<option value="'.$item['id'].'"> '.$item['name_tp'].' </option>';  
                                  }   
                              
                              ?>                                
                          </select>        
                          </div>                         
                          
                        <!--//-->

                       
                          <div><b>Starting Day of Event</b></div>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <input type="date" class="form-control" name="startingday" id="startingday" required>
                          </div>
                          <!--//-->
                          <div><b>End Day of Event</b></div>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <input type="date" class="form-control" name="endday" id="endday" required>
                          </div>
                          <!--//-->
                          <div><b>Description Event</b></div>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <textarea name="description" id="description" cols="100" rows="5"  class="form-control"></textarea>
                          </div>
                        <!--//-->
                        <div><b>Picture-Description</b></div>
                         <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <input type="file" name="picturedescription" class="form-control">
                        </div>
                        <!--//-->
                         <h4>New Content</h4>
                         <textarea name="content" id="ckeditor1" cols="30" rows="10"></textarea>
                         <script  type="text/javascript">CKEDITOR.replace('ckeditor1');</script>
                        <input type="submit" value="Public" style="display:block; margin-top:10px;" >
                      </form>                
                    </div>				
                  </div>
       </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include('layout/footer.php');?>
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
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  <script>
             startingday.min = new Date().toISOString().split("T")[0];
             $('#startingday').change(function(){
               var sdate = $(this).val();
               console.log(sdate);
              endday.min = sdate;
             });
            


        </script>
      
</body>

</html>

