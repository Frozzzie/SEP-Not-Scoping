<?php
	session_start();
	require_once 'header.php';
	require_once 'model/application.php';
	Application::ShowAllPendingApplications();
?>

<div id="subheader"> 
	<div id="menu">
		<li class="activemenu"><a href="committee_chair.php">Recent Applications</a></li>
		
	</div>
</div>



</body>
</html>