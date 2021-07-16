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
    <title>RoyalUI Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- BLOG -->
    <!-- Custom Styling -->
    <link rel="stylesheet" href="css/blog_style.css">
    <!-- end -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <!-- Ckeditor -->
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <!-- BLOG IMAGE -->
  <style>
    div img{
        width: 150px;
        height: auto;
    }
    </style>
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
                    <a href="manage-post.php" class="btn btn-warning">Manage News</a>
                </div>


                <div class="content">

                    <h2 class="page-title" style="text-align: center;">Edit News</h2>

                    <form action="post/processEdit-post.php" method="post" id = "addpost" enctype="multipart/form-data">
                        <?php
                        $id = $_GET['id'];
                        $title = "";
                        $content ="";
                        $topic_id = "";
                        $topic_name = "";

                        $query = "SELECT p.*, t.topic_name FROM posts as p JOIN topics as t ON p.topic_id = t.id WHERE p.id = $id";
                        $result = mysqli_query($link, $query);

                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_array($result);
                                $title = $row['title'];
                                $content = $row['content'];
                                $published = $row['published'];
                                $topic_id = $row['topic_id'];
                                $topic_name = $row['topic_name'];
                        ?>
                        <div>
                            <input type="hidden" name = "id" value = "<?php echo $id; ?>">
                        </div>
                        <div>
                            <?php
                            // TOPIC
                            $topic_query = 'SELECT * FROM topics';
                            $topicList = executeResult($topic_query);
                            ?>
                            <label>Topic</label>
                            <select name="topic_id" class="text-input">
                                
                                <?php foreach ($topicList as $topic): ?>
                                    <?php if ($topic_id == $topic['id']): ?>
                                        <option selected value="<?php echo $topic_id; ?>"><?php echo $topic_name; ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $topic['id'] ?>"><?php echo $topic['topic_name'] ?></option>
                                        <?php endif; //dùng endif, ko cần {} ?>
                                <?php endforeach;//ko cần {} ?>
                            </select>
                        </div>
                        <div>
                            <?php //check duplicate title
                                $error='';
                                if(isset($_GET['error'])){
                                    $title_check = $_GET['title_check'];
                                    $error = 'Title '.$title_check.' already exists';
                                }
                            ?>
                            <label>Title<p style="color: red;"> <?php echo $error; ?></p></label>
                            <input type="text" name="title" class="text-input" value = "<?php echo $title; ?>" required>
                        </div>
                        <div>
                            <label>Content</label>
                            <textarea type="text" name="content" id="content" ><?php echo $content; ?></textarea>
                            <!-- Ckeditor -->
                            <script  type="text/javascript">CKEDITOR.replace('content');</script>
                        </div>

                        <div style="margin-block-start: 20px; margin-block-end: 20px;">
                            <?php
                            if ($row['image'] && $row['image'] != '') {
                                ?>
                                <label> Current Image News: </label>
                                <img src="../image/blog/<?php echo $row['image']; ?>" alt="image" id="old-image" style="max-width: 200px; max-height: 100px;">
                                <?php
                            }
                            ?>
                        </div>
                        
                        <div style="margin-block-start: 20px; margin-block-end: 30px;">
                            <label><strong>Update Image</strong></label>
                            <input type="file" name="image" id = "image" class="text-input" onchange="document.getElementById('new-image').src = window.URL.createObjectURL(this.files[0])">
                            <img id="new-image" style="max-width: 200px; max-height: 100px;">
                        </div>
                        
                        <!-- Code for check if published checked or not yet on checkbox-->
                        <div>
                            <label>
                            <?php
                                if ($published) {
                            ?>
                                <input type="checkbox" name="published" value="1" checked>
                                <?php 
                                } else {//end if published and start else
                                ?>
                                <input type="checkbox" name="published" value="1">
                                <?php } //end else ?>
                                Publish
                            </label>
                        </div>
                        <div>
                            <button type="submit" name="edit-post" class="btn btn-success" style="margin-block-end: 20px;">Update News</button>
                        </div>
                        <?php
                            } else {
                                    echo "<h4> Can't find the post which has id = $id.</h4>";
                            }
                        } else {
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

    <!-- BLOG -->
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>

