<?php
	session_start();
	unset($_SESSION['id_user']);
	unset($_SESSION['nameMenu']);
	unset($_SESSION['id_name_menu']);	
	header('Location: ../index.php');
?>