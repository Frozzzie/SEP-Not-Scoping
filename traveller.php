<?php
	require_once('header.php');
	session_start();
?>
<h0>UTS Travel Funding</h0>
<div id="content">
<table id="menu">
	<tr>
		<th><a href="traveller.php" style="text-decoration:none;">My Applications</a></th>
	</tr>
	<tr>
		<th><a href="traveller-create-application.php" style="text-decoration:none;">New Application</a></th>
	</tr>
</table>
<div id="mainSpooks" class="spooky">
<h1> Welcome to the UTS Travel Lodge</h1>
<h3>Hello <?php echo $_SESSION['user_info']['full_name']; ?>, what would you like to do today?</h3>
<div id="moreScaryDivs">
<a href="traveller-create-application.php"><input type="button" id="superSpookyButton" value="Submit an Application"/></a>
<div id="evenMoreScaryDivs">
<a href="" ><input type="button" id="superSpookyButton" value="View my Applications"/></a></div></div>

</div>
</div>
<?php require('footer.php'); ?>