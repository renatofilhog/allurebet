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
		$data = array();
		$titles = array('ti1' => "Jogo do Bicho");
		$this->loadTemplate('admin', $data,$titles);
	}

	public function cliente(){
		$data = array();
		$titles = array('ti1' => "Jogo do Bicho");
		$this->loadTemplate('cliente', $data,$titles);
	}
}
?>