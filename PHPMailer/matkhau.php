<?php
// var_dump($khach_hang);
$email = $khach_hang['email'] ?? "";
$mk_rd = time() . "";
if ($email == "") {
    $err = "Email của bạn đang trống hoặc sai định dạng !";
} else {
    $email_sent = true;
}

include('src/PHPMailer.php');
include('src/Exception.php');
include('src/OAuth.php');
include('src/POP3.php');
include('src/SMTP.php');
require_once "model/nguoidung/taikhoan.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true); // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'openaivdoan@gmail.com'; // SMTP username
    $mail->Password = 'xepkbhygqjrgucug'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    //Recipients
    $mail->setFrom('openaivdoan@gmail.com', 'RUSHCINE6');
    $mail->addAddress($email, 'Doan 123'); // Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

    //Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Lấy lại mật khẩu';
    $mail->Body = 'Mật khẩu của bạn là: ' . $mk_rd;
    update_mk($khach_hang['id_kh'], $mk_rd);
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
