<?php
	require_once 'header.php';
	session_start();
	if (in_array('successful_upload', $_SESSION) && $_SESSION['successful_upload'] == true)
	{
		header("refresh: 1");
		$_SESSION['successful_upload'] = false;
	}
?>
<div id="subheader">
	<div id="menu">
		<li><a href="traveller.php">My Applications</a></li>
		<li class="activemenu"><a href="traveller-create-application.php">New Application</a></li>
	</div>	
</div>

<div id="applicationform">
	<form method="post" action="phpfunc/create-application.php" enctype="multipart/form-data">
		Application: <input name="content" type="text" value="" />
		<input type="submit" value="Submit/Save"/>
	</form>
</div>
	
</body>
</html>