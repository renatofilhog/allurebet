<?php 
class Mensagens extends model {

	public function sendMessage($id_chamado, $origem, $msg){
		if(!empty($id_chamado) && !empty($msg)){
			$sql = "INSERT INTO mensagens SET id_chamado='$id_chamado', origem='$origem', mensagem='$msg', data_envio=NOW()";
			$this->pdo->query($sql);
		}
		
	}

	public function getMessage($id_chamado, $lastmsg){
		$dados = array();

		$sql = "SELECT * FROM mensagens WHERE id_chamado='$id_chamado' AND data_envio >= '$lastmsg'";		
		$sql = $this->pdo->query($sql);

		if($sql->rowCount()>0){
			$dados = $sql->fetchAll();
			foreach($dados as $chave => $valor){
				$dados[$chave]['data_envio'] = date('H:i', strtotime($valor['data_envio']));
			}
		}
		$c = new Chamados();
		$c->updateLastMsg($id_chamado, $_SESSION['area']);	
		return $dados;
	}



}