
<?php
	function redirect($url){
		header('location:'.$url);
		$url=htmlspecialchars($url);
		echo '<p>Redirecting to <a href="',$url,'">',$url,'</a>
			<p>You will be redirected automatically. If not, please click the link above.
			<script>document.location="',$url,'";</script>';
		die();
	} 

	function openDB() {

		// open database
		$db = new PDO("mysql:host=".SQL_HOST.";dbname=".SQL_DB, SQL_USER, SQL_PWD);

		/*** set the error mode to excptions ***/
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $db;
	}
?>