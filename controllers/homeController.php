<?php
/*
* Classe home: /home/
* 
* Basicamente não funciona pra muita coisa, só para carregar os botoes da área do cliente e suporte.
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