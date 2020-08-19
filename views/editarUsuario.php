<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Editar jogo</h3>
            </div>
            <div class="module-body">
                <?php if(!isset($_SESSION['msg']['edit_user']) || $_SESSION['msg']['edit_jogo'] == 0): ?>
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atenção!</strong> Só altere o que quer mudar.
                    </div>
                <?php $_SESSION['msg']['edit_user'] = 0; endif; ?>
                
                <?php if(isset($_SESSION['msg']['edit_user']) && $_SESSION['msg']['edit_user'] == 1): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Usuário editado!</strong> Verifique a área de gerenciamento para maiores detalhes
                    </div>
                <?php $_SESSION['msg']['edit_user'] = 0; endif; ?>

                <?php if(isset($_SESSION['msg']['edit_user']) && $_SESSION['msg']['edit_user'] == 2): ?>
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Error!</strong> Algo deu errado!
                    </div>
                <?php $_SESSION['msg']['edit_user'] = 0; endif; ?>

                    <br />

                    <form class="form-horizontal row-fluid" action="/acoes/editarUsuario" method="POST">
                        
                        <!-- Nome pessoa -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Nome</label>
                            <div class="controls">
                                <input type="text" name="nome" id="basicinput" value="<?php echo $dadosusuario['nome'];?>" class="span8" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Email</label>
                            <div class="controls">
                                <input type="email" name="email" id="basicinput" value="<?php echo $dadosusuario['email']?>" class="span8">
                                <span class="help-inline">Digite um válido</span>
                            </div>
                        </div>

                        <!-- Senha -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Senha (Desabilitado por enquanto)</label>
                            <div class="controls">
                            <input type="password" name="data_fim" id="basicinput" value="<?php echo $dadosusuario['senha']?>" class="span8" disabled>
                            </div>
                        </div>

                        <!-- Nivel de acesso -->
                        <div class="control-group">
							<label class="control-label" for="basicinput">Permissão</label>
							<div class="controls">
									<select name="nivel_acesso" required="required">
										<option>Selecione...</option>
										<option value=1>Administrador</option>
										<option value=0>Cliente</option>
									</select>
							</div>
						</div>


                        <!-- <div class="control-group">
                            <label class="control-label" for="basicinput">Tipo de Jogo</label>
                            <div class="controls">
                                <input type="text" name="tipo_jogo" id="basicinput" value="" class="span8">    
                            </div>
                        </div> -->

                        <!-- Botao submit  -->
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-warning">Editar usuario</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div><!--/.content-->
</div><!--/.span9-->
