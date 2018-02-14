<?php
	require_once 'header.php'; 
  require_once '../assets/php/classes/classFuncionario.php';

$func = new Funcionario();
$func->setIdFuncionario($_GET['idFuncionario']);
$funcionario = $func->view();
?>
	 <div class="content-wrapper">
		<div id="main" class="container-fluid">
          <!-- general form elements disabled -->
          <form action="funcionarios.php" method="post">
          <div class="box box-warning" style="border-color:#222D32; margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Atualizar Funcionário</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- text input -->
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" name="nome" class="form-control" value="<?php echo $funcionario->nome ?>" required>
                </div>
                <div class="form-group">
                  <label>CPF</label>
                  <input type="text" name="cpf" class="form-control" value="<?php echo $funcionario->cpf ?>" maxlength="11" required>
                </div>
                <div class="form-group">
                  <label>Endereço</label>
                  <input type="text" name="endereco" class="form-control" value="<?php echo $funcionario->endereco ?>" required>
                </div>
                <div class="form-group">
                  <label>Cargo</label>
                  <input type="text" name="cargo" class="form-control" value="<?php echo $funcionario->cargo ?>" required>
                </div>
            </div>
           <div class="box-footer">
            <input type="hidden" name="idFuncionario" value="<?php echo $funcionario->idFuncionario ?>">
            <button type="submit" name="edit" class="btn btn-success">Atualizar</button>
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
    var active = document.getElementById("funcionariovisualizar");
    active.classList.add("active");
</script>


<?php
    require_once 'footer.php';
?>