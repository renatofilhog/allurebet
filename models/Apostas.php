<?php
/* Model Apostar
* Model
*/

class Apostas extends model {
	private $id;
	private $id_usuario;
	private $id_jogo;
	private $status;
	private $data;
	private $palpite;
	private $valor;
	private $bilhete;
    private $ganhou;

    public function consultarGanhadores($id_jogo){
        $sql = "SELECT id_usuario, (SELECT usuarios.nome FROM usuarios WHERE usuarios.id = apostas.id_usuario) as nome_usuario, data AS data_aposta, valor AS valor_apostado, bilhete FROM apostas WHERE id_jogo=".$id_jogo." AND ganhou=1";
        $sql = $this->pdo->query($sql);
        $data = [];
        if($sql->rowCount() > 0){
            $data['ganhadores'] = $sql->fetchAll();
            return $data['ganhadores'];
        }
        return $data;
    }
    public function definirJogo($id_jogo, $palpite){
        $sql = "UPDATE apostas SET ganhou=1 WHERE id_jogo=".$id_jogo." AND palpite='".$palpite."'";
        $this->pdo->query($sql);
    }
    public function trazerApostas($id_jogo){
        $sql = "SELECT * FROM apostas WHERE id_jogo=$id_jogo";
        $sql = $this->pdo->query($sql);
        $data = array();
        if($sql->rowCount()>0){
            $data['apostas'] = $sql->fetchAll();
            $data['qnt_apostas'] = $sql->rowCount();

            return $data;
        }

        return $data;
    }

    public function trazerApostados($id){
        $sql = "SELECT * FROM apostas WHERE id_usuario=$id";
        $sql = $this->pdo->query($sql);
            if($sql->rowCount()>0){
                return $sql->fetchAll();
            }
    }
    public function contarApostas($id){
        $sql = "SELECT * FROM apostas WHERE id_usuario=$id";
        $sql = $this->pdo->query($sql);
        return $sql->rowCount();
            
    }

    public function consultarId($id){
        $sql = "SELECT * FROM apostas WHERE id_usuario=$id";
        $sql = $this->pdo->query($sql);
        if($sql->rowCount()>0){
            $data = $sql->fetchAll();
            $this->id = $data['id'];
            $this->id_usuario = $data['id_usuario'];
            $this->id_jogo = $data['id_jogo'];
            $this->status = $data['status'];
            $this->data = $data['data'];
            $this->palpite = $data['palpite'];
            $this->valor = $data['valor'];
            $this->bilhete = $data['bilhete'];
            $this->ganhou = $data['ganhou'];
            return $data;
        }
    }

	public function salvar(){
		if (isset($this->id) && !empty($this->id)){
			//Update
			$sql = "UPDATE jogos SET tipo_jogo=?, valor_minimo=?, palpites_disponiveis=?, status=?, ativo=?, ganhou=? WHERE id=?";
			$sql = $this->pdo->prepare($sql);
			$sql->bindParam(1,$this->tipo_jogo, PDO::PARAM_STR);
			$sql->bindParam(2,$this->valor_minimo, PDO::PARAM_STR);
			$sql->bindParam(3,$this->palpites_disponiveis, PDO::PARAM_STR);
			$sql->bindParam(4,$this->status, PDO::PARAM_INT);
            $sql->bindParam(5,$this->ativo, PDO::PARAM_INT);
            $sql->bindParam(6,$this->ganhou, PDO::PARAM_INT);
            $sql->bindParam(7,$this->id, PDO::PARAM_INT);
            //$sql->execute(array($this->nome,$this->email,$this->senha,$this->id));
			if($sql->execute()){
				return true;
			} else {
				return false;
			}
		} else if (
            isset($this->id_usuario) && !empty($this->id_usuario) 
            && isset($this->id_jogo) && !empty($this->id_jogo) 
            && isset($this->palpite) && !empty($this->palpite)
            && isset($this->valor) && !empty($this->valor)
            && isset($this->bilhete) && !empty($this->bilhete)
            ) {
				
			//Insert
			$sql = "INSERT INTO apostas SET id_usuario=?, id_jogo=?, palpite=?, valor=?, bilhete=?, data=NOW()";
			$sql = $this->pdo->prepare($sql);
			if($sql->execute(
                    array(
                            $this->id_usuario,
                            $this->id_jogo,
                            $this->palpite,
                            $this->valor,
                            $this->bilhete
                        )
                    )
                ) {

                return true; 

			} else {
				
				return false;

			}
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

    public function getId_usuario(){
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }

    public function getId_jogo(){
        return $this->id_jogo;
    }

    public function setId_jogo($id_jogo){
        $this->id_jogo = $id_jogo;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getPalpite(){
        return $this->palpite;
    }

    public function setPalpite($palpite){
        $this->palpite = $palpite;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getBilhete(){
        return $this->bilhete;
    }

    public function setBilhete($bilhete){
        $this->bilhete = $bilhete;
    }

    public function getGanhou(){
        return $this->ganhou;
    }

    public function setGanhou($ganhou){
        $this->ganhou = $ganhou;
    }

}

