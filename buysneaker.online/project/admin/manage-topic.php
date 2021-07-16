<?php
require_once('../db/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Topic</title>
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
                  <h4 class="card-title">Topics</h4>
                  <p class="card-description">
                    Topics <code>.Sneakers</code>
                  </p>
                  <div class="row">
                    <div class="col-lg-6">
                      <a href="topic-add.php">
                        <button class="btn btn-success" style="margin-bottom: 15px;">Add Topic</button>
                      </a>
                    </div>
                    <div class="col-lg-6">
                      <form method="post">
                        <div class="form-group" style="width: 100px;float: right;">
                          <button type="submit" class="btn btn-dark">Search</button>
                        </div>
                        <div class="form-group" style="width: 300px; float: right;">
                          <input type="text" class="form-control" placeholder="Search by topic name" id="topicname" name="topicname">
                        </div>  
                      </form>                
                    </div>				
                 </div>

                 <!-- Table -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead style="text-align: center;">
                        <tr>
                          <th>ID</th>
                          <th>Topic</th>
                          <th style="text-align: justify;">Desciption</th>
                          <th>Total News in Topic</th>
                          <th>Edit | Delete</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: center;">

                        <!-- TOPIC CODE -->
                        <?php
                        
                        $query = "SELECT * FROM topics";
                        // search by topic name
                        if (isset($_POST['topicname']) && $_POST['topicname'] != '') {
                            $topic_name = $_POST['topicname'];
                            $query .= " WHERE topic_name LIKE '%$topic_name%' ";
                        }
                        
                        $result = mysqli_query($link, $query);
                        //die($query);
                        
                        if ($result) //if($result) tương đương giá trị $result = null
                        {
                            if (mysqli_num_rows($result) > 0) {
                                $index = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    //Code display total news in per topic
                                    $topic_name_count = $row['topic_name'];
                                    $query_count = "SELECT COUNT(*) AS total_news FROM topics 
                                    JOIN posts ON topics.id = posts.topic_id WHERE topic_name = '$topic_name_count'";
                                    $row_count = executeSingleResult($query_count);
                                    $total_news = $row_count['total_news'];
                                    // END
                        ?>
                                    <tr>
                                        <td><?php echo ($index++); ?></td>
                                        <td style="white-space: normal; max-width: 200px;"><?php echo $row['topic_name']; ?></td>
                                        <td style="white-space: normal; text-align: justify;"><?php echo html_entity_decode($row['description']); //decoding htmlentities from db to normal text ?></td>
                                        <td><?php echo $total_news; ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="topic-edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                                            <a class="btn btn-danger" href="topic/processDelete-topic.php?id=<?php echo $row['id']; ?>">Delete</a>
                                        </td>
                                    </tr>

                              <?php  } //end while ?>

                                    <!-- CODE Display All total news -->
                                    <?php
                                        $query_total = "SELECT COUNT(*) AS total FROM posts";
                                        $count_result_total = executeSingleResult($query_total);
                                        $all_news = $count_result_total['total'];
                                    ?>
                                    <tr style="background-color: palegoldenrod;">
                                        <td style="white-space: normal; max-width: 70px; font-weight: bolder;">All News in Topics</td>
                                        <td></td>
                                        <td></td>
                                        <td style="font-weight: bolder;"><?php echo $all_news; ?></td>
                                        <td></td>
                                    </tr>
                                    <!-- END -->

                                <?php
                                // alert when after can't delete a topic still having news
                                $alert = '';
                                if (isset($_GET['alert']) == 1) {
                                    echo "<script>alert('Cannot delete topic because still having News in this topic');</script>";
                                    echo "<script type='text/javascript'>window.location.href = 'manage-topic.php';</script>";
                                }
                                // END ALERT

                            }//end if mysqli_num_rows($result)
                            mysqli_free_result($result); //hủy bộ nhớ đã cấp phát cho result để tránh ngốn dữ liệu
                        } else {
                            echo '<tr><td>Error read data from db</td></tr>';
                        }
                        mysqli_close($link); //đóng kết nối 
                        ?>
                            <!-- END CONTENT -->

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
  <!-- TOPICS -->
  <script src="topic/processDelete-topic.js"></script>
  <script>event.preventDefault()</script>
</body>

</html>

