<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$email = $_POST['email'];

if( $email == "" ) {
  $title = "New Appeal - Best Tour Plan";
  $body = "
  <h2>New Appeal!</h2>
  <b>Name:</b> $name<br>
  <b>Phone Number:</b> $phone<br><br>
  <b>Message:</b><br>$message
  ";
  header ('Location: thankyou.html');
} elseif( $email != "" && $name == "" && $phone == "" && $message == "" ){
  $title = "Newsletter subscribtion - Best Tour Plan";
  $body = "
  <h2>New Letter!</h2>
  <b>Email Address:</b> $email<br>
  <span> This user wants to subscribe for newsletter mailing. </span>
  ";
  header ('Location: subscribe.html');    
} else{
  $title = "Booking Request - Best Tour plan";
  $body = "
  <h2>Room reservation - Grand Hilton Hotel</h2>
  <b>Name:</b> $name<br>
  <b>Phone Number:</b> <a href='tel:$phone'>$phone</a><br>
  <b>Email Address:</b> $email<br><br>
  <b>Message:</b><br>$message
  ";
  header ('Location: booking.html');
};

$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};
    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = 'best.tour.plan.lashchev.dev@gmail.com';
    $mail->Password   = 'cYI1HkHp2D@Z#0Ew&&lS4GEXiu';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('best.tour.plan.lashchev.dev@gmail.com', 'Best Tour Plan');
    $mail->addAddress('andrew.lashchev15@gmail.com');
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    
if ($mail->send()) {$result = "success";} 
else {$result = "error";}
} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}
