<?php
	require_once __DIR__.'/../header.php';
	session_start();
	require_once __DIR__.'/../inc/functions.php';
	require_once __DIR__.'/../model/application.php';	
	
	// add a lot more here.
	/*
		public static function CreateApplication($user, $content, $supportingdocuments, $conference_url, $conf_start_date, $conf_end_date,
			$travel_start_date, $travel_end_date, $quality_of_paper, $paper_accepted, $conf_confirmation_attached, $peer_review_attached,
			$copy_of_paper_attached, $special_invitation, $special_duties, $pep_arrangement_details, $research_grant, $research_student,
			$research_strength, $research_strength_travel_support, $funding_stage, $supervisor_has_grant, $vc_conference_fund, $request_air_fare,
			$request_accomodation, $request_conf_fees, $request_meals, $request_local_fares, $request_car_mileage, $request_other)
	*/
	try {
		Application::CreateApplication($_SESSION['user_info']['user_id'], $_POST['content'], "", "", "", "", "", "", "", false, false, false,
			false, false, "", "", false, false, "", false, 'Stage 1', false, 0, 0, 0, 0, 0, 0, 0, 0);
	}
	catch (Exception $e) {
		// do nothing
		echo "";
	}
	$_SESSION['successful_upload'] = true;
	redirect(__DIR__.'/../traveller.php');
	
?>