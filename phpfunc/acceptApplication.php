<?php
	require_once __DIR__.'/../model/application.php';	
	require_once __DIR__.'/../inc/functions.php';
	$id = $_GET['id'];
	Application::SetApplicationStatus($id, 'Accepted');
	sleep(1);
	redirect(__DIR__.'/../committee_chair.php');	
?>