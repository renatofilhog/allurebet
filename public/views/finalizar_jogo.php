<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Editar jogo</h3>
            </div>
            <div class="module-body">
                <?php if(!isset($_SESSION['msg']['edit_jogo']) || $_SESSION['msg']['edit_jogo'] == 0): ?>
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atenção!</strong> Só altere o que quer mudar.
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
                    <?php //print_r(get_defined_vars()) ?>
                    <form class="form-horizontal row-fluid" action="/acoes/finalizarJogo?idjogo=<?php echo $dadosjogo['id']; ?>" method="POST">
                        
                        <!-- Palpite vencedor -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Qual palpite vencedor?</label>
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

                        <!-- Botao submit  -->
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-success">Definir jogo</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div><!--/.content-->
</div><!--/.span9-->
