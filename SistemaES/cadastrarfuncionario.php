<?php
	require_once 'header.php';
?>
	 <div class="content-wrapper">
		<div id="main" class="container-fluid">
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
                  <input type="text" class="form-control" placeholder="Digite o nome">
                </div>
                <div class="form-group">
                  <label>CPF</label>
                  <input type="text" class="form-control" placeholder="Digite o CPF" >
                </div>
                <div class="form-group">
                  <label>Endereço</label>
                  <input type="text" class="form-control" placeholder="Digite o endereço" >
                </div>
                <div class="form-group">
                  <label>Cargo</label>
                  <input type="text" class="form-control" placeholder="Digite o cargo" >
                </div>
              </form>
            </div>
           <div class="box-footer">
            <button type="submit" class="btn btn-success">Enviar</button>
            <a href="./funcionarios.php">
            <button type="submit" class="btn btn-danger">Cancelar</button>
          </a>
          </div>
            <!-- /.box-body -->
          </div>
         </div>


         </div>
<?php
    require_once 'footer.php';
?>