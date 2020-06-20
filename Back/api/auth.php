<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST, GET");
$serverGet = json_decode(file_get_contents('php://input'), true);
$_POST = json_decode($serverGet['body'], JSON_UNESCAPED_UNICODE);


if($Page == 'auth' and $Module=='reg'){
	if(!isset($_GET['code']) or !isset($_GET['mail'])){
		echo '<script>alert("Ссылка не действительна!")</script>';
		header('Location: '. 'http://сасайкудасай.рус/reg');
		exit;
	}
	$mail = base64_decode($_GET['mail']);
	$auth = mysqli_fetch_array(mysqli_query($CONNECT,"SELECT * FROM `user` WHERE `mail` = '$mail'"));
	if($auth['code'] == $_GET['code']){
		$time = time();
		$token = SHA1('auth'.$time.$mail.$pass);
		setcookie('token', $token);
		mysqli_query($CONNECT, "INSERT INTO `auth` VALUES ('0','$token','$mail','$time')");
		mysqli_query($CONNECTi,"UPDATE `user` SET `code`='ok' Where `mail`='$mail'");
		header('Location: ' . 'https://сасайкудасай.рус/lk');
	}else{
		echo '<script>alert("Ссылка не действительна!")</script>';
		header('Location: '. 'https://сасайкудасай.рус/reg');
	}
	exit;
}
header("Content-type: application/json; charset=utf-8");
//$_COOKIE['']
switch($URL_Parts[0]){
	case 'reg':
		if(!isset($_POST['email']) or !isset($_POST['name']) or !isset($_POST['pass'])){
			echo '["Ошибка!"]';
			exit;
		}
		if(!valid_email($_POST['email'])){
			echo '["Ошибка!"]';
			exit;
		}
		$mail = convent_email($_POST['email']);
		$auth = mysqli_fetch_array(mysqli_query($CONNECT,"SELECT * FROM `user` WHERE `mail` = '$mail'"));
		if($auth){
			echo '["Этот адрес уже зарегестрирован на платформе!"]';
			exit;
		}
		$name = $_POST['name'];
		$pass = SHA1($_POST['pass'].'090').'tokt'.md5('covidinfo'.$_POST['pass']);
		$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$code = substr(str_shuffle($permitted_chars), 0, 32);
		mysqli_query($CONNECT, "INSERT INTO `user` VALUES ('0','$mail','$name','$pass','$code')");
		echo '["На указанный вами e-mail отправлено письмо с ссылкой для подтверждения регистрации."]';
		include('mail/mail.php');
		send_mail_code($mail,$name,$code);
		
		
		
		
		
	break;
	
	case 'login':
		$mail = valid_mail($_POST['email']);
		$pass = $_POST['pass'];
		$auth = mysqli_fetch_array(mysqli_query($CONNECT,"SELECT * FROM `user` WHERE `mail` = '$mail'"));
		if($auth['pass'] != SHA1($_POST['pass'].'090').'tokt'.md5('covidinfo'.$_POST['pass'])){
			echo '["Неверный логин или пароль!"]';
			exit;
		}
		$time = time();
		$token = SHA1('auth'.$time.$mail.$pass);
		setcookie('token', $token);
		mysqli_query($CONNECT, "INSERT INTO auth VALUES ('0','$token','$mail','$time')");
		echo '["Авторизация завершена!"]';
	break;
	
}




?>