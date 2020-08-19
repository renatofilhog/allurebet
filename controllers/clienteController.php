<?php
/*
* Classe Cliente: cliente /cliente/
* 
*/
class clienteController extends Controller {

	// -- Traz a view "cliente" para a tela (Index padrão);
	public function index(){
		$data = array('nomeusuario' => $_SESSION['dadosusuario']['nome']);
		$titles = array('ti1' => "Jogo de Apostas");
		$this->loadTemplate2('cliente', $data,$titles);
	}

	// /cliente/verjogos/
	public function verjogos(){
        $data = array();
        $j = new Jogos();
        $data['allgames'] = $j->trazerTodos(1,1);
        $titles = array("ti1"=>"Ver jogos");
        $this->loadTemplate2("cliente_jogos",$data,$titles);
    }
}
?>