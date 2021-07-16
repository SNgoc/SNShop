<?php

//Google Code
require_once ('Google/libraries/Google/autoload.php');

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '315949276409-e83n6olgqoh3oks4j2obj4616qqbpnsr.apps.googleusercontent.com';
$client_secret = 'BJDpDipmTpSv__no-2GJVO8V';
$redirect_uri = 'https://buysneaker.online/login.php';

//incase of logout request, just unset the session var
//if (isset($_GET['logout'])) {
//    unset($_SESSION['access_token']);
//}

/* * **********************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 * ********************************************** */
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/* * **********************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 * ********************************************** */
$service = new Google_Service_Oauth2($client);

/* * **********************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
 */

if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    exit;
}
/* * **********************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 * ********************************************** */
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
} else {
    $authUrl = $client->createAuthUrl();
}
if ($client->isAccessTokenExpired()) {
    $authUrl = $client->createAuthUrl();
//            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
}

if (!isset($authUrl)) {
    $googleUser = $service->userinfo->get(); //get user info 
    if(!empty($googleUser)){
        $email = $googleUser['email'];
        $user =  $googleUser['name'];
        $sql ='select * from user where email = "'.$email.'" and user ="'.$user.'"';
        $UserList = executeSingleResult($sql);
        $check = count($UserList);
        date_default_timezone_set('Asia/Saigon');
        $created_at=$updated_at= date('Y=m-d H:s:i');
        if($check == 0){
            $sql = 'insert into user (user,email,login,created_at,updated_at) values("'.$user.'","'.$email.'","Google","'.$created_at.'","'.$updated_at.'")';
            execute($sql);
        }
        $_SESSION['user'] = $user;      
    }
}
//End Google Code
?>