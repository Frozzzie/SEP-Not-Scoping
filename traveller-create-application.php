<?php
	//require_once('header.php');
	session_start();
	function postApplication()
	{
		require_once('model/application.php');
		Application::CreateApplication($_SESSION['user_info']['user_id'], $_SESSION['content']);
	}
?>

<div id="subheader">
	<div id="menu">
		<li><a href="traveller.php">My Applications</a></li>
		<li class="activemenu"><a href="traveller-create-application.php">New Application</a></li>
	</div>	
</div>

<div id="applicationform">
	<form action=<?php redirect('raveller-create-application.php'); ?> method="post">
		<input type="submit" value="Submit Application"/>
		<label>Garbage</label><input name="content" type="text"/>
	</form>
</div>
	
</body>
</html>