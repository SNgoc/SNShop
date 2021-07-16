<?php
require_once('../db/dbhelper.php');
session_start();
if(isset($_COOKIE['admin'])){
	$_SESSION['admin'] = $_COOKIE['admin'];
}
if (isset($_SESSION['admin'])){
    header('location: index.php');
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Admin Login</h1>
			<span>
<?php
$admin = '';
if(!empty( $_POST )){
	$admin = $_POST['admin'];	
	$password = $_POST['password']; 

	$sql = "select * from admin";
	$adminList = executeResult($sql);
	$case = 0;
	$isToken = true;

	foreach($adminList as $item){
		if ($admin == $item['admin']){
			if($password == $item['password']){
				$case = 1;
				if($item['token'] == ''){
					$isToken = false;
				}
				break;
			}else{
				$case = 2;
			}
		}		
	}
	if ($case ==1)
	{
		if($isToken == true){
			echo '<script type="text/javascript">';
            echo 'alert("This account is already logged in. This login will invalidate the previous login");';
            echo 'window.location="ajax/get-session.php?admin='.$admin.'"';
            echo '</script>';
		}else{
			$token = substr(md5(uniqid(rand(),1)),3,10);
			$sql = 'update admin set token = "'.$token.'" where admin = "'.$admin.'"';
			execute($sql);
			$_SESSION['adminToken'] = $token;
			$_SESSION['admin'] = $admin;
			setcookie('admin', $admin);
			header ('Location: index.php');
		}
		
	}
	else if($case ==0) 
	{
		$admin_user = ''; //xóa luôn giá trị user để value của form mục user rỗng
		echo 'wrong user and password'; 
	}
	else if($case ==2)
	{
		echo 'wrong password';
	}
}
?> 
			</span>
			<div>
				<input type="text" placeholder="Admin" required="" name="admin" value="<?=$admin?>"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="../index.php">Sneaker Shop  </br>Go faster, go stronger, never stop!</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>