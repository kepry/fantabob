<?php

session_start();
	
include ("crud.php");
	$db = new Usuario($_SESSION['id']);
	
	if(isset($_SESSION['id'])){
		$dadon = $db->GetNome();
		echo "<br>your name: ".$dadon;
		$dados = $db->GetNome_Social();
		echo "<br>your name social: ".$dados;
		}
	else{
		echo "você precisa logar";
		header("location: ../login.html");
	}



?>