<?php require("topo.php");
require ("functions.php");

$id=$_GET['id'];
$nome=$_POST['nome'];
$endereco=$_POST['endereco'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$uf=$_POST['uf'];
$cpf_cnpj=$_POST['cpf_cnpj'];
$telefone=$_POST['telefone'];
$fax=$_POST['fax'];

$alt = "UPDATE clientes SET nome='$nome', endereco='$endereco', bairro='$bairro', cidade='$cidade', uf='$uf', cpf_cnpj='$cpf_cnpj', telefone='$telefone', fax='$fax' WHERE idCliente=$id";

mysql_query($alt)

or die ("Não foi possível realizar a consulta ao banco de dados");
?>

<div class="col-lg-12">
         <div class="alert alert-dismissable alert-success">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Feito!</strong> Cliente alterado com sucesso!.
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