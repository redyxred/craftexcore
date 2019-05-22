<?php 
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);

	require ROOT.'/core/config.php';
	require ROOT.'/core/classes/User.class.php';

	User::clearSession();
?>