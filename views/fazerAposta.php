<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Fazer aposta</h3>
            </div>
            <div class="module-body">
                <?php if(!isset($_SESSION['msg']['edit_jogo']) || $_SESSION['msg']['edit_jogo'] == 0): ?>
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atenção!</strong> Verifique o valor mínimo antes de enviar.
                    </div>
                <?php $_SESSION['msg']['edit_jogo'] = 0; endif; ?>
                
                <?php if(isset($_SESSION['msg']['edit_jogo']) && $_SESSION['msg']['edit_jogo'] == 1): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Jogo editado!</strong> Verifique a área de gerenciamento para maiores detalhes
                    </div>
                <?php $_SESSION['msg']['edit_jogo'] = 0; endif; ?>

                <?php if(isset($_SESSION['msg']['edit_jogo']) && $_SESSION['msg']['edit_jogo'] == 2): ?>
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Error!</strong> Algo deu errado!
                    </div>
                <?php $_SESSION['msg']['edit_jogo'] = 0; endif; ?>

                    <br />

                    <form class="form-horizontal row-fluid" action="/acoes/apostar" method="POST">
                        
                        <!-- Palpites -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Palpites disponíves</label>
                            <div class="controls">
                                <select name="palpite" required class="span8">
                                    <option value="99">Selecione...</option>

                                    <?php foreach ($palpites as $chave => $valor) {
                                        echo "<option>";
                                        echo $valor;
                                        echo "</option>";
                                    } ?>

                                </select>
                                <span class="help-inline">Favor selecione</span>
                            </div>
                        </div>

                        <!-- Valor palpite -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Valor do palpite</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on">R$ </span>
                                    <input class="span10 moneyform" name="valor" type="text" placeholder="Quanto quer apostar?" required>

                                </div>
                               <span class="help-inline">Mínimo: <?php echo $dadosjogo['valor_minimo'] ?></span>   
                            </div>
                        </div>
                        <?php 
                          $_SESSION['dadosjogo']['id'] = $dadosjogo['id'];  
                        ?>
                        <!-- Botao submit  -->
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-success">Apostar</button>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <center><strong>Informações do jogo escolhido</strong></center>
                        <br>

                        <!-- Nome jogo -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Nome do jogo</label>
                            <div class="controls">
                                <input type="text" name="nome_jogo" id="basicinput" value="<?php echo $dadosjogo['nome_jogo']?>" class="span8" disabled>
                            </div>
                        </div>

                        <!-- Data de Fim -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Data fim</label>
                            <div class="controls">
                                <input type="text" name="data_fim" id="basicinput" value="<?php echo $dadosjogo['data_fim']?>" class="span8 dateform" disabled>
                            </div>
                        </div>

                        <!-- Tipo de Jogo -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Tipo de Jogo</label>
                            <div class="controls">
                                <input type="text" name="tipo_jogo" id="basicinput" value="<?php echo $dadosjogo['tipo_jogo']?>" class="span8" disabled>    
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div><!--/.content-->
</div><!--/.span9-->
