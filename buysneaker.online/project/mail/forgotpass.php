<?php
include('../db/dbhelper.php');
define("APPPATH", "./");

include APPPATH . "PHPMailer.php";
include APPPATH . "Exception.php";
include APPPATH . "OAuth.php";
include APPPATH . "POP3.php";
include APPPATH . "SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


if(isset($_POST) && !empty($_POST)) {
  $sql = "select * from user";
  $userList = executeResult($sql);
 
  $email = $_POST['email'];   
  $checkEmail=false;        
  foreach($userList as $item){
    if($email == $item['email']){
      $checkEmail = true; 
      break;
    }
  }
  if($checkEmail == false){     
    header('Location: ../forgotpass.php?error=a');
  }else{

  $expFormat = mktime(
    date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
  );
  $expDate = date("Y-m-d H:i:s",$expFormat);
  $key = md5(2418*2+$email); 
  $addKey = substr(md5(uniqid(rand(),1)),3,10);
  $key = $key . $addKey;
  $sql = "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) 
  VALUES ('".$email."', '".$key."', '".$expDate."');";
  execute($sql);
  
  $output='<p>Dear user,</p>';
  $output.='<p>Please click on the following link to reset your password.</p>';
  $output.='<p>-------------------------------------------------------------</p>';
  $output.='<p><a href="https://buysneaker.online/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">CLICK HERE TO RESET PASSWORD</a></p>';		
  $output.='<p>-------------------------------------------------------------</p>';
  $output.='<p>Please be sure to copy the entire link into your browser.
  The link will expire after 1 day for security reason.</p>';
  $output.='<p>If you did not request this forgotten password email, no action 
  is needed, your password will not be reset. However, you may want to log into 
  your account and change your security password as someone may have guessed it.</p>';   	
  $output.='<p>Thanks,</p>';
  $output.='<p>Sneaker Shop Team</p>';
  $body = $output; 
  $subject = "Password Recovery - Sneaker.com";

  //#2
  $mail = new PHPMailer;
  $mail->isSMTP();
  //Enable SMTP debugging
  // SMTP::DEBUG_OFF = off (for production use)
  // SMTP::DEBUG_CLIENT = client messages
  // SMTP::DEBUG_SERVER = client and server messages
  $mail->SMTPDebug = SMTP::DEBUG_OFF;
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  //Set the encryption mechanism to use - STARTTLS or SMTPS
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = 'jukain59@gmail.com';
  $mail->Password = 'vgypudfiyzpynasd'; // sử dụng mật khẩu ứng dụng
  $mail->FromName = "Sneaker Shop";

  //#3
  $mail->setFrom('jukain59@gmail.com');
  $mail->addAddress($email);
  $mail->Subject = $subject;
  $mail->msgHTML($body );

  //#4
  if (!$mail->send()) {
    $error = "Lỗi: " . $mail->ErrorInfo;
    echo '<p>'.$error.'</p>';
  }
  else {
    echo '<p>Đã gửi!</p>';
  }

  header('Location: ../forgotpass.php?success=s');
  }
}

?>
