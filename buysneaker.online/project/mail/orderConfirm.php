<?php
define("APPPATH", "./");

include APPPATH . "PHPMailer.php";
include APPPATH . "Exception.php";
include APPPATH . "OAuth.php";
include APPPATH . "POP3.php";
include APPPATH . "SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if(isset($_GET['receiver'])) {
  $code = $_GET['code'];
  //gui mail cho khach hang
  //#1
  $receiver = $_GET['receiver'];
  $subject = 'Sneaker Shop Autorepsonse: We received your order [order code: '.$code.']';
  $message = 'We received your order. Thank you for choosing Sneaker Shop. 
  For more information about your order, please check it at: https://buysneaker.online/checkorder.php';


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
  $mail->addAddress($receiver);
  $mail->Subject = $subject;
  $mail->msgHTML($message);

  //#4
  if (!$mail->send()) {
    $error = "Lỗi: " . $mail->ErrorInfo;
    echo '<p>'.$error.'</p>';
  }
  else {
    echo '<p>Đã gửi!</p>';
  }

  //gui mail cho admin
  //#1
  $receiver = 'jukain59@gmail.com';
  $subject = 'Sneaker Shop Autorepsonse: Sneaker Shop have a new order';
  $message = 'Your shop have a new order - [order code: '.$code.']. Get information about it at https://buysneaker.online/checkorder.php';

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
  $mail->addAddress($receiver);
  $mail->Subject = $subject;
  $mail->msgHTML($message);

  //#4
  if (!$mail->send()) {
    $error = "Lỗi: " . $mail->ErrorInfo;
    echo '<p>'.$error.'</p>';
  }
  else {
    echo '<p>Đã gửi!</p>';
  }
  header('Location: ../index.php');
}

?>
