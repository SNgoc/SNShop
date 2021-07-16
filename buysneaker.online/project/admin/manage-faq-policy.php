<?php
require_once('../db/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>FAQ & Policy</title>
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
    <?php require_once('layout/header.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php require_once('layout/left-menu.php');?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

            <!-- FAQ -->
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">FAQ</h4>
                  <p class="card-description">
                    FAQs <code>.Sneakers</code>
                  </p>

                 <!-- Table -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead style="text-align: center;">
                        <tr>
                          <th>ID</th>
                          <th>FAQ Title</th>
                          <th style="text-align: justify;">FAQ Content</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: center;">

                        <!-- CODE CONTENT -->
                        <?php
                        $query = "SELECT * FROM faq";

                        //die($query);
                        $result = mysqli_query($link, $query);
                        
                        if ($result) //if($result) tương đương giá trị $result = null
                        {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                        ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['faq_title']; ?></td>
                                        <td style="white-space: normal; text-align: justify;"><?php echo substr(html_entity_decode($row['faq_content']),0,500).'...'; //decoding htmlentities from db to normal text ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="faq-edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                                        </td>
                                        
                                    </tr>
                        <?php
                                } //end while
                            } else {
                                echo '<tr><td colspan="5" style="text-align:center">No FAQ</td></tr>';
                            }
                            mysqli_free_result($result); //hủy bộ nhớ đã cấp phát cho result để tránh ngốn dữ liệu
                        } else {
                            echo '<tr><td>Error read data from db</td></tr>';
                        }
                        ?>
                            <!-- END CONTENT -->
                          
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- end table -->
              </div>
            </div>

            <!-- PRIVATE POLICY -->
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Policy</h4>
                  <p class="card-description">
                    Policy <code>.Sneakers</code>
                  </p>

                 <!-- Table -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead style="text-align: center;">
                        <tr>
                          <th>ID</th>
                          <th>Policy Title</th>
                          <th style="text-align: justify;">Policy Content</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: center;">

                            <!-- CODE CONTENT -->
                            <?php
                            $query = 'SELECT * FROM policy';

                            //die($query);
                            $result = mysqli_query($link, $query);
                            
                            if ($result) //if($result) tương đương giá trị $result = null
                            {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                            ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['pp_title']; ?></td>
                                            <td style="white-space: normal; text-align: justify;"><?php echo substr(html_entity_decode($row['pp_content']),0,500).'...'; //decoding htmlentities from db to normal text ?></td>
                                            <td>
                                                <a class="btn btn-warning" href="policy-edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                                            </td>
                                            
                                        </tr>
                            <?php
                                    } //end while
                                } else {
                                    echo '<tr><td colspan="5" style="text-align:center">No Private Policy</td></tr>';
                                }
                                mysqli_free_result($result); //hủy bộ nhớ đã cấp phát cho result để tránh ngốn dữ liệu
                            } else {
                                echo '<tr><td>Error read data from db</td></tr>';
                            }
                            mysqli_close($link) //đóng kết nối 
                            ?>
                             <!-- END CONTENT -->
                          
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- end table -->
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
</body>

</html>

