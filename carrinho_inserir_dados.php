<?php  include"conexao/config.php";
$conexao = mysql_connect("$local", "$usuario", "$senha")
           or die(mysql_error());
$db = mysql_select_db("$selecione")
           or die (mysql_error());

$id = $_GET['add'];
?>

<html>
	<head>
    </head>
    <body>
    	<form action = "inserir_dados.php">
        <?php
			$query = "SELECT * FROM produtos WHERE id = ".$id;
        	$sql = mysql_query($query);
			if($res=mysql_fetch_array($sql)) {
		?>
    		<table width="100%">
                <tr>
                    <td width="10%">
                        Produto:
                    </td>
                    <td>
                       <?php echo $res[2]; ?>  <?php echo $res[3]; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Quantidade:
                    </td>
                    <td>
                        <input type="text" name="quantidade" size="5" maxlength="5" value="1">
                    </td>
                </tr>
                <tr>
                    <td>
                        Preço:
                    </td>
                    <td>
                        <input type="text" name="preco" size="10" maxlength="10" value=<?php echo $res[7]; ?>>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                    	<br><br>
                        <input type="button" value="Inserir" onClick="inserir()">
                    </td>
                </tr>
           </table>
           <input type = "hidden" name = "add" value = "<? echo $res[0]; ?>"/> 
            <?php
				}
			?>
         </form>
    </body>
    <script>
		function inserir(){
			if(document.forms[0].quantidade.value == '' || document.forms[0].preco.value == ''){
				alert("Todos os campos devem ser preenchidos.");
			}
			else{
				document.forms[0].submit();
			}
		}
	</script>
</html>