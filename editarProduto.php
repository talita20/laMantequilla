<?php
require_once 'assets/php/classes/classProduto.php';

$prod = new Produto();

if(isset($_POST['edit'])){
	$prod->setIdProduto($_POST['idProduto']);
	$prod->setNome($_POST['nome']);
	$prod->setQuantidade($_POST['quantidade']);
	$prod->setDescricao($_POST['descricao']);
	$prod->setPrecoCusto($_POST['precoCusto']);
	$prod->setPrecoVenda($_POST['precoVenda']);


	if($prod->edit() == 1){
		$result = "Produto editado com sucesso!";
	}else{
		$error = "Erro ao editar";
	}

}

if(isset($_POST['delete'])){
	$prod->setIdProduto($_POST['idProduto']);

	if($prod->delete() == 1){
		$result = "Produto deletado com sucesso!";
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
			<h1>PRODUTOS</h1>
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
						<th>Nome</th>
						<th>Quantidade</th>
						<th>Descrição</th>
						<th>Preço Custo</th>
						<th>Preço Venda</th>
						<th>Ações</th>
					</tr>

					<?php 
					$stmt = $prod->index();
					while($row = $stmt->fetch(PDO::FETCH_OBJ)){
						?>
						<tbody>
							<tr>
								<td><?php echo $row->nome ?></td>
								<td><?php echo $row->quantidade ?></td>
								<td><?php echo $row->descricao ?></td>
								<td><?php echo $row->precoCusto ?></td>
								<td><?php echo $row->precoVenda ?></td>
								<td>
									<button type="button" data-toggle="modal" data-target="#editar<?php echo $row->idProduto ?>" class="btn btn-warning btn-sm">Editar</button>
									<button type="button" data-toggle="modal" data-target="#deletar<?php echo $row->idProduto ?>" class="btn btn-danger btn-sm">Excluir</button>
								</td>
							</tr>
						</tbody>
						<?php } ?>
					</thead>
				</table>

				<?php 
				$stmt = $prod->index();
				while($row = $stmt->fetch(PDO::FETCH_OBJ)){
					?>

					<!-- MODAL EDITAR -->
					<div class="modal fade" id="editar<?php echo $row->idProduto ?>" role="dialog">
						<div class="modal-dialog" modal-lg role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
									<h3>Editar produto</h3>
								</div>
								<div class="modal-body">
									<form action="editarProduto.php" method="post">
										<div class="form-group">
											<label>Nome</label>
											<input type="text" name="nome" class="form-control" value="<?php echo $row->nome ?>" required>
											<label>Quantidade</label>
											<input type="number" name="quantidade" class="form-control" value="<?php echo $row->quantidade ?>" required>
											<label>Descrição</label>
											<textarea name="descricao" class="form-control" required><?php echo $row->descricao ?></textarea>
											<label>Preço Custo</label>
											<input type="text" name="precoCusto" value="<?php echo $row->precoCusto ?>" class="form-control" onkeyup="moeda(this);" required>
											<label>Preço Venda</label>
											<input type="text" name="precoVenda" value="<?php echo $row->precoVenda ?>" class="form-control" onkeyup="moeda(this);" required>
										</div>
										<div class="form-group">
											<input type="hidden" name="idProduto" value="<?php echo $row->idProduto; ?>">
											<button type="submit" name="edit" class="btn btn-success">Salvar</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
										</div>		
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- MODAL DELETAR -->
					<div class="modal fade" id="deletar<?php echo $row->idProduto ?>" role="dialog">
						<div class="modal-dialog" modal-lg role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
									<h3>Deletar produto</h3>	
								</div>
								<div class="modal-body">
									<h5> Deseja deletar o produto <?php echo $row->nome ?>? </h5>
									<form action="editarProduto.php" method="post">
										<input type="hidden" name="idProduto" value="<?php echo $row->idProduto; ?>">
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
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			function moeda(z) {
				v = z.value;
        v = v.replace(/\D/g, "") // permite digitar apenas numero
        v = v.replace(/(\d{1})(\d{14})$/, "$1.$2") // coloca ponto antes dos ultimos digitos
        v = v.replace(/(\d{1})(\d{11})$/, "$1.$2") // coloca ponto antes dos ultimos 11 digitos
        v = v.replace(/(\d{1})(\d{8})$/, "$1.$2") // coloca ponto antes dos ultimos 8 digitos
        v = v.replace(/(\d{1})(\d{5})$/, "$1.$2") // coloca ponto antes dos ultimos 5 digitos
        v = v.replace(/(\d{1})(\d{1,2})$/, "$1,$2") // coloca virgula antes dos ultimos 2 digitos
        z.value = v;
    }
</script>
