<?php
require("topo.php");
require 'functions.php';
require('Classes/Conexao.class.php');
require('Classes/Produto.class.php');
//$conn = new Conexao();

$conexao = new Conexao();
$db = $conexao->getConnection();

/*
 * Chama o método getAllArtigo() que retorna um array de objetos
 */
$produto = new Produto($db);
$dados = $produto->getUltimosProdutos();
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i>Bem vindo!</li>
        </ol>
    </div>
</div><!-- /.row -->

<div class="col-lg-5">
<div class="panel panel-primary">
  <div class="panel-heading">Ultimos Produtos cadastrados</div>
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
                <?php foreach ($dados as $reg): ?>

                    <tr> 
                        <td class=centro><?php echo $reg->codigo; ?></td>
                        <td class=centro><?php echo $reg->produto; ?></td>
                        <td class=esquerda><?php echo $reg->descricao; ?></td>
                        <td class=centro><?php echo formata_dinheiro($reg->preco); ?></td>
                    </tr>
                    <?php
                endforeach;
                ?>

            </tbody>
        </table>
        </div>
    </div>
  </div>
</div>


</div><!-- /.row -->


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
