<?php
require('../db/dbhelper.php');
$id=$name=$thumbnail=$price=$content=$id_brand=$href_param=$id_special='';
$size36=$size37=$size38=$size39=$size40=$size41=$size42=$size43='';
if(!empty($_POST)){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $name = str_replace('"', '\\"', $name);
    }
    if(isset($_POST['id_brand'])){
        $id_brand = $_POST['id_brand'];
    }
    if(isset($_POST['price'])){
        $price = $_POST['price'];
        $price = str_replace('"', '\\"', $price);
    }
    if(isset($_POST['id_special'])){
        $id_special = $_POST['id_special'];
    }
    if(isset($_POST['thumbnail'])){
        $thumbnail = $_POST['thumbnail'];
        $thumbnail = str_replace('"', '\\"', $thumbnail);
    }
    if(isset($_POST['size36'])){
        $size36 = $_POST['size36'];
    }
    if(isset($_POST['size37'])){
        $size37 = $_POST['size37'];
    }
    if(isset($_POST['size38'])){
        $size38 = $_POST['size38'];
    }
    if(isset($_POST['size39'])){
        $size39 = $_POST['size39'];
    }
    if(isset($_POST['size40'])){
        $size40 = $_POST['size40'];
    }
    if(isset($_POST['size41'])){
        $size41 = $_POST['size41'];
    }
    if(isset($_POST['size42'])){
        $size42 = $_POST['size42'];
    }
    if(isset($_POST['size43'])){
        $size43 = $_POST['size43'];
    }
    if(isset($_POST['content'])){
        $content = $_POST['content'];
        $content = str_replace('"', '\\"', $content);
    }
    $href_param=convert_name($name);
    

    //luu vao db
    if(!empty($name)){
        date_default_timezone_set('Asia/Saigon');
        $created_at=$updated_at= date('Y-m-d H:s:i');
        if($id==''){
            //add thông tin vao bang product
            $sql = 'insert into product(name,id_brand,price,id_special,content,created_at,updated_at,
            href_param,size36,size37,size38,size39,size40,size41,size42,size43) 
            values("'.$name.'","'.$id_brand.'","'.$price.'","'.$id_special.'","'.$content.'",
            "'.$created_at.'","'.$updated_at.'","'.$href_param.'","'.$size36.'","'.$size37.'","'.$size38.'"
            ,"'.$size39.'","'.$size40.'","'.$size41.'","'.$size42.'","'.$size43.'")';
            execute($sql); 
            //tạo file image/thumbnail vật lý + add đường dẫn vào bảng image/thumbnail 
            $sql1='SELECT * FROM product WHERE id = (SELECT max(id) FROM product)';//lấy ra dòng vừa mới nhập
            $product=executeSingleResult($sql1); 
            $takeid=$product['id']; //lấy ra id dòng vừa mới nhập của bẳng product 
            include('all-products/file_upload.php');
        }else{
            $sql ='update product set name = "'.$name.'",updated_at="'.$updated_at.'", price="'.$price.'", 
            content="'.$content.'", id_brand="'.$id_brand.'",href_param="'.$href_param.'",  
            id_special="'.$id_special.'",size36='.$size36.',size37='.$size37.',size38='.$size38.',
            size39='.$size39.',size40='.$size40.',size41='.$size41.',size42= '.$size42.',
            size43='.$size43.' where id ='.$id; 
            execute($sql); 
            
            if((count($_FILES['image']['name']))!=1 || !empty($_FILES['image'][0]['name'])  ){
                $sql = 'delete from product_image where id_product='.$id;
                execute($sql);
                $sql='delete from product_thumbnail where id_product='.$id;
                execute($sql);
                $takeid=$id;
                include('all-products/file_upload.php');
            }          
        } 
        header('Location:all-products.php');
        die();
    }
}

