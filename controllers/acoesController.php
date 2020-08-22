<?php
/*
* Classe acoes: /acoes/
* 
* Não há VIEWS, funciona somente para redirecionamento
*/
class acoesController extends Controller {
   

	public function login(){
        if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
            $email = addslashes($_POST['email']);
            $senha = md5(addslashes($_POST['senha']));
            $u = new Usuario();
            if($u->consultar($email, $senha)){
                $nivel_acesso = $u->getNivelAcesso();
                if($nivel_acesso == 1){
                    // pegando dados do usuário
                    $_SESSION['dadosusuario']['idusuario'] = $u->getId();
                    $_SESSION['dadosusuario']['nome'] = $u->getNome();
                    $_SESSION['dadosusuario']['email'] = $u->getEmail();
                    $_SESSION['dadosusuario']['nivel_acesso'] = $nivel_acesso;
                    echo "Ok";
                    header("Location: /home/admin");
                } elseif($nivel_acesso == 0){
                    // pegando dados do usuário
                    $_SESSION['dadosusuario']['idusuario'] = $u->getId();
                    $_SESSION['dadosusuario']['nome'] = $u->getNome();
                    $_SESSION['dadosusuario']['email'] = $u->getEmail();
                    $_SESSION['dadosusuario']['nivel_acesso'] = $nivel_acesso;
        
                    header("Location: /home/cliente");
                }
            } else {
                echo "Favor, revisar os dados";
                echo "<a href='/home/'>Voltar</a>";
            }
        }
	}

	public function registro(){
        if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha']) && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['re-senha']) && !empty($_POST['re-senha'])){ 
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = md5(addslashes($_POST['senha']));
            $re_senha = md5(addslashes($_POST['re-senha']));
            if ($senha == $re_senha){
                $u = new Usuario();
                $u->setNome($nome);
                $u->setEmail($email);
                $u->setSenha($senha);
                $bol = $u->salvar();
                if($bol){
                    if($u->getNivelAcesso == 1){
                        // pegando dados do usuário
                        $_SESSION['dadosusuario']['idusuario'] = $u->getId();
                        $_SESSION['dadosusuario']['nome'] = $u->getNome();
                        $_SESSION['dadosusuario']['email'] = $u->getEmail();
                        $_SESSION['dadosusuario']['nivel_acesso'] = $nivel_acesso;
                        echo "Ok";
                        header("Location: /home/admin");
                    } elseif($u->getNivelAcesso == 0){
                        // pegando dados do usuário
                        $_SESSION['dadosusuario']['idusuario'] = $u->getId();
                        $_SESSION['dadosusuario']['nome'] = $u->getNome();
                        $_SESSION['dadosusuario']['email'] = $u->getEmail();
                        $_SESSION['dadosusuario']['nivel_acesso'] = $nivel_acesso;
            
                        header("Location: /home/cliente");
                    }
                } else {
                    echo "<script>alert('Algo deu errado ao cadastrar');window.location.href = ".BASEURL.";</script>";    
                }

            } else {
                echo "<script>alert('Senhas não conferem');window.location.href = ".BASEURL.";</script>";    
            }
        } else {
            echo "<script>alert('Verifique todos os campos');window.location.href = ".BASEURL.";</script>";

        }
        echo "Não entre aqui";
    }

    public function logout(){
        $_SESSION['dadosusuario'] = null;
        header("Location: /home/index");
    }

    public function cadastrarJogo(){
        if (
        isset($_POST['nome_jogo']) && !empty( $_POST['nome_jogo'] ) 
        && isset($_POST['data_inicio']) && !empty( $_POST['data_inicio'] ) 
        && isset($_POST['data_fim']) && !empty( $_POST['data_fim'] ) 
        && isset($_POST['tipo_jogo']) && !empty( $_POST['tipo_jogo'] ) 
        && isset($_POST['valor_minimo']) && !empty( $_POST['valor_minimo'] ) 
        && isset($_POST['palpites_disponiveis']) && !empty( $_POST['palpites_disponiveis'] )
        ) {
            $nome_jogo = addslashes($_POST['nome_jogo']);
            $data_inicio = addslashes($_POST['data_inicio']);
            $data_fim = addslashes($_POST['data_fim']);
            $tipo_jogo = addslashes($_POST['tipo_jogo']);
            $valor_minimo = addslashes($_POST['valor_minimo']);
            $palpites_disponiveis = addslashes($_POST['palpites_disponiveis']);
            
            // Criando Orientação objeto de JOGO
            $j = new Jogos();
            if(!$j->consultar($nome_jogo)){
                $j->setNome_jogo($nome_jogo);
                $j->setData_inicio($data_inicio);
                $j->setData_fim($data_fim);
                $j->setTipo_jogo($tipo_jogo);
                $j->setValor_minimo($valor_minimo);
                $j->setPalpites_disponiveis($palpites_disponiveis);


                if($j->salvar()){
                    // Manda mensagem pro SESSION
                    $_SESSION['msg']['cadastro_jogo'] = 1;
                    header("Location: /admin/jogo/");
                } else {
                    $_SESSION['msg']['cadastro_jogo_error'] = "Algo deu errado, revise os campos";
                }
            } else {
                // Manda mensagem pro SESSION NEGATIVA 
                $_SESSION['msg']['cadastro_jogo'] = 2;
                $_SESSION['msg']['cadastro_jogo_error']= "Já existe um jogo com este nome";
                header("Location: /admin/jogo/");
            }

        }
    }

    public function editarJogo(){
        $j = new Jogos();
        if (
            isset($_SESSION['POST']['nome_jogo']) && !empty( $_SESSION['POST']['nome_jogo'] )
            && isset($_POST['data_inicio']) && !empty( $_POST['data_inicio'] ) 
            && isset($_POST['data_fim']) && !empty( $_POST['data_fim'] ) 
            && isset($_POST['tipo_jogo']) && !empty( $_POST['tipo_jogo'] ) 
            && isset($_POST['valor_minimo']) && !empty( $_POST['valor_minimo'] ) 
            && isset($_POST['palpites_disponiveis']) && !empty( $_POST['palpites_disponiveis'] )
            ) {
                $nome_jogo = addslashes( $_SESSION['POST']['nome_jogo'] );
                $data_inicio = addslashes($_POST['data_inicio']);
                $data_fim = addslashes($_POST['data_fim']);
                $tipo_jogo = addslashes($_POST['tipo_jogo']);
                $valor_minimo = addslashes($_POST['valor_minimo']);
                $palpites_disponiveis = addslashes($_POST['palpites_disponiveis']);
                
                // Criando Orientação objeto de JOGO
                
                if($j->consultar($nome_jogo)){
                    $j->setData_inicio($data_inicio);
                    $j->setData_fim($data_fim);
                    $j->setTipo_jogo($tipo_jogo);
                    $j->setValor_minimo($valor_minimo);
                    $j->setPalpites_disponiveis($palpites_disponiveis);
                    $id = $j->getId();
                    if($j->salvar()){
                        // Manda mensagem pro SESSION
                        $_SESSION['msg']['edit_jogo'] = 1;
                        header("Location: /jogos/editar?id=$id");
                    } else {
                        $_SESSION['msg']['edit_jogo'] = 2;
                        header("Location: /jogos/editar?id=$id");
                    }
                }
            } else {
               
                header("Location: /home/");
            }
    }

    public function editarUsuario(){
        $u = new Usuario();
        // print_r(get_defined_vars());
        // echo "<br>";
        // print_r($_POST);
        // exit;
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            $u->consultarId($id);
            echo "Entrou";
            if(isset($_POST['senha']) && !empty($_POST['senha']) && isset($_POST['senha']) && !empty($_POST['senha']) ) {
                if($_POST['senha'] == $_POST['re-senha'] ){
                    $senha = md5(addslashes($_POST['senha']) );
                    $u->setSenha($senha);
                }
            }

            if(isset($_POST['nome']) && !empty( $_POST['nome']) ) {
                $nome = addslashes($_POST['nome']);
                $u->setNome($nome);
            }

            if(isset($_POST['email']) && !empty( $_POST['email'] ) ){
                $email = addslashes($_POST['email']);
                $u->setEmail($email);
            }

            if(isset($_POST['nivel_acesso']) && !empty( $_POST['nivel_acesso']) ){
                if($_POST['nivel_acesso'] != 99 ){
                    $nivel_acesso = addslashes($_POST['nivel_acesso']);
                    $u->setNivelAcesso($nivel_acesso);
                }
            }

            if($u->salvar()){
                // Manda mensagem pro SESSION
                $_SESSION['msg']['edit_user'] = 1;
                $_SESSION['msg']['aviso'] = "<strong>Usuário editado!</strong> Verifique a área de gerenciamento para maiores detalhes";
                header("Location: /usuarios/editar?id=$id");
            } else {
                $_SESSION['msg']['edit_user'] = 2;
                $_SESSION['msg']['aviso'] = "<strong>Error!</strong> Algo deu errado!";
                header("Location: /usuarios/editar?id=$id");
            }

            if(
                empty($_POST['nome']) && empty($_POST['email']) && empty($_POST['senha']) && $_POST['nivel_acesso'] == 99
            ){
                $_SESSION['msg']['edit_user'] = 3;
                $_SESSION['msg']['aviso'] = "<strong>Nada feito!</strong> nenhum campo foi alterado.";
            }
            

            
        
        }
    }

    
    public function apostar(){
        if(isset($_POST['palpite']) && $_POST['palpite'] != 99){
            $palpite = addslashes($_POST['palpite']);
        } else {
            $_SESSION['msg']['aposta'] = 3;
            $_SESSION['msg']['aviso'] = "<strong>Nada feito!</strong> Selecione algum palpite.";
            header("Location: /jogos/apostar?id=".$_SESSION['dadosjogo']['id']);
        }
        if (isset($_POST['valor']) && !empty($_POST['valor'])) {
            $valor = addslashes($_POST['valor']);
            $valor_minimo = $_SESSION['dadosjogo']['valor_minimo'];
            if ($valor < $valor_minimo-0.001) {
                $_SESSION['msg']['aposta'] = 3;
                $_SESSION['msg']['aviso'] = "<strong>Nada feito!</strong> valor de aposta mínimo é maior que o valor do palpite.";
                header("Location: /jogos/apostar?id=".$_SESSION['dadosjogo']['id']);
            }
        }
        echo "Estamos indo bem";
        $a = new Apostas();

        $a->setId_usuario($_SESSION['dadosusuario']['idusuario']);
        $a->setId_jogo($_SESSION['dadosjogo']['id']);
        $a->setPalpite($palpite);
        $a->setValor($valor);
            $bilhete = $_SESSION['dadosusuario']['idusuario'].$_SESSION['dadosjogo']['id'].time();
        $a->setBilhete($bilhete);

        if($a->salvar()){
            $_SESSION['msg']['aposta'] = 1;
            header("Location: /jogos/apostar?id=".$_SESSION['dadosjogo']['id']);
        } else {
            $_SESSION['msg']['aposta'] = 3;
            $_SESSION['msg']['aviso'] = "<strong>Nada feito!</strong> Algo deu errado ao salvar";
            header("Location: /jogos/apostar?id=".$_SESSION['dadosjogo']['id']);
        }


    }



}

?>