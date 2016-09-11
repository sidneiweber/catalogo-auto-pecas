<?php require("topo.php");
require ("functions.php");

require 'processa.php';
$conecta = new shopping();
$conecta->conexao();
?>

<?php

$sql = mysql_query("SELECT * FROM produtos ORDER BY id DESC LIMIT 10");

//$sql = mysql_query("SELECT id, codigo, produto, descricao, estoque, codigo_original, codigo_paralelo, preco, promocao, foto FROM produtos WHERE produto LIKE '%$busca%' OR descricao LIKE '%$busca%' ORDER BY produto,descricao ASC LIMIT 100");
// query para selecionar todos os campos da tabela usuários se $busca contiver na coluna nome ou na coluna email
// % antes e depois de $busca serve para indicar que $busca por ser apenas parte da palavra ou frase
// $busca é a variável que foi enviada pelo nosso formulário da página anterior
$count = mysql_num_rows($sql);

?>

<div class="col-lg-6">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Boletos do dia</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>

                        <th>Produto</th>
                        <th>QTD</th>
                        <th>Valor</th>
                        <th>Mais</th>
                        <th>Menos</th>
                        <th>Excluir</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>


<?php
$conecta->carrinho();
?>
</tbody>
                  </table>
                </div>


<div class="text-right">
<form name = "orcamento" action="orcamento_finalizar.php">

        <tr>
            <form class="form-horizontal" role="form">
    <div class="form-group">
      <label for="basic" class="col-lg-6 control-label">Selecione o cliente</label>
            <div class="col-lg-12">
            <td>
                <?php $conecta->clientes(); ?>
            </td>
        </tr>
</form>
</div>


<!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
    <script src="js/bootstrap-select.js"></script>

  </body>
</html>
