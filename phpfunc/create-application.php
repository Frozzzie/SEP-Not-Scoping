<?php
	require_once __DIR__.'/../header.php';
	session_start();
	require_once __DIR__.'/../inc/functions.php';
	require_once __DIR__.'/../model/application.php';	
	Application::CreateApplication($_SESSION['user_info']['user_id'], $_POST['content']);
	redirect(__DIR__.'/../traveller.php');
?>