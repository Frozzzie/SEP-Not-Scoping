<?php
	require_once('header.php');
	session_start();
	echo "Hello, ".$_SESSION['user_info']['full_name'];
?>

<div id="subheader">
	<div id="menu">
		<li class="activemenu"><a href="traveller.php">My Applications</a></li>
		<li><a href="traveller-create-application.php">New Application</a></li>
	</div>
</div>
