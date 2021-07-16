<?php
require_once('../db/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FAQ</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- end -->
    <!-- FAQ-POLICY CSS -->
    <!-- Custom Styling -->
    <link rel="stylesheet" href="css/faq-policy.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- Ckeditor -->
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
          
    <!-- Admin Page Wrapper -->
            <!-- Admin Content -->
            <div class="admin-content" style="box-shadow: 4px 5px 6px 3px;">
                <div class="button-group" style="padding: 20px 30px;">
                    <a href="manage-faq-policy.php" class="btn btn-warning">Manage FAQ</a>
                </div>


                <div class="content">

                    <h2 class="page-title" style="text-align: center;">Edit FAQ</h2>

                    <form action="faq_policy/processEdit-faq.php" method="post" id = "edit_faq" enctype="multipart/form-data">
                        <?php
                        $id = $_GET['id'];
                        $faq_title = "";
                        $faq_content ="";

                        $query = "SELECT * FROM faq WHERE id = $id";
                        $result = mysqli_query($link, $query);

                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_array($result);
                                $faq_title = $row['faq_title'];
                                $faq_content = $row['faq_content'];
                        ?>
                        <div>
                            <input type="hidden" name = "id" value = "<?php echo $id; ?>">
                            <label>FAQ Title</label>
                            <input type="text" name="faq_title" class="text-input" value = "<?php echo $faq_title; ?>" required>
                        </div>
                        <div>
                            <label>FAQ Content</label>
                            <textarea type="text" name="faq_content" id="content" ><?php echo $faq_content; ?></textarea>
                            <!-- Ckeditor -->
                            <script  type="text/javascript">CKEDITOR.replace('content');</script>
                        </div>
                        <div>
                            <button type="submit" name="edit-faq" class="btn btn-success" style="margin-block-start: 10px; margin-block-end: 20px;">Update FAQ</button>
                        </div>
                        <?php
                            }//end if mysqli_num_rows($result)
                        } else {//end if($result)
                                echo "<h4> Error read data from post database.</h4>";
                        }
                        ?>
                    </form>

                </div>

            </div>
            <!-- // Admin Content -->
        <!-- // Page Wrapper -->  
        
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

    <!-- FAQ-Policy -->
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>

