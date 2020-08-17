<?php 
//    session_start(); //ja tem no index
    if(isset($_SESSION['logado']) || !empty($_SESSION['logado']) ){
        header("location: index.php/login");
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Carregando CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo BASEURL;?>/assets/css/loginTemplate.css" rel="stylesheet" id="bootstrap-css">
    <!-- Carregando o bootstrap -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Página de Login - Jogo do Bicho</title>
</head>
<body>
    <div id="logreg-forms">
        <form class="form-signin" action="/validar/login" method="POST">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Entre com sua conta</h1>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Endereço de Email" required="" autofocus="">
            <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required="">
            
            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
            <!-- <a href="#" id="forgot_pswd">Esqueceu sua senha?</a> -->
            <hr>
            
            <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Registre uma nova conta</button>
            </form>

            <!-- <form action="/reset/password/" class="form-reset">
                <input type="email" id="resetEmail" class="form-control" placeholder="Endereço de Email" required="" autofocus="">
                <button class="btn btn-primary btn-block" type="submit">Esqueci minha senha</button>
                <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Voltar</a>
            </form> -->
            
            <form action="/validar/registro/" class="form-signup" method="POST">
                <p style="text-align:center">Registre-se</p>

                <input type="text" name="nome" id="user-name" class="form-control" placeholder="Nome completo" required="" autofocus="">
                <input type="email" name="email" id="user-email" class="form-control" placeholder="Endereço de Email" required autofocus="">
                <input type="password" name="senha" id="user-pass" class="form-control" placeholder="Senha" required autofocus="">
                <input type="password" name="re-senha" id="user-repeatpass" class="form-control" placeholder="Repita sua senha" required autofocus="">

                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Registre-se</button>
                <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Voltar</a>
            </form>
            <br>
            
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!-- Carregando o JS -->
    <script>
        // Muda o RESET PASSWORD do Formulário.
        function toggleResetPswd(e){
            e.preventDefault();
            $('#logreg-forms .form-signin').toggle() // display:block or none
            $('#logreg-forms .form-reset').toggle() // display:block or none
        }
        // Muda para a FUNÇÃO CADASTRE-SE do Formulário
        function toggleSignUp(e){
            e.preventDefault();
            $('#logreg-forms .form-signin').toggle(); // display:block or none
            $('#logreg-forms .form-signup').toggle(); // display:block or none
        }

        // Função usada para redirecionar os cliques (JQuery)
        $(()=>{
            // Login Register Form
            $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
            $('#logreg-forms #cancel_reset').click(toggleResetPswd);
            $('#logreg-forms #btn-signup').click(toggleSignUp);
            $('#logreg-forms #cancel_signup').click(toggleSignUp);
        })
    </script>
    <!-- fim do js -->
    
</body>
</html>