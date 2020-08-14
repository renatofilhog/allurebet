<?php 

class Chamados extends model {
	public function getChamados(){
		$array = array();
		$sql = "SELECT * FROM chamados WHERE status IN (0,1)";
		$sql = $this->pdo->query($sql);
		if($sql->rowCount()>0){
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function updateStatus($id, $status) {
		if(!empty($id) && !empty($status)){
			$sql = "UPDATE chamados SET status='$status' WHERE id='$id'";
			$sql = $this->pdo->query($sql);
		}
	}

	public function getNome($id){

		$sql = "SELECT nome FROM chamados WHERE id='$id'";
		$sql = $this->pdo->query($sql);
		$nome = $sql->fetch();
		return $nome['nome'];
	}

	public function novoChamado($nome, $ip, $data_inicio){
		$sql = "INSERT INTO chamados set ip='$ip', nome='$nome', data_inicio='$data_inicio', status=0";
		$sql = $this->pdo->query($sql);
		return $this->pdo->lastInsertId();
	}


	public function getLastMsg($id_chamado, $area){
		$dt = '';
		if(!empty($id_chamado) && !empty($area)){
			$sql = "SELECT data_last_".$area." as dt FROM chamados WHERE id='$id_chamado'";
			$sql = $this->pdo->query($sql);
			if($sql->rowCount() > 0) {
				$sql = $sql->fetch();
				$dt = $sql['dt'];
			}
		}
		return $dt;
	}

	public function updateLastMsg($id_chamado, $area){
	    if(!empty($id_chamado) && !empty($area)){
			$sql = "UPDATE chamados SET data_last_".$area." = NOW() WHERE id='$id_chamado'";
			$this->pdo->query($sql);
		}

	}

}
