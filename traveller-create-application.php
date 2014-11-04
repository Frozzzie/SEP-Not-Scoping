<?php
	require_once 'header.php';
	session_start();
	if (in_array('successful_upload', $_SESSION) && $_SESSION['successful_upload'] == true)
	{
		header("refresh: 1");
		$_SESSION['successful_upload'] = false;
	}
?>
<h0> Submit a New Application </h0>
<div id="content">
	<table id="menu">
		<tr>
			<th><a href="traveller.php" style="text-decoration:none;">My Applications</a></th>
		</tr>
		<tr>
			<th class="activeSpooks"><a href="traveller-create-application.php" style="text-decoration:none;">New Application</a></th>
		</tr>
	</table>
	<div id="mainSpooks">
		<form method="post" action="phpfunc/create-application.php" enctype="multipart/form-data">
			<table id="spookyform">
			<tr>
				<td>
				Personal Details:
					<input type="radio" value="Student" name="applicantType"/>Student&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			
					<input type="radio" value="Staff" name="applicantType"/>Staff
				</td>
			</tr>
			<tr>
				<td><input type="file" name="content"/></td>
			</tr>
			<tr>
				<td>Application<input type="submit" value="Submit Application"/></td>
			</tr>
			</table>
			
		</form>
	</div>
</div>

<?php require("footer.php"); ?>
