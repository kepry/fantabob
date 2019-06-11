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
	private $pdo;


	public function __construct($i){
		

		try {
			 $this->pdo = new PDO("mysql:dbname=acon-banco;host=localhost","JaromAdmin","toor@toor");
			 echo "conexão feita";
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
	//Métodos de configurar;



	public function GetNome(){
		return $this->nome;
	}
	public function GetEmail(){
		return $this->email;
	}

	public function GetId(){
		return $this->id;
	}
	//Métodos para devolver dados



	public function salvar(){
		if(!empty($this->id)){

			$sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ?  where id = ? ";
			$sql = $this->pdo->prepare($sql);
			$sql->execute(array(
				$this->nome,
				$this->email,
				$this->senha,
				$this->id )
				
			//Método para atualizar
		);

		}
		else{
			$sql = "INSERT INTO usuarios SET id = ? ,email = ?, senha = ?, nome = ? ";
			$sql = $this->pdo->prepare($sql);
			$sql->execute(array(
				$this->id,
				$this->email,
				$this->senha, 
				$this->nome)
			//Método para cadastro
		);

		}
	}
}


?>