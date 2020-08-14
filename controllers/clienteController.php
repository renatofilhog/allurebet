<?php
/*
* Redirecionado via |VIEW HOME|
* 
*/
class clienteController extends Controller {
	// -- Assumimos no próprio construtor que a SESSION será de Cliente
	public function __construct(){
		$_SESSION['area'] = 'cliente';
	}

	// -- Traz a view "cliente" para a tela (Index padrão);
	public function index(){
		$titles=array();
		$data = array();
		$this->loadTemplate('cliente', $data, $titles);
	}

	// Resetar Session para ficar preto, usado pra testes. VIA HOME VIEW TAMBÈM
	public function resetarSession(){
		$_SESSION["area"] = null;
		header("location: index.php");
	}

	
}
?>