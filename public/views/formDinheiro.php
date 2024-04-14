<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Editar usuário</h3>
            </div>
            <div class="module-body">

                    <form class="form-horizontal row-fluid" action="/usuarios/recargaDinheiro?id_usuario=<?php echo $_GET['id'] ?>" method="POST">
                        <div class="form-group">
                        	<label class="form-control row-fluid" name='teste'>ID</label>
                        	<input class="form-control" value="<?php echo $_GET['id'] ?>" type="text" name="id" disabled="disabled">
                        	<label class="form-control row-fluid">Recarga:</label>
                        	<input class="form-control" type="text" id="moneyform" name="dinheiro" required>
                        	<i>Separe por vírgula os decimais.	</i>
                        </div>
                        <br><br>
                        <div class="form-group">
                        	<input type="submit" name="enviar" value="Recarregar Dinheiro" class="form-control btn btn-primary">
                        </div>
                        
                    </form>
            </div>
        </div>
    </div><!--/.content-->
</div><!--/.span9-->