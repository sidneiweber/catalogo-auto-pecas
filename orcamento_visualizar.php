<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include"conexao/config.php";

$conexao = mysql_connect("$local", "$usuario", "$senha")
           or die(mysql_error());
$db = mysql_select_db("$selecione")
           or die (mysql_error());
?>
<?php
if(isset($_GET['idOrcamento'])){
	$idOrcamento = $_GET['idOrcamento'];
	$query = "SELECT A.NOME, A.ENDERECO, A.TELEFONE, B.idOrcamento, DATE_FORMAT(B.dataHora, '%d/%m/%Y %H:%i') as dataHora FROM clientes A INNER JOIN orcamento B on A.idCliente = B.idCliente WHERE B.idOrcamento = ".$idOrcamento;
	
	$sql = mysql_query($query);
	if($res=mysql_fetch_array($sql)){
		$nome = $res[0];
		$endereco = $res[1];
		$telefone = $res[2];
		$idOrcamento = $res[3];
		$dataHora = $res[4];
	}
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
                <img src="images/logo_nota.png"><h3 class="pull-right">Ordem #<?php echo $idOrcamento; ?></b></h3>
            </div>
            <hr>
            <div class="row" >
                <div class="col-xs-6">
                    <strong>Cliente:</strong> <?php echo $nome; ?><br>
                    <strong>Endereço:</strong> <?php echo $endereco; ?><br>
                </div>

                <div class="col-xs-6 text-right">
                   
                        <strong>Data ordem:</strong> <?php echo $dataHora ?><br><br>
                   
                </div>
            </div>
            
          
    </div>
    
    
                <div class="panel-body">
                        <table class="table table-condensed" >
                            <thead>
                                <tr bgcolor="#CCC">                                    
                                    <td><font size="2"><strong>Código</strong></td>
                                    <td class="text-center"><font size="2"><strong>Descrição</strong></td>
                                    <td class="text-center"><font size="2"><strong>Qtd</strong></td>
                                    <td class="text-center"><font size="2"><strong>Preço</strong></td>
                                    <td class="text-right"><font size="2"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                              <tr>   

                            <?php
                                $sql = mysql_query("SELECT A.descricao, B.quantidade, B.preco, A.codigo, A.produto FROM produtos A inner join orcamento B on A.id = B.idProduto WHERE B.idOrcamento = ".$idOrcamento." ORDER BY A.descricao ASC")
                       or die(mysql_error());
                                $total = 0;
                                while($res=mysql_fetch_array($sql)) {
                                    echo '<tr><td valign=\'top\'><font size="1">'.$res[3].'</td>
                                    <td valign=\'top\'><font size="1">'.limita_caracteres($res[4].' '.$res[0], 65).'</td>
                                    <td valign=\'top\' align=\'center\'><font size="1">'.$res[1].'</td>
                                    <td valign=\'top\'><font size="1">'.number_format($res[2], 2).'</td>
                                    <td valign=\'top\'><font size="1">'.number_format($res[1]*$res[2], 2).'</td>
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
