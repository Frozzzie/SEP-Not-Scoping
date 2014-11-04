<?php
	require_once __DIR__.'/../header.php';
	session_start();
	require_once __DIR__.'/../inc/functions.php';
	require_once __DIR__.'/../model/application.php';	
	
	
	$applicationsDir = __DIR__.'/../applications/';
	$applicationsDir .= $_SESSION['user_info']['user_id'].'/';
	mkdir($applicationsDir);
	$applicationsDir = $applicationsDir.basename( preg_replace('/\s+/', '',$_FILES["content"]['name']));
	
	$uploadOK = 1;
	
	if (move_uploaded_file($_FILES["content"]["tmp_name"], $applicationsDir)) {
		// it was successful
	} else {
		
	}
	
	Application::CreateApplication($_SESSION['user_info']['user_id'], preg_replace('/\s+/', '', $_FILES['content']['name']));
	redirect(__DIR__.'/../traveller.php');
?>