<?php
require_once 'assets/php/classes/classFornecedor.php';

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

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>LaMantequilla</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>FORNECEDOR</h1>
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

			<table>
				<thead>
					<tr>
						<th>Nome da Empresa</th>
						<th>Nome do Representante</th>
						<th>CNPJ</th>
						<th>Endereço</th>
						<th>Telefone da Empresa</th>
						<th>Telefone do Representante</th>
						<th> Email da Empresa</th>
						<th> Email do Representante</th>
					</tr>

					<?php 
					$stmt = $forne->index();
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						?>
						<tbody>
							<tr>
								<td><?php echo $row->nomeEmpresa ?></td>
								<td><?php echo $row->nomeRepresentante ?></td>
								<td><?php echo $row->cnpj ?></td>
								<td><?php echo $row->endereco ?></td>
								<td><?php echo $row->telefoneEmpresa ?></td>
								<td><?php echo $row->telefoneRepresentante ?></td>
								<td><?php echo $row->emailEmpresa ?></td>
								<td><?php echo $row->emailRepresentante ?></td>
								<td>
									<button type="button" data-toggle="modal" data-target="#editar<?php echo $row->idFornecedor ?>" class="btn btn-warning btn-sm">Editar</button>
									<button type="button" data-toggle="modal" data-target="#deletar<?php echo $row->idFornecedor ?>" class="btn btn-danger btn-sm">Excluir</button>
								</td>
							</tr>
						</tbody>
						<?php } ?>
					</thead>
				</table>

				<?php 
				$stmt = $forne->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					?>

					<!-- MODAL EDITAR -->
					<div class="modal fade" id="editar<?php echo $row->idFornecedor ?>" role="dialog">
						<div class="modal-dialog" modal-lg role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
									<h3>Editar fornecedor</h3>
								</div>
								<div class="modal-body">

								</div>
							</div>
						</div>
					</div>
					<form action="editarFornecedor.php" method="post">
										<div class="form-group">
											<label>Nome da Empresa</label>
											<input type="text" name="nomeEmpresa" class="form-control" value="<?php echo $row->nomeEmpresa ?>" required>
											<label>Nome do Representante</label>
											<input type="text" name="nomeRepresentante" class="form-control" value="<?php echo $row->nomeRepresentante ?>" required>
											<label>CNPJ</label>
											<input type="text" name="cnpj" class="form-control" value="<?php echo $row->cnpj?>" required>
											<label>Endereço</label>
											<input type="text" name="endereco" value="<?php echo $row->endereco ?>" class="form-control" value="<?php echo $row->endereco ?>"  required>
											<label>Telefone da Empresa</label>
											<input type="text" name="telefoneEmpresa" class="form-control" value="<?php echo $row->telefoneEmpresa ?>"   required>
											<label>Telefone do Representante</label>
											<input type="text" name="telefoneRepresentante" class="form-control" value="<?php echo $row->telefoneRepresentante ?>"   required>
											<label>Email da Empresa</label>
											<input type="text" name="emailEmpresa" class="form-control" value="<?php echo $row->emailEmpresa ?>"   required>
											<label>Email do Representante</label>
											<input type="text" name="emailRepresentante" class="form-control" value="<?php echo $row->emailRepresentante ?>"   required>
										</div>
										<div class="form-group">
											<input type="hidden" name="idFornecedor" value="<?php echo $row->idFornecedor; ?>">
											<button type="submit" name="edit" class="btn btn-success">Salvar</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
										</div>		
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- MODAL DELETAR -->
					<div class="modal fade" id="deletar<?php echo $row->idFornecedor ?>" role="dialog">
						<div class="modal-dialog" modal-lg role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
									<h3>Deletar Fornecedor</h3>	
								</div>
								<div class="modal-body">
									<h3> Deseja deletar o fornecedor <?php echo $row->nomeEmpresa ?>? </h3>
									<form action="editarFornecedor.php" method="post">
										<input type="hidden" name="idFornecedor" value="<?php echo $row->idFornecedor; ?>">
										<button type="submit" class="btn btn-success" name="delete">Sim</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</body>
		</html>
