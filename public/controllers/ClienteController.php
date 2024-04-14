<?php
/*
* Classe Cliente: cliente /cliente/
* 
*/
namespace controllers;
use core\Controller;
use models\Jogos;
use models\Apostas;
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
    // /cliente/ver_apostas/
    public function ver_apostas(){
    	$data = array();
        $a = new Apostas();
        $data['apostas_usuario'] = $a->trazerApostados($_SESSION['dadosusuario']['idusuario']);

        $titles = array("ti1"=>"Ver apostas");
        $this->loadTemplate2("cliente_apostas",$data,$titles);

    }
}
?>