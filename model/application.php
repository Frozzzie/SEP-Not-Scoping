<?php


require_once __DIR__.'/../inc/conf.php';
require_once __DIR__.'/../inc/functions.php';

class Application
{
	// yes I'm serious about this function.
	// bools are $paper_accepted, $conf_confirmation_attached, $peer_review_attached, $copy_of_paper_attached, $special_invitation, $research_grant,
	// 		$research_student and $research_strength_travel_support.
	// Just incase you were wondering which ones. The rest are numbers, texts and dates. Should be easy to tell what is what. Check the DB for more info.
	public static function CreateApplication($user, $conf_name, $conf_details, $conf_url, $conf_dates, $trave_dates, $country,
											$region, $city, $conf_quality, $publication_importance, $paper_title, $paper_acceptance, $HERDC,
											$justification, $special_invite, $special_duties, $PEP, $supporting_documents)
	{
		if (!isset($HERDC))
			$HERDC = "No";
		if (!isset($special_duties))
			$special_duties = "No";
		$db = openDB();
		$stmt = $db->prepare('INSERT INTO `overseas`.`application` (`application_user`, 
							`application_status`, `application_date`, `conf_name`, `conf_details`, `conf_url`,
							`conf_dates`, `trave_dates`, `country`, `region`, `city`, `conf_quality`, `publication_importance`,
							`paper_title`, `paper_acceptance`, `HERDC`, `justification`, `special_invite`, `special_duties`, `PEP`,
							`supporting_documents`) 
							VALUES (:user, "Pending", NOW(), :conf_name, :conf_details, :conf_url, :conf_dates, :travel_dates, :country, :region, 
							:city, :conf_quality, :publication_importance, :paper_title, :paper_acceptance, :herdc, :justification, 
							:special_invite, :special_duties, :pep, :supporting_documents)');
		// Don't laugh.
		$stmt->bindParam(':user', $user, PDO::PARAM_STR);
		$stmt->bindParam(':conf_name', $conf_name, PDO::PARAM_STR);
		$stmt->bindParam(':conf_details', $conf_details, PDO::PARAM_STR);
		$stmt->bindParam(":conf_url", $conf_url, PDO::PARAM_STR);
		$stmt->bindParam(":conf_dates", $conf_dates, PDO::PARAM_STR);
		$stmt->bindParam(":travel_dates", $trave_dates, PDO::PARAM_STR);
		$stmt->bindParam(":country", $country, PDO::PARAM_STR);
		$stmt->bindParam(":region", $region, PDO::PARAM_STR);
		$stmt->bindParam(":city", $city, PDO::PARAM_STR);
		$stmt->bindParam(":conf_quality", $conf_quality, PDO::PARAM_STR);
		$stmt->bindParam(":publication_importance", $publication_importance, PDO::PARAM_STR);
		$stmt->bindParam(":paper_title", $paper_title, PDO::PARAM_STR);
		$stmt->bindParam(":paper_acceptance", $paper_acceptance, PDO::PARAM_STR);
		$stmt->bindParam(":herdc", $HERDC, PDO::PARAM_STR);
		$stmt->bindParam(":justification", $justification, PDO::PARAM_STR);
		$stmt->bindParam(":special_invite", $special_invite, PDO::PARAM_STR);
		$stmt->bindParam(":special_duties", $special_duties, PDO::PARAM_STR);
		$stmt->bindParam(":pep", $PEP, PDO::PARAM_STR);
		$stmt->bindParam(":supporting_documents", $supporting_documents, PDO::PARAM_STR);
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
	
	public static function GetApplicationsForUser($userID)
	{
		$db = openDB();
		$stmt = $db->prepare("SELECT * FROM application LEFT JOIN user_login ON application_user = user_login.user_id WHERE user_login.user_id = :userID");
		$stmt->bindParam(":userID", $userID, PDO::PARAM_STR);
		
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
	
	public static function BuildApplicationForUserHTML($row)
	{
		$result = "";		
		$result .= "<div id='applicationbox'>";
		$result .= "<div id='application_date'>".$row['application_date']."</div>";
		$result .= "<div id='conference'>".$row['conf_name']."</div>";
		$result .= "<div id='application_status'>".$row['application_status']."</div>";
		$result .= "<div id='conference_lcoation'>Where: ".$row['city'].', '.$row['region'].', '.$row['country']."</div>";
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
	
	public static function ShowAllUserApplications($userID)
	{
		$applications = Application::GetApplicationsForUser($userID);
		$result = "";
		foreach ($applications as $row)
		{
			$result .= Application::BuildApplicationForUserHTML($row);
		}
		
		echo $result;
	}
	
	public static function ShowAllUserApplicationsRaw($userID)
	{
		return Application::GetApplicationsForUser($userID);
	}
}

?>