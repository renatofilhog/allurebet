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
                $nivel_acesso = $u->getNivel_acesso();
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
        $u = new Usuario();
        if(isset($_POST['cpf']) && !empty($_POST['cpf'])){
            $cpf = str_replace(".", "", $_POST['cpf']);
            $cpf = str_replace("-", "", $cpf);
            $cpf = addslashes($cpf);
            if ($u->consultarCpf($cpf)) {
                header("Location: /home/index?msg=1");
            }
            $u->setCpf($cpf);
        }

        if (isset($_POST['tppessoa']) && $_POST['tppessoa'] != 99) {
            $u->setTppessoa($_POST['tppessoa']);
        } else {
            $u->setTppessoa("pf");
        }


        if (isset($_POST['senha']) && !empty($_POST['senha']) && isset($_POST['re-senha']) && !empty($_POST['re-senha']) ) {
            $senha = md5(addslashes($_POST['senha']));
            $re_senha = md5(addslashes($_POST['re-senha']));
                if ($senha == $re_senha){
                    $u->setSenha($senha);
                } else {
                    header("Location: /home/index?msg=3");
                }
        }

        if(isset($_POST['email']) && !empty($_POST['email'])) { 
            $email = addslashes($_POST['email']);
            if($u->consultarEmail($email)){
                header("Location: /home/index?msg=2");
            }
            $u->setEmail($email);
        }

        if(isset($_POST['nivel_acesso']) && $_POST['nivel_acesso'] != 99 ){
            // Var Padrão de Cliente;
            $u->setNivel_acesso($nivel_acesso);    
        } else {
            // Var Padrão de Cliente;
            $u->setNivel_acesso(0);
        }   

        if (
            isset($_POST['nome']) && !empty($_POST['nome'])
            && isset($_POST['telefone']) && !empty($_POST['telefone'])
            && isset($_POST['cep']) && !empty($_POST['cep'])
            && isset($_POST['logradouro']) && !empty($_POST['logradouro'])
            && isset($_POST['bairro']) && !empty($_POST['bairro'])
            && $_POST['estado'] != 99 && !empty($_POST['estado'])
            && isset($_POST['numero']) && !empty($_POST['numero'])
        ) {

            //Tratamentos e Afins de dados
            $cep = str_replace(".", "", $_POST['cep']);            
            $cep = str_replace("-", "", $cep);
            $cep = addslashes($cep);
            $u->setCep($cep);
            
            
            $telefone = str_replace(" ", "", $_POST['telefone']);
            $telefone = str_replace("(", "", $telefone);
            $telefone = str_replace(")", "", $telefone);
            $telefone = str_replace("-", "", $telefone);
            $telefone = addslashes($telefone);
            $u->setTelefone($telefone);
            
            $nome = addslashes($_POST['nome']);
            $u->setNome($nome);
            
            $logradouro = addslashes($_POST['logradouro']);
            $u->setLogradouro($logradouro);
            
            $bairro = addslashes($_POST['bairro']);
            $u->setBairro($bairro);
            
            $numero = addslashes($_POST['numero']);
            $u->setNumero($numero);
            
            if(isset($_POST['complemento']) && !empty($_POST['comlemento'])){
                $comlemento = addslashes($_POST['comlemento']);
                $u->setComplemento($complemento);
            }
            $estado = addslashes($_POST['estado']);
            $u->setEstado($estado);
            
            $cidade = addslashes($_POST['cidade']);
            $u->setCidade($cidade);
            echo "<pre>";
            print_r(get_defined_vars());
            echo "</pre>";
            if($u->salvar()){
                if($u->getNivel_acesso >= 1){
                    // pegando dados do usuário
                    $_SESSION['dadosusuario']['idusuario'] = $u->getId();
                    $_SESSION['dadosusuario']['nome'] = $u->getNome();
                    $_SESSION['dadosusuario']['email'] = $u->getEmail();
                    $_SESSION['dadosusuario']['nivel_acesso'] = $u->getNivel_acesso();
                    echo "Ok";
                    header("Location: /home/admin");
                } elseif($u->getNivel_acesso == 0){
                    // pegando dados do usuário
                    $_SESSION['dadosusuario']['idusuario'] = $u->getId();
                    $_SESSION['dadosusuario']['nome'] = $u->getNome();
                    $_SESSION['dadosusuario']['email'] = $u->getEmail();
                    $_SESSION['dadosusuario']['nivel_acesso'] = $u->getNivel_acesso();
        
                    header("Location: /home/cliente");
                }
            } else {
                echo "<script>alert('Algo deu errado ao cadastrar');window.location.href = ".BASEURL.";</script>";    
            }
        }      
    }

    public function novoUsuario(){
        $u = new Usuario();
        // Dados Login

        #Email
        if(isset($_POST['email']) && !empty($_POST['email'])) { 
            $email = addslashes($_POST['email']);
            if($u->consultarEmail($email)){
                echo "Tem email";
                $_SESSION['msg']['new_user'] = 2;
                $_SESSION['msg']['new_user_aviso'] = "<strong>Erro ao salvar</strong> e-mail já existe.";
                header("Location: /usuarios/novo/");
                exit;
            } else {
                $u->setEmail($email);
            }
        }

        #Senha
        if (isset($_POST['senha']) && !empty($_POST['senha']) && isset($_POST['re-senha']) && !empty($_POST['re-senha']) ) {
            $senha = md5(addslashes($_POST['senha']));
            $re_senha = md5(addslashes($_POST['re-senha']));
                if ($senha == $re_senha){
                    $u->setSenha($senha);
                } else {
                    $_SESSION['msg']['new_user'] = 2;
                    $_SESSION['msg']['new_user_aviso'] = "<strong>Erro ao salvar</strong> Senhas não conferem.";
                    header("Location: /usuarios/novo/");
                    exit;
                }
        }

        #Nivel_Acesso
        if(isset($_POST['nivel_acesso']) && $_POST['nivel_acesso'] != 99){
            $u->setNivel_acesso(addslashes($_POST['nivel_acesso']));
        } else {
            $_SESSION['msg']['new_user'] = 2;
            $_SESSION['msg']['new_user_aviso'] = "<strong>Erro ao salvar</strong> selecione uma permissão.";
            header("Location: /usuarios/novo/");
            exit;
        }

        // Dados Pessoais
        #TP PESSOA E CPF/CNPJ
        if (isset($_POST['tppessoa']) && $_POST['tppessoa'] != 99) {
            if($_POST['tppessoa'] == "pj"){
                $u->setTppessoa($_POST['tppessoa']);
                if(isset($_POST['cnpj']) && !empty($_POST['cnpj'])){
                    $cnpj = str_replace(".", "", $_POST['cnpj']);
                    $cnpj = str_replace("-", "", $cnpj);
                    $cnpj = str_replace("/", "", $cnpj);
                    $cnpj = addslashes($cnpj);
                    if ($u->consultarCpf($cnpj)) {
                        $_SESSION['msg']['new_user'] = 2;
                        $_SESSION['msg']['new_user_aviso'] = "<strong>Erro ao salvar</strong> CNPJ já existe.";
                        header("Location: /usuarios/novo/");
                        exit;
                    }
                    $u->setCnpj($cnpj);
                }
            } elseif($_POST['tppessoa'] == "pf") {
                $u->setTppessoa($_POST['tppessoa']);
                if(isset($_POST['cpf']) && !empty($_POST['cpf'])){
                    $cpf = str_replace(".", "", $_POST['cpf']);
                    $cpf = str_replace("-", "", $cpf);
                    $cpf = addslashes($cpf);
                    if ($u->consultarCpf($cpf)) {
                        $_SESSION['msg']['new_user'] = 2;
                        $_SESSION['msg']['new_user_aviso'] = "<strong>Erro ao salvar</strong> CPF já existe.";
                        header("Location: /usuarios/novo/");
                        exit;
                    }
                    $u->setCpf($cpf);
                }
            }
        } else {
            $_SESSION['msg']['new_user'] = 2;
            $_SESSION['msg']['new_user_aviso'] = "<strong>Erro ao salvar</strong> Preencha os dados pessoais.";
            header("Location: /usuarios/novo/");
            exit;
        }
        #Nome e telefone
        if (
            isset($_POST['nome']) && !empty($_POST['nome'])
            && isset($_POST['telefone']) && !empty($_POST['telefone'])
        ) {
            $telefone = str_replace(" ", "", $_POST['telefone']);
            $telefone = str_replace("(", "", $telefone);
            $telefone = str_replace(")", "", $telefone);
            $telefone = str_replace("-", "", $telefone);
            $telefone = addslashes($telefone);
            $u->setTelefone($telefone);
            
            $nome = addslashes($_POST['nome']);
            $u->setNome($nome);

        } else {
            $_SESSION['msg']['new_user'] = 2;
            $_SESSION['msg']['new_user_aviso'] = "<strong>Erro ao salvar</strong> não tem o nome.";
            header("Location: /usuarios/novo/");
            exit;
        }

        // Dados de moradia
        #ENDEREÇO COM CEP
        if (
            isset($_POST['cep']) && !empty($_POST['cep'])
            && isset($_POST['logradouro']) && !empty($_POST['logradouro'])
            && isset($_POST['bairro']) && !empty($_POST['bairro'])
            && $_POST['estado'] != 99 && !empty($_POST['estado'])
            && isset($_POST['numero']) && !empty($_POST['numero'])
        ) {

            //Tratamentos e Afins de dados
            $cep = str_replace(".", "", $_POST['cep']);            
            $cep = str_replace("-", "", $cep);
            $cep = addslashes($cep);
            $u->setCep($cep);
            
            $logradouro = addslashes($_POST['logradouro']);
            $u->setLogradouro($logradouro);
            
            $bairro = addslashes($_POST['bairro']);
            $u->setBairro($bairro);
            
            $numero = addslashes($_POST['numero']);
            $u->setNumero($numero);
            
            if(isset($_POST['complemento']) && !empty($_POST['comlemento'])){
                $comlemento = addslashes($_POST['comlemento']);
                $u->setComplemento($complemento);
            }
            $estado = addslashes($_POST['estado']);
            $u->setEstado($estado);
            
            $cidade = addslashes($_POST['cidade']);
            $u->setCidade($cidade);
            echo "<pre>";
            print_r(get_defined_vars());
            echo "</pre>";
            if($u->salvar()){
                $_SESSION['msg']['new_user'] = 1;
                $_SESSION['msg']['new_user_aviso'] = "<strong>Usuário cadastrado</strong> verifique a area de gerenciamento.";
                header("Location: /usuarios/novo/");
                exit;

            } else {
                $_SESSION['msg']['new_user'] = 2;
                $_SESSION['msg']['new_user_aviso'] = "<strong>Erro ao salvar</strong> contate o administrador.";
                echo "<script>alert('Algo deu errado ao cadastrar');window.location.href = ".BASEURL.";</script>";    
            }
        }
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

            // Dados login
            #email
            if(isset($_POST['email']) && !empty( $_POST['email'] ) ){
                $email = addslashes($_POST['email']);
                $u->setEmail($email);
            }

            #senha
            if(isset($_POST['senha']) && !empty($_POST['senha']) && isset($_POST['senha']) && !empty($_POST['senha']) ) {
                if($_POST['senha'] == $_POST['re-senha'] ){
                    $senha = md5(addslashes($_POST['senha']) );
                    $u->setSenha($senha);
                }
            }

            #permissao
            if($_POST['nivel_acesso'] != 99 ){
                $nivel_acesso = addslashes($_POST['nivel_acesso']);
                $u->setNivel_acesso($nivel_acesso);
            }
        
            // Dados Pessoais
            #nome
            if(isset($_POST['nome']) && !empty( $_POST['nome']) ) {
                $nome = addslashes($_POST['nome']);
                $u->setNome($nome);
            }

            #tppessoa
            if(isset($_POST['tppessoa']) && !empty( $_POST['tppessoa']) ) {
                $tppessoa = addslashes($_POST['tppessoa']);
                $u->setTppessoa($tppessoa);
            }

            #cpf
            if(isset($_POST['cpf']) && !empty( $_POST['cpf']) ) {
                $cpf = addslashes($_POST['cpf']);
                $u->setCpf($cpf);
            }

            #cnpj
            if(isset($_POST['cnpj']) && !empty( $_POST['cnpj']) ) {
                $cnpj = addslashes($_POST['cnpj']);
                $u->setCnpj($cnpj);
            }

            #telefone
            if(isset($_POST['telefone']) && !empty( $_POST['telefone']) ) {
                $telefone = addslashes($_POST['telefone']);
                $u->setTelefone($telefone);
            }

            // Dados Residênciais
            #CEP
            if(isset($_POST['cep']) && !empty( $_POST['cep']) ) {
                $cep = addslashes($_POST['cep']);
                $u->setCep($cep);
            }

            #Logradouro          
            if(isset($_POST['logradouro']) && !empty( $_POST['logradouro']) ) {
                $logradouro = addslashes($_POST['logradouro']);
                $u->setLogradouro($logradouro);
            }

            #Numero
            if(isset($_POST['numero']) && !empty( $_POST['numero']) ) {
                $numero = addslashes($_POST['numero']);
                $u->setNumero($numero);
            }

            #Bairro
            if(isset($_POST['bairro']) && !empty( $_POST['bairro']) ) {
                $bairro = addslashes($_POST['bairro']);
                $u->setBairro($bairro);
            }

            #Complemento
            if(isset($_POST['complemento']) && !empty( $_POST['complemento']) ) {
                $complemento = addslashes($_POST['complemento']);
                $u->setComplemento($complemento);
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
        $u = new Usuario();
        if(isset($_POST['palpite']) && $_POST['palpite'] != 99){
            $palpite = addslashes($_POST['palpite']);
        } else {
            $_SESSION['msg']['aposta'] = 3;
            $_SESSION['msg']['aviso'] = "<strong>Nada feito!</strong> Selecione algum palpite.";
            header("Location: /jogos/apostar?id=".$_SESSION['dadosjogo']['id']);
            exit;
        }
        if (isset($_POST['valor']) && !empty($_POST['valor'])) {
            $valor = addslashes($_POST['valor']);
            $valor = str_replace(".","", $valor);
            $valor = str_replace(",",".", $valor);
            $valor_minimo = $_SESSION['dadosjogo']['valor_minimo'];

            $u->consultarId($_SESSION['dadosusuario']['idusuario']);
            $dinheiro = str_replace(",", "", $u->getDinheiro());
            $dinheiro = $u->getDinheiro();

            if ($valor < $valor_minimo-0.001 || $dinheiro<$valor-0.001) {
                $_SESSION['msg']['aposta'] = 3;
                $_SESSION['msg']['aviso'] = "<strong>Nada feito!</strong> valor de aposta mínimo é maior que o valor do palpite ou Não há dinheiro suficiente para esta aposta.";
                header("Location: /jogos/apostar?id=".$_SESSION['dadosjogo']['id']);
                exit;
            }
        }
        $a = new Apostas();

        $a->setId_usuario($_SESSION['dadosusuario']['idusuario']);
        $a->setId_jogo($_SESSION['dadosjogo']['id']);
        $a->setPalpite($palpite);
        $a->setValor($valor);
            $bilhete = $_SESSION['dadosusuario']['idusuario'].$_SESSION['dadosjogo']['id'].time();
        $a->setBilhete($bilhete);
        
        if($a->salvar()){
            $dinAtual= $u->getDinheiro() - $a->getValor();
            $u->setDinheiro($dinAtual);
            $u->salvar();
            $_SESSION['qnt_dinheiro'] = $u->getDinheiro();
            $_SESSION['msg']['aposta'] = 1;
            header("Location: /jogos/apostar?id=".$_SESSION['dadosjogo']['id']);
        } else {
            $_SESSION['msg']['aposta'] = 3;
            $_SESSION['msg']['aviso'] = "<strong>Nada feito!</strong> Algo deu errado ao salvar";
            
            header("Location: /jogos/apostar?id=".$_SESSION['dadosjogo']['id']);
        }


    }

    public function finalizarJogo(){
        $j = new Jogos();
        $a = new Apostas();
        if(isset($_POST['palpite']) && $_POST['palpite'] != 99){
            $id_jogo = addslashes($_GET['idjogo']);
            $j->consultarId($id_jogo);
            $j->setPalpite_certo($_POST['palpite']);
            $j->setStatus(2); #Finalizado;
            $j->salvar();
            $a->definirJogo($id_jogo, $_POST['palpite']);   
            header("Location: /jogos/ver_ganhadores?id_jogo=".$id_jogo);
        }
    }



}

?>