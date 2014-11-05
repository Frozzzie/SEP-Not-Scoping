<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <link href="css/main.css" rel="stylesheet" type="text/css"/>
   <link href="css/chairmember.css" rel="stylesheet" type="text/css"/>
   <script src="js/inputValidate.js"></script>
<title>UTS Travel Lodging System</title>
<?php if (isset($_SESSION['user_id'])) { ?>
<p class="spooky" id="right">You are currently logged in as Mr Noscope<br>
This is not me?<form action="index.php" method="post">
<a href="index.php"><input type="button" value="Log out" class="spookybutton" /></a></p>
</form>
<?php } ?>
</head>
<body>
