<?php
/*
* Classe home: /home/
* 
*/
class chatController extends Controller {
	
	public function index(){
		$titles=array();
		$data = array();
		$c = new Chamados();
		// depois por em md5
		// Caso do SUPORTE que entra por ID
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$id = addslashes($_GET['id']);
			// Armazena o ID na seassion
			$_SESSION["chatwindow"] = $id;
			// Após clicado, irá mudar o status para 1 - em atendimento
			$c->updateStatus($id, '1');


		// Em caso do preenchimento do form do lado do cliente, aqui ele cria e segue o cÃ³digo
		} elseif(isset($_POST['nome']) && !empty($_POST['nome'])) {
			$nome = addslashes($_POST['nome']); // Nome
			$ip = $_SERVER['REMOTE_ADDR']; // IP do Banco
			$data_inicio = date("Y-m-d H:i:s"); // DR INICIO
			// Retorna o ID do ultimo chamado pra guardar na SESSION
			$_SESSION["chatwindow"] = $c->novoChamado($nome, $ip, $data_inicio); 
		} 
		// Quando nÃ£o tem nenhuma coisa guardada na SESSION chatWindow, ai ele aparece o template de criar o chamado
		if(!isset($_SESSION['chatwindow']) || empty($_SESSION['chatwindow'])) {
			$this->loadTemplate('newchamado',$data, $titles);
			exit;
		}
		// Setando se o nome vai ser Suporte ou o nome do Cliente
		$idchamado = $_SESSION["chatwindow"];
		$data['nome'] = $c->getNome(addslashes($idchamado));

        // Após de tudo, está redirecionando para a tela do CHAT
		$this->loadTemplate('chat', $data, $titles);
	}
}