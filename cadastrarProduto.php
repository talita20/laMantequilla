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
	<div class="col-md-4">
		<h1>CADASTRAR PRODUTOS</h1>
		<form action="cadastrarProduto.php" method="post">
			<div class="form-group">
				<label>Nome</label>
				<input type="text" name="nome" class="form-control">
				<label>Quantidade</label>
				<input type="number" name="quantidade" class="form-control">
				<label>Descrição</label>
				<textarea class="form-control"></textarea>
				<label>Preço Custo</label>
				<input type="text" name="precoCusto" class="form-control" onkeyup="moeda(this);">
				<label>Preço Venda</label>
				<input type="text" name="precoVenda" class="form-control" onkeyup="moeda(this);">
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