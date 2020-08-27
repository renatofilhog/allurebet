<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Editar usuário</h3>
            </div>
            <div class="module-body">
                <!-- Mensagem padrão -->
                <?php if(!isset($_SESSION['msg']['edit_user']) || $_SESSION['msg']['edit_user'] == 0): ?>
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Atenção!</strong> Preencha os campos corretamente.
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
                        <!-- Dados de login -->
                        <div class="control-group">
                            <div class="controls">
                                <span><strong>Dados de Login</strong></span>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Email</label>
                            <div class="controls">
                                <input type="email" name="email" id="basicinput" class="span8">
                                <span class="help-inline"><i></i></span>
                            </div>
                        </div>

                        <!-- Senha -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Senha</label>
                            <div class="controls">
                            <input type="password" name="senha" id="basicinput" placeholder="Senha" class="span8">
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
                                    <select name="nivel_acesso" required="required">
                                        <option value=99>Selecione...</option>
                                        <option value=1>Administrador</option>
                                        <option value=2>Gerente</option>
                                        <option value=3>Promotor</option>
                                        <option value=4>Banca</option>
                                        <option value=0>Cliente</option>
                                    </select>
                                    <span class="help-inline"><i></i></span>
                            </div>
                        </div>

                        <!-- Dados pessoais -->
                        <div class="control-group">
                            <div class="controls">
                                <span><strong>Dados pessoais</strong></span>
                            </div>
                        </div>

                        <!-- Nome pessoa -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Nome</label>
                            <div class="controls">
                                <input type="text" name="nome" id="basicinput" class="span8">
                                <span class="help-inline"><i></i></span>
                            </div>
                        </div>

                        <!-- Tipo pessoa -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Tipo pessoa:</label>
                            <div class="controls">
                                <select name="tppessoa" id="tppessoa" onchange="tppessoa()">
                                    <option value="pf">Física</option>
                                    <option value="pj">Juridica</option>
                                </select>
                                <span class="help-inline"><i></i></span>
                            </div>
                        </div>

                        <!-- CPF -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">CPF</label>
                            <div class="controls">
                                <input type="text" id="cpf" name="cpf" placeholder="CPF (Somente números)" class="span8 CPF">
                                <span class="help-inline"><i></i></span>
                            </div>
                        </div>

                        <!-- CNPJ -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">CNPJ</label>
                            <div class="controls">
                                <input type="text" id="cnpj" name="cnpj" placeholder="CNPJ (Somente números)" class="span8 cnpj">
                                <span class="help-inline"><i></i></span>
                            </div>
                        </div>

                        <!-- Telefone -->
                        
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Telefone</label>
                            <div class="controls">
                                <input type="text" name="telefone" placeholder="Telefone (Somente números)" class="span8 tel">
                                <span class="help-inline"><i></i></span>
                            </div>
                        </div>

                        <!-- Dados residênciais -->
                        <div class="control-group">
                            <div class="controls">
                                <span><strong>Dados residênciais</strong></span>
                            </div>
                        </div>

                        <!-- CEP -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">CEP</label>
                            <div class="controls">
                                <input type="text" name="cep" placeholder="CEP (Somente números)" class="span8 CEP">
                                <span class="help-inline"></span>
                            </div>
                        </div>

                        <!-- Logradouro -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Logradouro</label>
                            <div class="controls">
                                <input type="text" name="logradouro" placeholder="Logradouro" class="span8">
                                <span class="help-inline"></span>
                            </div>
                        </div>

                        <!-- Número -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Número</label>
                            <div class="controls">
                                <input type="text" name="numero" placeholder="Número" class="span8">
                                <span class="help-inline"><i></i></span>
                            </div>
                        </div>

                        <!-- Bairro -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Bairro</label>
                            <div class="controls">
                                <input type="text" name="bairro" placeholder="Bairro" class="span8">
                                <span class="help-inline"><i></i></span>
                            </div>
                        </div>

                        <!-- Complemento -->
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Complemento</label>
                            <div class="controls">
                                <input type="text" name="complemento" placeholder="Se houver" class="span8">
                                <span class="help-inline"><i></i></span>
                            </div>
                        </div>

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

