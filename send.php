<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$email = $_POST['email'];

if( $email == "" ) {
  // Формирование самого письма
  $title = "Новое обращение - Best Tour Plan";
  $body = "
  <h2>Новое обращение</h2>
  <b>Имя:</b> $name<br>
  <b>Телефон:</b> $phone<br><br>
  <b>Сообщение:</b><br>$message
  ";
  header ('Location: thankyou.html');
} elseif( $email != "" && $name == "" && $phone == "" && $message == "" ){
  $title = "Запрос на подписку Best Tour plan";
  $body = "
  <h2>Новое письмо</h2>
  <b>Электронная почта':</b> $email<br>
  <span> Данный пользователь хочет подписаться на обновления </span>
  ";
      // Отображение результата
  header ('Location: subscribe.html');    
} else{
  $title = "Запрос на бронирование номера - Best Tour plan";
  $body = "
  <h2>Бронирование номера - Grand Hilton Hotel</h2>
  <b>Имя:</b> $name<br>
  <b>Телефон:</b> <a href='tel:$phone'>$phone</a><br>
  <b>Электронная почта:</b> $email<br><br>
  <b>Сообщение:</b><br>$message
  ";
  header ('Location: booking.html');
};

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = 'best.tour.plan.lashchev.dev@gmail.com'; // Логин на почте
    $mail->Password   = 'cYI1HkHp2D@Z#0Ew&&lS4GEXiu'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('best.tour.plan.lashchev.dev@gmail.com', 'Best Tour Plan'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('andrew.lashchev15@gmail.com');

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}
