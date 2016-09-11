<?php require("topo_sem_menu.php");
require ("functions.php");

$id=$_GET['id'];

$sql = "SELECT * FROM contas_pagar WHERE id='$id'";
$resultado = mysql_query($sql)
or die ("Não foi possível realizar a consulta ao banco de dados");

while ($linha=mysql_fetch_array($resultado)) {
$id = $linha["id"];
$fornecedor = $linha["fornecedor"];
$numero_documento = $linha["numero_documento"];
$data = $linha["data"];
$data = implode("/",array_reverse(explode("-",$data)));
$valor = $linha["valor"];
$status = $linha["status"];
?>

<div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Alterar boleto</li>
            </ol>
          </div>
        </div><!-- /.row -->

          <div class="col-lg-12">
          </div>
              <div class="panel-body">



<form  method='POST' action='alterar_boleto_db.php?id=<?php echo $id; ?>' name="form2">

<div class="col-lg-6">
<div class="input-group input-group-sm">
  
  <label for="fornecedor_novo">Fornecedor</label>
  <input type="text" class="form-control" name="fornecedor_novo" id="fornecedor_novo" value="<?php echo $fornecedor; ?>">

  <label for="numero_documento_novo">Numero Documento</label>
	<input type="text" class="form-control input-sm" name="numero_documento_novo" id="numero_documento_novo" value="<?php echo $numero_documento; ?>">

  <label for="data_novo">Data</label>
  <input type="text" class="form-control input-sm" name="data_novo" id="data_novo" value="<?php echo $data; ?>">

  <label for="valor_novo">Valor</label>
  <input type="text" onKeyPress="return(MascaraMoeda(this,'','.',event))" class="form-control input-sm" name="valor_novo" id="valor_novo" value="<?php echo $valor; ?>">

  <label for="status_novo">Status</label>
  <select name="status_novo"> <option value="<?php echo $status; ?>" selected><?php echo $status; ?></option> <option value="aberto">Aberto</option> <option value="pago">Pago</option></select>
  <!--<input type="text" class="form-control input-sm" name="status_novo" id="status_novo" value="<?php echo $status; ?>">-->
	<div class="col-sm-offset-2 col-sm-10">
  <input type="submit" onclick="parent.window.location.reload(true)" name="Alterar" value="Alterar" class="btn btn-default" />
</div>
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
