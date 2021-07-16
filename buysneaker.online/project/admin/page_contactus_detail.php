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
  <title></title>
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
    <div class="container-fluid page-body-wrapper" >
      <!-- partial:partials/_sidebar.html -->
      <?php  require_once('layout/left-menu.php');?>
      <!-- partial -->
    <div class="container-fluid">
            <div class="row" style="margin-top:45px;margin-bottom:30px; margin-left:30px;">
            <div class="col-sm-12 text-left" ><a href="page_contactus.php" style="color:black; margin-right:12px;" ><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg></a><h3 style="display:inline-block"> Contact Information</h3></div>
                
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-3 ">
                        <table class="table table-hover">
                        <thead>
                        <col style="width: 40%;"/>
                            <col style="width: 60%;"/>
                            <tr>
                            <th >Properties</th>
                            <th>Info</th>                 
                            </tr>
                        </thead>
                        <?php
                            $id = $_GET['id'];
                            $name = "";
                            $email ="";
                            $phone = "";
                            $comment = "";
                            $query = "SELECT * FROM contact_form_info_table WHERE contact_form_info_table.id = $id";
                            $result = mysqli_query($link, $query);
                            if ($result) {
                                if (mysqli_num_rows($result) > 0) {
                                                $row = mysqli_fetch_array($result);
                                                $name = $row['name'];
                                                $email = $row['email'];
                                                $phone = $row['phone'];
                                                $comment = $row['comment'];
                            ?>                                                 
                            <?php
                            echo       
                                '<tr>'. '<td>'.'Full Name'.'</td>'.'<td>'.$name.'</td>'.'</td>'.'<tr>'
                                .'<tr>'.'<td>'.'Email'.'</td>'.'<td>'.$email.'</td>'.'<tr>'.'<tr>'
                                .'<td>'.'Phone'.'</td>'.'<td>'.$phone.'</td>'.'<tr>'
                                                              
                            ?>
                            <?php
                                } else {
                                        echo "<h4> Can't find the post which has id = $id.</h4>";}   
                                                }else {//enf if ($result)
                                                    echo "<h4> Error read data from post database.</h4>";}
                            ?>
                        </table>
                    </div>
                    <div class="col-sm-7 " style=" border-left:solid 1px; border-right:solid 1px;">
                        <h4 style="text-align: center;">Customer Feedback</h4>
                        <?php
                            echo  '<td>'.'</td>'.$comment.'<td>'.'<tr>'                                                
                        ?>  
                    </div>    
                    <div class="col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                <hr class="mt-5"> 
                </div> 
            </div>              
        </div>
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
    var container = document.getElementById("detail")
    container.style.display = "none"
    function clicked() {
        if (container.style.display == "none") {
            container.style.display  = "block"
        }
        else {
            container.style.display = "none"
        }
    }      
</script> 

</html>