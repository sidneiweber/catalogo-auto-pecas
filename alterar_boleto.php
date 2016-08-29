<?php require("topo.php");
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

<div class="col-lg-7">
<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="fornecedor" class="col-sm-2 control-label">Fornecedor</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" name="fornecedor_novo" id="fornecedor_novo" value="<?php echo $fornecedor; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="numero_documento" class="col-sm-2 control-label">Numero Documento</label>
     <div class="col-sm-10">
    <input type="text" class="form-control input-sm" name="numero_documento_novo" id="numero_documento_novo" value="<?php echo $numero_documento; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="data" class="col-sm-2 control-label">Data</label>
    <div class="col-sm-10">
    <input type="text" class="form-control input-sm" name="data_novo" id="data_novo" value="<?php echo $data; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="valor" class="col-sm-2 control-label">Valor</label>
    <div class="col-sm-10">
    <input type="text" class="form-control input-sm" name="valor_novo" id="valor_novo" value="<?php echo $valor; ?>">
	</div>
  </div>
  <br>

  <div class="form-group">
    <label for="status" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
<select name="status_novo"> <option value="<?php echo $status; ?>" selected><?php echo $status; ?></option> <option value="aberto">Aberto</option> <option value="pago">Pago</option></select>
    <!--<input type="text" class="form-control input-sm" name="status_novo" id="status_novo" value="<?php echo $status; ?>">-->
	</div>
  </div>
  <br>

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
