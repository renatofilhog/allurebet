<?php
if($apostaswin == 0){
	echo "<center><h1> Infelizmente não houveram apostas ganhadoras para o palpite selecionado.";
	exit;
}
?>

<div class="span9">
    <div class="content">
    <div class="module">
        <div class="module">
            <div class="module-head">
                <h3>Ver apostas</h3>
            </div>
            
            <div class="module-body table">

                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                    <thead>
                        <tr>
                            <th>Nome do jogo</th>
							<th>Palpite apostado</th>
							<th>Palpite certo</th>
							<th>Valor apostado</th>
							<th>Data da aposta</th>
							<th>Bilhete</th>
                        </tr>
                    </thead>
                    <tbody>
                	<?php if(is_array($apostaswin) && count($apostaswin)>0): ?>
                    	<?php foreach ($apostaswin as $chave => $valor):?>
							<tr class="dropdown-toggle" data-toggle="dropdown">
								<?php 
									$j = new Jogos();
									$jogo = $j->consultarId($valor['id_jogo']);
								?>
								<td><?php echo $jogo['nome_jogo']; ?></td>	
								<td><?php echo $valor['palpite'] ?></td>
								<td><?php echo $jogo['palpite_certo'] ?></td>
								<td><?php echo $valor['valor'] ?></td>
								<td><?php echo date("d/m/Y", strtotime($valor['data']));?></td>
								<td><?php echo $valor['bilhete'] ?></td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nome do jogo</th>
							<th>Palpite apostado</th>
							<th>Palpite certo</th>
							<th>Valor apostado</th>
							<th>Data da aposta</th>
							<th>Bilhete</th>
                        </tr>
                    </tfoot>
                </table>
                <br>
                <div class="align-right" style="padding: 0px 10px">
                	<a href="/admin/gerjogos/" class="btn btn-success">Voltar</a>
                </div>
                
                	
                </div>
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
