<?php
/*
* Classe validar: /validar/
* 
* Não há VIEWS, funciona somente para redirecionamento
*/
class validarController extends Controller {
   

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
    

    

}
?>