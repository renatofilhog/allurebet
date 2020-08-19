<?php
// Classe criada anteriormente em outros módulos, foi re-adaptada
// ativo: 0 = inativo / 1 = ativo
// Status: 0 = Pendente / 1 = Em andamento / 2 = Finalizado


class Jogos extends model {
    private $id;
    private $nome_jogo;
    private $data_inicio;
    private $data_fim;
    private $tipo_jogo;
    private $valor_minimo;
    private $palpites_disponiveis;
    private $status;
    private $ativo;


	public function trazerTodos($ativo){
		$sql = "SELECT * FROM jogos WHERE ativo=$ativo";
		$sql = $this->pdo->query($sql);
		if($sql->rowCount()>0){
			return $sql->fetchAll();
		} else {
			return "Não há resultados";
		}
	}

    public function contarJogos($stat){
		if($stat > 3){
			$sql = "SELECT * FROM jogos";
			$sql = $this->pdo->query($sql);
			
			return $sql->rowCount();
		} else {
			$sql = "SELECT * FROM jogos WHERE status=?";
			$sql = $this->pdo->prepare($sql);
			$sql->bindParam(1,$stat, PDO::PARAM_INT);
			$sql->execute();

			return $sql->rowCount();
		}
	}

	public function contarJogosAI($ativo){
		
			$sql = "SELECT * FROM jogos WHERE ativo=?";
			$sql = $this->pdo->prepare($sql);
			$sql->bindParam(1,$ativo, PDO::PARAM_INT);
			$sql->execute();
			return $sql->rowCount();
	}

    public function salvar(){
		if (isset($this->id) && !empty($this->id)){
			//Update
			$sql = "UPDATE jogos SET tipo_jogo=?, valor_minimo=?, palpites_disponiveis=?, status=?, ativo=? WHERE id=?";
			$sql = $this->pdo->prepare($sql);
			$sql->bindParam(1,$this->tipo_jogo, PDO::PARAM_STR);
			$sql->bindParam(2,$this->valor_minimo, PDO::PARAM_STR);
			$sql->bindParam(3,$this->palpites_disponiveis, PDO::PARAM_STR);
			$sql->bindParam(4,$this->status, PDO::PARAM_INT);
            $sql->bindParam(5,$this->ativo, PDO::PARAM_INT);
            $sql->bindParam(6,$this->id, PDO::PARAM_INT);
            //$sql->execute(array($this->nome,$this->email,$this->senha,$this->id));
			if($sql->execute()){
				return true;
			} else {
				return false;
			}
		} else if (
            isset($this->nome_jogo) && !empty($this->nome_jogo) 
            && isset($this->data_inicio) && !empty($this->data_inicio) 
            && isset($this->data_fim) && !empty($this->data_fim)
            && isset($this->tipo_jogo) && !empty($this->tipo_jogo)
            && isset($this->valor_minimo) && !empty($this->valor_minimo)
            && isset($this->palpites_disponiveis) && !empty($this->palpites_disponiveis)
            ) {
				
			//Insert
			$sql = "INSERT INTO jogos SET nome_jogo=?, data_inicio=?, data_fim=?, tipo_jogo=?, valor_minimo=?, palpites_disponiveis=?";
			$sql = $this->pdo->prepare($sql);
			if($sql->execute(
                    array(
                            $this->nome_jogo,
                            $this->data_inicio,
                            $this->data_fim,
                            $this->tipo_jogo,
                            $this->valor_minimo,
                            $this->palpites_disponiveis
                        )
                    )
                ) {

                return true; 

			} else {
				
				return false;

			}
		} 
    }

    public function consultar($nome_jogo){
		$sql = "SELECT * FROM jogos WHERE nome_jogo=?";
		$sql = $this->pdo->prepare($sql);
		$sql->bindParam(1,$nome_jogo, PDO::PARAM_STR);
		$sql->execute();
		$data = array();
		if ($sql->rowCount()>0){
            $data = $sql->fetch();
            $this->id = $data['id'];
            $this->nome_jogo = $data['nome_jogo'];
            $this->data_inicio = $data['data_inicio'];
            $this->data_fim = $data['data_fim'];
            $this->tipo_jogo = $data['tipo_jogo'];
            $this->valor_minimo = $data['valor_minimo'];
            $this->palpites_disponiveis = $data['palpites_disponiveis'];
            $this->status = $data['status'];
            $this->ativo = $data['ativo'];
			return true;
		} else {
			return false;
		}
	}

	public function consultarId($id){
		$sql = "SELECT * FROM jogos WHERE id=?";
		$sql = $this->pdo->prepare($sql);
		$sql->bindParam(1,$id, PDO::PARAM_INT);
		$sql->execute();
		$data = array();
		if ($sql->rowCount()>0){
            $data = $sql->fetch();
            $this->id = $data['id'];
            $this->nome_jogo = $data['nome_jogo'];
            $this->data_inicio = $data['data_inicio'];
            $this->data_fim = $data['data_fim'];
            $this->tipo_jogo = $data['tipo_jogo'];
            $this->valor_minimo = $data['valor_minimo'];
            $this->palpites_disponiveis = $data['palpites_disponiveis'];
            $this->status = $data['status'];
            $this->ativo = $data['ativo'];
			return $data;
		} else {
			return "datafalsa";
		}
	}

