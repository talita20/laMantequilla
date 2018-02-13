<?php 
require_once 'header.php';
require_once '../assets/php/classes/classFuncionario.php';

$func = new Funcionario();

if(isset($_POST['edit'])){
	$func->setIdFuncionario($_POST['idFuncionario']);
	$func->setNome($_POST['nome']);
	$func->setCpf($_POST['cpf']);
	$func->setCargo($_POST['cargo']);
	$func->setEndereco($_POST['endereco']);


	if($func->edit() == 1){
		$result = "Funcionario editado com sucesso!";
	}else{
		$error = "Erro ao editar";
	}

}

if(isset($_POST['delete'])){
	$func->setIdFuncionario($_POST['idFuncionario']);

	if($func->delete() == 1){
		$result = "Funcionário deletado com sucesso!";
	}else{
		$error = "Erro ao deletar";
	}
}
?>
<div class="content-wrapper">
	<div id="main" class="container-fluid">
		<?php
		if (isset($result)) {
			?>
			<div class="alert alert-success">
				<?php echo $result; ?>
			</div>
			<?php
		}else if(isset($error)){
			?>
			<div class="alert alert-danger">
				<?php echo $error; ?>
			</div>
			<?php
		}
		?>
		<div id="top" class="row">
			<div class="col-md-12">
				<h1 align="center">Funcionários</h1>
			</div>
			<div class="col-sm-3">
			</div>
			<div class="col-sm-6">

				<div class="input-group h2">
					<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>

			</div>
		</div> <!-- /#top -->


		<hr />
		<div id="list" class="row">

			<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Nome</th>
							<th>CPF</th>
							<th>Cargo</th>
							<th>Endereço</th>
							<th class="actions">Ações</th>
						</tr>
						<?php 
						$stmt = $func->index();
						while($row = $stmt->fetch(PDO::FETCH_OBJ)){
							?>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $row->nome ?></td>
								<td><?php echo $row->cpf ?></td>
								<td><?php echo $row->cargo ?></td>
								<td><?php echo $row->endereco ?></td>
								<td class="actions">
									<a class="btn btn-warning btn-xs" href="./editarFuncionario.php?idFuncionario=<?php echo $row->idFuncionario ?>">Editar</a>
									<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal<?php echo $row->idFuncionario ?>">Excluir</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

			</div> <!-- /#list -->

		</div> <!-- /#main -->
		<?php 
		$stmt = $func->index();
		while($row = $stmt->fetch(PDO::FETCH_OBJ)){
			?>
			<form action="funcionarios.php" method="post">
			<!-- Modal -->
			<div class="modal fade" id="delete-modal<?php echo $row->idFuncionario ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
						</div>
						<div class="modal-body">
							Deseja realmente excluir o funcionário <?php echo $row->nome ?>?
						</div>
						<div class="modal-footer">
							<input type="hidden" name="idFuncionario" value="<?php echo $row->idFuncionario ?>">
							<button type="submit" name="delete" class="btn btn-primary">Sim</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<?php } ?>
		</div>

		<script type="application/javascript">
			var active = document.getElementById("funcionarios");
			active.classList.add("active");
		</script>

		<script type="application/javascript">
			var active = document.getElementById("funcionariovisualizar");
			active.classList.add("active");
		</script>

		<?php
		require_once 'footer.php';
		?>