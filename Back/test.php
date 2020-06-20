<?php
$email = $_GET['email'];
$domen = $_GET['domen'];

print_r($email);

include('puny.php');

echo '<br>';

if(valid_email($email)){
	echo 'ok';
}else{
	echo 'err';
}




?>