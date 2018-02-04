<?php
	require_once 'header.php';
?>
	 <div class="content-wrapper">
		<div id="main" class="container-fluid">
          <!-- general form elements disabled -->
          <div class="box box-warning" style="border-color:#222D32; margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Atualizar Produto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Código</label>
                  <input type="text" class="form-control" >
                </div>
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Quantidade</label>
                  <input type="number" class="form-control">
                </div>
                <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <label>Preço de Custo</label>
                <div class="input-group">  
                <span class="input-group-addon">R$</span>
                <input type="text" class="form-control">
              </div>
              <label>Preço de Venda</label>
                <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="text" class="form-control">
              </div>
              </form>
            </div>
           <div class="box-footer">
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="./produtos.php">
            <button type="submit" class="btn btn-danger">Cancelar</button>
          </a>
          </div>
            <!-- /.box-body -->
          </div>
         </div>


         </div>

<script type="application/javascript">
    var active = document.getElementById("produtos");
    active.classList.add("active");
</script>


<script type="application/javascript">
    var active = document.getElementById("produtosvisualizar");
    active.classList.add("active");
</script>



<?php
    require_once 'footer.php';
?>