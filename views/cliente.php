<?php 
if(!isset($_SESSION['dadosusuario']['nivel_acesso']) || $_SESSION['dadosusuario']['nivel_acesso'] != 0){
    if($_SESSION['dadosusuario']['nivel_acesso'] == 1){
        echo "<script>alert('Algo deu errado');window.location.href = '".BASEURL."/home/cliente';</script>";
    } else {
        echo "<script>alert('Algo deu errado');window.location.href = '".BASEURL."';</script>";
    }
}
?>
<p style="text-align: center"><?php echo "Seja bem vindo: ".$nomeusuario; ?></p>
<br><br>
<div class="span9">
    <div class="content">
        <div class="btn-controls">
            <!-- Ícones de centro -->
            <div class="btn-box-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <div class="span12">
                            <a href="#" class="btn-box small span6"><i class="icon-plus"></i><b>Fazer aposta</b></a>
                            <a href="#" class="btn-box small span6"><i class="icon-inbox"></i><b>Ver Apostas</b></a>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <a href="#" class="btn-box small span6"><i class="icon-user"></i><b>Editar Perfil</b></a>
                            <a href="#" class="btn-box small span6"><i class="icon-money"></i><b>Fale conosco</b></a>
                        </div>
                    </div>
                </div>
                <!-- Fim dos ícones da HOME CENTRO     -->
            </div>
        </div>
    <!--/#btn-controls-->
    </div>
</div>