	public function iniciarJogo($id){
		$sql = "SELECT * FROM jogos WHERE id=?";
		$sql = $this->pdo->prepare($sql);
		$sql->bindParam(1,$id, PDO::PARAM_INT);
		$sql->execute();
		$data = array();
		if ($sql->rowCount()>0){
            $data = $sql->fetch();
            $this->id = $data['id'];
            $this->nome_jogo = $data['nome_jogo'];
            $this->data_inicio = $data['data_inicio'];
            $this->data_fim = $data['data_fim'];
            $this->tipo_jogo = $data['tipo_jogo'];
            $this->valor_minimo = $data['valor_minimo'];
            $this->palpites_disponiveis = $data['palpites_disponiveis'];
            $this->status = $data['status'];
			$this->ativo = $data['ativo'];
			if($this->status == 0){
				$this->status = 1;
				$this->salvar();
				return true;	
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function finalizarJogo($id){
		$sql = "SELECT * FROM jogos WHERE id=?";
		$sql = $this->pdo->prepare($sql);
		$sql->bindParam(1,$id, PDO::PARAM_INT);
		$sql->execute();
		$data = array();
		if ($sql->rowCount()>0){
            $data = $sql->fetch();
            $this->id = $data['id'];
            $this->nome_jogo = $data['nome_jogo'];
            $this->data_inicio = $data['data_inicio'];
            $this->data_fim = $data['data_fim'];
            $this->tipo_jogo = $data['tipo_jogo'];
            $this->valor_minimo = $data['valor_minimo'];
            $this->palpites_disponiveis = $data['palpites_disponiveis'];
            $this->status = $data['status'];
			$this->ativo = $data['ativo'];
			if($this->status == 1){
				$this->status = 2;
				$this->salvar();
				return true;	
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function inativarJogo($id){
		$sql = "SELECT * FROM jogos WHERE id=?";
		$sql = $this->pdo->prepare($sql);
		$sql->bindParam(1,$id, PDO::PARAM_INT);
		$sql->execute();
		$data = array();
		if ($sql->rowCount()>0){
            $data = $sql->fetch();
            $this->id = $data['id'];
            $this->nome_jogo = $data['nome_jogo'];
            $this->data_inicio = $data['data_inicio'];
            $this->data_fim = $data['data_fim'];
            $this->tipo_jogo = $data['tipo_jogo'];
            $this->valor_minimo = $data['valor_minimo'];
            $this->palpites_disponiveis = $data['palpites_disponiveis'];
            $this->status = $data['status'];
			$this->ativo = $data['ativo'];
			if($this->ativo == 1){
				$this->ativo = 0;
				$this->salvar();
				return true;	
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function reativarJogo($id){
		$sql = "SELECT * FROM jogos WHERE id=?";
		$sql = $this->pdo->prepare($sql);
		$sql->bindParam(1,$id, PDO::PARAM_INT);
		$sql->execute();
		$data = array();
		if ($sql->rowCount()>0){
            $data = $sql->fetch();
            $this->id = $data['id'];
            $this->nome_jogo = $data['nome_jogo'];
            $this->data_inicio = $data['data_inicio'];
            $this->data_fim = $data['data_fim'];
            $this->tipo_jogo = $data['tipo_jogo'];
            $this->valor_minimo = $data['valor_minimo'];
            $this->palpites_disponiveis = $data['palpites_disponiveis'];
            $this->status = $data['status'];
			$this->ativo = $data['ativo'];
			if($this->ativo == 0){
				$this->ativo = 1;
				$this->salvar();
				return true;	
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
    

    /* 
    * Getters e Setters
    * By: http://mikeangstadt.name/projects/getter-setter-gen/
    */

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome_jogo(){
		return $this->nome_jogo;
	}

	public function setNome_jogo($nome_jogo){
		$this->nome_jogo = $nome_jogo;
	}

	public function getData_inicio(){
		return $this->data_inicio;
	}

	public function setData_inicio($data_inicio){
		$this->data_inicio = $data_inicio;
	}

	public function getData_fim(){
		return $this->data_fim;
	}

	public function setData_fim($data_fim){
		$this->data_fim = $data_fim;
	}

	public function getTipo_jogo(){
		return $this->tipo_jogo;
	}

	public function setTipo_jogo($tipo_jogo){
		$this->tipo_jogo = $tipo_jogo;
	}

	public function getValor_minimo(){
		return $this->valor_minimo;
	}

	public function setValor_minimo($valor_minimo){
		$this->valor_minimo = $valor_minimo;
	}

	public function getPalpites_disponiveis(){
		return $this->palpites_disponiveis;
	}

	public function setPalpites_disponiveis($palpites_disponiveis){
		$this->palpites_disponiveis = $palpites_disponiveis;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getAtivo(){
		return $this->ativo;
	}

	public function setAtivo($ativo){
		$this->ativo = $ativo;
    }
    
    /* 
    * Fim
    * Getter e Setter
    */

}