<?php
    class Banco {
    	private $pdo;
    	private $numRows;
    	private $array;
    	
        public function __construct($host, $dbname, $dbuser, $dbpass){

    	 	try {
    	 		$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$dbuser, $dbpass);    	 
            }
            catch(PDOException $e){
            echo "Erro".$e->getMessage();
            }
        }

    	 //metodo de conexão 

    	public function query($sql){

    	 	$query = $this->pdo->query($sql);
    	 	$this->numRows = $query->rowCount();
    	 	$this->array = $query->fetchAll();

    	 }
    	public function numRows(){
    	 		return $this->numRows;
    	 }
    	 //método para retornar quantidade de posts

    	public function result(){

    	 		return $this->array;

    	  }
    	 //método para retornada resposta do Banco;



        public function update($table, $data, $where = array() , $where_cond){

            if(!empty($table) && (is_array($data)) && is_array($where)){

                    $sql = "UPDATE ".$table." SET";

                    foreach ($dado as $chave => $valor) {
                        $dado[] = $chave." = ".addslashes($valor)."'";
                    }
                    $sql = $sql.implode(", ",$dado);

                    if(count($where) > 0 ){
                        foreach ($dado as $chave => $valor) {
                        $dado[] = $chave." = ".addslashes($valor)."'";
                    }
                    $sql = $sql."where ".implode(" ".$where_cond." " ,$dado);
            }

        }




       
}
}

?>