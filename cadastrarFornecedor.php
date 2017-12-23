<?php
require_once 'assets/php/classes/classFornecedor.php';

$forne = new Fornecedor();

if(isset($_POST['insert'])){
	$forne->setNomeEmpresa($_POST['nomeEmpresa']);
	$forne->setNomeRepresentante($_POST['nomeRepresentante']);
	$forne->setCnpj($_POST['cnpj']);
	$prod->setEndereco($_POST['endereco']);
	$prod->setTelefoneEmpresa($_POST['telefoneEmpresa']);
	$prod->setTelefoneRepresentante($_POST['telefoneRepresentante']);
	$prod->setEmailEmpresa($_POST['emailEmpresa']);
	$prod->setEmailRepresentante($_POST['emailRepresentante']);

	if($forne->insert() == 1){
		$result = "Fornecedor inserido com sucesso!";
	}else{
		$error = "Erro ao inserir";
	}
}

if(isset($_POST['cancel'])){
	header("Location: cadastrarFornecedor.php");
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
	<h1>CADASTRAR FORNECEDOR</h1>
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
		<form action="cadastrarFornecedor.php" method="post">
			<div class="form-group">
				<label>Nome da Empresa</label>
				<input type="text" name="nomeEmpresa" class="form-control">
				<label>Nome do Representante</label>
				<input type="number" name="nomeRepresentante" class="form-control">
				<label>CNPJ</label>
				<input type="text" name="cnpj" class="form-control">
				<label>Endereço</label>
				<input type="text" name="endereco" class="form-control" >
				<label>Telefone da Empresa</label>
				<input type="text" name="telefoneEmpresa" class="form-control">
				<label>Telefone do Representante</label>
				<input type="text" name="telefoneRepresentante" class="form-control">
				<label>Email da Empresa</label>
				<input type="text" name="emailEmpresa" class="form-control">
				<label>Email do Representante</label>
				<input type="text" name="emailRepresentante" class="form-control">

			</div>
			<div class="form-group">
				<button type="submit" name="cancel" class="btn btn-danger">Cancelar</button>
				<button type="submit" name="insert" class="btn btn-success">Cadastrar</button>
			</div>			
		</form>
	</div>
</body>
</html>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
