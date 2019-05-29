<?php
session_start();
require_once "conexão.php";
    if (isset($_POST['email']) && empty($_POST['email']) == false) 
        if (isset($_POST['senha']) && empty($_POST['senha']) == false) 
            if(isset($_POST['nome']) && empty($_POST['nome']) == false){
                $email = addslashes($_POST['email']);
                $senha = md5(addslashes($_POST['senha']));
                $nome  = addslashes($_POST['nome']);
}    
    

    try {
        $db = new PDO($dsn, $dbuser, $dbpass);
        $query = "INSERT INTO usuarios (nome, email, senha)  VALUES('$nome','$email','$senha')";
        $sql = $db->query($query);
        if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
            
            header("Location: index.php");
        
   }     
}      catch (Exception $e) {
        echo 'Erro'.$e.getMessage();

    
}

    ?>