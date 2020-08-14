<?php
class usersController extends Controller{
	public function index(){
		$u = new Usuario();
		$viewData = $u->trazerTodos();
		$titulos = array(
			'ti1' => "Lista de usuários",
		);
		$this->loadTemplate('trazerTodos', $viewData,$titulos);
	}

	public function consultar($id){
		$x = new Usuario();
		$x->consultar($id);
		$viewData = array(
			"nome"=>$x->getNome(),
			"email"=>$x->getEmail(),
			"senha"=>$x->getSenha()
		);
		$titulos = array(
			'ti1' => $id.": ".$x->getNome(),
		);
		$this->loadTemplate('examinarUm',$viewData,$titulos);

	}
}
?>