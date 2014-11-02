<?php

// get MySQL host IP for OpenShift
$host = getenv("OPENSHIFT_MYSQL_DB_HOST");

if ($host == "") {
	// use localhost on local machine
	$host = 'localhost';
	define('SQL_USER','root');
	define('SQL_PWD','');
} else { 
	// OpenShift server
	define('SQL_USER','adminDEpHLdU');
	define('SQL_PWD','9-Q1fS4W3CW5');
}

define('SQL_HOST', $host);
define('SQL_DB','overseas');
?>