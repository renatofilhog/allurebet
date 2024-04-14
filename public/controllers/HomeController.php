<?php
/*
* Classe home: /home/
* 
* views/home.php
*/
namespace controllers;
use core\Controller;
use models\Apostas;
use models\Jogos;
use models\Usuario;

class homeController extends Controller {
	public function index(){
		$data = array();
		$this->loadView('login', $data);
	}
	
	public function admin(){
		$n_usuarios = new Usuario();
		$n_jogos = new Jogos();
		// contarJogos(1) <-- Status = 1 / Em andamento;
		$data = array(
			'nomeusuario' => $_SESSION['dadosusuario']['nome'],
			'n_usuarios' => $n_usuarios->contarUsuarios(),
			'n_jogos_andamento' => $n_jogos->contarJogos(1),
			'dinheiro_distribuido'=> $n_jogos->dinheiroDistribuido()
		);
		$_SESSION['infomenu']['n_inativos'] = $n_jogos->contarJogosAI(0);
		$titles = array('ti1' => "Jogo do Bicho");
		$this->loadTemplate('admin', $data,$titles);
	}

	public function cliente(){
		$data = array('nomeusuario' => $_SESSION['dadosusuario']['nome']);
		$titles = array('ti1' => "Jogo de Apostas");
		$n_apostas = new Apostas();
		$u = new Usuario();
		$u->consultarId($_SESSION['dadosusuario']['idusuario']);
		$_SESSION['qnt_dinheiro'] = $u->getDinheiro();
		$_SESSION['n_apostas'] = $n_apostas->contarApostas($_SESSION['dadosusuario']['idusuario']);
		$this->loadTemplate2('cliente', $data,$titles);
	}
}
?>