<?php
require("../topo.php");
require('../Config.inc.php');
require('../Classes/Produto.class.php');
require('../Classes/Conexao.class.php');

// Instancia a conexao
$conexao = new Conexao();
$db = $conexao->getConnection();

/*
 * Chama o método getAllProduto() que retorna um array de objetos
 */
$produto = new Produto($db);

// PAGINACAO
$_BS['PorPagina'] = 50;
$limite = 3;

$total = $produto->getTotalProdutos();

$paginas = (($total % $_BS['PorPagina']) > 0) ? (int) ($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);

if (isset($_GET['pagina'])) {
    $pagina = (int) $_GET['pagina'];
} else {
    $pagina = 1;
}
$pagina = max(min($paginas, $pagina), 1);
//$inicio = ($pagina - 1) * $_BS['PorPagina'];
$inicio = ((($pagina - $limite) > 1) ? $pagina - $limite : 1);
$fim = ((($pagina + $limite) < $paginas) ? $pagina + $limite : $paginas);


$dados = $produto->getAllProdutos($inicio, $_BS['PorPagina']);
?>


<div class="row">
    <div class="col-lg-12">
        <h1><small>Lista de produtos</small></h1>
    </div>
</div><!-- /.row -->

<div class="col-lg-12">
</div>
<div class="panel-body">
    <div class="table-responsive">
        <table id="table" class="table table-bordered table-hover table-responsive table-striped table-condensed" >
            <thead>
                <tr bgcolor="#CCC">
                    <th>Foto</th>
                    <th>Codigo</th>
                    <th>Produto</th>
                    <th>Descricao</th>
                    <th>QTD</th>
                    <th>Original</th>
                    <th>Paralelo</th>
                    <th>Valor</th>
                    <th>Promoção</th>
                    <th>Opções</th>
                </tr>

            </thead>
            <tbody class="searchable">

            <div class="well well-sm">
                <?php
                // Começa a exibição dos resultados
                echo "<p>Total  de " . $total . " produtos encontrados. ";
                // <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>
                // ============================================
                ?>
                <input type="text" id="search" placeholder="Digite para pesquisar">
            </div>
            <tr>
                <?php foreach ($dados as $reg): ?>
                    <td><a href="fotos/<?php echo $reg->foto; ?>" data-lightbox="<?php echo $reg->descricao; ?>" data-title="<?php echo $reg->descricao; ?>"><img width="24" height="24" src="fotos/<?php echo $reg->foto; ?>"/></a></td>
                    <td><a href="produto/editar.php?id=<?php echo $reg->id ?>"><?php echo $reg->codigo; ?></td>
                    <td><?php echo $reg->produto; ?></td>
                    <td><?php echo $reg->descricao; ?></td>
                    <td><?php echo $reg->estoque; ?></td>
                    <td><?php echo $reg->codigo_original; ?></td>
                    <td><?php echo $reg->codigo_paralelo; ?></td>
                    <td><?php echo $reg->preco; ?></td>
                    <td><?php echo $reg->promocao; ?></td>

              <!--<td><a class="thumbnail" href="#thumb"><img width="24" height="24" src="fotos/<?php echo $foto; ?>"/><span><img src="fotos/<?php echo $foto; ?>"/><br /><?php echo $descricao; ?></span></a></td>-->




                    <td width="85px"><a href = "produto/apagar.php?id=<?php echo $reg->id ?>" onclick="return confirm('Confirmar exclusão de registro?');"><img src = "images/delete.png" alt ="Remover" width="20px" height="20px"/></a>
                        <a class='iframe' href="alterar_foto.php?id=<?php echo $id ?>"><img src=images/foto.png width="24" height="24"/></a>
                    <!--td class=centro><a href="processa.php?add=<?php echo $id ?>" rel="gb_page_center[640, 480]"><img src=images/cesta.png width="24" height="24" /></a></td-->
                        <a class='iframe' href="carrinho_inserir_dados.php?add=<?php echo $id ?>"><img src=images/cesta.png width="24" height="24" /></a>

                         <!-- <a href="fotos/<?php echo $foto; ?>" rel="lightbox"><img src="fotos/<?php echo $foto; ?>" width="24" height="24" /></a>-->
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </form>
    </div>
    <div class="text-right">
        <ul class="pagination">
            <li>
                <?php
// Começa a exibição dos paginadores
                echo '<li><a href="produto/index.php"> Inicio </li>';
                if ($paginas > 1 && $pagina <= $paginas) {
                    for ($i = $inicio; $i <= $fim; $i++) {

                        if ($i == $pagina) {
                            echo '<li class="active"><a  href="produto/index.php?=' . '&pagina=' . $i . '">' . $i . '</a>&nbsp;&nbsp; </li>';
                        } else {
                            echo '<li> <a href="produto/index.php?=' . '&pagina=' . $i . '">' . $i . '</a>&nbsp;&nbsp; </li>';
                        }
                    }
                }
                echo '<li> <a href="produto/index.php?=' . '&pagina=' . $paginas . '"> Fim </li>';
                ?>
            </li>
        </ul>

    </div>
</div>
</div><!-- /.row -->
</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>

<!-- Page Specific Plugins -->
<script src="js/morris/chart-data-morris.js"></script>
<script src="js/tablesorter/jquery.tablesorter.js"></script>
<script src="js/tablesorter/tables.js"></script>
<script src="js/lightbox.js"></script>

<!-- MODAL -->
<script src="js/jquery.colorbox.js"></script>
<script>
                        $(document).ready(function () {
                            //Examples of how to assign the Colorbox event to elements
                            $(".group1").colorbox({rel: 'group1'});
                            $(".group2").colorbox({rel: 'group2', transition: "fade"});
                            $(".group3").colorbox({rel: 'group3', transition: "none", width: "75%", height: "75%"});
                            $(".group4").colorbox({rel: 'group4', slideshow: true});
                            $(".ajax").colorbox();
                            $(".youtube").colorbox({iframe: true, innerWidth: 640, innerHeight: 390});
                            $(".vimeo").colorbox({iframe: true, innerWidth: 500, innerHeight: 409});
                            $(".iframe").colorbox({iframe: true, width: "60%", height: "65%"});
                            $(".inline").colorbox({inline: true, width: "50%"});
                            $(".callbacks").colorbox({
                                onOpen: function () {
                                    alert('onOpen: colorbox is about to open');
                                },
                                onLoad: function () {
                                    alert('onLoad: colorbox has started to load the targeted content');
                                },
                                onComplete: function () {
                                    alert('onComplete: colorbox has displayed the loaded content');
                                },
                                onCleanup: function () {
                                    alert('onCleanup: colorbox has begun the close process');
                                },
                                onClosed: function () {
                                    alert('onClosed: colorbox has completely closed');
                                }
                            });

                            $('.non-retina').colorbox({rel: 'group5', transition: 'none'})
                            $('.retina').colorbox({rel: 'group5', transition: 'none', retinaImage: true, retinaUrl: true});

                            //Example of preserving a JavaScript event for inline calls.
                            $("#click").click(function () {
                                $('#click').css({"background-color": "#f00", "color": "#fff", "cursor": "inherit"}).text("Open this window again and this message will still be here.");
                                return false;
                            });
                        });
</script>
<!-- FIM MODAL -->
<script>
// Write on keyup event of keyword input element
$("#search").keyup(function () {
        _this = this;
// Show only matching TR, hide rest of them
    $.each($("#table tbody tr"), function () {
    if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
    $(this).hide();
    else
    $(this).show();
    });
});
</script>
</body>
</html>
