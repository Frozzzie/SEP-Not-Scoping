<?php
	require_once 'header.php';
?>
<div id="subheader">
	<div id="menu">
		<li><a href="traveller.php">My Applications</a></li>
		<li class="activemenu"><a href="traveller-create-application.php">New Application</a></li>
	</div>	
</div>

<div id="applicationform">
	<form method="post" action="phpfunc/create-application.php" enctype="multipart/form-data">
		<input type="file" name="content"/>
		<br>
		<input type="submit" value="Submit Application"/>
	</form>
</div>
	
</body>
</html>