<?php
	session_start();
	unset($_SESSION['userConnect']);
	header("Location: /index.php");
?>