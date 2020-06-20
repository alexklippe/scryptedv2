<?php
$CONNECT = mysqli_connect('localhost', 'admin', 'Proryv12!', 'covidinfo');
$domen = $_SERVER['SERVER_NAME'];
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

switch ($domen){
	case '130.193.36.149':
		if ($Page == 'index'): include('index.html');
		elseif ($Page == 'php'): include('info.php');
		elseif ($Page == 'test'): include('test.php');
		//elseif ($Page == 'hr2019' and $Module == 'api'): include('hr2019/api.php');
		
		else: include('404.php');
		endif;
	break;
	
	
}
?>