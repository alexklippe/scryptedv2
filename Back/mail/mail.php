<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function preSend(){
	$passMainMail = 'U5d-amB-RYn-y8W';
	$Username = 'no-reply@xn--80aaaas3ade3dbfv.xn--p1acf';
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
	
	return $mail;
}



function send_mail_code($email,$name,$code){
	$mail = preSend();
	$mail->setFrom('no-reply@xn--80aaaas3ade3dbfv.xn--p1acf', 'Информационная Рассылка');
	//скриптед1@xn----7sbbfop6bdeyjc6o.xn--p1ai
	//scrypted1@xn----7sbbfop6bdeyjc6o.xn--p1ai
	$mail->addAddress($email, $name);
	$mail->Subject = 'Регистрация';
	$body = '<p><strong>Для подверждения почтового адреса, нажмите на ссылку: </strong> <a href="xn--80aaaas3ade3dbfv.xn--p1acf/auth/reg?code='.$code.'&mail='.base64_encode($email).'">клик!</a></p>';
	$mail->msgHTML($body);
	$mail->send();
}
print_r($mail);

?>