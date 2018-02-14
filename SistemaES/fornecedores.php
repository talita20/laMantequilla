<?php 
require_once 'header.php';
require_once '../assets/php/classes/classFornecedor.php';

$forne = new Fornecedor();

if(isset($_POST['edit'])){
	$forne->setIdFornecedor($_POST['idFornecedor']);
	$forne->setNomeEmpresa($_POST['nomeEmpresa']);
	$forne->setNomeRepresentante($_POST['nomeRepresentante']);
	$forne->setCnpj($_POST['cnpj']);
	$forne->setEndereco($_POST['endereco']);
	$forne->setTelefoneEmpresa($_POST['telefoneEmpresa']);
	$forne->setTelefoneEmpresa($_POST['telefoneEmpresa']);
	$forne->setTelefoneRepresentante($_POST['telefoneRepresentante']);
	$forne->setEmailEmpresa($_POST['emailEmpresa']);
	$forne->setEmailRepresentante($_POST['emailRepresentante']);

	if($forne->edit() == 1){
		$result = "Fornecedor editado com sucesso!";
	}else{
		$error = "Erro ao editar";
	}

}


if(isset($_POST['delete'])){
	$forne->setIdFornecedor($_POST['idFornecedor']);

	if($forne->delete() == 1){
		$result = "Fornecedor deletado com sucesso!";
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
				<h1 align="center">Fornecedores</h1>
			</div>
			<div class="col-sm-3">
			</div>
			<div class="col-sm-6">

				<!-- <div class="input-group h2">
					<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div> -->

			</div>
		</div> <!-- /#top -->


		<hr />
		<div id="list" class="row">

			<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Empresa</th>
							<th>Representante</th>
							<th>CNPJ</th>
							<th>Endereço</th>
							<th class="actions">Ações</th>
						</tr>
						<?php 
						$stmt = $forne->index();
						while($row = $stmt->fetch(PDO::FETCH_OBJ)){
							?>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $row->nomeEmpresa ?></td>
								<td><?php echo $row->nomeRepresentante ?></td>
								<td><?php echo $row->cnpj ?></td>
								<td><?php echo $row->endereco ?></td>
								<td class="actions">
									<a class="btn btn-success btn-xs" href="visualizarFornecedor.php?idFornecedor=<?php echo $row->idFornecedor ?>">Visualizar</a>
									<a class="btn btn-warning btn-xs" href="editarFornecedor.php?idFornecedor=<?php echo $row->idFornecedor ?>">Editar</a>
									<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal<?php echo $row->idFornecedor ?>">Excluir</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

			</div> <!-- /#list -->


		</div> <!-- /#main -->
		<?php 
		$stmt = $forne->index();
		while($row = $stmt->fetch(PDO::FETCH_OBJ)){
			?>
			<form action="fornecedores.php" method="post">
				<!-- Modal -->
				<div class="modal fade" id="delete-modal<?php echo $row->idFornecedor ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="modalLabel">Excluir Item</h4>
							</div>
							<div class="modal-body">
								Deseja realmente excluir o fornecedor <?php echo $row->nomeEmpresa ?>?
							</div>
							<div class="modal-footer">
								<input type="hidden" name="idFornecedor" value="<?php echo $row->idFornecedor ?>">
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
				var active = document.getElementById("fornecedores");
				active.classList.add("active");
			</script>


			<script type="application/javascript">
				var active = document.getElementById("fornecedoresvisualizar");
				active.classList.add("active");
			</script>




			<?php
			require_once 'footer.php';
			?>