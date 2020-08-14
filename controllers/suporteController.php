<?php
/*
* Classe home: /home/
* 
*/
class suporteController extends Controller {
	public function __construct(){
		$_SESSION['area'] = 'suporte';
	}


	public function index(){
		$titles=array();
		$data = array();
		$this->loadTemplate('suporte', $data, $titles);
	}
	
}
?>