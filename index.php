<?php require('header.php'); ?>
<div id="content">
<table id="loginTable">
<colgroup>
		<col width="60%">
		<col width="40%">
	</colgroup>
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
	<form method="POST" action="login-action.php" class="spooky">
		<label for="user">User ID: </label><input type="text" name="username"/>
		<label for="password">Password: </label><input type="password" name="password"/>
		<input type="submit" value="Log in"/>
	</form>
</td>
<td>
<table id="loginImage">
<tr>
<td><img src="images/login.jpg"/></td>
</tr>
</table>
</td>
</tr>
</table>
</div>
