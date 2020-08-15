<?php
/*
* Classe home: /home/
* 
* views/home.php
*/
class homeController extends Controller {
	public function index(){
		$data = array(
			"name"=>CRIADOR_DO_SISTEMA			
		);
		$titles = array('ti1' => "Página Inicial");
		$this->loadTemplate('home', $data,$titles);
	}

	
}
?>