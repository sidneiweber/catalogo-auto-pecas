<?php require("topo.php");
require ("functions.php");
?>

        <div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Relatório Vendas</li>
            </ol>
          </div>
        </div><!-- /.row -->

          <div class="col-lg-4">
            <div class="panel panel-info">
              <div class="panel-heading"> 
                <h3 class="panel-title"><i class="fa fa-money"></i>Escolher dia para ver os produtos vendidos</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                   <tbody>
<form method="GET" name="consulta_data" action="compras.php" target="_blank">
<fieldset>
<!--<label for="consulta">Buscar boleto de um dia especifico:</label>-->
<label for="consulta_data">Escolha uma data especifica : </label>
<input id="consulta_data" name="consulta_data" type="date" value=""/>
<!-- <input type="text" id="consulta" name="consulta" maxlength="255" /> -->
<input type="submit" value="OK" />
</form>

                    </tbody>
                  </table>
                </div>
                
              </div>
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