<?php
require("../topo.php");
require('../Classes/Conexao.class.php');
require('../Classes/Produto.class.php');

// Instancia a conexao
$conexao = new Conexao();
$db = $conexao->getConnection();

// Instancia classe cliente com a conexao
$produto = new Produto($db);

// set product id to be deleted
$produto->id = $_GET['id'];
// delete the product
$produto->delete()
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