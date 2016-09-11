	<?php require("topo.php");
	require ("functions.php");
	?>

	 <?php
		session_start();
		if(isset($_GET['cliente'])){
			$idCliente = $_GET['cliente'];
			// VERIFICAR SE EXISTE UMA SESSION
			if($_SESSION){
				//OBTER PROXIMO ORÇAMENTO
				$sql = mysql_query("SELECT idOrcamento FROM orcamento ORDER BY idOrcamento DESC LIMIT 1");
				if($res=mysql_fetch_array($sql)){
					$idOrcamento = $res[0] + 1;
				}
				else{
					$idOrcamento = 1;
				}

				foreach($_SESSION['produto'] as $id => $campo ){
					if($campo['id'] > 0){
						$id = $campo['id'];
						$preco = $campo['preco'];
						$quantidade = $campo['quantidade'];
						mysql_query("INSERT INTO orcamento (idProduto, idOrcamento, idCliente, preco, quantidade, dataHora) VALUES ('$id', '$idOrcamento', '$idCliente', '$preco', '$quantidade', now())");
						$_SESSION['produto']['id_' . $id]['id'] = '0';
					}
				}
			}
		}

		//$alterar = "UPDATE produtos SET estoque=estoque-'$quantidade' WHERE id = '$id'";
		//mysql_query($alterar) or die(mysql_error());
	?>
	<div class="row">
	          <div class="col-lg-12">
	              <ol class="breadcrumb">
	              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
	            </ol>
	          </div>
	        </div><!-- /.row -->


	<div class="col-lg-12">
	         <div class="alert alert-dismissable alert-success">
	         <button type="button" class="close" data-dismiss="alert">&times;</button>
	         <strong>Feito!</strong> You successfully read <a href="#" class="alert-link">Orçamento salvo com sucesso</a>.
	         </div>


	         <script>
		 var width = 595;
		 var height = 421;
		 var left = 0;
		 var top = 0;
		 var url = "orcamento_visualizar.php?idOrcamento=<?php echo $idOrcamento?>";
		 window.open(url,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
	</script>

	<!-- JavaScript -->
	    <script src="js/jquery-1.10.2.js"></script>
	    <script src="js/bootstrap.js"></script>

	    <!-- Page Specific Plugins -->
	    <script src="js/tablesorter/jquery.tablesorter.js"></script>
	    <script src="js/tablesorter/tables.js"></script>

	  </body>
	</html>