//lay du lieu bang phuong thuc get truyen qua
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = 'select * from product where id = "'.$id.'"';
    $product=executeSingleResult($sql);
    if($product!=null){
        $name = $product['name'];
        $price = $product['price'];
        $id_brand = $product['id_brand'];
        $id_special = $product['id_special'];
        $content = $product['content'];
        $size36 = $product['size36'];
        $size37 = $product['size37'];
        $size38 = $product['size38'];
        $size39 = $product['size39'];
        $size40 = $product['size40'];
        $size41 = $product['size41'];
        $size42 = $product['size42'];
        $size43 = $product['size43'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add/Edit Product</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Summernote-->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php  require_once('layout/header.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
          <?php  require_once('layout/left-menu.php');?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            
            <div class="row">
                <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-name">Add/Edit Product</h4>
                    <form class="form-sample" method="post" enctype="multipart/form-data">
                        <p class="card-description">
                        Product Information
                        </p>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="name">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" value="<?=$id?>" hidden="true">
                                <input type="text" class="form-control" required="true" 
                                    id="name" name="name" value="<?=$name?>" />
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="id_brand">Brand Name</label>
                            <div class="col-sm-9">
                                <select class="form-control" name ="id_brand" id="id_brand">
                                <option> -- Select Brand -- </option>
<?php
$sql = 'select * from brands';
$brandList = executeResult($sql);
foreach($brandList as $item){
    if($item['id'] == $id_brand){
        echo '<option selected value="'.$item['id'].'"> '.$item['name'].' </option>';
    }else{
        echo '<option value="'.$item['id'].'"> '.$item['name'].' </option>';  
    }   
}
?>                                
                                </select>                               
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="price">Product Price</label>
                            <div class="col-sm-9">
                                <input required="true" type="number" class="form-control" 
                                id="price" name="price" value="<?=$price?>" > 
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="id_special">Special</label>
                            <div class="col-sm-9">
                                <select class="form-control" name ="id_special" id="id_special">
                                    <option> -- Select Special--</option>
<?php
$sql = 'select * from product_special';
$specList = executeResult($sql);
foreach($specList as $item){
    if($item['id'] == $id_special){
        echo '<option selected value="'.$item['id'].'"> '.$item['special'].' </option>';
    }else{
        echo '<option value="'.$item['id'].'"> '.$item['special'].' </option>';  
    }   
}
?>                                    
                                </select>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="image">Image</label>
                            <div class="col-sm-9">  
                                <input  type="file" class="form-control" id="input-image" 
                                    name="image[]" multiple onchange="delete_oldImage()">
                                <div id="preview-image"></div> 
                                <div id="oldImage"> 
<?php
$sql = 'select * from product_image where id_product ='.$id;
$imageList = executeResult($sql); 
foreach($imageList as $item){
    echo'<span><img src="../'.$item['image'].'" style="max-width:100px" id="img_image"></span>';
}
?>                      
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>

                        <p class="card-description">
                        Quantity
                        </p>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="size36">Size 36</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="size36" id="size36" 
                                value="<?=$size36?>" required="true"/>
                            </div>
                            <label class="col-sm-2 col-form-label" for="size37">Size 37</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="size37" id="size37"
                                value="<?=$size37?>"required="true"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="size38">Size 38</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="size38" id="size38"
                                value="<?=$size38?>" required="true"/>
                            </div>
                            <label class="col-sm-2 col-form-label" for="size39">Size 39</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="size39" id="size39" 
                                value="<?=$size39?>" required="true"/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="size40">Size 40</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="size40" id="size40"
                                value="<?=$size40?>"required="true"/>
                            </div>
                            <label class="col-sm-2 col-form-label" for="size41">Size 41</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="size41"  id="size41"
                                value="<?=$size41?>" required="true"/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="size42">Size 42</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="size42" id="size42"  
                                value="<?=$size42?>"required="true"/>
                            </div>
                            <label class="col-sm-2 col-form-label" for="size43">Size 43</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="size43"  id="size43"
                                value="<?=$size43?>" required="true"/>
                            </div>
                            </div>
                        </div>
                        </div>                       
                        <div class="row">
                        <div class=" col-lg-12">                            
                            <div class="form-group">
                            <label class="col-form-label" for="content">Content:</label>
                            <textarea  class="form-control" name="content" id="content" rows="5" ><?=$content?></textarea>
                            </div>
                            <button class="btn btn-success">Lưu</button>
                        </div>
                      
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php  include('layout/footer.php');?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script>
  $('#content').summernote({
        placeholder: 'say some thing about product',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
  </script>
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
</script>

</html>

