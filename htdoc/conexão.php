
<?php 
	
	private $dsn;

	class conexao{

		functon public __construct(){

			$dsn = new PDO("mysql:dbname=acon;host=localhost";"JaromAdmin";"toor@toor");

		}

	}


?>