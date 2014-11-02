<?php
	session_start();
	echo "Hello Committee Chairman ".$_SESSION['user_info']['full_name'];
?>