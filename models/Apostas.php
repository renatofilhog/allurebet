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

}

