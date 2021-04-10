<?php
	session_start();
	session_destroy();	//detruit la session
	header("Location: http://projetdevweb/index.php");

?>