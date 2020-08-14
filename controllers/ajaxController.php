<?php
/*
* Classe home: /home/
* 
*/
class ajaxController extends Controller {
	
	public function index(){
		$dados = array();
	}
	public function getChamado(){
		 $dados = array();
		 $c = new Chamados();
		 $dados["chamados"] = $c->getChamados();
		 echo json_encode($dados);
	}
	public function sendmessage(){
		
		if(isset($_POST['msg']) && !empty($_POST['msg'])){
			$msg = addslashes($_POST['msg']);
			$id_chamado = $_SESSION['chatwindow'];
			if($_SESSION['area'] == 'suporte'){
				$origem = 0;
			} else {
				$origem = 1;
			}
			$m = new Mensagens();
			$m->sendMessage($id_chamado, $origem, $msg);
		}
	}

	public function getmessage(){
		$dados = array();
		$c = new Chamados();
		$m = new Mensagens();

		$id_chamado = $_SESSION['chatwindow'];
		$area = $_SESSION['area'];

		
		$lastmsg = $c->getLastMsg($id_chamado, $area);

		$dados['mensagens'] = $m->getMessage($id_chamado, $lastmsg);
		

		echo json_encode($dados);
	}
}