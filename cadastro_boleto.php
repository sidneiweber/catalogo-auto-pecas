<?php require("topo.php");
require ("functions.php");
?>

<div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i>Cadastro Boletos</li>
            </ol>
           </div>
        </div><!-- /.row -->


<form action="" method="post" enctype="multipart/form-data">

	<?php if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

		$fornecedor   		= strip_tags(trim($_POST['fornecedor']));
		$numero_documento	= strip_tags(trim($_POST['numero_documento']));
		$data		   		= strip_tags(trim($_POST['data']));
		$data = implode("-",array_reverse(explode("/",$data)));
		$valor		   		= strip_tags(trim($_POST['valor']));
		$status		   		= strip_tags(trim($_POST['status']));


$cadastro = mysql_query("INSERT INTO contas_pagar (fornecedor, numero_documento, data, valor, status) VALUES ('$fornecedor', '$numero_documento', '$data', '$valor', '$status')");

if ($cadastro == 1){
	echo '<!--  start message-green -->
		 <div class="col-lg-12">
         <div class="alert alert-dismissable alert-success">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Feito!</strong> You successfully read <a href="#" class="alert-link">Boleto Cadastrado com sucesso</a>.
         </div>
         </div>
		<!--  end message-green -->';

	}else {
	echo '<span class="no">Erro ao cadastrar, tente novamente</span>';
	}
}
if ($retorno == 0){
 echo "$retorno";
}else{
}
?>

         <div class="col-lg-4">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i>Cadastrar boleto</h3>
              </div>
              <div class="panel-body">
                <form role="form">

  <div class="form-group">
    <label for="fornecedor">Fonecedor</label>
    <input type="text" required value="" name="fornecedor" title="Preencha com o nome do fornecedor." class="form-control input-sm" id="fornecedor" placeholder="Nome do Fornecedor">
  </div>
  <div class="form-group">
    <label for="numero_documento">Numero Documento</label>
    <input type="text" required value="" name="numero_documento" title="Preencha com o numero documento."  class="form-control input-sm" id="numero_documento" placeholder="Numero do documento">
  </div>
  <div class="form-group">
    <label for="data">Data</label>
    <input type="text" required value="" name="data" title="Preencha com a data."  class="form-control input-sm" id="data" placeholder="Dia do vencimento">
  </div>
  <div class="form-group">
    <label for="valor">valor</label>
    <input type="text" required value="" name="valor" title="Preencha com o valor."  class="form-control input-sm" id="valor" placeholder="Valor do boleto">
  </div>
  <div class="form-group">
    <label for="status">Status</label>
<select name="status"><option value="aberto">Aberto</option> <option value="pago">Pago</option></select>
   <!-- <input type="text" required value="" name="status" class="form-control input-sm" id="status" placeholder="Status">-->
  </div>
<div class="text-right">
	 <input type="hidden" name="enviar" value="send" />
	 <input type="submit" class="btn btn-default" name="Enviar" />
</div>
</form>
                <!--<div class="text-right">
                <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                </div>-->
              </div>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
