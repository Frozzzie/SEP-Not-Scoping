<?php
	session_start();
	require_once 'header.php';
?>

<div id="subheader"> 
	<div id="menu">
		<li class="activemenu"><a href="committee_chair.php">Recent Applications</a></li>
		
	</div>
</div>

<?php
	require_once 'model/application.php';
	Application::ShowAllPendingApplicationsForChair();
?>

</body>
</html>