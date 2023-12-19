<?php
session_start();
// var_dump($_SESSION['khach_hang']);
$email = $_SESSION['khach_hang']['email'] ?? "";
include('src/PHPMailer.php');
include('src/Exception.php');
include('src/OAuth.php');
include('src/POP3.php');
include('src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
try {

    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'openaivdoan@gmail.com';
    $mail->Password = 'xepkbhygqjrgucug';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;


    $mail->setFrom('openaivdoan@gmail.com', 'RUSHCINE6');
    $mail->addAddress($email, 'Doan 123');

    $mail->isHTML(true);
    $mail->Subject = 'Thanh toán đặt vé';
    $mail->Body = 'Chúng tôi xin chân thành cảm ơn sự quan tâm và ủng hộ của quý khách trong việc đặt vé xem phim. Sự đồng hành của quý khách là một niềm vui lớn đối với chúng tôi và chúng tôi sẽ nỗ lực hết mình để mang đến cho quý khách trải nghiệm xem phim tuyệt vời!';
    $mail->addAttachment($qrcode, 'qrcode.png');

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}