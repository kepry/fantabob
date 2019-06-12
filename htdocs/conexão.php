<?php 
	class conexao{
		private $dsn;
		private $array;
		private $numRows;
		private $query;

		public function __construct(){

			$this->dsn = new PDO("mysql:dbname=acon-banco;host=localhost","JaromAdmin","toor@toor");

		}

		public function query($sql){

			$query = $this->dsn->query($sql);
			$this->numRows = $query->rowCount();
			$this->array = $query->fetch();


			
			
		}
		public function getRetorno(){

			return $this->array;


		} 
		public function contador(){

			if($this->numRows == null){

					return $this->numRows = 'erro';

				}
				else{
					return $this->numRows;
				}

		}




	}

?>