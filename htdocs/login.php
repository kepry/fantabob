<?php
session_start();
require "conexão.php";
if (isset($_POST['email']) && empty($_POST['email']) == false) 
	if (isset($_POST['senha']) && empty($_POST['senha']) == false) {
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);

		

		try {
			
			$db = new PDO($dsn, $dbuser,$dbpass);
			$sql = $db->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");

		if ($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$_SESSION['id'] = $dado['id'];
			header("Location: index.php");
			}
		} catch (PDOException $e) {
				echo "Erro de Conexão".$e.getMessage();
		}


}else{
	echo 'Erro';
}

?>
