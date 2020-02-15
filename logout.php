<?php 
session_start();
if (isset($_SESSION['user'])) {
	session_destroy();
	$_SESSION = array();
	header('Location: index.php');
}
 ?>