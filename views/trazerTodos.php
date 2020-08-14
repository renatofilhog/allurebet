<div class="container">
	<div class="row">
		<div class="col-12">
			<table class="table table-hover table-striped table-bordered">
				<thead class="thead-dark">
				<tr>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Ações</th>
				</tr>
				</thead>

				<?php 

					foreach ($viewData as $user) {
						echo "<tr>";
						echo "<td>".$user["nome"]."</td>";
						echo "<td>".$user["email"]."</td>";
						echo "<td><button class='btn btn-primary'>Em</button>"." <button class='btn btn-warning'>Desenvolvimento</button>"."</td>";
						//echo "<td>"."<a href='editar.php?id=".$user["id"]."' class='btn btn-warning'>Editar</a> "."<a href='excluir.php?id=".$user["id"]."' class='btn btn-danger'>Excluir</a>"."</td>";
						echo "</tr>";
					}
				?>


			</table>
			<div class="text-right"><a href="#" class="btn btn-dark">Sair do sistema</a></div>
		</div>
	</div>
</div>