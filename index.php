<?php require("topo.php");
require ("functions.php");
?>

        <div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Últimos produtos cadastrados</li>
            </ol>
          </div>
        </div><!-- /.row -->

          <div class="col-lg-12">
          </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Produto</th>
                        <th>Descricao</th>
                        <th>Valor</th>
                      </tr>
                    </thead>
                    <tbody>
  <?php
  // Vamos coloca a busca por produtos aqui
  $sql = mysql_query("SELECT * FROM produtos ORDER BY id DESC LIMIT 10");

  $count = mysql_num_rows($sql);

  if($count) {

    while($res=mysql_fetch_array($sql)) {
		$i=0;
    	$id = $res[0];
    	$codigo = $res[1];
    	$produto = $res[2];
    	$descricao = $res[3];
    	$estoque = $res[4];
    	$codigo_original = $res[5];
    	$codigo_paralelo = $res[6];
    	$preco = $res[7];
    	$promocao = $res[8];
    	$i++;
    	$css = ($i % 2 == 0) ? 'style="background: #FFF;"' : 'style="background: #e7e7e7;"';
    ?>

    <tr <?php echo $css ?> >
    	<td class=centro><?php echo $codigo; ?> </td>
    	<td class=centro><?php echo $produto; ?></td>
      <td class=esquerda><?php echo $descricao; ?></td>
      <td class=centro><?php echo formata_dinheiro($preco); ?></td>
    </tr>
    <?php
    }

  }

?>

                    </tbody>
                  </table>

<?php

  // Aqui iremos mostrar a mensagem de nenhum produto encontrado
  if(!$count) {
    echo "Nenhum produto encontrado";
  }

?>


                </div>
                <div class="text-right">
                  <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div><!-- /.row -->

         <div class="col-lg-4">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Boletos do dia</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Produto</th>
                        <th>Descricao</th>
                        <th>Valor</th>
                      </tr>
                    </thead>
                    <tbody>




                    </tbody>
                  </table>
                </div>
                <div class="text-right">

                  <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                </div>
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