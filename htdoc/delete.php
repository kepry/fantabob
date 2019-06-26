<?php 
require_once "crud.php";
session_start();
	$db = new Usuario($_SESSION['id']);


	if(isset($_SESSION['id']) && empty($_SESSION['id'] == false) ){
			
			$db->delete();
			header("location: logoff.php");


	}



?>