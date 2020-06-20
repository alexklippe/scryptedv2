<?php
$CONNECT = mysqli_connect('localhost', 'admin', 'Proryv12!', 'covidinfo');
$domen = $_SERVER['SERVER_NAME'];
include('puny.php');
if ($_SERVER['REQUEST_URI'] == '/') {
	$Page = 'index';
	$Module = '';
	$URL_Parts = array();
}else{
	$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	$URL_Parts = explode('/', trim($URL_Path, ' /'));
	$Page = array_shift($URL_Parts);
	$Module = array_shift($URL_Parts);
}

if($domen == 'xn--80aaaas3ade3dbfv.xn--p1acf') $domen='130.193.36.149';

switch ($domen){
	case '130.193.49.118':
		if ($Page == 'index'): include('page/sign-in.html');
		elseif ($Page == 'php'): include('info.php');
		//Front
		elseif ($Page == 'login'): include('page/log-in.html');
		elseif ($Page == 'reg'): include('page/sign-in.html');
		elseif ($Page == 'news'): include('page/news.html');
		elseif ($Page == 'lk'): include('page/lk.php');
		//TEST
		elseif ($Page == 'test'): include('test.php');
		elseif ($Page == 'test0'): include('mail/mail.php');
		//API
		elseif ($Page == 'api' and $Module=='auth'): include('api/auth.php');
		elseif ($Page == 'auth' and $Module=='reg'): include('api/auth.php');
		//elseif ($Page == 'api' and $Module==): include('test.php');
		
		//404 error
		else: include('404.php');
		endif;
	break;
	
	
}
?>