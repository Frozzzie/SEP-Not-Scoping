<?php
	$file =$_GET['file'];
	ob_start();
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public");
	header("Content-Description: File Transfer");
	header("Content-type: application/force-download");
	header("Content-Disposition: attachment; filename=".$file); 
	header("Content-Type: application/octet-stream");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: ".filesize($file)."");
	
	readfile($file);
?>