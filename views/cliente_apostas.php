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
							<th>Valor apostado</th>
							<th>Data da aposta</th>
							<th>Data de sorteio</th>
							<th>Bilhete</th>
							<th>Status</th>  
                        </tr>
                    </thead>
                    <tbody>
                	<?php if(is_array($apostas_usuario) && $apostas_usuario.count()>0): ?>
                    	<?php foreach ($apostas_usuario as $chave => $valor):?>
							<tr class="dropdown-toggle" data-toggle="dropdown">
								<?php 
									$j = new Jogos();
									$jogo = $j->consultarId($valor['id_jogo']);
								?>
								<td><?php echo $jogo['nome_jogo']; ?></td>	
								<td><?php echo $valor['palpite'] ?></td>
								<td><?php echo $valor['valor'] ?></td>
								<td><?php echo date("d/m/Y", strtotime($valor['data']));?></td>
								<td><?php echo date("d/m/Y", strtotime($jogo['data_fim']));?></td>
								<td><?php echo $valor['bilhete'] ?></td>
								<td>
									<?php 
										if($valor['status']==0){
											echo "A pagar";
											?>
												<a class="collapsed unstyled" data-toggle="collapse" href="#acoesItem<?php echo $chave; ?>">
	                                        		<i class="icon-chevron-down pull-right"></i>
	                                    		</a>
											<?php
										} else {
											echo "<strong><mark>Pago</mark></strong>";
										}
									?>
									
                                    <ul id="acoesItem<?php echo $chave; ?>" class="collapse unstyled">
                                        <a class="btn btn-success btn-sm" onclick="location.href = '#';">
                                            Pagar
                                        </a>
                                    </ul>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nome do jogo</th>
							<th>Palpite apostado</th>
							<th>Valor apostado</th>
							<th>Data da aposta</th>
							<th>Data de sorteio</th>
							<th>Bilhete</th>
							<th>Status</th> 
                        </tr>
                    </tfoot>
                </table>
                <br>
                <div class="align-right" style="padding: 0px 10px">
                	<span>Valor total: </span>
                	<a href="#" class="btn btn-success">Pagar tudo</a>
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