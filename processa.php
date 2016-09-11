<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<?php
	session_start();
	//INSTANCIAR A PAGINA DO CARRINHO
	$pagina = 'carrinho.php';
	//INICIAR A CLASS

	class shopping{
		//private $banco = 'blautopeca_1';
		//private $senha = 'branco@sidnei';
		//private $login = 'blautopeca_1';
		//private $hostname = 'dbmy0051.whservidor.com';
		private $banco = 'catalogo';
		private $senha = 'bolacha';
		private $login = 'root';
		private $hostname = 'localhost';

		//CONEXAO
		function conexao(){
			mysql_connect($this->hostname, $this->login, $this->senha) or die ("ERRO".mysql_error());
			mysql_select_db($this->banco) or die ("ERRO".mysql_error());
			mysql_query("SET NAME 'utf8'");
			mysql_query("SET character_set_connetion=utf8");
			mysql_query("SET character_set_client=utf8");
			mysql_query("SET character_set_results=utf8");


		}

		// MOSTRAR O CARRINHO DE COMPRAS
		function carrinho(){
			// VERIFICAR SE EXISTE UMA SESSION
			if($_SESSION){
				foreach($_SESSION['produto'] as $id => $campo ){
					if($campo['id'] > 0){
						$id = $campo['id'];
						// MONTAR CARRINHO
						$PD = mysql_query("SELECT id, codigo, produto, descricao, estoque, preco FROM produtos WHERE id=".mysql_real_escape_string((int)$id));
						while($list = mysql_fetch_assoc($PD)){
							$subTotal = $campo['quantidade'] * $campo['preco'];
							echo '<tr>
							<td width="53%" height="44" bgcolor="FFFFFF">'.$list['produto'].' '.$list['descricao'].'</td>
							<td width="7%" height="44" align="center" valign="middle" bgcolor="#FFFFFF">'.$campo['quantidade'].' X </td>
							<td width="11%" height="44" align="center" valign="middle" bgcolor="#FFFFFF">R$ '.number_format($campo['preco'], 2).'</td>
							<td width="6%" height="44" align="center" valign="middle" bgcolor="#FFFFFF">
							<a href="processa.php?add='.(int)$id.'">
							<img src="images/mais.png" width="44" height="44" border="0" /></a>
							</td>
							<td width="6%" height="44" align="center" valign="middle" bgcolor="#FFFFFF">
							<a href="processa.php?menos='.(int)$id.'">
							<img src="images/menos.png" width="44" height="44" border="0" /></a>
							</td>
							<td width="6%" height="44" align="center" valign="middle" bgcolor="#FFFFFF">
							<a href="processa.php?del='.(int)$id.'">
							<img src="images/excluir.png" width="44" height="44" border="0" /></a>
							</td>
							<td width="11%" height="44" align="center" valign="middle" bgcolor="#FFFFFF"> R$ '.number_format($subTotal, 2).'</td></tr>
							';

						}
						$Total += $subTotal;
					}
				}
				if($Total == 0){
					echo '<tr>
					<td colspan="7" align="center" valign="middle">CARRINHO VAZIO</td>
					</tr>
					';
				}
				else{
					echo '
					<tr>
					<td colspan="4"></td>
					<td colspan="2" align="center" valign="middle">Total</td>
					<td align="center" valign="middle" bgcolor="#FFFFFF" height="44">R$ '.number_format($Total, 2).'	</td>
					</tr>
					<tr>
					<td colspan="6"></td>
					<td align="center" valign="middle" bgcolor="#FFFFFF" height="44">
					<a href="index.php">
					<img src="images/home.png" align="left" border="0"></a>
					</td>
					</tr>';
				}
			}
		}

		// MOSTRAR LISTA DE CLIENTES
		function clientes(){
			if($_SESSION){
				$sql = mysql_query("SELECT * FROM clientes ORDER BY nome");
				$count = mysql_num_rows($sql);
				$campoSelect = "<select id='basic' name='cliente' class='selectpicker' data-live-search='true'>";
				$campoSelect .= "<option value = '0'>Selecione</option>";
				while($res=mysql_fetch_array($sql)) {
					$campoSelect .= "<option value = '".$res[0]."'>".$res[1]."</option>";
				}
				$campoSelect .= "</select>";
				echo $campoSelect;
				echo "<input type = 'button' name='finalizarOrcamento' value = 'Finalizar orçamento' onClick='if(document.orcamento.cliente.value == 0){alert(\"Selecione um cliente\");}else{document.orcamento.submit();}'/>";
			}
		}
	}

	// VERIFICAO DE ADICAO
	if(isset($_GET['add'])){
		$id = $_GET['add'];
		$_SESSION['produto']['id_' . $id]['quantidade'] += '1';
		header ("Location: ".$pagina);

	}

	// VERIFICACAO DE SUBTRACAO
	if(isset($_GET['menos'])){
		$id = $_GET['menos'];
		$_SESSION['produto']['id_' . $id]['quantidade']--;
		header ("Location: ".$pagina);
	}

	// ZERAR PRODUTOS
	if(isset($_GET['del'])){
		$id = $_GET['del'];
		$_SESSION['produto']['id_' . $id]['id'] = '0';
		$_SESSION['produto']['id_' . $id]['quantidade'] = '0';
		$_SESSION['produto']['id_' . $id]['preco'] = '0';
		header ("Location: ".$pagina);
	}
?>

