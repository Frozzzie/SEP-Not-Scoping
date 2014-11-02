<?php
	session_start();
	echo "Hello Committee Member ".$_SESSION['user_info']['full_name'];
?>