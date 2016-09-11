<?php require("topo.php");
require ("functions.php");

$id=$_GET['id'];

$codigo_novo=strip_tags(trim($_POST['codigo_novo']));
$produto_novo=strip_tags(trim($_POST['produto_novo']));
$descricao_novo=strip_tags(trim($_POST['descricao_novo']));
$estoque_novo=strip_tags(trim($_POST['estoque_novo']));
$codigo_original_novo=strip_tags(trim($_POST['codigo_original_novo']));
$codigo_paralelo_novo=strip_tags(trim($_POST['codigo_paralelo_novo']));
$ncm_novo=strip_tags(trim($_POST['ncm_novo']));
$preco_novo=strip_tags(trim($_POST['preco_novo']));
$promocao_novo=strip_tags(trim($_POST['promocao_novo']));
$custo_novo=strip_tags(trim($_POST['custo_novo']));
$ultimo_fornecedor_novo=strip_tags(trim($_POST['ultimo_fornecedor_novo']));


$alt = "UPDATE produtos SET codigo='$codigo_novo', produto='$produto_novo', descricao='$descricao_novo', estoque='$estoque_novo', codigo_original='$codigo_original_novo', codigo_paralelo='$codigo_paralelo_novo', ncm='$ncm_novo', preco='$preco_novo', promocao='$promocao_novo', custo='$custo_novo', ultimo_fornecedor='$ultimo_fornecedor_novo' WHERE id='$id' LIMIT 1";
mysql_query($alt)
or die ("Não foi possível realizar a consulta ao banco de dados");
?>

<div class="row">
	<div class="col-lg-12">

<div class="alert alert-success">Produto alterado com sucesso</div>

</div>
</div>

<!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>