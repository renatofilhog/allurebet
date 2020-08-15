<?php
/*
* Classe Cliente: cliente /cliente/
* 
*/
class clienteController extends Controller {

	// -- Traz a view "cliente" para a tela (Index padrão);
	public function index(){
		$titles=array();
		$data = array();
		$this->loadTemplate('cliente', $data, $titles);
	}
	
}
?>