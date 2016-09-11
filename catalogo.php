<?php require("topo.php");
require ("functions.php");
?>

        <div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Catálogo</li>
            </ol>
          </div>
        </div><!-- /.row -->

          <div class="col-lg-12">
          </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <tbody>
                      <tr width="500px">
                        <td><a href="http://catalogo.fras-le.com.br/" target="_blank"><img src="images/catalogo/fras-le-2.jpg" width="125px" weigth="125px"></a></td>
                        <td><a href="http://www.mobensani.com.br/catalogo_online/" target="_blank"><img src="images/catalogo/mobensani.jpg" width="125px" weigth="125px"></a></td>
                        <td><a href="http://www.filtrosvox.com.br/" target="_blank"><img src="images/catalogo/vox.jpg" width="125px" weigth="125px"></a></td>

                        <td><a href="http://www.valclei.com.br/catalogo_v2/" target="_blank"><img src="images/catalogo/valclei.jpg" width="125px" weigth="125px"></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                 
                </div>
              </div>
            </div><!-- /.row -->

<?php
$mes_atual=date('m');

$qr=mysql_query("SELECT SUM(valor) as total FROM `contas_pagar` WHERE data BETWEEN ('2015-$mes_atual-01') AND ('2015-$mes_atual-31')");
$row=mysql_fetch_array($qr);
$saidas_mes=$row['total'];

?>
         
    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>


  </body>
</html>