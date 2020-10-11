<?php
// Classe criada anteriormente em outros módulos, foi re-adaptada
// Nivel acesso: 1 = Administrador / 0 = Cliente / 2 = Gerente / 3 = Promotor / 4 = Banca;


class Usuario extends model {
	private $id;
	private $cpf;
	private $cnpj;
	private $nome;
	private $email;
	private $senha;
	private $telefone;
	private $estado;
	private $cidade;
	private $cep;
	private $logradouro;
	private $numero;
	private $bairro;
	private $complemento;
	private $dinheiro;
	private $nivel_acesso;
	private $tppessoa;


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
			$sql = "UPDATE usuarios SET nome=?, email=?, senha=?, nivel_acesso=?, cpf=?, cnpj=?, telefone=?, estado=?, cidade=?, cep=?, logradouro=?, numero=?, bairro=?, complemento=?, dinheiro=?, tppessoa=? WHERE id=?";
			$sql = $this->pdo->prepare($sql);
			$sql->bindParam(1,$this->nome, PDO::PARAM_STR);
			$sql->bindParam(2,$this->email, PDO::PARAM_STR);
			$sql->bindParam(3,$this->senha, PDO::PARAM_STR);
			$sql->bindParam(4,$this->nivel_acesso, PDO::PARAM_INT);
			$sql->bindParam(5,$this->cpf, PDO::PARAM_STR);
			$sql->bindParam(6,$this->cnpj, PDO::PARAM_STR);
			$sql->bindParam(7,$this->telefone, PDO::PARAM_INT);
			$sql->bindParam(8,$this->estado, PDO::PARAM_STR);
			$sql->bindParam(9,$this->cidade, PDO::PARAM_STR);
			$sql->bindParam(10,$this->cep, PDO::PARAM_INT);
			$sql->bindParam(11,$this->logradouro, PDO::PARAM_STR);
			$sql->bindParam(12,$this->numero, PDO::PARAM_STR);
			$sql->bindParam(13,$this->bairro, PDO::PARAM_STR);
			$sql->bindParam(14,$this->complemento, PDO::PARAM_STR);
			$sql->bindParam(15,$this->dinheiro, PDO::PARAM_STR);
			$sql->bindParam(16,$this->tppessoa, PDO::PARAM_STR);
			$sql->bindParam(17,$this->id, PDO::PARAM_INT);
			if($sql->execute()){
				return true;
			} else {
				return false;
			}

		} else if (
			isset($this->nome) && !empty($this->nome)
			&& isset($this->senha) && !empty($this->senha)
			&& isset($this->email) && !empty($this->email)
			&& isset($this->telefone) && !empty($this->telefone)
			&& isset($this->estado) && !empty($this->estado)
			&& isset($this->cidade) && !empty($this->cidade)
			&& isset($this->cep) && !empty($this->cep)
			&& isset($this->logradouro) && !empty($this->logradouro)
			&& isset($this->numero) && !empty($this->numero)
			&& isset($this->bairro) && !empty($this->bairro)

		) {
			//Insert
			$sql = "INSERT INTO usuarios SET".
			" cpf=:cpf, cnpj=:cnpj, nome=:nome, email=:email,".
			" senha=:senha, telefone=:telefone, estado=:estado,".
			" cidade=:cidade, cep=:cep, logradouro=:logradouro,".
			" numero=:numero, bairro=:bairro, complemento=:complemento,".
			" nivel_acesso=:nivel_acesso, tppessoa=:tppessoa";
			$sql = $this->pdo->prepare($sql);
			if(isset($this->cpf) && !empty($this->cpf)){
				$sql->bindValue(":cpf",$this->cpf, PDO::PARAM_STR);
			} else {
				$sql->bindValue(":cpf",null);
			}

			if(isset($this->cnpj) && !empty($this->cnpj)){
				$sql->bindValue(":cnpj",$this->cnpj, PDO::PARAM_STR);
			} else {
				$sql->bindValue(":cnpj",null);
			}
			
			$sql->bindValue(":nome",$this->nome, PDO::PARAM_STR);
			$sql->bindValue(":email",$this->email, PDO::PARAM_STR);
			$sql->bindValue(":senha",$this->senha, PDO::PARAM_STR);
			$sql->bindValue(":telefone",$this->telefone, PDO::PARAM_INT);
			$sql->bindValue(":estado",$this->estado, PDO::PARAM_STR);
			$sql->bindValue(":cidade",$this->cidade, PDO::PARAM_STR);
			$sql->bindValue(":cep",$this->cep, PDO::PARAM_INT);
			$sql->bindValue(":logradouro",$this->logradouro, PDO::PARAM_STR);
			$sql->bindValue(":numero",$this->numero, PDO::PARAM_STR);
			$sql->bindValue(":bairro",$this->bairro, PDO::PARAM_STR);
			$sql->bindValue(":tppessoa",$this->tppessoa, PDO::PARAM_STR);

			if(isset($this->complemento) && !empty($this->complemento)){
				$sql->bindValue(":complemento",$this->complemento, PDO::PARAM_STR);
			} else {
				$sql->bindValue(":complemento",null);
			}
			
			$sql->bindValue(":nivel_acesso",$this->nivel_acesso, PDO::PARAM_INT);
			echo "<pre>";
            print_r($sql);
            echo "</pre>";
			if( $sql->execute() ){
				$this->id = $this->pdo->lastInsertId();
				echo "Aqui nd";
				return true;
			} else {
				echo "Aqui sim";
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

	public function consultarId($id){
		$sql = "SELECT * FROM usuarios WHERE id=?";
		$sql = $this->pdo->prepare($sql);
		$sql->bindParam(1,$id, PDO::PARAM_INT);
		$sql->execute();
		$data = array();
		if ($sql->rowCount()>0){
			$data = $sql->fetch();
			$this->nome = $data["nome"];
			$this->email = $data["email"];
			$this->id = $data["id"];
			$this->nivel_acesso = $data["nivel_acesso"];
			$this->senha = $data["senha"];
			$this->tppessoa = $data["tppessoa"];
			$this->cpf = $data["cpf"];
			$this->cnpj = $data["cnpj"];
			$this->telefone = $data["telefone"];
			$this->estado = $data["estado"];
			$this->cidade = $data["cidade"];
			$this->cep = $data["cep"];
			$this->logradouro = $data["logradouro"];
			$this->numero = $data["numero"];
			$this->bairro = $data["bairro"];
			$this->complemento = $data["complemento"];
			$this->dinheiro = $data["dinheiro"];

			return $data;
		}
		return false;
	}

	public function consultarCpf($cpf){
		$sql = "SELECT * FROM usuarios WHERE cpf=?";
		$sql = $this->pdo->prepare($sql);
		$sql->bindParam(1,$cpf, PDO::PARAM_STR);
		$sql->execute();
		if ($sql->rowCount()>0){
			return true;
		}
		return false;
	}

	public function consultarCnpj($cnpj){
		$sql = "SELECT * FROM usuarios WHERE cnpj=?";
		$sql = $this->pdo->prepare($sql);
		$sql->bindParam(1,$cnpj, PDO::PARAM_STR);
		$sql->execute();
		if ($sql->rowCount()>0){
			return true;
		}
		return false;
	}

	public function consultarEmail($email){
		$sql = "SELECT * FROM usuarios WHERE email=?";
		$sql = $this->pdo->prepare($sql);
		$sql->bindParam(1,$email, PDO::PARAM_STR);
		$sql->execute();
		if ($sql->rowCount()>0){
			return true;
		}
		return false;
	}




	/*
	* Getters e Setters
	* Esse não foi no gerador, foi a mão mesmo kk
	*/

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTppessoa(){
		return $this->tppessoa;
	}

	public function setTppessoa($tppessoa){
		$this->tppessoa = $tppessoa;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getCnpj(){
		return $this->cnpj;
	}

	public function setCnpj($cnpj){
		$this->cnpj = $cnpj;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

	public function getCep(){
		return $this->cep;
	}

	public function setCep($cep){
		$this->cep = $cep;
	}

	public function getLogradouro(){
		return $this->logradouro;
	}

	public function setLogradouro($logradouro){
		$this->logradouro = $logradouro;
	}

	public function getNumero(){
		return $this->numero;
	}

	public function setNumero($numero){
		$this->numero = $numero;
	}

	public function getBairro(){
		return $this->bairro;
	}

	public function setBairro($bairro){
		$this->bairro = $bairro;
	}

	public function getComplemento(){
		return $this->complemento;
	}

	public function setComplemento($complemento){
		$this->complemento = $complemento;
	}

	public function getDinheiro(){
		return $this->dinheiro;
	}

	public function setDinheiro($dinheiro){
		$this->dinheiro = $dinheiro;
	}

	public function getNivel_acesso(){
		return $this->nivel_acesso;
	}

	public function setNivel_acesso($nivel_acesso){
		$this->nivel_acesso = $nivel_acesso;
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