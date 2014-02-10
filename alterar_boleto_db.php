<?php require("topo.php");
require ("functions.php");

$id=$_GET['id'];
$fornecedor_novo=strip_tags(trim($_POST['fornecedor_novo']));
$numero_documento_novo=strip_tags(trim($_POST['numero_documento_novo']));
$data_novo=strip_tags(trim($_POST['data_novo']));
$data_novo=implode("-",array_reverse(explode("/",$data_novo)));
$valor_novo=strip_tags(trim($_POST['valor_novo']));
$status_novo=strip_tags(trim($_POST['status_novo']));

$alt = "UPDATE contas_pagar SET fornecedor='$fornecedor_novo', numero_documento='$numero_documento_novo', data='$data_novo', valor='$valor_novo', status='$status_novo' WHERE id='$id' LIMIT 1";
mysql_query($alt)
or die ("Não foi possível realizar a consulta ao banco de dados");
?>

<div class="row">
	<div class="col-lg-12">

<div class="alert alert-success">Boleto alterado com sucesso</div>

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
