<?php require('header.php'); ?>
<div id="content">
<table id="loginTable">
<tr>
<td>
<!--
	<table>
	<tr>
		<th>User Login</th>
	</tr>
	<tr>
		<td>
		<form method="POST"><label for="user_id">User ID</label> <input type="text" name="user_id"/> </form>
	</tr>
	<tr>
		<td>
		<form method="POST"><label for="password">Password</label><input type="password" name="password" /></td> </form>
	</tr>
	<tr>
		<td>
			<form action="login-action.php" method="post">
				<input type="submit" value="Log In" />
				<input type="submit" value="Register"/>
			</form>
		</td>
	</tr>
	</table>-->
	<?php
		session_start();
		if (isset($_SESSION['login_error']))
			echo $_SESSION['login_error'];
	?>
	
	<form method="POST" onsubmit="return loginValidate();" name="loginform" action="login-action.php"  class="spooky">
	<table>
	<tr>
		<td col="2"><label for="user">User ID: </label><input type="text" name="username"/></td></tr>
	<tr>
		<td><label for="password">Password: </label><input type="password" name="password"/></td></tr>
	<tr>
		<td><input type="submit" value="Log in"/></td>
	</tr>
	</form>
	</table>
</td>
<td>
<img src="images/loginNew.jpg"/></td>
</td>
</tr>
</table>
</div>
<?php require("footer.php"); ?>
