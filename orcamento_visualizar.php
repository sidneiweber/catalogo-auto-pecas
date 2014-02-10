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
	$query = "SELECT A.NOME, A.ENDERECO, A.TELEFONE, B.idOrcamento, DATE_FORMAT(B.dataHora, '%d/%m/%Y %H:%i:%s') as dataHora FROM clientes A INNER JOIN orcamento B on A.idCliente = B.idCliente WHERE B.idOrcamento = ".$idOrcamento;
	
	$sql = mysql_query($query);
	if($res=mysql_fetch_array($sql)){
		$nome = $res[0];
		$endereco = $res[1];
		$telefone = $res[2];
		$idOrcamento = $res[3];
		$dataHora = $res[4];
        $i++;
        $css = ($i % 2 == 0) ? 'style="background: #FFF;"' : 'style="background: #e7e7e7;"';
	}
}
?>

<html>
	<head>
        <link href="css/estilo_orcamento.css" rel="stylesheet" type="text/css" />
       	 <style type="text/css">
			@media print {
			  .noprint { display: none; }
			}
  		</style>
    </head>
    <body>
    	<form>
            <table width = "650px" border = "1">
                <tr>
                    <td>
                        <table width = "100%" border="0">
                            <tr>
                                <td width = "30%">
<h2>
Branco Auto Pecas
</h2>
                                <!--    <img src="images/logo2.png">-->
                                </td>
                                <td width = "40%" align="center">
                                    Av. Sao Leopoldo 270
                                    <br>
                                    Sala 5 - Campo Bom
                                    <br>
                                    3038-1292
                                </td>
                                <td width = "20%" valign = "top" align="center">
                                    Orçamento nº
                                    <br>
                                    <b><?php echo $idOrcamento; ?></b>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr >
                    <td>
                        Cliente: <?php echo $nome; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table width = "100%" >
                            <tr <?php echo $css ?>>
                                <td>
                                    Código
                                </td>
                                <td align = "center" width="80%">
                                    Descrição
                                </td>
                                <td>
                                    Quantidade
                                </td>
                                 <td>
                                    Valor
                                </td>
                                 <td>
                                    Total
                                </td>
                            </tr>
                            
                            <?php
                                $sql = mysql_query("SELECT A.descricao, B.quantidade, B.preco, A.codigo, A.produto FROM produtos A inner join orcamento B on A.id = B.idProduto WHERE B.idOrcamento = ".$idOrcamento." ORDER BY A.descricao ASC")
                       or die(mysql_error());
                                $total = 0;
                                while($res=mysql_fetch_array($sql)) {
                                    echo '<tr><td valign=\'top\'><font size="2">'.$res[3].'</td><td valign=\'top\'><font size="2">'.$res[4].' '.$res[0].'</td><td valign=\'top\' align=\'center\'><font size="2">'.$res[1].'</td><td valign=\'top\' align=\'center\'><font size="2">'.number_format($res[2], 2).'</td><td valign=\'top\' align=\'center\'><font size="2">'.number_format($res[1]*$res[2], 2).'</td></tr>';
                                    $total += $res[1]*$res[2];
                                }
                            ?>
                            
                            <tr>
                                <td colspan = "5">
                                
                                </td>
                            </tr>
                            <tr>
                                <td colspan = "5" align = "right">
                                    Total:
                                </td>
                                <td>
                                    <?php echo number_format($total, 2) ?>
                                </td>
                             </tr> 
                         </table>
                     </td>
                 </tr>
                 <tr>
                    <td>
                        <table width = "100%">
                            <tr>
                                <td width = "25%" valign = "top"> 
                                
                                    <?php echo $dataHora ?> 
                                </td>
                                <td width = "75%" align = "right"> 
                                    <br><br>
                                    <table width = "100%" border = "0">
                                        <tr>
                                            <td align = "right">
                                                _______________________________________________
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align = "right">

                                                <?php echo $nome; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                 </tr> 	
            </table>
            <table width = "595px" border = "0">
                 <tr>
                    <td align = "center" class='noprint'>
                        <br><br>
                        <input type="button" value="Imprimir" onclick=javascript:window.print()> 
                    </td>
                </tr>  
            </table>
       </form>
       
    </body>
</html>
