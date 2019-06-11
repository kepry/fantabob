<?php
session_start();
require "conexão.php";

if (isset($_SESSION['id']) && empty($_SESSION['id']) == false){
	try {
		$id = $_SESSION['id'];
		$pdo = new PDO($dsn, $dbuser,$dbpass);
				
		if(isset($_POST['senha']) && empty($_POST['senha']) == false){
        	 $senha = addslashes($_POST['senha']);
   		 	 
   		 	 $sql ="UPDATE usuarios set senha = '$senha' WHERE id = '$id' ";
			 $sql = $pdo->query($sql);
		 	 header("Location: ../index.php ");
		} 	
	}			
    catch (PDOException $e) {
				echo "Erro de Conexão".$e.getMessage();
			}
}
else {
	echo "precisa Logar";
	header("Location: ../login.html");
}




?>