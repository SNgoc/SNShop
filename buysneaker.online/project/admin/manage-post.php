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
  <title>Manage Post</title>
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

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Manage News</h4>
                  <p class="card-description">
                    News <code>.Sneakers</code>
                  </p>
                  <div class="row">
                    <div class="col-lg-6">
                      <a href="post-add.php">
                        <button class="btn btn-success" style="margin-bottom: 15px;">Add News</button>
                      </a>
                    </div>
                    <div class="col-lg-6">
                      <form method="get">
                        <div class="form-group" style="width: 100px;float: right;">
                          <button type="submit" class="btn btn-dark">Search</button>
                        </div>
                        <div class="form-group" style="width: 250px; float: right;">
                          <input type="text" class="form-control" placeholder="Search by title" id="titlename" name="titlename">
                        </div>
                        <div class="form-group" style="width: 150px; float: right;">
                          <input type="text" class="form-control" placeholder="Search by topic" id="name_topic" name="name_topic">
                        </div>
                      </form>                
                    </div>				
                 </div>
                 <!-- Table -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead style="text-align: center;">
                        <tr>
                          <th>No.</th>
                          <th>Image</th>
                          <th>Admin post</th>
                          <th>Topic</th>
                          <th>Title</th>
                          <th>Edit | Delete</th>
                          <th>Manage Post</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: center;">

                        <!-- CODE PHÂN TRANG -->
                        <?php
                        //phan trang
                        $limit = 5; // so News tren mot trang
                        $page = 1;
                        if(isset($_GET['page'])){
                        $page = $_GET['page']; // trang can lay News
                        }
                        $firstIndex = ($page-1)*$limit;

                        //tim kiem theo title name hoặc lọc topic name
                        $titlename = $name_topic = '';
                        // tìm theo title name
                        if(isset($_GET['titlename'])){
                            $titlename = $_GET['titlename'];  //lay tu khoa tim kiem bang phuong thuc get name
                        }
                        // lọc theo topic name
                        if(isset($_GET['name_topic'])){
                            $name_topic = $_GET['name_topic'];  //lay tu khoa tim kiem bang phuong thuc get name_topic
                        }
                        $additional = '';
                        if(!empty($titlename)){
                            $additional= $additional.' AND title LIKE "%'.$titlename.'%"';
                        }
                        if(!empty($name_topic)){
                            $additional= $additional.' AND topics.topic_name LIKE "%'.$name_topic.'%"';
                        }

                        //lay danh sach cac danh muc tu db						
                        $sql = 'SELECT posts.*, topics.topic_name FROM posts JOIN topics on posts.topic_id = topics.id 
                        WHERE 1 '.$additional.'ORDER BY created_at DESC'.' LIMIT '.$firstIndex.','.$limit;
                        $postsList = executeResult_post($sql);
                        //die($sql);
                        //dem so trang
                        $sql='SELECT COUNT(posts.id) AS total FROM posts JOIN topics on posts.topic_id = topics.id WHERE 1'.$additional;
                        $countResult = executeSingleResult($sql);
                        //die($sql);
                        $number = 0;
                        if($countResult!=null){
                        $count = $countResult['total'];
                        $number = ceil($count/$limit); // chan tren
                        }
                        
                        //END

                            //<!-- CODE CONTENT FOR PAGINATOR -->
                            foreach($postsList as $item){
                            
                            echo'

                                <tr>
                                <td>'.(++$firstIndex).'</td>
                                <td><img style="width: 150px; height: 100px;" src="../image/blog/'. $item['image'] .'" alt="picture"></td>
                                <td>'.$item['admin_user'].'</td>
                                <td>'.$item['topic_name'].'</td>
                                <td style="white-space: normal; max-width: 200px;">'.$item['title'].'</td>
                                <td>
                                    <a class="btn btn-warning" href="post-edit.php?id='.$item['id'].'">Edit</a>
                                    <button class="btn btn-danger" onclick="deletePost('.$item['id'].')">Delete</button>
                                </td>';
                                ////Publish/Unpublish News Post code
                                if ($item['published'] == 1) { echo'
                                <td><button type="button" class="btn btn-danger" onclick="unpublish('.$item['id'].')">To draft</button></td>
                                ';
                                ////end if and start else
                                } else { echo'
                                <td><button type="button" class="btn btn-success" onclick="publish('.$item['id'].')">To publish</button></td>

                                </tr>';
                                }//end else
                            }
                            ?>                  
                             <!-- END CONTENT -->
                      </tbody>
                    </table>
                    &nbsp;
                    <!-- Bai toan phan trang-->
                    <?php Paginarion($number, $page, '&titlename='.$titlename.'&name_topic='.$name_topic)?>
                  </div>
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
  
  <!-- BLOG NEWS -->
  <!-- Scripts for Publish/Unpublish News Post -->
  <script src="post/processPublish-post.js"></script>
  <script src="post/processDelete-post.js"></script>

</body>

</html>

