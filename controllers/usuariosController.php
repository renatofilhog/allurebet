<?php
/*
* Classe usuarios: /usuarios/
* 
*/
class usuariosController extends Controller {
	
	public function index(){
		header("Location: /home/");
	}

	/*
    * [edit][tipo] => 0: Jogo
    * [edit][tipo] => 1: usuario
    */
	public function editar(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $data = array();
            $id = addslashes($_GET['id']);
            $_SESSION['edit']['tipo'] = 1;
            $u = new Usuario();
            $data['dadosusuario'] = $u->consultarId($id);
            $titles = array("ti1"=>"Editar usuário");
            $this->loadTemplate("editarUsuario",$data,$titles);

        } else {
            echo "<script>alert('algo deu errado');</script>";
            header("Location: /home/");

        }

    }
}
