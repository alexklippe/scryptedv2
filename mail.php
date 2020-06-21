<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function preSend(){
	$passMainMail = 'e1a5753869';
	$Username = 'scrypted1@xn----7sbbfop6bdeyjc6o.xn--p1ai';
	$mail = new PHPMailer;
	$mail->CharSet = 'UTF-8';

	// Настройки SMTP
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPDebug = 0;
	 
	$mail->Host = 'ssl://srv.ru';
	$mail->Port = 465;
	$mail->Username = $Username;
	$mail->Password = $passMainMail;
	

	return $mail;
}

function send_mail_code($email,$name,$code){
	$mail = preSend();
	$mail->setFrom('scrypted1@xn----7sbbfop6bdeyjc6o.xn--p1ai', 'Информационная Рассылка');
	//скриптед1@xn----7sbbfop6bdeyjc6o.xn--p1ai
	//scrypted1@xn----7sbbfop6bdeyjc6o.xn--p1ai
	//$mail->addAddress('crhbgnt@xn----7sbbfop6bdeyjc6o.xn--p1ai');
	$mail->addAddressPcSdk($email, $name);
	$mail->Subject = 'Регистрация';
	$body = '<p><strong>Для подверждения почтового адреса, нажмите на ссылку: </strong> <a href="http://130.193.49.118/auth/reg?code='.$code.'&mail='.base64_encode($email).'">клик!</a></p>';
	$mail->msgHTML($body);
	$mail->send();
	print_r($mail);
	return $mail;
}

?>