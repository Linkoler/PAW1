<?php
require_once dirname(__FILE__).'/../../config.php';
function getParamsLogin(&$form){
	$form['login'] = isset ($_REQUEST ['login']) ? $_REQUEST ['login'] : null;
	$form['haslo'] = isset ($_REQUEST ['haslo']) ? $_REQUEST ['haslo'] : null;
}
function validateLogin(&$form,&$error){
	if (!(isset($form['login']) && isset($form['haslo']))){
		return false;
	}
	if($form['login'] == ""){
		$error[] = 'Nie podano loginu';
	}
	if($form['haslo'] == ""){
		$error[] = 'Nie podano hasła';
	}
	if(count($error) > 0) return false;
	if($form['login'] == "admin" && $form['haslo'] == "admin"){
		session_start();
		$_SESSION['rola'] = 'admin';
		return true;
	}
	if($form['login'] == "user" && $form['haslo'] == "user"){
		session_start();
		$_SESSION['rola'] = 'user';
		return true;
	}
	$error[] = 'Niepoprawny login lub hasło';
	return false; 
}
$form = array();
$error = array();
getParamsLogin($form);
if(!validateLogin($form,$error)){
	include _ROOT_PATH.'/apka/ochrona/login_widok.php';
}else{ 
	header("Location: "._APP_URL);
}