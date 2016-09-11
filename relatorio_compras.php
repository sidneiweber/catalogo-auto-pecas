<?php require("topo.php");
require ("functions.php");
?>
<?php
$mes_atual=date('m');

$qr=mysql_query("SELECT SUM(valor) as total FROM `compras` WHERE data BETWEEN ('2016-$mes_atual-01') AND ('2016-$mes_atual-31')");
$row=mysql_fetch_array($qr);
$saidas_mes=$row['total'];

?>

<div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i>Cadastro Boletos</li>
            </ol>
           </div>
        </div><!-- /.row -->

        <div class="col-lg-12">
         <div class="alert alert-dismissable alert-danger">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Total de compras do mês: <?php echo formata_dinheiro($saidas_mes)?> </strong>
         </div>
         </div>

<form action="" method="post" enctype="multipart/form-data">

  <?php if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

    $numero_nota       = strip_tags(trim($_POST['fornecedor']));
    $fornecedor = strip_tags(trim($_POST['numero_documento']));
    $data         = strip_tags(trim($_POST['data']));
    $data = implode("-",array_reverse(explode("/",$data)));
    $valor          = strip_tags(trim($_POST['valor']));

$cadastro = mysql_query("INSERT INTO compras (numero_nota, fornecedor, data, valor) VALUES ('$numero_nota', '$fornecedor', '$data', '$valor')");

if ($cadastro == 1){
  echo '<!--  start message-green -->
     <div class="col-lg-12">
         <div class="alert alert-dismissable alert-success">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Feito!</strong> You successfully read <a href="#" class="alert-link">Nota cadastrada com sucesso</a>.
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
                <h3 class="panel-title"><i class="fa fa-money"></i>Cadastrar Notas</h3>
              </div>
              <div class="panel-body">
                <form role="form">

  <div class="form-group">
    <label for="fornecedor">Fonecedor</label>
    <input type="text" required value="" name="fornecedor" title="Preencha com o nome do fornecedor." class="form-control input-sm" id="fornecedor" placeholder="Nome do Fornecedor" autofocus="">
  </div>
  <div class="form-group">
    <label for="numero_documento">Numero nota</label>
    <input type="text" required value="" name="numero_documento" title="Preencha com o numero documento."  class="form-control input-sm" id="numero_documento" placeholder="Numero do documento">
  </div>
  <div class="form-group">
    <label for="data">Data</label>
    <input type="text" required value="" name="data" title="Preencha com a data."  class="form-control input-sm data" id="data" placeholder="Dia do vencimento">
  </div>
  <div class="form-group">
    <label for="valor">valor</label>
    <input type="text" required value="" name="valor" title="Preencha com o valor." onKeyPress="return(MascaraMoeda(this,'','.',event))"  class="form-control input-sm" id="valor" placeholder="Valor do boleto">
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
    <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      $("input.data").mask("99/99/9999");
        $("input.cpf").mask("999.999.999-99");
        $("input.cep").mask("99.999-999");
      });
    </script>

  </body>
</html>
