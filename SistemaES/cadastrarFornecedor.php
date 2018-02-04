<?php
	require_once 'header.php';
?>
	 <div class="content-wrapper">
		<div id="main" class="container-fluid">
          <!-- general form elements disabled -->
          <div class="box box-warning" style="border-color:#222D32; margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastrar Fornecedor</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Nome da Empresa</label>
                  <input type="text" class="form-control" placeholder="Digite o nome da empresa">
                </div>
                <div class="form-group">
                  <label>Nome do Representante</label>
                  <input type="text" class="form-control" placeholder="Digite o nome do representante" >
                </div>
                <div class="form-group">
                  <label>CNPJ</label>
                  <input type="text" class="form-control" placeholder="Digite o CNPJ" >
                </div>
                <div class="form-group">
                  <label>Endereço</label>
                  <input type="text" class="form-control" placeholder="Digite o endereço" >
                </div>
                 <div class="form-group">
                  <label>Telefone da Empresa</label>
                  <input type="text" class="form-control" placeholder="Digite o telefone da empresa" >
                </div>
                 <div class="form-group">
                  <label>Telefone do Representante</label>
                  <input type="text" class="form-control" placeholder="Digite o telefone do representante" >
                </div>
                <div class="form-group">
                  <label>Email da Empresa</label>
                  <input type="email" class="form-control" placeholder="Digite o email da empresa" >
                </div>
                <div class="form-group">
                  <label>Email do Representante</label>
                  <input type="email" class="form-control" placeholder="Digite o email do representante" >
                </div>
              </form>
            </div>
           <div class="box-footer">
            <button type="submit" class="btn btn-success">Enviar</button>
            <a href="./fornecedores.php">
            <button type="submit" class="btn btn-danger">Cancelar</button>
          </a>
          </div>
            <!-- /.box-body -->
          </div>
         </div>


         </div>

         <script type="application/javascript">
    var active = document.getElementById("fornecedores");
    active.classList.add("active");
</script>


<script type="application/javascript">
    var active = document.getElementById("fornecedorescadastrar");
    active.classList.add("active");
</script>



<?php
    require_once 'footer.php';
?>