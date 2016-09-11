<?php
require("topo.php");
require ("functions.php");
$sql = mysql_query("SELECT A.nome, B.idOrcamento,DATE_FORMAT(dataHora, '%d/%c/%Y'),B.preco, B.idcliente FROM clientes A INNER JOIN orcamento B on A.idCliente = B.idCliente AND `dataHora` BETWEEN '2015-12-07' AND '2015-12-12' group by B.idOrcamento ORDER BY B.idOrcamento desc LIMIT 1000");
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
        <input id="filter" type="text" class="form-control" placeholder="Pesquisa Aqui...">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-condensed" >
                    <thead>
                        <tr bgcolor="#CCC">
                            <th>Cliente</th>
                            <th>ID</th>
                            <th>Data</th>
                            <th width="10px">Opções</th>
                        </tr>
                    </thead>
                    <tbody class="searchable">

                      

                        <?php
                        while ($res = mysql_fetch_array($sql)) {
                            $id = $res[1];
                            $nome = $res[0];
                            $dataHora = $res[2];
                            $preco = $res[3];
                               
                            $sqltotal = mysql_query("SELECT A.descricao, B.quantidade, B.preco, A.codigo, A.produto FROM produtos A inner join orcamento B on A.id = B.idProduto WHERE B.idOrcamento =".$res[1]." ORDER BY A.descricao ASC ")
                                or die(mysql_error());
                        $total = 0;
                        while ($res = mysql_fetch_array($sqltotal)) {
                          
                            $total += $res[1] * $res[2];
                            $totalgeral += $totalgeral+$total;
                        }
                            
                            $i++;
                            $css = ($i % 2 == 0) ? 'style="background: #CCC;"' : 'style="background: #e7e7e7;"';
                            ?>


                            <tr <?php echo $css ?>> 
                                <td><?php echo $nome; ?> </td>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $dataHora; ?></td>
                                <td>
                                    <?php echo $total; ?>
                                    <a href = "orcamento_visualizar.php?idOrcamento=<?php echo $id ?>" target="_new">
                                        <img src = "images/editar.png" alt = "Visualizar" width = "20px" height="20px"/>
                                        <width="20px"><a href = "orcamento_remover_db.php?id=<?php echo $id ?>" onclick="return confirm('Confirmar exclusão de registro?');"><img src = "images/excluir.png" alt ="Remover" width="20px" height="20px"/></a>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php echo $totalgeral; ?>
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
<script>
                                            $(document).ready(function () {

                                                (function ($) {

                                                    $('#filter').keyup(function () {

                                                        var rex = new RegExp($(this).val(), 'i');
                                                        $('.searchable tr').hide();
                                                        $('.searchable tr').filter(function () {
                                                            return rex.test($(this).text());
                                                        }).show();

                                                    })

                                                }(jQuery));

                                            });
</script>

</body>
</html>