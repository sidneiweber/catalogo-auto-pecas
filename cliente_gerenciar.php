<?php require("topo.php");
require ("functions.php");

$sql = mysql_query("SELECT * FROM clientes ORDER BY nome");
$count = mysql_num_rows($sql);
?>

<div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Gerenciar Clientes</li>
            </ol>
          </div>
</div><!-- /.row -->

<div class="col-lg-8">
<div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>CPF/CNPJ</th>
                        <th>Telefone</th>
                        <th>Fax</th>
                        <th>Editar</th>
                      </tr>
                    </thead>
                    <tbody>



<?php
	while($res=mysql_fetch_array($sql)) {	
		$id = $res[0];	
		$nome = $res[1];	
		$endereco = $res[2];	
		$bairro = $res[3];	
		$cidade = $res[4];	
		$uf = $res[5];	
		$cpf_cnpj = $res[6];	
		$telefone = $res[7];	
		$fax = $res[8];
	
		$i++;		
		$css = ($i % 2 == 0) ? 'style="background: #CCC;"' : 'style="background: #e7e7e7;"';
?>
	 <tr <?php echo $css ?>> 
        <td><?php echo $nome; ?> </td>
        <td><?php echo $endereco; ?></td>
        <td><?php echo $bairro; ?></td>
        <td><?php echo $cidade; ?></td>
        <td><?php echo $uf; ?></td>
        <td><?php echo $cpf_cnpj; ?></td>
        <td><?php echo $telefone; ?></td>
        <td><?php echo $fax; ?></td>

  <td>
  	<a href = "cliente_exibir.php?id=<?php echo $id ?>">
    	<img src = "http://blautopecas.com.br/catalogo/images/editar.png" alt = "Editar" width = "20px" height="20px"/>
    </a>
    <a href = "cliente_remover_db.php?id=<?php echo $id ?>" onclick="return confirm('Confirmar exclusão de registro?');">
    	<img src = "http://blautopecas.com.br/catalogo/images/excluir.png" alt = "Remover" width = "20px" height="20px"/>
    </a>
  </td>

    </tr>
    <?php
		}
	?>
 </tbody>
</table>

</div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
