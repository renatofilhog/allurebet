<?php
/*
* Classe home: /home/
* 
* views/home.php
*/
class homeController extends Controller {
	public function index(){
		$data = array();
		$titles = array('ti1' => "Jogo do Bicho");
		$this->loadTemplate('home', $data,$titles);
	}
	
	
}
?>