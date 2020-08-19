<?php
/*
* Classe jogos: /jogos/
* 
*/
class jogosController extends Controller {
	
	public function index(){
        $dados = array();
        $_SESSION['msgjogos']['avisar'] = 1;
        $_SESSION['msgjogos']['categoria'] = "alert-danger";
        $_SESSION['msgjogos']['aviso'] = "<strong>Acesso Negado!</strong> favor atente-se aos botões";
        header("Location: /admin/gerjogos/");
    }

    
    public function iniciar(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = addslashes($_GET['id']);
            $j = new Jogos();
            if($j->iniciarJogo($id)){
                $_SESSION['msgjogos']['avisar'] = 1;
                $_SESSION['msgjogos']['categoria'] = "alert-success";
                $_SESSION['msgjogos']['aviso'] = "<strong>Jogo em andamento!!</strong>";
            } else {
                $_SESSION['msgjogos']['avisar'] = 1;
                $_SESSION['msgjogos']['categoria'] = "alert-danger";
                $_SESSION['msgjogos']['aviso'] = "<strong>Algo deu errado!</strong>";
            }
            header("Location: /admin/gerjogos/");
        }
    }

    public function finalizar(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = addslashes($_GET['id']);
            $j = new Jogos();
            if($j->finalizarJogo($id)){
                $_SESSION['msgjogos']['avisar'] = 1;
                $_SESSION['msgjogos']['categoria'] = "alert-info";
                $_SESSION['msgjogos']['aviso'] = "<strong>Jogo finalizado!!</strong>";
            } else {
                $_SESSION['msgjogos']['avisar'] = 1;
                $_SESSION['msgjogos']['categoria'] = "alert-danger";
                $_SESSION['msgjogos']['aviso'] = "<strong>Algo deu errado!</strong>";
            }
        }

        header("Location: /admin/gerjogos/");
    }

    public function inativar(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = addslashes($_GET['id']);
            $j = new Jogos();
            if($j->inativarJogo($id)){
                $_SESSION['msgjogos']['avisar'] = 1;
                $_SESSION['msgjogos']['categoria'] = "alert-secondary";
                $_SESSION['msgjogos']['aviso'] = "<strong>Jogo inativado</strong>";
            } else {
                $_SESSION['msgjogos']['avisar'] = 1;
                $_SESSION['msgjogos']['categoria'] = "alert-danger";
                $_SESSION['msgjogos']['aviso'] = "<strong>Algo deu errado!</strong>";
            }
        }

        header("Location: /admin/gerjogos/");
    }


    public function reativar(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = addslashes($_GET['id']);
            $j = new Jogos();
            if($j->reativarJogo($id)){
                $_SESSION['msgjogos']['avisar'] = 1;
                $_SESSION['msgjogos']['categoria'] = "alert-info";
                $_SESSION['msgjogos']['aviso'] = "<strong>Jogo re-ativado</strong>";
            } else {
                $_SESSION['msgjogos']['avisar'] = 1;
                $_SESSION['msgjogos']['categoria'] = "alert-danger";
                $_SESSION['msgjogos']['aviso'] = "<strong>Algo deu errado!</strong>";
            }
        }

        header("Location: /admin/verjogos/");
    }

    /*
    * [edit][tipo] => 0: Jogo
    * [edit][tipo] => 1: usuario
    */
    public function editar(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $data = array();
            $id = addslashes($_GET['id']);
            $_SESSION['edit']['tipo'] = 0;
            $j = new Jogos();
            $data['dadosjogo'] = $j->consultarId($id);
            $titles = array("ti1"=>"Editar Jogo");
            $data['dadosjogo']['data_inicio'] = date("d/m/Y", strtotime($data['dadosjogo']['data_inicio']));
            $data['dadosjogo']['data_fim'] = date("d/m/Y", strtotime($data['dadosjogo']['data_fim']));

            $this->loadTemplate("editarJogo",$data,$titles);

        } else {
            echo "<script>alert('algo deu errado');</script>";
            header("Location: /home/");

        }

    }
}