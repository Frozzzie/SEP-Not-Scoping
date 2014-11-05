<?php
	require_once('header.php');
	session_start();
?>
<h0>UTS Travel Funding</h0>

<script>
	function deleteApplication()
	{
		//this method will have parameters
		if (confirm("You are about the delete one of your applications, are you sure you want to do this?"))
		{
			alert("Your application is now being deleted, just a sec");
			//window.href.etc.etc
			//redirect with the deleteApplication paramters to the delete application php file.
		}
	}
	
	function changeSort()
	{	
		//ehh ajax would be tedious, so a simple refresh with new paramets should do it
		var sort = document.getElementById("mySelect").value;
		window.location.href = "?sort=" + sort;
	}
	

</script>

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
  <span>SORT BY</span>
  <select id="mySelect" onchange="changeSort()">				
		<option value="all">View All
		<option value="name">NAME
		<option value="status">STATUS					
	</select>
  <table border="1" style="width: 100%; border: 1px solid black; border-color: yellow; padding: 30px 0px 0px 0px;">
    	<tbody>
			
			<tr>
				<td>Application Name</td>
				<td>Last Modified</td> 
				<td>Status</td>
				<td>Actions</td>
			</tr>
			<?php 
			
			//get the arrays of applications and just display them here
			
			?>	
			<tr>
				<td>Eve</td>
				<td>Sometime today</td> 
				<td>NOT SUBMITTED</td>
				<td><button onclick="deleteApplication()">DELETE</button></td>
		  </tr>
		</tbody>
  </table>
    
  
  </div>
</div>
</div>
<?php require('footer.php'); ?>