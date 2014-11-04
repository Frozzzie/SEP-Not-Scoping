<?php


require_once __DIR__.'/../inc/conf.php';
require_once __DIR__.'/../inc/functions.php';

class Application
{
	public static function CreateApplication($user, $content)
	{
		$db = openDB();
		$stmt = $db->prepare('INSERT INTO application (application_user, application_content, application_date, application_status) VALUES 
											(?, ?, NOW(), "Pending")');
		
		$stmt->bindParam(1, $user, PDO::PARAM_STR);
		$stmt->bindParam(2, $content, PDO::PARAM_STR);
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