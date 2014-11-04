<?php


require_once __DIR__.'/../inc/conf.php';
require_once __DIR__.'/../inc/functions.php';

class Application
{
	public static function CreateApplication($user, $content)
	{
		$db = openDB();
		$stmt = $db->prepare("INSERT INTO application (application_user, application_content, appliction_date, application_status VALUES
											(:user, :content, NOW(), 'Pending')");
		
		$stmt->bindParam(':user', $user);
		$stmt->bindParam(':content:', $content);
		$stmt->execute();
	}
}

?>