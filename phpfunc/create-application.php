<?php
	require_once __DIR__.'/../header.php';
	session_start();
	require_once __DIR__.'/../inc/functions.php';
	require_once __DIR__.'/../model/application.php';	
	
	// move the uploaded file to storage
	$target_dir = __DIR__.'/../applications/'.$_SESSION['user_info']['user_id'].'/';
	$target_file = $target_dir . basename($_FILES['supportingDocuments']['name']);
	$file_type = pathinfo($target_file, PATHINFO_EXTENSION);
	echo var_dump($_FILES);
	if ($file_type !== "zip")
	{
		// its bad. Upload it anyway
	}
	
	if (move_uploaded_file($_FILES['supportingDocuments']['tmp_name'], $target_file))
	{
	
	} else {
		echo "File could not be uploaded";
	}
	
	Application::CreateApplication($_SESSION['user_info']['user_id'], $_POST['conferenceName'], $_POST['conferenceDetails'], $_POST['conferenceURL'],
				$_POST['conferenceDate'], $_POST['travelDate'], $_POST['country'], $_POST['region'], $_POST['city'], $_POST['converenceQuality'],
				$_POST['conferenceComment'], $_POST['paperTitle'], $_POST['paperAcceptance'], $_POST['HERDC'], $_POST['justification'], 
				$_POST['invitation'], $_POST['beyondDuty'], $_POST['PEP'], $_FILES['supportingDocuments']['name']);

	$_SESSION['successful_upload'] = true;
	redirect(__DIR__.'/../traveller.php');
	
?>