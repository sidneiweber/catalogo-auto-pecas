<?php 
include"conexao/config.php";
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