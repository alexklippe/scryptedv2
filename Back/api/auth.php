<?php
header("Content-type: application/json; charset=utf-8");

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST, GET");
$serverGet = json_decode(file_get_contents('php://input'), true);

//$_COOKIE['']
switch($URL_Parts[0]){
	case 'reg':
		if(!isset($_POST['email']) or !isset($_POST['name']) or !isset($_POST['pass'])){
			echo '["Ошибка!"]';
			exit;
		}
		$mail = $_POST['email'];
		$auth = mysqli_fetch_array(mysqli_query($CONNECTi,"SELECT * FROM `user` WHERE `mail` = '$mail'"));
		if($auth){
			echo '["Этот адрес уже зарегестрирован на платформе!"]';
			exit;
		}
		$name = $_POST['name'];
		$pass = SHA1($_POST['pass'].'090').'tokt'.md5('covidinfo'.$_POST['pass']);
		mysqli_query($CONNECT, "INSERT INTO user VALUES ('0','$mail','$name','$pass')");
		$time = time();
		$token = SHA1('auth'.$time.$mail.$pass);
		setcookie('token', $token);
		mysqli_query($CONNECT, "INSERT INTO auth VALUES ('0','$token','$mail','$time')");
		echo '["Регестрация завершена!"]';
	break;
	
	case 'login':
		$mail = $_POST['email'];
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