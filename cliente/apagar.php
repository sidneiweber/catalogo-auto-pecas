<?php
require("../topo.php");
require('../Config.inc.php');
require('../Classes/Conexao.class.php');
require('../Classes/Cliente.class.php');

// Instancia a conexao
$conexao = new Conexao();
$db = $conexao->getConnection();

// Instancia classe cliente com a conexao
$cliente = new Cliente($db);

// set product id to be deleted
$cliente->idCliente = $_GET['id'];
// delete the product
$cliente->delete()
?>


<div class="col-lg-12">
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Removido!</strong> Cliente removido com sucesso!.
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
