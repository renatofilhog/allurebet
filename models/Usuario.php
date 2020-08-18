<?php
// Classe criada anteriormente em outros módulos, foi re-adaptada
// Nivel acesso: 1 = Administrador / 0 = Cliente;


class Usuario extends model {
	private $id;
	private $nome;
	private $email;
	private $senha;
	private $nivel_acesso;


	public function contarUsuarios(){
		$sql = "SELECT * FROM usuarios";
		$sql = $this->pdo->query($sql);
		return $sql->rowCount();
	}

	/*
	* Consulta um único usuário, usado na action de consulta e para pegar parâmetros
	*/
	public function consultar($email, $senha){
		$sql = "SELECT * FROM usuarios WHERE email=? AND senha=?";
		$sql = $this->pdo->prepare($sql);
		$sql->bindParam(1,$email, PDO::PARAM_STR);
		$sql->bindParam(2,$senha, PDO::PARAM_STR);
		$sql->execute();
		$data = array();
		if ($sql->rowCount()>0){
			$data = $sql->fetch();
			$this->nome = $data["nome"];
			$this->email = $data["email"];
			$this->id = $data["id"];
			$this->nivel_acesso = $data["nivel_acesso"];
			return true;
		}
		return false;
	}
	
	public function salvar(){
		if (isset($this->id) && !empty($this->id)){
			//Update
			$sql = "UPDATE usuarios SET nome=?, email=?, senha=?, nivel_acesso=? WHERE id=?";
			$sql = $this->pdo->prepare($sql);
			$sql->bindParam(1,$this->nome, PDO::PARAM_STR);
			$sql->bindParam(2,$this->email, PDO::PARAM_STR);
			$sql->bindParam(3,$this->senha, PDO::PARAM_STR);
			$sql->bindParam(4,$this->nivel_acesso, PDO::PARAM_INT);
			$sql->bindParam(5,$this->id, PDO::PARAM_INT);
			//$sql->execute(array($this->nome,$this->email,$this->senha,$this->id));
			$sql->execute();

		} else if (isset($this->nome) && isset($this->email) && isset($this->senha) && !empty($this->nome) && !empty($this->email) && !empty($this->senha)) {
			//Insert
			$sql = "INSERT INTO usuarios SET nome=?, email=?, senha=?";
			$sql = $this->pdo->prepare($sql);
			if($sql->execute(array($this->nome,$this->email,$this->senha))){
				$this->id = $this->pdo->lastInsertId();
				$this->nivelAcesso = 0;
				return true;

			} else {
				return false;
			}
		} 
	}

	public function delete(){
		// Função DELETE
		if(isset($this->id)){
			$sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id=:id");
			$sql->bindValue("id",$this->id);
			$sql->execute();
			$this->setMessage("Usuário deletado com sucesso!");
		} else {
			$this->setMessage("Usuário ainda não cadastrado / ID não setado ou encontrado");
		}
	}




	/*
	* Getters e Setters
	* Esse não foi no gerador, foi a mão mesmo kk
	*/

	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($n){
		$this->nome = $n;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($e){
		$this->email = $e;
	}

	public function getNivelAcesso(){
		return $this->nivel_acesso;
	}

	public function setNivelAcesso($na){
		$this->nivel_acesso = $na;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($s){
		$this->senha = $s;
	}
	/*
	* Tráz todos os usuários, usado na tabela
	* ========= Desuso ===============
	*/
	public function trazerTodos(){
		$sql = "SELECT * FROM usuarios";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();
		if ($sql->rowCount()>0) {
			return $sql->fetchAll();
		} else {
			$this->setMessage("Não teve resultados");
		}
	}
	/* 
	* Teste de Mensagem de Erro
	*/
	private $message;
	public function getMessage(){
		return $this->message;
	}
	private function setMessage($m){
		$this->message = $m;
	}
}



?>