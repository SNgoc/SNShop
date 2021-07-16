<?php
require_once('../db/dbhelper.php');
require_once('../common/utility.php');
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = 'select * from event where id = "'.$id.'"';
    $product=executeSingleResult($sql);
    if($product!=null){
        $id=$product['id'];
        $title = $product['title'];
        $description = $product['description'];
        $startingday = $product['startingday'];
        $endday = $product['endday'];
        $content = $product['content'];
        $image = $product['image'];
        $id_discount = $product['id_discount'];
        $topic_id = $product['topic_id'];
    }
}
?>
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
  <title>Event Edit</title>
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
        <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"></h4>
                  <div class="row" style="margin-top:10px;">
                    <div class="col-sm-12 text-left" ><a href="event.php" style="color:black; margin-right:12px;" ><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg></a></div>
                
                  </div>
                  <div class="row">
                    <div class="col-lg-12"><h3 style="text-align:right;box-shadow:cadetblue 1px 2px; padding-right:8px; "><i> Edit Event</i></h3></div>
                    <div class="col-lg-12">
                      
                      <form method="post"  enctype="multipart/form-data" action="event/processevent_Edit.php">                      
                      
                          <input type="text" class="form-control"name = "id" value="<?=$id?>" hidden>

                          <!-- // -->
                          <div><b>EVENT NAME</b></div>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <input type="text" class="form-control"name = "title" value="<?=$title?>">
                          </div>
                        <!--//-->
                        <div><b>Topic</b></div>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <select class="form-control" name ="topic_id" id="topic_id" require>
                                    <option> -- Select Code-- </option>
                                                        <?php
                                                        $sql = 'select * from event_tp';
                                                        $brandList = executeResult($sql);
                                                        foreach($brandList as $item){
                                                          if($item['id']==$topic_id){
                                                                echo '<option selected value="'.$item['id'].'"> '.$item['name_tp'].' </option>';  
                                                            }else{
                                                              echo '<option value="'.$item['id'].'"> '.$item['name_tp'].' </option>';  
                                                            } 
                                                          }
                                                        ?>                                
                                </select>        
                          </div>                         
                          <!-- // -->
                      
                          <div><b>Starting Day of Event</b></div>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <input type="date" class="form-control" name="startingday"
                          id="startingday" value="<?php echo $startingday?>">
                          </div>
                          <!--//-->
                          <div><b>End Day of Event</b></div>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <input type="date" class="form-control" name="endday" id="endday" value="<?php echo $endday?>">
                          </div>
                          <!--//-->
                          <div><b>Description Event</b></div>
                          <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <textarea name="description" id="description" cols="100" rows="5"  class="form-control"><?php echo $description; ?></textarea>
                          </div>
                        <!--//-->
                        <div><b>Picture-Description</b></div>
                         <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                          </div>
                          <input type="file" name="picturedescription" class="form-control" >
                        </div>
                        <?php
                            if ($image && $image != '') {
                                ?>
                                <div><img src="../image/blog/<?php echo $image; ?>" alt="picturedescription" style =" min-height:250px; max-height: 250px; min-width: 755px; max-width:1000px;" alt="image-blog"></div>
                                <?php
                            }
                        ?>
                        <!--//-->
                         <h4>New Content</h4>
                         <textarea name="content" id="ckeditor1" cols="30" rows="10"><?php echo $content; ?></textarea>
                         <script  type="text/javascript">CKEDITOR.replace('ckeditor1');</script>
                        <input type="submit" name = "submit" value="Gửi">
                      </form>                
                    </div>				
                  </div>
                  <!-- table -->
                </div>
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

