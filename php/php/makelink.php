<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// error_reporting(E_ALL);

// print_r($_POST);
if(!isset($_POST['message'])){
	die;
}
//link sanity TBD
$message = $_POST['message'];
// echo $message;
if(strlen(trim($message))==0){
	header( 'Location: '.$_SERVER['HTTP_HOST']);
	die;
}
	

include_once 'data_objects/DAOLink.php';
$shortM = storeMessage($message);
// echo $shortM;
// print_r($_SERVER);
header( 'Location: http://'. $_SERVER['HTTP_HOST'].'/msg.php?m='.$shortM );
?>