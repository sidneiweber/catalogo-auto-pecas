<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include"conexao/config.php";

$conexao = mysql_connect("$local", "$usuario", "$senha")
           or die(mysql_error());
$db = mysql_select_db("$selecione")
           or die (mysql_error());


if (!isset($_GET['consulta_data'])) {
header("Location: http://127.0.0.1/");
exit;
}
// Se houve busca, continue o script:

// Salva o que foi buscado em uma variável
$busca = $_GET['consulta_data'];
?>

<?php

	$query = "SELECT * FROM  `orcamento` WHERE datahora LIKE ''%".$busca."%'";
	
	$sql = mysql_query($query);
	if($res=mysql_fetch_array($sql)){
		$idProduto = $res[1];
		$quantidade = $res[5];
	}
?>
<?php require ("functions.php");?>

<html>
	<head>
        <link href="css/estilo_orcamento.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
		  @media print {
		  .noprint { display: none; }
		  }
        </style>
    </head>
    <body>

<div class="container">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h3>Branco Auto Peças</h3><h3 class="pull-right">Ordem # <?php echo date('d/m/Y'); ?></b></h3>
            </div>
            <hr>
            
            
          
    </div>
    
    
                <div class="panel-body">
                        <table class="table table-condensed" >
                            <thead>
                                <tr bgcolor="#CCC">                                    
                                    
                                    <td class="text-left"><font size="2"><strong>Descrição</strong></td>
                                    <td class="text-left"><font size="2"><strong>Qtd</strong></td>
                                    <td class="text-left"><font size="2"><strong>Preço</strong></td>
                                    <td class="text-left"><font size="2"><strong>Códigos</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                              <tr>   

                            <?php
                                $sql = mysql_query("SELECT A.descricao, B.quantidade, B.preco, A.codigo, A.produto, A.codigo_paralelo FROM produtos A inner join orcamento B on A.id = B.idProduto WHERE B.dataHora LIKE '%".$busca."%' ORDER BY A.produto, A.descricao ASC")
                       or die(mysql_error());
                                $total = 0;
                                while($res=mysql_fetch_array($sql)) {
                                    echo '<tr>
                                    <td valign=\'top\'><font size="1">'.limita_caracteres($res[4].' '.$res[0], 65).'</td>
                                    <td valign=\'top\' align=\'center\'><font size="1">'.$res[1].'</td>
                                    <td valign=\'top\'><font size="1">'.number_format($res[2], 2).'</td>
                                    <td valign=\'top\'><font size="1">'.$res[5].'</td>
                                    </tr>';
                                    
                                    $total += $res[1]*$res[2];
                                }
                            ?>

                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>

                                    <td class="thick-line text-right"><strong>Total</strong></td>
                                    <td class="thick-line text-right"><?php echo number_format($total, 2) ?></td>
                                </tr>
                        
                            </tbody>
                            
                        </table>
                  
                </div>
    
       </form>

            <table>               
            <td align = "center" class='noprint'>
            <input type="button" value="Imprimir" onclick=javascript:window.print()> 
            </td>
            </table>
           
    </body>
</html>
