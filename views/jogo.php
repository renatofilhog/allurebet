<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Criar novo jogo</h3>
            </div>
            <div class="module-body">
                <?php if(!isset($_SESSION['msg']['cadastro_jogo']) || $_SESSION['msg']['cadastro_jogo'] == 0): ?>
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atenção!</strong> Preencha todos os campos!.
                    </div>
                <?php endif; ?>
                <?php if(isset($_SESSION['msg']['cadastro_jogo']) && $_SESSION['msg']['cadastro_jogo'] == 1): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Jogo Criado!</strong> Verifique a área de gerenciamento para maior detalhe
                    </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['msg']['cadastro_jogo']) && $_SESSION['msg']['cadastro_jogo'] == 2): ?>
                       <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>Error!</strong> <?php echo $_SESSION['msg']['cadastro_jogo_error']; ?>
                        </div>
                <?php endif; ?>

                    <br />

                    <form class="form-horizontal row-fluid" action="/acoes/cadastrarJogo" method="POST">
                        
                        <!-- Nome jogo -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Descrição jogo</label>
                            <div class="controls">
                                <input type="text" name="nome_jogo" id="basicinput" placeholder="Descrição/Nome do jogo a ser criado" class="span8" required>
                            </div>
                        </div>

                        <!-- Data inicio -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Data Inicio</label>
                            <div class="controls">
                                <input type="date" name="data_inicio" id="basicinput" placeholder="Data que se iniciará" class="span8" required>
                                <span class="help-inline">Somente números</span>
                            </div>
                        </div>

                        <!-- Data de FIM -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Data Fim</label>
                            <div class="controls">
                                <input type="date" name="data_fim" id="basicinput" placeholder="Data que se encerrará" class="span8" required>
                                <span class="help-inline">Somente números</span>
                            </div>
                        </div>

                        <!-- Tipo de Jogo DROPDOWN -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Tipo de Jogo</label>
                            <div class="controls">
                                <select name="tipo_jogo" class="form-control span8">
                                    <option value="0">Selecione...</option>
                                    <option value="desportivo">Jogo Desportivo</option>
                                    <option value="bicho">Jogo do Bicho</option>
                                </select>
                            </div>
                        </div>

                        <!-- Valor mínimo palpite -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Valor mínimo de palpite</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on">R$ </span><input class="span8 moneyform" name="valor_minimo" type="text" placeholder="Valor" required>       
                                </div>
                            </div>
                        </div>

                        <!-- Palpites separados por virgula -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Textarea</label>
                            <div class="controls">
                                <textarea class="span8" rows="5" name="palpites_disponiveis" required></textarea>
                                <span class="help-inline">Separe por virgulas sem espaços Ex.: Cachorro,Gato,Avestruz,Touro</span>
                            </div>
                        </div>

                        <!-- Botao submit  -->
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Criar jogo</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div><!--/.content-->
</div><!--/.span9-->