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
	<div id="mainSpooks2">
		<form method="post" action="phpfunc/create-application.php" enctype="multipart/form-data">
			<table id="spookyform">
			<tr>
				<td>
					<label>Conference Name: </label><input type="text" size="40" name="conferenceName"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Conference Details: </label><textarea name="conferenceDetails" rows="3" cols="30.5"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label>Conference URL: </label><input type="text" size="40" name="conferenceURL" />
				</td>
			</tr>
			<tr>
				<td>
					<label>Dates of Conference: </label><input type="text" size="20" name="conferenceDate" />
				</td>
				<td>
					<label>Dates of Travel: </label><input type="text" size="20" name="travelDate" />
				</td>
			</tr>			
			<tr>
				<td><h4>Conference Location</h4></td>
			</tr>
			<tr>
				<td>
					<table id="spookyCountry">
					<tr>
						<td><label>Country: </label><input type="text" size="20" name="country" /></td>
						<td><label>Region: </label><input type="text" size="20" name="region" /></td>
						<td><label>City: </label><input type="text" size="20" name="city" /></td>
					</tr>
					</table>
					<table id="spookyConference">
					<tr>
						<td>Conference Quality: </td>
						<td width="15%"><input type="radio" value="A" name="converenceQuality"/> A</td>
						<td width="15%"><input type="radio" value="A" name="converenceQuality"/> B</td>
						<td width="15%"><input type="radio" value="Other" name="converenceQuality"/> Other</td>	
						<td>Indicate the quality of the conference. "A" conferences are top tier conferences, "B" are mid-range conferences, and other can be used to indicate all other conferences.</td> 
					</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table id="goodCoding">
					<tr>
						<td><label>Comment on Quality and Importance of Publication: </label></td>
						<td><textarea rows="5" cols="70" name="conferenceComment"></textarea></td>
					</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td><label>Title of Paper: </label><input type="textbox" name="paperTitle" size="50"/>
			</tr>
			<tr>
				<td>
					<table id="tablesAreAwesome">
						<tr>
							<td><label>Paper/Poster Accepted: </label></td>
							<td><input type="radio" name="paperAcceptance" value="Yes"/> Yes</td>
							<td><input type="radio" name="paperAcceptance" value="No"/> No, acceptance is pending</td>
						</tr>
						<tr>
							<td></td>
							<td><input type="radio" name="paperAcceptance" value="EmailConfirm"/> Conference Email confirmation attached</td>
							<td><input type="radio" name="paperAcceptance" value="Peer"/> Peer Reviews attached</td>
							<td><input type="radio" name="paperAcceptance" value="Copy"/> Copy of Paper attached</td>							
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
				<table id="spookyman">
				<tr>
					<td width="60%"><label>Does the Paper attract HERDC points?<label> </td>
					<td><input type="radio" name="HERDC" value="Yes"/> Yes</td>
					<td><input type="radio" name="HERDC" value="No"/> No</td>
				</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td><label>Justification for Travel. Why is this conference appropriate?</label>
				<textarea name="justification" rows="5" cols="50"></textarea></td>
			</tr>
			<tr>
				<td>
					<table id="CallOfDuty">
					<tr>
						<td><label>Special Conference Duties: </label></td>
						<td><input type="checkbox" value="yes" name="invitation" /> Special Invitation Received<br>
						<input type="checkbox" value="yes" name="beyondDuty" /> Will perform special duties significantly beyond those of presenting a paper.
						If so, please describe the nature of your invited contributions and attach evidence.</td>
					</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table id="spookyman">
						<tr>
							<td><label>Will you be undertaking PEP Arrangements? </label></td>
							<td><input type="radio" name="PEP" value="Yes" /> Yes</td>
							<td><input type="radio" name="PEP" value="No" /> No</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table id="spookyConference">
					<tr>
						<td>Attach supporting documents</td>
					</tr>
					<tr>
						<td><label>&nbsp;</label><input type="file" name="supportingDocuments"/></td>
					</tr>
					</table>
				</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td></td>
				<td><input type="submit" value="Submit Application"/></td>
			</tr>
			</table>			
		</form>
	</div>
</div>

<?php require("footer.php"); ?>
