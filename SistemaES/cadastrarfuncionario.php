<?php
	require_once 'header.php';
  require_once '../assets/php/classes/classFuncionario.php';

$func = new Funcionario();

if(isset($_POST['insert'])){
  $func->setNome($_POST['nome']);
  $func->setCpf($_POST['cpf']);
  $func->setCargo($_POST['cargo']);
  $func->setEndereco($_POST['endereco']);

  if($func->insert() == 1){
    $result = "Funcionário inserido com sucesso!";
  }else{
    $error = "Erro ao inserir";
  }
}

if(isset($_POST['cancel'])){
  header("Location: cadastrarFuncionario.php");
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
      <form action="cadastrarFuncionario.php" method="post">
          <!-- general form elements disabled -->
          <div class="box box-warning" style="border-color:#222D32; margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastrar Funcionário</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" name="nome" class="form-control" placeholder="Digite o nome">
                </div>
                <div class="form-group">
                  <label>CPF</label>
                  <input type="text" name="cpf" class="form-control" placeholder="Digite o CPF" maxlength="11">
                </div>
                <div class="form-group">
                  <label>Endereço</label>
                  <input type="text" name="endereco" class="form-control" placeholder="Digite o endereço" >
                </div>
                <div class="form-group">
                  <label>Cargo</label>
                  <input type="text" name="cargo" class="form-control" placeholder="Digite o cargo" >
                </div>
              </form>
            </div>
           <div class="box-footer">
            <button type="submit" name="insert" class="btn btn-success">Enviar</button>
            <a href="./funcionarios.php">
            <button type="submit" class="btn btn-danger">Cancelar</button>
          </a>
          </div>
            <!-- /.box-body -->
          </div>
        </form>
         </div>
         </div>


<script type="application/javascript">
    var active = document.getElementById("funcionarios");
    active.classList.add("active");
</script>


<script type="application/javascript">
    var active = document.getElementById("funcionariocadastrar");
    active.classList.add("active");
</script>


<?php
    require_once 'footer.php';
?>