<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Editar jogo</h3>
            </div>
            <div class="module-body">
                <!-- Mensagem padrão -->
                <?php if(!isset($_SESSION['msg']['edit_user']) || $_SESSION['msg']['edit_user'] == 0): ?>
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atenção!</strong> Só preencha o que quer mudar.
                    </div>
                <?php $_SESSION['msg']['edit_user'] = 0; endif; ?>
                
                <!-- Mensagens de sucesso -->
                <?php if(isset($_SESSION['msg']['edit_user']) && $_SESSION['msg']['edit_user'] == 1): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?php echo $_SESSION['msg']['aviso'] ?>

                    </div>
                <?php $_SESSION['msg']['edit_user'] = 0; endif; ?>

                <!-- Mensagens de erros -->
                <?php if(isset($_SESSION['msg']['edit_user']) && $_SESSION['msg']['edit_user'] == 2): ?>
                    <div class="alert alert-error">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?php echo $_SESSION['msg']['aviso'] ?>
                        
                    </div>
                <?php $_SESSION['msg']['edit_user'] = 0; endif; ?>

                <!-- Nenhum campo foi alterado -->
                <?php if(isset($_SESSION['msg']['edit_user']) && $_SESSION['msg']['edit_user'] == 3): ?>
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?php echo $_SESSION['msg']['aviso'] ?>
                        
                    </div>
                <?php $_SESSION['msg']['edit_user'] = 0; endif; ?>

                    <br />

                    <form class="form-horizontal row-fluid" action="/acoes/editarUsuario?id=<?php echo $_GET['id']; ?>" method="POST">
                        
                        <!-- Nome pessoa -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Nome</label>
                            <div class="controls">
                                <input type="text" name="nome" id="basicinput" class="span8">
                                <span class="help-inline"><i><?php echo $dadosusuario['nome'];?></i></span>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Email</label>
                            <div class="controls">
                                <input type="email" name="email" id="basicinput" class="span8">
                                <span class="help-inline"><i><?php echo $dadosusuario['email'];?></i></span>
                            </div>
                        </div>

                        <!-- Senha -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Nova Senha</label>
                            <div class="controls">
                            <input type="password" name="senha" id="basicinput" placeholder="Nova senha" class="span8">
                            </div>
                        </div>

                        <!-- Confirmar Senha -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Confirmar Senha</label>
                            <div class="controls">
                            <input type="password" name="re-senha" id="basicinput" placeholder="Repita a senha" class="span8">
                            </div>
                        </div>

                        <!-- Nivel de acesso -->
                        <div class="control-group">
							<label class="control-label" for="basicinput">Permissão</label>
							<div class="controls">
									<select class="span8" name="nivel_acesso" required="required">
										<option value=99>Selecione...</option>
										<option value=1>Administrador</option>
										<option value=0>Cliente</option>
									</select>
                                    <span class="help-inline"><i><?php
                                            if($dadosusuario['nivel_acesso'] == 1){
                                                echo "Administrador";
                                            } elseif($dadosusuario['nivel_acesso'] == 0){
                                                echo "Cliente";
                                            }
                                    ?></i></span>
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
