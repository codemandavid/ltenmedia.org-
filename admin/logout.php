<?php 
session_start();
if (array_key_exists('id', $_SESSION)) {
	
		$_SESSION = array();
		unset($_SESSION);
	
		header("location:login.php");

}else{
	echo "Session does not exit";
}






 ?>