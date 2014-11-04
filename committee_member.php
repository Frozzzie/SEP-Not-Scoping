<?php
	session_start();
	require_once 'header.php';
?>

<div id="content">
<table id="menu">
	<tr>
		<th><a href="committee_chair.php">Recent Applications</a></th>		
	</tr>
</table>
</div>

<?php
	require_once 'model/application.php';
	Application::ShowAllPendingApplications();
?>

</body>
</html>