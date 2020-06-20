<?php


switch($Module){
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
		echo '["Регестрация завершена!"]';
	break;
	
	case 'login':
		$mail = $_POST['email'];
		$pass = $_POST['pass'];
		$auth = mysqli_fetch_array(mysqli_query($CONNECTi,"SELECT * FROM `user` WHERE `mail` = '$mail'"));
		
		
		setcookie('token',);
	break;
	
}




?>