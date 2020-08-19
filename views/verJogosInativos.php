<div class="span9">
    <div class="content">
    <div class="module">
        <div class="module">
            <div class="module-head">
                <h3>Jogos inativos</h3>
            </div>
            
            <div class="module-body table">

                <!-- /* Avisos -->
                <?php if(isset($_SESSION['msgjogos']['avisar']) && $_SESSION['msgjogos']['avisar'] == 1): ?>
                    <div class="alert <?php echo $_SESSION['msgjogos']['categoria']; ?>">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?php echo $_SESSION['msgjogos']['aviso']; ?>
                    </div>
                <?php endif; $_SESSION['msgjogos']['avisar'] = null;?>
                <!-- Fim avisos -->
               
               
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                    <thead>
                        <tr>
                            <th>Nome do Jogo</th>
                            <th>Data de Início</th>
                            <th>Data de Fim</th>
                            <th>Tipo de Jogo</th>
                            <th>Valor Mínimo</th>
                            <th>Estagnou em:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($allgames) && count($allgames)>0): ?>
                            <?php foreach($allgames as $chave => $valor): ?>    
                                
                                <tr class="dropdown-toggle" data-toggle="dropdown">
                                
                                    <td>
                                    <?php echo $valor['nome_jogo']; ?>
                                        

                                        <a class="collapsed unstyled" data-toggle="collapse" href="#acoesItem<?php echo $chave; ?>">
                                            <i class="icon-chevron-down pull-right"></i>
                                        </a>
                                        <ul id="acoesItem<?php echo $chave; ?>" class="collapse unstyled">
                                                <a class="btn btn-warning btn-sm" onclick="location.href = '/jogos/editar?id=<?php echo $valor['id']; ?>';">
                                                    Editar
                                                </a>
                                                
                                                <a class="btn btn-info btn-sm" onclick="location.href = '/jogos/reativar?id=<?php echo $valor['id']; ?>';">
                                                    Re-Ativar
                                                </a>
                                        </ul>
                                    </td>
                                    <td><?php echo $valor['data_inicio'] ?></td>
                                    <td><?php echo $valor['data_fim'] ?></td>
                                    <td><?php echo $valor['tipo_jogo'] ?></td>
                                    <td><?php echo $valor['valor_minimo'] ?></td>
                                    <td>
                                        <?php 
                                            // Status: 0 = Pendente / 1 = Em andamento / 2 = Finalizado
                                            if($valor['status'] == 0){
                                                echo "Pendente";
                                            } elseif($valor['status'] == 1){
                                                echo "Em andamento";
                                            } elseif($valor['status'] == 2){
                                                echo "Finalizado";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nome do Jogo</th>
                            <th>Data de Início</th>
                            <th>Data de Fim</th>
                            <th>Tipo de Jogo</th>
                            <th>Valor Mínimo</th>
                            <th>Estagnou em:</th>    
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div><!--/.module-->
    </div><!--/.content-->
</div><!--/.span9-->

<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
</script>