<?php
session_start();
require_once "conexão.php";
    if (isset($_POST['email']) && empty($_POST['email']) == false) 
        if (isset($_POST['senha']) && empty($_POST['senha']) == false) 
            if(isset($_POST['nome']) && empty($_POST['nome']) == false){
                $email = addslashes($_POST['email']);
                $senha = md5(addslashes($_POST['senha']));
                $nome  = addslashes($_POST['nome']);
        
    

    try {


        $db = new conexao();
        $db = $db->query(" SELECT * FROM usuarios WHERE email = '$email'  ");
        //nesse trecho ele verifica se existe email no banco
       
        
        if($db->contador() == 'erro'){
            $db = new PDO($dsn, $dbuser, $dbpass);
            $db = $db->query("INSERT INTO usuarios(email,senha,nome) VALUES ('$email', '$senha', '$nome')");
                
                header("Location: ../login.html");
        //utilizando esse método ele checa o numero de respostas dada pelo sql  se não existe igual faça

        }
        
         else{
            
            echo "Parametro Existente";
        }
          

     } 
      
    catch (Exception $e) {
        echo 'Erro'.$e.getMessage();
    }

}
    ?>