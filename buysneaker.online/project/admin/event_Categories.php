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
  <title>All Categories</title>
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
        <div class="container-fluid p-3 mb-2 bg-light text-dark" style="margin-top: 25px;">
        <div class="row" style="margin-top:10px;margin-bottom:20px;">
            <div class="col-sm-12 text-left" ><a href="event.php" style="color:black; margin-right:12px;" ><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg></a></div>
                
            </div>
            <div class="row">
                <div class="col-sm-8">
                <h3 class=".bg-warning"><a href="event_Categories.php" style="color:black" class="text-decoration-none" > Categories</a></h3>
                </div>
                <form class="col-sm-4 input-group" menthod = "get">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search" name = "search">
                </form>
            </div>
            <hr class="mt-5">
            <div class="row">
                <div class="col-sm-4 text-left" style=" margin-top:10px;">
                <h5>Add Category</h5>
                <form style=" margin-top:30px;" method="post" action="event/process_addmenu.php">
                        <div class="form-group text-left">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" name="Name" class="form-control" id="exampleFormControlInput1" placeholder="Name Categories" required>
                            <p>The name is how it appears on your site.</p>
                        </div>
                        <div class="form-group text-left">
                            <label for="exampleFormControlTextarea1" >Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Description Categories"></textarea>
                            </textarea>
                            <p>The description is not prominent by default; however, some themes may show it.</p>
                        </div>
                        <button type="submit" name="submit1" class="btn btn-primary">Add New Category</button>
                    </form>
                </div>
                <div class="col-sm-8" style="text-align: center; margin-top:10px;">
                <h5 class="text-left">List Categories </h5>            
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope=col>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
  //Thuật Toán Phân Trang
    // Bước 1
    if(isset($_GET['search'])){
    $s=$_GET['search'];
    $sql1 = "SELECT count(id) as total from event_tp where name_tp like '%$s%'";
    }else{
    $sql1 = "select count(id) as total from  event_tp";};
    $result = mysqli_query($link,$sql1);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    // BƯỚC 2: TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 6;
    // BƯỚC 3: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $total_page = ceil($total_records / $limit);
    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page){
        $current_page = $total_page;}
    else if ($current_page < 1){
        $current_page = 1;}
    // Tìm Start
    $start = ($current_page - 1) * $limit;
    // BƯỚC 4: TRUY VẤN LẤY DANH SÁCH TIN TỨC
    // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
    $sql = "SELECT * FROM event_tp order by id desc LIMIT  $start,$limit";
    $s= '';
    if(isset($_GET['search'])){
        $s=$_GET['search'];
        $sql = "SELECT * FROM event_tp where name_tp like '%$s%' order by id desc LIMIT  $start,$limit";
    };
        $result = mysqli_query($link,$sql);
    // Phần hiển thị Contact Us
    // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC   
  
    if ($result){                           
        if(mysqli_num_rows($result)>0){
             while($row = mysqli_fetch_array($result)){
              echo '<tr>'
              .'<td>'.++$start.'</td>'
              .'<td>'.$row['name_tp'].'</td>'
              .'<td>'.$row['description_tp'].'</td>'
              .'<td class="dropdown" style="display:inline-block">
                  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action 
                  </button>
                  <p class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="eventcate_Edit.php?id='.$row['id'].'">Edit</a>
                      <a class="dropdown-item" href="event/processcate_Del.php?id='.$row['id'].'">Delete</a>                    
                      <a class="dropdown-item" href="../event.php">Wiew</a>
                  </p>
              </td>  
              
              <tr>';
                      
                    }
              mysqli_free_result($result);}
                            else{
                                  echo  '<tr>'.
                                        '<td colspan = "4">No Records</td>'.
                                        '</tr>';}
                                            }
                        else{ 
                                  echo '<h4> No Data, Please try again';}
                                  mysqli_close($link);
                        ?>
                        <tr style="height:1px;"><td colspan="9" ></td> </tr>				
                      </tbody>
                    </table>

				<!-- Bai toan phan trang-->       
                <span style="margin:8px"><?php echo $total_records?> items</span><div aria-label="Page navigation example btn btn-info" style="text-align:center; font-size:larger; display:inline-block;" class="text-dark">
       
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a class="text-dark" href="event_Categories.php?page='.($current_page-1).'&search='.$s.'">Prev</a> | ';
            }
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            if ($i == $current_page){
                    echo '<span class="text-dark">'.$i.'</span> | ';
                }
            else{
                    echo '<a class="text-dark"href="event_Categories.php?page='.$i.'&search='.$s.'">'.$i.'</a> | ';
                }
            }
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a class="text-dark" href="event_Categories.php?page='.($current_page+1).'&search='.$s.'">Next</a> | ';
            }
           ?>
                </div>
               <p class="text-left" style="margin-top: 30px; margin-bottom:50px;">Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the default category Uncategorized. The default category cannot be deleted.</p>
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
</html>
