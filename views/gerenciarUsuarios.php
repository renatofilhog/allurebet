<div class="span9">
    <div class="content">
    <div class="module">
        <div class="module">
            <div class="module-head">
                <h3>Jogos não iniciados e Em Andamento</h3>
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
                            <th>Nome</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Telefone</th>
                            <th>Permissão</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($allusers) && count($allusers)>0): ?>
                            <?php foreach($allusers as $chave => $valor): ?>    
                                
                                <tr class="dropdown-toggle" data-toggle="dropdown">
                                
                                    <td>
                                    <?php echo $valor['nome']; ?>
                                        

                                        <a class="collapsed unstyled" data-toggle="collapse" href="#acoesItem<?php echo $chave; ?>">
                                            <i class="icon-chevron-down pull-right"></i>
                                        </a>
                                        <ul id="acoesItem<?php echo $chave; ?>" class="collapse unstyled">
                                                <a class="btn btn-warning btn-sm" onclick="location.href = '/usuarios/editar?id=<?php echo $valor['id']; ?>';">
                                                    Editar
                                                </a>
                                        </ul>
                                    </td>
                                    <td><?php echo $valor['email'] ?></td>
                                    <td>123.456.789-00<?php //echo $valor['cpf'] ?></td>
                                    <td>2000456963<?php //echo $valor['rg'] ?></td>
                                    <td>(85) 9 9525-6354<?php //echo $valor['telefone'] ?></td>
                                    <td>
                                        <?php 
                                            // Status: 0 = Pendente / 1 = Em andamento / 2 = Finalizado
                                            if($valor['nivel_acesso'] == 1){
                                                echo "Administrador";
                                            } elseif($valor['nivel_acesso'] == 0){
                                                echo "Cliente";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Telefone</th>
                            <th>Permissão</th>    
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