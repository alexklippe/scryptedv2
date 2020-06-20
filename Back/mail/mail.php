<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$code = 'zhd25gs3';
$passMainMail = 'U5d-amB-RYn-y8W';
$Username = 'no-reply@xn--80aaaas3ade3dbfv.xn--p1acf';
echo 'load ok';

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';

// Настройки SMTP
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 0;
 
$mail->Host = 'ssl://smtp.yandex.ru';
$mail->Port = 465;
$mail->Username = $Username;
$mail->Password = $passMainMail;
//	скриптед1@xn----7sbbfop6bdeyjc6o.xn--p1ai
$mail->setFrom('no-reply@xn--80aaaas3ade3dbfv.xn--p1acf', 'Информационная Рассылка');
$mail->addAddress('scrypted1@xn----7sbbfop6bdeyjc6o.xn--p1ai', 'Константин Бузыкин');
$mail->Subject = 'Попытка регистрации';
$body = '<p><strong>Для подверждения почтового адреса, перейдите по ссылки: </strong> <a href="xn--80aaaas3ade3dbfv.xn--p1acf/auth/reg?code='.$code.'"></a></p>';
$mail->msgHTML($body);
$mail->send();
print_r($mail);

?>