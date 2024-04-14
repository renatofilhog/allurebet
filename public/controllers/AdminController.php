<?php
namespace controllers;

use core\Controller;
use models\Jogos;
use models\Usuario;
/*
* Classe admin: /admin/
* Não há view INDEX
*/
class adminController extends Controller {
	
	public function index(){
		if(!isset($_SESSION['dadosusuario']['nivel_acesso']) || $_SESSION['dadosusuario']['nivel_acesso'] != 1){
            header("Location: /home/");
        } else {
            header("Location: /home/admin");
        }
	}
    
    public function jogo(){
        $data = array();
        $titles = array("ti1"=>"Criar novo jogo");
        $this->loadTemplate("jogo",$data,$titles);
    }
    
    public function gerjogos(){
        $data = array();
        $j = new Jogos();
        $data['allgames'] = $j->trazerTodos(1,"0 OR status=1");
        $titles = array("ti1"=>"Gerenciar jogos");
        $this->loadTemplate("gerjogos",$data,$titles);
    }

    public function verjogos(){
        $data = array();
        $j = new Jogos();
        $data['allgames'] = $j->trazerTodos(0);
        $titles = array("ti1"=>"Gerenciar jogos inativos");
        $this->loadTemplate("verJogosInativos",$data,$titles);
    }

    public function verjogos_finalizados(){
        $data = array();
        $j = new Jogos();
        $data['allgames_finalizados'] = $j->trazerTodos(1,2);
        $titles = array("ti1"=>"Visualizar Finalizados");
        $this->loadTemplate("verjogos_finalizados",$data,$titles);
    }

    public function gerusuarios(){
        $data = array();
        $u = new Usuario();
        $data['allusers'] = $u->trazerTodos();
        $titles = array("ti1"=>"Gerenciar usuários");
        $this->loadTemplate("gerenciarUsuarios",$data,$titles);
    }

    public function recarga_de_dinheiro(){
        $data = array();
        $u = new Usuario();
        $data['allusers'] = $u->trazerTodos();
        $titles = array("ti1"=>"Recarregar Dinheiro");
        $this->loadTemplate("recargaDinheiro",$data,$titles);
    }


}