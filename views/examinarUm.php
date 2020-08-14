<!-- Template para trazer as informações de 1 único cadastro -->
<div class="container">
	<div class="row">
		<div class="col-12">
			<table class="table table-hover table-striped table-bordered">
				<thead class="thead-dark">
				<tr>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Senha</th>
				</tr>
				</thead>

				<?php 
						echo "<tr>";
						echo "<td>".$nome."</td>";
						echo "<td>".$email."</td>";
						echo "<td>".$senha."</td>";
						//echo "<td>"."<a href='editar.php?id=".$user["id"]."' class='btn btn-warning'>Editar</a> "."<a href='excluir.php?id=".$user["id"]."' class='btn btn-danger'>Excluir</a>"."</td>";
						echo "</tr>";
					
				?>


			</table>
			<div class="text-right"><a href="#" class="btn btn-dark">Sair do sistema</a></div>
		</div>
	</div>
</div>
<br>