<?php include"conexao/config.php";
$conexao = mysql_connect("$local", "$usuario", "$senha")
           or die(mysql_error());
$db = mysql_select_db("$selecione")
           or die (mysql_error());
?>
<?php
$sql = mysql_query("SELECT codigo, produto, descricao, estoque, codigo_original, codigo_paralelo, preco, promocao, foto 
				   FROM produtos
				   ORDER BY produto,descricao ASC
				   LIMIT 10")
       or die(mysql_error());
if (@mysql_num_rows($sql) == 0) {
	echo "<h1>Nenhum resultado encontrato</h1>";
}
?>

<?php

$sql = mysql_query("SELECT * FROM produtos ORDER BY id DESC LIMIT 10");

//$sql = mysql_query("SELECT id, codigo, produto, descricao, estoque, codigo_original, codigo_paralelo, preco, promocao, foto FROM produtos WHERE produto LIKE '%$busca%' OR descricao LIKE '%$busca%' ORDER BY produto,descricao ASC LIMIT 100");
// query para selecionar todos os campos da tabela usuários se $busca contiver na coluna nome ou na coluna email
// % antes e depois de $busca serve para indicar que $busca por ser apenas parte da palavra ou frase
// $busca é a variável que foi enviada pelo nosso formulário da página anterior
$count = mysql_num_rows($sql);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Catálogo de peças - BL Auto Peças</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/colorbox.css" />

<!-- Botao pesquisa -->
<script language="JavaScript" src="js/shortcut.js"></script>
<script>
shortcut.add("F9",function()
{
	 document.consulta.consulta.focus();
});
</script>
<!-- Final botao pesquisa-->

  </head>

  <body>


      <div id="page-wrapper">
