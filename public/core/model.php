<?php
/**
 * Classe Pai de models, com acesso ao banco de dados
 */
namespace core;

use PDO;
use PDOException;

class model {
	protected $pdo;
	public function __construct() {
        $dsn = 'mysql:host='.HOST.';dbname='.DBNAME.';port=3306';
        $user = DBUSER;
        $password = DBPASS;
		try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
		} catch (PDOException $e) {
			die("Erro de conexão: ".$e->getMessage());
		}
	}
}

?>