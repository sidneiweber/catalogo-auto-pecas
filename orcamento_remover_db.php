<?php require("topo.php");
require ("functions.php");

$id=$_GET['id'];
$alt = "DELETE FROM orcamento WHERE idOrcamento=$id";
mysql_query($alt)
or die ("Não foi possível remover o registro do banco de dados");
?>


<div class="col-lg-12">
         <div class="alert alert-dismissable alert-danger">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Removido!</strong> Produto removido com sucesso!.
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
