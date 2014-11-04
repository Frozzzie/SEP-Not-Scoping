<?php
	require_once __DIR__.'/../model/application.php';	
	require_once __DIR__.'/../inc/functions.php';
	$id = $_GET['id'];
	Application::SetApplicationStatus($id, 'Rejected');
	sleep(4);
	redirect(__DIR__.'/../committee_chair.php');	
?>