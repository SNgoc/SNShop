<?php
session_start();
if(isset($_COOKIE['admin']) && isset($_COOKIE['password'])){
  $_SESSION['admin'] = $_COOKIE['admin'];
}
if (empty($_SESSION['admin'])){
  header('location: login.php');
}
$sql = 'select * from admin where admin = "'.$_SESSION['admin'].'"';
$result = executeSingleResult($sql);
$token = $result['token'];
if($token != $_SESSION['adminToken']){
    header('Location: logout.php');
}
?>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../index.php"><img src="../image/shop/logo.png" class="mr-2" style="width=300" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../index.php"><img src="../image/shop/logo.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="../admin/admin-change-pass.php">
                <i class="ti-settings text-primary"></i>
                Change Password
              </a>
              <a class="dropdown-item" href="../admin/logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>              
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>