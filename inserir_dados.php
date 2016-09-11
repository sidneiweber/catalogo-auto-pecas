<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<?php
session_start();

if(isset($_GET['add'])){
	$id = $_GET['add'];
	$_SESSION['produto']['id_' . $id]['preco'] = $_GET['preco'];
	$_SESSION['produto']['id_' . $id]['quantidade'] = $_GET['quantidade'];
    $_SESSION['produto']['id_' . $id]['id'] = $id;
}
?>

<html>
	<head>
    	<title></title>
      
    </head>
    <body>
    	<form action="">
            <table width="750px">
                <tr>
                    <td align = "center">
                        Produto inserido com sucesso.
                    </td>
                </tr>
                <tr>
                    <td align="center">
                    	<br /><br /><br />
                        <table width = "50%">
                            <tr>
                                <td>
                                    <input type = "button" name = "inserir" value = "Inserir mais produtos" onClick="history.go(-2)"/>
                                </td>
                               <td>
                                    <input type = "button" name = "finalizarOrcamento" value = "Finalizar orçamento" onClick="top.location.href='carrinho.php';window.parent.parent.GB_hide();"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

