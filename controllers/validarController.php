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
            $senha = md5(addslashes($_POST['email']));
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
        $data = array();
        $this->loadView('em_construcao', $data);
	}
}
?>