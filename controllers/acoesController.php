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
    

    

}
?>