<?php require("topo.php");
	require ("functions.php");
?>

<?php
// Configuração do script
// ========================
$_BS['PorPagina'] = 50; // Número de registros por página

// Verifica se foi feita alguma busca
// Caso contrario, redireciona o visitante
if (!isset($_GET['consulta'])) {
header("Location: http://127.0.0.1/");
exit;
}
// Se houve busca, continue o script:

// Salva o que foi buscado em uma variável
$busca = $_GET['consulta'];
$array=explode(" ",$busca);
//echo $teste = "+$array[0]* +$array[1]*";
$n_palavras=count($array);
// Usa a função mysql_real_escape_string() para evitar erros no MySQL
$busca = mysql_real_escape_string($busca);

// ============================================

// Monta a consulta MySQL para saber quantos registros serão encontrados
$sql = "SELECT COUNT(*) AS total FROM produtos WHERE MATCH (codigo,produto,descricao,codigo_original,codigo_paralelo)AGAINST ('+$array[0]* +$array[1]* +$array[2]* +$array[3]* +$array[4]*' IN BOOLEAN MODE)";
// Executa a consulta
$query = mysql_query($sql);
// Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
$total = mysql_result($query, 0, 'total');
// Calcula o máximo de paginas
$paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);

// ============================================

// Sistema simples de paginação, verifica se há algum argumento 'pagina' na URL
if (isset($_GET['pagina'])) {
$pagina = (int)$_GET['pagina'];
} else {
$pagina = 1;
}
$pagina = max(min($paginas, $pagina), 1);
$inicio = ($pagina - 1) * $_BS['PorPagina'];

// ============================================

// Monta outra consulta MySQL, agora a que fará a busca com paginação
$sql = "SELECT * FROM `produtos` WHERE  MATCH (codigo,produto,descricao,codigo_original,codigo_paralelo)AGAINST ('+$array[0]* +$array[1]* +$array[2]* +$array[3]* +$array[4]*' IN BOOLEAN MODE) ORDER BY produto,descricao ASC LIMIT ".$inicio.", ".$_BS['PorPagina'];
// Executa a consulta
$query = mysql_query($sql);

// ============================================
?>

        <div class="row">
          <div class="col-lg-12">
            <h1><small>Pesquisa de produtos</small></h1>
          </div>
        </div><!-- /.row -->

          <div class="col-lg-12">
          </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped table-condensed" >
                    <thead>
                      <tr>
                       <th>Foto</th>
                        <th>Codigo</th>
                        <th>Produto</th>
                        <th>Descricao</th>
                         <th>Cod.Original</th>
                          <th>Cod.Paralelo</th>
                        <th>Valor</th>
                         <th>Promoção</th>
                          <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
<div class="well well-sm">
 <?php
 // Começa a exibição dos resultados
echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados encontrados para '".$_GET['consulta']."'</p>";
// <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>
// ============================================
while($resultado = mysql_fetch_assoc($query)) {
	$id = $resultado['id'];
	$codigo = $resultado['codigo'];
	$produto = $resultado['produto'];
	$descricao = $resultado['descricao'];
	$estoque = $resultado['estoque'];
	$codigo_original = $resultado['codigo_original'];
	$codigo_paralelo = $resultado['codigo_paralelo'];
	$preco = $resultado['preco'];
	$promocao = $resultado['promocao'];
	$foto = $resultado['foto'];
	$i++;
	$css = ($i % 2 == 0) ? 'style="background: #FFF;"' : 'style="background: #e7e7e7;"';
?>
</div>
<tr <?php echo $css ?>>
	<td><a class="thumbnail" href="#thumb"><img width="24" height="24" src="fotos/<?php echo $foto; ?>"/><span><img src="fotos/<?php echo $foto; ?>"/><br /><?php echo $descricao; ?></span></a></td>
	<td><?php echo $codigo; ?> </td>
	<td><?php echo $produto; ?></td>
    <td><?php echo $descricao; ?></td>
<!--    <td class=centro><?php echo $estoque; ?></td>-->
    <td><?php echo $codigo_original; ?></td>
    <td><?php echo $codigo_paralelo; ?></td>
    <td width="70px"><?php echo formata_dinheiro($preco); ?></td>
    <td width="70px"><?php echo $promocao; ?></td>
    <td width="110px"><a href="alterar.php?id=<?php echo $id ?>"><img src=images/editar.png width="24" height="24"/></a>
       				<a href="alterar_foto.php?id=<?php echo $id ?>"><img src=images/foto.png width="24" height="24"/></a>
				    <!--td class=centro><a href="processa.php?add=<?php echo $id ?>" rel="gb_page_center[640, 480]"><img src=images/cesta.png width="24" height="24" /></a></td-->
    				<a href="carrinho_inserir_dados.php?add=<?php echo $id ?>" rel="gb_page_center[800,200]"><img src=images/cesta.png width="24" height="24" /></a>
            <a href = "produto_remover_db.php?id=<?php echo $id ?>" onclick="return confirm('Confirmar exclusão de registro?');"><img src = "images/excluir.png" alt ="Remover" width="20px" height="20px"/></a>
                    <!-- <a href="fotos/<?php echo $foto; ?>" rel="lightbox"><img src="fotos/<?php echo $foto; ?>" width="24" height="24" /></a>-->
</tr>
<?php
}
?>
                    </tbody>
                  </table>
                  </form>

<ul class="pagination">
<li>
<?php

// Começa a exibição dos paginadores
if ($total > 0) {
for($n = 1; $n <= $paginas; $n++) {
echo '<a href="?consulta='.$_GET['consulta'].'&pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
}
}

?>
</li>
</ul>
                </div>
                <div class="text-right">
                  <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
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

  </body>
</html>
