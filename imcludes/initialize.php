<?php

//defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'saibah_medicare');

//defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'includes');

// load config file first 
//require_once(LIB_PATH.DS."config.php");
//load basic functions next so that everything after can use them
//require_once(LIB_PATH.DS."functions.php");
//later here where we are going to put our class session
//require_once(LIB_PATH.DS."session.php");


//Load Core objects
//require_once(LIB_PATH.DS."database.php");

//load database-related classes


?>
<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "cars";
	
	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		echo "Failed:" . $conn->connect_error;
	}
?>