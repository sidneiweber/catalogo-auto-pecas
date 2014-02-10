<?php require("topo.php");
require ("functions.php");
?>

<?php
$sql = mysql_query("SELECT fornecedor, numero_documento, data, valor, status
				   FROM contas_pagar
				   ORDER BY fornecedor ASC")
       or die(mysql_error());
if (@mysql_num_rows($sql) == 0) {
	echo "<h1>Nenhum resultado encontrato</h1>";
}
?>

<?php
$hoje=date('Y-m-d');

$sql = mysql_query("SELECT * FROM contas_pagar WHERE data LIKE '$hoje' ORDER BY fornecedor ASC");

//$sql = mysql_query("SELECT id, codigo, produto, descricao, estoque, codigo_original, codigo_paralelo, preco, promocao, foto FROM produtos WHERE produto LIKE '%$busca%' OR descricao LIKE '%$busca%' ORDER BY produto,descricao ASC LIMIT 100");
// query para selecionar todos os campos da tabela usuários se $busca contiver na coluna nome ou na coluna email
// % antes e depois de $busca serve para indicar que $busca por ser apenas parte da palavra ou frase
// $busca é a variável que foi enviada pelo nosso formulário da página anterior
$count = mysql_num_rows($sql);
?>


<div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Gerenciar boletos</li>
            </ol>
          </div>
        </div><!-- /.row -->

<div class="row">
 <div class="col-lg-7">
            <div class="panel panel-danger">
              <div class="panel-heading"> 
                <h3 class="panel-title"><i class="fa fa-money"></i> Boletos do dia <?php echo $hoje; ?></h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>Fornecedor</th>
                        <th>Nr Documento</th>
                        <th>Data</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
while($res=mysql_fetch_array($sql)) {
	$id = $res[0];
	$fornecedor = $res[1];
	$numero_documento = $res[2];
	$data = $res[3];
	$data = implode("/",array_reverse(explode("-",$data)));
	$valor = $res[4];
	$status = $res[5];
	$i++;
	$css = ($i % 2 == 0) ? 'style="background: #FFF;"' : 'style="background: #e7e7e7;"';
	
	// Busca valores do dia
	$dia_hoje=date('d');
	$qr=mysql_query("SELECT SUM(valor) as total FROM contas_pagar WHERE data='$hoje'");
	$row=mysql_fetch_array($qr);
	$saidas_dia=$row['total'];

	$despesas_dia=$hoje;
?>

<tr <?php echo $css ?>> 
	<td><?php echo $fornecedor; ?> </td>
	<td><?php echo $numero_documento; ?></td>
    <td><?php echo $data; ?></td>
    <td><?php echo formata_dinheiro($valor); ?></td>
    <td>
<?php

if($status == "pago"):
    echo '<span class="label label-success">Pago</span>';
else:
    echo '<span class="label label-danger">Aberto</span>';
endif;

?>
</td>

    <!-- <td class=centro><?php echo $hoje; ?></td>-->
    <td><a href="alterar_boleto.php?id=<?php echo $id ?>"><img src=images/editar.png width="24" height="24"/></a></td>
</tr>
<?php
}
?>

                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                <span style="font-size:18px; color:#F00">Total do dia: <?php echo formata_dinheiro($saidas_dia)?></span>
                  <!-- <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
              </div>
            </div>
          </div>
    

<div class="col-lg-4">
            <div class="panel panel-info">
              <div class="panel-heading"> 
                <h3 class="panel-title"><i class="fa fa-money"></i>Escolher dia para pagar</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                   <tbody>
<form method="GET" name="consulta_data" action="busca_boleto.php">
<fieldset>
<!--<label for="consulta">Buscar boleto de um dia especifico:</label>-->
<label for="consulta_data">Escolha uma data especifica : </label>
<input id="consulta_data" name="consulta_data" type="date" value=""/>
<!-- <input type="text" id="consulta" name="consulta" maxlength="255" /> -->
<input type="submit" value="OK" />
</form>

                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                	<br>
                  <a href="boleto_amanha.php"><b>Boletos para amanha</b></a><br>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->





 <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
