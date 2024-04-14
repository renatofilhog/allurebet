<div class="span9">
    <div class="content">
    <div class="module">
        <div class="module">
            <div class="module-head">
                <h3>Recarregar dinheiro</h3>
            </div>
            
            <div class="module-body table">

                <!-- /* Avisos -->
                <?php if(isset($_SESSION['msgAlert']) && !empty($_SESSION['msgAlert'])): ?>
                    <?php echo $_SESSION['msgAlert']; ?>
                <?php endif; $_SESSION['msgAlert'] = null;?>
                <!-- Fim avisos -->
               
               
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Tipo de Pessoa</th>
                            <th>CPF/CNPJ</th>
                            <th>Telefone</th>
                            <th>Dinheiro R$</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($allusers) && count($allusers)>0): ?>
                            <?php foreach($allusers as $chave => $valor): ?>    
                                
                                <tr class="dropdown-toggle" data-toggle="dropdown">
                                
                                    <td>
                                    <?php echo $valor['nome']; ?>
                                    </td>
                                    <td><?php echo $valor['email'] ?></td>
                                    <td><?php if($valor['tppessoa']=="pf"){echo "Física";} elseif($valor['tppessoa']=="pj") {echo "Jurídica";} else{echo "Nao definido";} ?></td>
                                    <td><?php if($valor['tppessoa']=="pf"){echo $valor['cpf'];} elseif($valor['tppessoa']=="pj") {echo $valor['cnpj'];} else{echo "Nao definido";} ?></td>
                                    <td><span class="telefone"><?php echo $valor['telefone'] ?></span></td>
                                    <td><?php if(empty($valor['dinheiro'])){
                                                 echo "0";
                                              } else {
                                                echo $valor['dinheiro'];
                                              } ?>
                                        <a class="collapsed unstyled" data-toggle="collapse" href="#acoesItem<?php echo $chave; ?>">
                                            <i class="icon-chevron-down pull-right"></i>
                                        </a>
                                        <ul id="acoesItem<?php echo $chave; ?>" class="collapse unstyled">
                                                <a class="btn btn-primary btn-sm" onclick="location.href = '/usuarios/recargaDinheiroT?id=<?php echo $valor['id']; ?>';">
                                                    Recarga>
                                                </a>
                                        </ul>
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
                            <th>Dinheiro R$</th>  
                        </tr>
                    </tfoot>
                </table>
                <hr>
                
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

            $('.telefone').mask('(00) 0 0000-0000');
            $('.CEP').mask('00.000-000');
            $('.CPF').mask('000.000.000-00', {reverse: true});
		} );

</script>