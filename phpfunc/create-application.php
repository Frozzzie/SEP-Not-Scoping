<?php
	require_once __DIR__.'/../header.php';
	session_start();
	require_once __DIR__.'/../inc/functions.php';
	require_once __DIR__.'/../model/application.php';	
	
	// add a lot more here.
	Application::CreateApplication($_SESSION['user_info']['user_id'], $_POST['content']);
	$_SESSION['successful_upload'] = true;
	redirect(__DIR__.'/../traveller.php');
	
?>