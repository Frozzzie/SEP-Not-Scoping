<?php
	session_start();
	echo "Hello, ".$_SESSION['user_info']['full_name'];
?>