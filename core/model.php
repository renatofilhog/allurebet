<?php
/**
 * Classe Pai de models, com acesso ao banco de dados
 */

class model {
	// Usando o protected para ter acesso nas classes filhas
	protected $pdo;
	// Após 1 construtor, não é usado outro.
	public function __construct() {
		// Carregando as informações do CONFIG
		global $config;
		try {
			/* 
			*Usando o config
			$this->pdo = new PDO("mysql:dbname=".$config["dbname"].";host=".$config['host'],$config["dbuser"],$config["dbpass"]);
			*/
			
			$this->pdo = new PDO("mysql:dbname=".DBNAME.";host=".HOST,DBUSER,DBPASS);
			
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}

?>