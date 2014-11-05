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
<div id="viewApplications" style="
"><span>Theres are your applications you have submitted:</span><br>
  
  <table border="1" style="width: 100%; border: 1px solid black; border-color: yellow; padding: 30px 0px 0px 0px;">
    	<tbody>
			
			<tr>
				<td>Application Name</td>
				<td>Last Modified</td> 
				<td>Status</td>
			</tr>
			<?php 
			
			//get the arrays of applications and just display them here
			
			?>	
			<tr>
				<td>Eve</td>
				<td>Sometime today</td> 
				<td>NOT SUBMITTED</td>
		  </tr>
		</tbody>
  </table>
    
  
  </div>
</div>
</div>
<?php require('footer.php'); ?>