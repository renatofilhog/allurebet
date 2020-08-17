<?php
/*
* Classe home: /home/
* 
* views/home.php
*/
class homeController extends Controller {
	public function index(){
		$data = array();
		$this->loadView('login', $data);
	}
	
	public function admin(){
		$data = array('nomeusuario' => $_SESSION['dadosusuario']['nome']);
		$titles = array('ti1' => "Jogo do Bicho");
		$this->loadTemplate('admin', $data,$titles);
	}

	public function cliente(){
		$data = array('nomeusuario' => $_SESSION['dadosusuario']['nome']);
		$titles = array('ti1' => "Jogo do Bicho");
		$this->loadTemplate2('cliente', $data,$titles);
	}
}
?>