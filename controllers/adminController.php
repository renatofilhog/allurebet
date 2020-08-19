<?php
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
        $data['allgames'] = $j->trazerTodos(1);
        $titles = array("ti1"=>"Gerenciar jogos");
        $this->loadTemplate("gerjogos",$data,$titles);
    }

    public function verjogos(){
        $data = array();
        $j = new Jogos();
        $data['allgames'] = $j->trazerTodos(0);
        $titles = array("ti1"=>"Gerenciar jogos");
        $this->loadTemplate("verJogosInativos",$data,$titles);
    }

}