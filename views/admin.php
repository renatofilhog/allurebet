<?php 
if(!isset($_SESSION['dadosusuario']['nivel_acesso']) || $_SESSION['dadosusuario']['nivel_acesso'] != 1){
    if($_SESSION['dadosusuario']['nivel_acesso'] == 0){
        echo "<script>alert('Algo deu errado');window.location.href = '".BASEURL."/home/admin';</script>";
    } else {
        echo "<script>alert('Algo deu errado');window.location.href = '".BASEURL."';</script>";
    }
}
?>
                    <!--Inicio da PAGE HOME-->
                    <!-- 3 primeiros buttons, visualização de status -->
                    <p style="text-align: center"><?php echo "Seja bem vindo: ".$nomeusuario; ?></p>
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4"><i class="icon-user"></i><b><?php echo $n_usuarios; ?></b>
                                        <p class="text-muted">
                                            Usuários cadastrados</p>
                                    </a>
                                    <a href="#" class="btn-box big span4"><i class=" icon-random"></i><b><?php echo $n_jogos_andamento; ?> jogos</b>
                                        <p class="text-muted">
                                            Jogos em Andamento</p>
                                    </a>
                                    <a href="#" class="btn-box big span4"><i class="icon-money"></i><b>R$ 15,152</b>
                                        <p class="text-muted">
                                            Acumulado do Mês</p>
                                    </a>
                                </div>
                    <!-- FIM DOS 3 primeiros BUTTOS VISU STATUS -->
                    
                                <!-- Ícones de centro -->
                                <div class="btn-box-row row-fluid">
                                    <div class="span12">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="/admin/jogo" class="btn-box small span4"><i class="icon-plus"></i><b>Criar Jogo</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-inbox"></i><b>Gerenciar Jogos</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-th-list"></i><b>Ver Jogos Finalizados</b>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="#" class="btn-box small span4"><i class="icon-group"></i><b>Gerenciar Usuários</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-money"></i><b>Gerenciar Pagamentos</b>
                                                </a><a href="#" class="btn-box small span4"><i class="icon-trophy"></i><b>Ver Ganhadores</b> </a>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Fim dos ícones da HOME CENTRO     -->
                                </div>
                            </div>
                            <!--/#btn-controls-->
                            
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                