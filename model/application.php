<?php


require_once __DIR__.'/../inc/conf.php';
require_once __DIR__.'/../inc/functions.php';

class Application
{
	// yes I'm serious about this function.
	public static function CreateApplication($user, $content, $supportingdocuments, $conference_url, $conf_start_date, $conf_end_date,
			$travel_start_date, $travel_end_date, $quality_of_paper, bool $paper_accepted, bool $conf_confirmation_attached, bool $peer_review_attached,
			bool $copy_of_paper_attached, bool $special_invitation, $special_duties, $pep_arrangement_details, bool $research_grant, bool $research_student,
			$research_strength, bool $research_strength_travel_support, $funding_stage, $supervisor_has_grant, $vc_conference_fund, $request_air_fare,
			$request_accomodation, $request_conf_fees, $request_meals, $request_local_fares, $request_car_mileage, $request_other)
	{
		$request_total = $request_conference_fund + $request_air_fare + $request_accomodation + $request_conf_fees + $request_meals + $request_local_fares +
				$request_car_mileage + $request_other;
		
		$db = openDB();
		$stmt = $db->prepare('INSERT INTO application (application_user, application_content, application_date, application_status, application_supporting_documents
							application_conf_url, conf_start_date, conf_end_date, travel_start_date, travel_end_date, quality_of_paper, paper_accepted
							conf_confirmation_attached, peer_review_attached, copy_of_paper_attached, special_invitation, special_dutues, pep_arrangement_details,
							research_grant, research_student, research_strength, research_strength_travel_support, funding_stage, supervisor_has_grant,
							vc_conference_fund, request_air_fare, request_accomodation, request_conf_fees, request_meals, request_local_fares,
							request_car_mileage, request_other, request_total) VALUES 
											(?, ?, NOW(), "Pending", ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
		// Don't laugh.
		$stmt->bindParam(1, $user, PDO::PARAM_STR);
		$stmt->bindParam(2, $content, PDO::PARAM_STR);
		$stmt->bindParam(3, $supportingdocuments, PDO::PARAM_STR);
		$stmt->bindParam(4, $conference_url, PDO::PARAM_STR);
		$stmt->bindParam(5, $conf_start_date, PDO::PARAM_STR);
		$stmt->bindParam(6, $conf_end_date, PDO::PARAM_STR);
		$stmt->bindParam(7, $travel_start_date, PDO::PARAM_STR);
		$stmt->bindParam(8, $travel_end_date, PDO::PARAM_STR);
		$stmt->bindParam(9, $quality_of_paper, PDO::PARAM_STR);
		$stmt->bindParam(10, $paper_accepted, PDO::PARAM_STR);
		$stmt->bindParam(11, $conf_confirmation_attached, PDO::PARAM_STR);
		$stmt->bindParam(12, $peer_review_attached, PDO::PARAM_STR);
		$stmt->bindParam(13, $copy_of_paper_attached, PDO::PARAM_STR);
		$stmt->bindParam(14, $special_invitation, PDO::PARAM_STR);
		$stmt->bindParam(15, $special_duties, PDO::PARAM_STR);
		$stmt->bindParam(16, $pep_arrangement_details, PDO::PARAM_STR);
		$stmt->bindParam(17, $research_grant, PDO::PARAM_STR);
		$stmt->bindParam(18, $research_student, PDO::PARAM_STR);
		$stmt->bindParam(19, $research_strength, PDO::PARAM_STR);
		$stmt->bindParam(20, $research_strength_travel_support, PDO::PARAM_STR);
		$stmt->bindParam(21, $funding_stage, PDO::PARAM_STR);
		$stmt->bindParam(22, $supervisor_has_grant, PDO::PARAM_STR);
		$stmt->bindParam(23, $vc_conference_fund, PDO::PARAM_STR);
		$stmt->bindParam(24, $request_air_fare, PDO::PARAM_STR);
		$stmt->bindParam(25, $request_accomodation, PDO::PARAM_STR);
		$stmt->bindParam(26, $request_conf_fees, PDO::PARAM_STR);
		$stmt->bindParam(27, $request_meals, PDO::PARAM_STR);
		$stmt->bindParam(28, $request_local_fares, PDO::PARAM_STR);
		$stmt->bindParam(29, $request_car_mileage, PDO::PARAM_STR);
		$stmt->bindParam(30, $request_other, PDO::PARAM_STR);
		$stmt->bindParam(31, $request_total, PDO::PARAM_STR);
		$stmt->execute();
	}
	
	public static function SetApplicationStatus($appid, $status)
	{
		$db = openDB();
		$stmt = $db->prepare('UPDATE application SET application_status = ? WHERE application_id = ?');
		$stmt->bindParam(1, $status, PDO::PARAM_STR);
		$stmt->bindParam(2, $appid, PDO::PARAM_STR);
		$stmt->execute();
	}
	
	public static function GetApplications($status)
	{
		$result = "";
		$db = openDB();
		if (isset($status))
		{
			$stmt = $db->prepare('SELECT * FROM application LEFT JOIN user_login ON application_user = user_login.user_id WHERE application_status = ? ORDER BY application_date');
			$stmt->bindParam(1, $status, PDO::PARAM_STR);
		}
		else
			$stmt = $db->prepare('SELECT * FROM application LEFT JOIN user_login ON application_user = user_login.user_id ORDER BY application_date');
		
		$stmt->execute();
		
		return $stmt->fetchAll();
	}
	
	// requires an application table with it's user left-joined onto it. See the GetApplications() function for more info.
	public static function BuildApplicationHTML($row)
	{
		$db = openDB();
		$stmt = $db->prepare("SELECT * FROM posts LEFT JOIN application ON post_to = application_id WHERE application_id = ?");
		$stmt->bindParam(1, $row['application_id'], PDO::PARAM_STR);
		$stmt->execute();
		$numberOfPosts = count($stmt->fetchAll());
		$fileDir = dirname(__DIR__).'/applications/'.$row['user_id'].'/'.$row['application_content'];
		$result = "";
		$result .= "<div id='applicationbox'>";
		$result .= "<div id='application_fullname'>".$row['full_name']."</div>";
		$result .= "<div id='application_date'>".$row['application_date']."</div>";
		$result .= "<div id='application_content'><a href=".'phpfunc/download.php?file='.$fileDir." target='_blank'>View Application</a></div>";
		$result .= "<div id='application_post_link'> <a href=''>There are ".$numberOfPosts." comments. Click here to view them.</a></div>";
		$result .= "</div>";
		
		return $result;
	}
	
	public static function BuildApplicationForChairHTML($row)
	{
		$db = openDB();
		$stmt = $db->prepare("SELECT * FROM posts LEFT JOIN application ON post_to = application_id WHERE application_id = ?");
		$stmt->bindParam(1, $row['application_id'], PDO::PARAM_STR);
		$stmt->execute();
		$numberOfPosts = count($stmt->fetchAll());
		$fileDir = dirname(__DIR__).'/applications/'.$row['user_id'].'/'.$row['application_content'];
		$result = "";
		$result .= "<div id='applicationbox'>";
		$result .= "<div id='application_fullname'>".$row['full_name']."</div>";
		$result .= "<div id='application_date'>".$row['application_date']."</div>";
		$result .= "<div id='application_content'><a href=".'phpfunc/download.php?file='.$fileDir." target='_blank'>View Application</a></div>";
		$result .= "<div id='application_post_link'> <a href=''>There are ".$numberOfPosts." comments. Click here to view them.</a></div>";
		$result .= "<div id='application_accept'><a href='phpfunc/acceptApplication.php?id=".$row['application_id']."'>Accept</a></div>";
		$result .= "<div id='application_reject'><a href='phpfunc/rejectApplication.php?id=".$row['application_id']."'>Reject</a></div>";
		$result .= "</div>";
		
		return $result;	
	}
	
	public static function ShowAllPendingApplicationsForChair()
	{
		$applications = Application::GetApplications('Pending');
		$result = "";
		foreach ($applications as $row)
		{
			$result .= Application::BuildApplicationForChairHTML($row);
			
		}
		echo $result;		
	}
	
	public static function ShowAllPendingApplications()
	{
		$applications = Application::GetApplications('Pending');
		$result = "";
		foreach ($applications as $row)
		{
			$result .= Application::BuildApplicationHTML($row);
			
		}
		echo $result;
	}
}

?>