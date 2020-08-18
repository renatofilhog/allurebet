<div class="span9">
    <div class="content">
    <div class="module">
        <div class="module">
            <div class="module-head">
                <h3>Jogos não iniciados e Em Andamento</h3>
            </div>
            <div class="module-body table">
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                    <thead>
                        <tr>
                            <th>Nome do Jogo</th>
                            <th>Data de Início</th>
                            <th>Data de Fim</th>
                            <th>Tipo de Jogo</th>
                            <th>Valor Mínimo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($allgames as $chave => $valor): ?>    
                            <tr>
                                <td><?php echo $valor['nome_jogo'] ?></td>
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
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nome do Jogo</th>
                            <th>Data de Início</th>
                            <th>Data de Fim</th>
                            <th>Tipo de Jogo</th>
                            <th>Valor Mínimo</th>
                            <th>Status</th>    
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


<!-- Mais opções de tabelas -->

<!--
                        <tr class="even gradeX">
                            <td>Item 1</td>
                            <td>Item 2</td>
                            <td>Item 3</td>
                            <td class="center"> 4</td>
                            <td class="center">X</td>
                            <td>item 2</td>
                        </tr>
                        <tr class="even gradeC">
                            <td>Trident</td>
                            <td>Internet
                                    Explorer 5.0</td>
                            <td>Win 95+</td>
                            <td class="center">5</td>
                            <td class="center">C</td>
                            <td>Item 1</td>
                        </tr>
                        <tr class="">
                            <td>Trident</td>
                            <td>Internet
                                    Explorer 5.5</td>
                            <td>Win 95+</td>
                            <td class="center">5.5</td>
                            <td class="center">A</td>
                            <td>Item 1</td>
                        </tr>
                        <tr class="even gradeA">
                            <td>Trident</td>
                            <td>Internet
                                    Explorer 6</td>
                            <td>Win 98+</td>
                            <td class="center">6</td>
                            <td class="center">A</td>
                            <td>Item 1</td>
                        </tr>
                        <tr class="odd gradeA">
                            <td>Trident</td>
                            <td>Internet Explorer 7</td>
                            <td>Win XP SP2+</td>
                            <td class="center">7</td>
                            <td class="center">A</td>
                            <td>Item 1</td>
                        </tr>
                        <tr class="even gradeA">
                            <td>Trident</td>
                            <td>AOL browser (AOL desktop)</td>
                            <td>Win XP</td>
                            <td class="center">6</td>
                            <td class="center">A</td>
                            <td>Item 1</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>Safari 1.3</td>
                            <td>OSX.3</td>
                            <td class="center">312.8</td>
                            <td class="center">A</td>
                            <td>Item 1</td>
                        </tr>
                        
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>OmniWeb 5.5</td>
                            <td>OSX.4+</td>
                            <td class="center">420</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>iPod Touch / iPhone</td>
                            <td>iPod</td>
                            <td class="center">420.1</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>S60</td>
                            <td>S60</td>
                            <td class="center">413</td>
                            <td class="center">A</td>
                        </tr>
                    -->