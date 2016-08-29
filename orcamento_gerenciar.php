<?php require("topo.php");
require ("functions.php");

$sql = mysql_query("SELECT A.nome, B.idOrcamento,dataHora FROM clientes A INNER JOIN orcamento B on A.idCliente = B.idCliente group by B.idOrcamento ORDER BY B.idOrcamento desc LIMIT 50");
$count = mysql_num_rows($sql);
?>

<div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i>Orçamentos</li>
            </ol>
          </div>
        </div><!-- /.row -->
<div class="row">
          <div class="col-lg-4">
               <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped table-condensed" >
                    <thead>
                      <tr>
                       <th>Cliente</th>
                        <th>ID</th>
                        <th>Data</th>
                        <th width="10px">Opções</th>
                      </tr>
                    </thead>
                    <tbody>


<?php
	while($res=mysql_fetch_array($sql)) {	
		$id = $res[1];	
		$nome = $res[0];
		$dataHora = $res[2];	
	
		$i++;		
		$css = ($i % 2 == 0) ? 'style="background: #CCC;"' : 'style="background: #e7e7e7;"';
?>


	 <tr <?php echo $css ?>> 
        <td><?php echo $nome; ?> </td>
        <td><?php echo $id; ?></td>
        <td><?php echo $dataHora; ?></td>
        <td>
          <a href = "orcamento_visualizar.php?idOrcamento=<?php echo $id?>" target="_new">
          <img src = "images/editar.png" alt = "Visualizar" width = "20px" height="20px"/>
          </a>
        </td>
  </tr>
    <?php
		}
	?>
                    </tbody>
                  </table>
                  </form>


                </div>
                <div class="text-right">
                  <!--<a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>-->
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