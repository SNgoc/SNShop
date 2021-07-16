<?php
session_start();
include('../db/dbhelper.php');
include 'Facebook/autoload.php';
include('fbconfig.php');
$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}
try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    header('Location: ../login.php');
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    header('Location: ../login.php');
    exit;
}

if (!isset($accessToken)) {
    if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
    }
    header('Location: ../login.php');
    exit;
}

//Lấy thông tin của người dùng trên Facebook
try {
    // Returns a `Facebook\FacebookResponse` object
    $response = $fb->get('/me?fields=id,name,email', $accessToken->getValue());
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    header('Location: ../login.php');
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    header('Location: ../login.php');
    exit;
}

$fbUser = $response->getGraphUser()->asArray(); 

if (!empty($fbUser)) { 
    $email = $fbUser['email']; 
    $user =  $fbUser['name'];
    $sql ='select * from user where email = "'.$email.'"';
    $UserList = executeSingleResult($sql); 
    $check = count($UserList); 
    if($check == 0){
        date_default_timezone_set('Asia/Saigon');
        $created_at=$updated_at= date('Y=m-d H:s:i');
        $sql = 'insert into user (user,email,login,created_at,updated_at) values("'.$user.'","'.$email.'","Facebook","'.$created_at.'","'.$updated_at.'")'; 
        execute($sql);
    }
    $_SESSION['user'] = $user; 
    
    header('Location: ../index.php');
}

?>