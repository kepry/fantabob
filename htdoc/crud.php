<?php

	/*
	Classe usaurio {
		
		Traz em sí o método para realizar a conexão, Configurando as variaveis privadas junto com o método para recolher os mesmo

		functio salvar{
				Trás em sí método que vem para sanar a nescessidade de outro metodo par atualizar, ja recolhendo a "id" se não ele cadastra dentro do outro if onde ele faz uma contagem quando > 0 cadastra;

		}

	}


	*/

	class Usuario{
	private $id;
	private $email;
	private $senha;
	private $nome;

	private $nome_social;
	private $escolaridade;
	private $data_nacimento;
	private $endereco;
	private $telefone;


	private $pdo;


	public function __construct($i){
		

		try {
			 $this->pdo = new PDO("mysql:dbname=bancoacon;host=localhost","JaromAdmin","toor@toor");
			 
			 }

		catch (PDOException $e) {
			echo "Erro".$e->getMessage();
		}	

		if(!empty($i)){
			 $sql = "SELECT * FROM usuarios WHERE id = ? ";
			 $sql = $this->pdo->prepare($sql);
			 $sql->execute(array($i));

			 if($sql->rowCount() > 0){


			 	 $data = $sql->fetch();
			 	 $this->id = $data['id'];
			 	 $this->email = $data['email'];
			 	 $this->senha = $data['senha'];
			 	 $this->nome = $data['nome'];
			 	 $this->nome_social = $data['nome_social'];
			 	 $this->escolaridade = $data['escolaridade'];
			 	 $this->data_nacimento = $data['data_nacimento'];
			 	 $this->endereco = $data['endereco'];
			 	 $this->telefone = $data['telefone'];

		}	
	}

}

	public function SetId($i){
		$this->id = $i;
	}

	public function SetNome($n){
		$this->nome = $n;
	}
	public function SetEmail($e){
		$this->email = $e;
	}
	public function SetSenha($s){
		$this->senha = $s;
	}
	public function SetNome_Social($ns){
		$this->nome_social = $ns;
	}
	public function SetEscolaridade($esc){
		$this->escolaridade = $esc;
	}
	public function SetData($d){
		$this->data_nacimento = $d;
	}
	public function SetEndereco($end){
		$this->endereco = $end;
	}
	public function SetTelefone($t){
		$this->telefone = $t;
	}

	//Métodos de configurar;



	public function GetNome(){
		return $this->nome;
	}
	public function GetEmail(){
		return $this->email;
	}
	public function GetSenha(){
		return $this->nome_social;
	}
	public function GetEscolaridade(){
		return $this->escolaridade;
	}
	public function GetData(){
		return $this->data_nacimento;
	}
	public function GetEndereco(){
		return $this->endereco;
	}
	public function GetTelefone(){
		return $this->telefone;
	}
	public function GetNome_Social(){
		return $this->nome_social;
	}
	//Métodos para devolver dados



	public function salvar(){
		if(!empty($this->id)){

			$sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ?, nome_social = ?, endereco = ?,escolaridade = ?, data_nacimento = ?,telefone = ? where id = ? ";
			$sql = $this->pdo->prepare($sql);
			$sql->execute(array(
				$this->nome,
				$this->email,
				$this->senha,
				$this->nome_social,
				$this->endereco,
				$this->escolaridade,
				$this->data_nacimento,
				$this->telefone,
				$this->id)
				
				
			//Método para atualizar
		);

		}

	}
	public function delete(){

		if(!empty($this->id)){
			$sql = " DELETE FROM usuarios WHERE id = ?  ";
    		$sql = $this->pdo->prepare($sql);
    		$sql->execute(array(
    				$this->id

    	));

    	
    }		
			    		
		
}
	//método para excluir  o user

	public function backup(){

			$sql = "INSERT INTO backup (nome, email, senha, nome_social , endereco,escolaridade , data_nascimento,telefone) VALUES(?,?,?,?,?,?,?,?)";
			$sql = $this->pdo->prepare($sql);
			$sql->execute(array(
				$this->nome,
				$this->email,
				$this->senha,
				$this->nome_social,
				$this->endereco,
				$this->escolaridade,
				$this->data_nacimento,
				$this->telefone)
				
				
			//Método para armazenar o user em outro banco para evitar perca de dados
		);
			if(!empty($this->id)){
			$sql = " DELETE FROM usuarios WHERE id = ?  ";
    		$sql = $this->pdo->prepare($sql);
    		$sql->execute(array(
    				$this->id

    	));
    	//método para excluir dado da tabela usuarios usando o where para endentificar o user 
    }		
}

 

}

	
?>