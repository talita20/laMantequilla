<?php
require_once 'header.php';
require_once '../assets/php/classes/classProduto.php';

$prod = new Produto();

if(isset($_POST['insert'])){
  $prod->setNome($_POST['nome']);
  $prod->setQuantidade($_POST['quantidade']);
  $prod->setDescricao($_POST['descricao']);
  $prod->setPrecoCusto($_POST['precoCusto']);
  $prod->setPrecoVenda($_POST['precoVenda']);

  if($prod->insert() == 1){
    $result = "Produto inserido com sucesso!";
  }else{
    $error = "Erro ao inserir";
  }
}

if(isset($_POST['cancel'])){
  header("Location: cadastrarProduto.php");
}

?>
<div class="content-wrapper">
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
  <div id="main" class="container-fluid">
    <!-- general form elements disabled -->
    <div class="box box-warning" style="border-color:#222D32; margin-top: 20px;">
      <div class="box-header with-border">
        <h3 class="box-title">Cadastrar Produto</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form role="form" action="cadastrarProduto.php" method="post">
          <!-- text input -->
         <!--  <div class="form-group">
            <label>Código</label>
            <input type="text" nome="codigo" class="form-control" placeholder="Digite o código" required>
          </div> -->
          <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Digite o nome" required>
          </div>
          <div class="form-group">
            <label>Quantidade</label>
            <input type="number" name="quantidade" class="form-control" placeholder="Digite a quantidade" required>
          </div>
          <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" name="descricao" rows="3" placeholder="Descreva o produto"></textarea>
          </div>
          <label>Preço de Custo</label>
          <div class="input-group">  
            <span class="input-group-addon">R$</span>
            <input type="text" name="precoCusto" class="form-control" onkeyup="moeda(this);">
          </div>
          <label>Preço de Venda</label>
          <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input type="text" name="precoVenda" class="form-control" onkeyup="moeda(this);">
          </div>
          <div class="box-footer">
            <button type="submit" name="insert" class="btn btn-success">Enviar</button>
            <a href="./produtos.php">
              <button type="submit" class="btn btn-danger">Cancelar</button>
            </a>
          </div>
        </form>
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
  var active = document.getElementById("produtoscadastrar");
  active.classList.add("active");

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



<?php
require_once 'footer.php';
?>