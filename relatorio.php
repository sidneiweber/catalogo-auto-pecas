<?php
require("topo.php");
require ("functions.php");

$query5 = mysql_query("SELECT * FROM clientes ORDER BY nome");

if( $_SERVER['REQUEST_METHOD']=='POST' )
    {
        $where = Array();

        $datainicio = getPost('datainicio' );
        $datafinal = getPost('datafinal');
        $cliente = getPost('cliente');

        if( $datainicio ){ $where[] = " `datainicio` = '{$datainicio}'"; }
        if( $datafinal ){ $where[] = " `datafinal` = '{$datafinal}'"; }
        if( $cliente ){ $where[] = " `cliente` = '{$cliente}'"; }

        $sql = "SELECT *, SUM(preco*quantidade) AS `soma` FROM orcamento WHERE idCliente='$cliente' AND dataHora BETWEEN '$datainicio' AND '$datafinal'  GROUP BY idOrcamento";
       // echo $sql;//execute a query aqui
        $busca = mysql_query($sql);

    }
    //a cargo do leitor melhorar o filtro anti injection
    function filter( $str ){
        return addslashes( $str );
    }
    function getPost( $key ){
        return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;
    }

?>
<div class="row">
 <div class="col-lg-6">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Relatório Cliente</h3>
              </div>
              <div class="panel-body">
                <h4>Data: <?php echo date('d/m/Y', strtotime($datainicio)); ?> ate <?php echo date('d/m/Y', strtotime($datafinal)); ?></h4>
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>Codigo Cliente</th>
                        <th>Orcamento</th>
                        <th>Data</th>
                        <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>

<?php
while($res=mysql_fetch_array($busca)) {
	$id = $res[0];
	$produto = $res[1];
	$id_orcamento = $res[2];
	$id_cliente = $res[3];
	$preco = $res[4];
	$quantidade = $res[5];
	$datahora = $res[6];
  $soma= $res[7];
	$i++;
	$css = ($i % 2 == 0) ? 'style="background: #FFF;"' : 'style="background: #e7e7e7;"';


      $total += $res[7];
?>


<tr <?php echo $css ?>>
  <td><?php echo $id_cliente; ?></td>
 <td><?php echo $id_orcamento; ?> </td>
  <td><?php echo date('d/m/Y H:m', strtotime($datahora)); ?></td>
  <td><?php echo formata_dinheiro($soma); ?></td>

</tr>
<?php
}
?>
 </tbody>
                  </table>
                  <div class="text-right">
                <span style="font-size:18px; color:#F00">Total do periodo: <?php echo formata_dinheiro($total)?></span>
                  <!-- <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
                </div>


 <div class="sidebar span3">
<h2 class='noprint'>Filtro pesquisa</h2>
<div class="property-filter-filter widget" class='noprint'>
    <div class="content">
  <form method="post" action="relatorio.php" class='noprint'>

    <label>Data Inicio: <input type="date" name="datainicio" /></label>
    <label>Data Final: <input type="date" name="datafinal" /></label>
    <label for="cliente">Cliente</label>
    <select  name="cliente" id="cliente" class="selectpicker" data-live-search="true">
 <option>Selecione...</option>
 <?php while($prod = mysql_fetch_array($query5)) { ?>
 <option value="<?php echo $prod['idCliente'] ?>"><?php echo $prod['nome'] ?></option>
 <?php } ?>
 </select>

    <label><input type="submit" name="ok" value="Pesquisar" /></label>
  </form>

		</div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
    <script src="js/bootstrap-select.js"></script>


  </body>
</html>
