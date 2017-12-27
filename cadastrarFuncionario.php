<?php
require_once 'assets/php/classes/classFuncionario.php';
$func = new Funcionario();
if(isset($_POST['insert'])){
	$func->setNome($_POST['nome']);
	$func->setCpf($_POST['cpf']);
	$func->setEndereco($_POST['endereco']);
	$func->setCargo($_POST['cargo']);
	if($func->insert() == 1){
		$result = "Funcionario inserido com sucesso!";
	}else{
		$error = "Erro ao inserir";
	}
}
if(isset($_POST['cancel'])){
	header("Location: cadastrarFuncionario.php");
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
	<title>LaMantequilla</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>CADASTRAR FuncionarioS</h1>
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
			<div class="col-md-6">
				<form action="cadastrarFuncionario.php" method="post">
					<div class="form-group">
						<label>Nome</label>
						<input type="text" name="nome" class="form-control">
						<label>Cpf</label>
						<input type="text" name="cpf" class="form-control">
						<label>Endereço</label>
						<textarea name="endereco" class="form-control"></textarea>
						<label>Cargo</label>
						<input type="text" name="cargo" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" name="cancel" class="btn btn-danger">Cancelar</button>
						<button type="submit" name="insert" class="btn btn-success">Cadastrar</button>
					</div>			
				</form>
			</div>
		</div>
	</div>
</body>
</html>