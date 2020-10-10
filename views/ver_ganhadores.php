<?php 

?>
<div class="span9">
    <div class="content">
    <div class="module">
        <div class="module">
            <div class="module-head">
                <h3>Ganhadores do Jogo ID:TAL</h3>
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
                
                <h2 style="text-align: center;">Informações sobre o Jogo</h2><br>
                <p style="text-align: center;">
                    <strong>Nome do jogo:</strong> <?php echo $jogo['nome_jogo'] ?> <br>
                    <strong>Tipo de Jogo:</strong> <?php echo ucfirst($jogo['tipo_jogo']); ?> <br>
                    <strong>Data de fim:</strong>  <?php echo date("d/m/Y", strtotime($jogo['data_fim']));?> <br>
                </p>

               
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                    <thead>
                        <tr>
                            <th>Nome do Apostador</th>
                            <th>Data da Aposta</th>
                            <th>Valor Apostado</th>
                            <th>Nº do Bilhete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($ganhadores) && count($ganhadores)>0): ?>
                            <?php foreach($ganhadores as $chave => $valor): ?>    
                                
                                <tr class="dropdown-toggle" data-toggle="dropdown">
                                
                                    <td>
                                    <?php echo $valor['nome_usuario']; ?>
                                        

                                        
                                    </td>
                                    <td><?php echo date("d/m/Y", strtotime($valor['data_aposta'])); ?></td>
                                    <td><?php echo $valor['valor_apostado'] ?></td>
                                    <td><?php echo $valor['bilhete'] ?></td>
                                    
                                </tr>
                                
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nome do Apostador</th>
                            <th>Data da Aposta</th>
                            <th>Valor Apostado</th>
                            <th>Nº do Bilhete</th>   
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