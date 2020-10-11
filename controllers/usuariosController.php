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

    public function recargaDinheiro(){
        if(isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])){
            $u = new Usuario();
            $u->consultarId($_GET['id_usuario']);
            $din = str_replace(".", "", $_POST['dinheiro']);
            $din = str_replace(",", ".", $din);
            $u->setDinheiro($u->getDinheiro()+$din);
            if($u->salvar()){
                $_SESSION['msgAlert'] = "<script>alert('Recarga Realizada');</script>";
                header("location: /admin/recarga_de_dinheiro/");
            } else {
                $_SESSION['msgAlert'] = "<script>alert('Erro na recarga');</script>";
                header("location: /admin/recarga_de_dinheiro/");
            }
        }
    }
    public function recargaDinheiroT(){
        $data = array();
        $titles = array("ti1"=>"Recarregar Usuário");
        $this->loadTemplate('formDinheiro',$data,$titles);
    }

    public function novo(){
        $data = array();
        $titles = array("ti1"=>"Novo usuário");

        $this->loadTemplate("novoUsuario",$data,$titles);
    }
}
