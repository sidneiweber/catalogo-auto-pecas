<?php require("topo.php");
require ("functions.php");
require ("pag.php");

$id=$_GET['id'];

//$db = mysql_select_db("blautopeca_1");
$sql = "SELECT * FROM produtos WHERE id='$id'";
$resultado = mysql_query($sql)
or die ("Não foi possível realizar a consulta ao banco de dados");

while ($linha=mysql_fetch_array($resultado)) {
$id = $linha["id"];
$codigo = $linha["codigo"];
$produto = $linha["produto"];
$descricao = $linha["descricao"];
$estoque = $linha["estoque"];
$codigo_original = $linha["codigo_original"];
$codigo_paralelo = $linha["codigo_paralelo"];
$preco = $linha["preco"];
$promocao = $linha["promocao"];
$custo = $linha["custo"];
$ultimo_fornecedor = $linha["ultimo_fornecedor"];
?>

<div class="row">
	<div class="col-lg-12">
	   	<ol class="breadcrumb">
        	 <li class="active"><i class="fa fa-dashboard"></i>Alterar Produto</li>
        </ol>
     </div>
 </div><!-- /.row -->


<form  method='POST' action='alterar_db.php?id=<?php echo $id; ?>' name="form2">

<div class="col-lg-8">
<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="codigo" class="col-sm-2 control-label">Código</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="codigo_novo" id="codigo_novo" value="<?php echo $codigo; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="produto" class="col-sm-2 control-label">Produto</label>
     <div class="col-sm-10">
    <input type="text" class="form-control input-sm" name="produto_novo" id="produto_novo" value="<?php echo $produto; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="descricao" class="col-sm-2 control-label">Descrição</label>
    <div class="col-sm-10">
    <input type="text" class="form-control input-sm" name="descricao_novo" id="descricao_novo" value="<?php echo $descricao; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="estoque" class="col-sm-2 control-label">Estoque</label>
    <div class="col-sm-10">
    <input type="text" class="form-control input-sm" name="estoque_novo" id="estoque_novo" value="<?php echo $estoque; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="codigo_original" class="col-sm-2 control-label">Código Original</label>
    <div class="col-sm-10">
    <input type="text" class="form-control input-sm" name="codigo_original_novo" id="codigo_original_novo" value="<?php echo $codigo_original; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="codigo_paralelo" class="col-sm-2 control-label">Código Paralelo</label>
    <div class="col-sm-10">
    <input type="text" class="form-control input-sm" name="codigo_paralelo_novo" id="codigo_paralelo_novo" value="<?php echo $codigo_paralelo; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="preco" class="col-sm-2 control-label">Preço</label>
    <div class="col-sm-10">
    <input type="text" class="form-control input-sm" name="preco_novo" id="preco_novo" value="<?php echo $preco; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="promocao" class="col-sm-2 control-label">Promoção</label>
    <div class="col-sm-10">
    <input type="text" class="form-control input-sm" name="promocao_novo" id="promocao_novo" value="<?php echo $promocao; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="custo" class="col-sm-2 control-label">Custo</label>
    <div class="col-sm-10">
    <input type="text" class="form-control input-sm" name="custo_novo" id="custo_novo" value="<?php echo $custo; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="ultimo_fornecedor" class="col-sm-2 control-label">Ultimo Fornecedor</label>
    <div class="col-sm-10">
    <input type="text" class="form-control input-sm" name="ultimo_fornecedor_novo" id="ultimo_fornecedor_novo" value="<?php echo $ultimo_fornecedor; ?>">
	</div>
  </div>
<div class="col-sm-offset-2 col-sm-10">
  <input type="submit" name="Alterar" value="Alterar" class="btn btn-default" />
</div>
</form>
</div>
<?php
}

?>

<!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
