<?php 
require_once 'header.php';
?>
  <div class="content-wrapper">
<div id="main" class="container-fluid">
 
 	<div id="top" class="row">
 		<div class="col-md-12">
 			<h1 align="center">Fornecedores</h1>
 		</div>
		<div class="col-sm-3">
		</div>
		<div class="col-sm-6">
			
			<div class="input-group h2">
				<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
			
		</div>
	</div> <!-- /#top -->
 
 
 	<hr />
 	<div id="list" class="row">
	
	<div class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Empresa</th>
					<th>CNPJ</th>
					<th>Endereço</th>
					<th>Telefone</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Vilma</td>
					<td>09600583625</td>
					<td>Rua do Pão, 154</td>
					<td>35422254</td>
					<td class="actions">
						<a class="btn btn-success btn-xs" href="visualizarFornecedor.php">Visualizar</a>
						<a class="btn btn-warning btn-xs" href="editarFornecedor.php">Editar</a>
						<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
					</td>
				</tr>
			
			</tbody>
		</table>
	</div>
	
	</div> <!-- /#list -->
	

 </div> <!-- /#main -->

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Sim</button>
	<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div>
</div>

<script type="application/javascript">
    var active = document.getElementById("fornecedores");
    active.classList.add("active");
</script>


<script type="application/javascript">
    var active = document.getElementById("fornecedoresvisualizar");
    active.classList.add("active");
</script>




<?php
require_once 'footer.php';
?>