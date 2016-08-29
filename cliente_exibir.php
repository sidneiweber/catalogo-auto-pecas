<?php require("topo.php");
require ("functions.php");
require ("pag.php");

$id=$_GET['id'];

$sql = "SELECT * FROM clientes WHERE idCliente='$id'";
$resultado = mysql_query($sql)
or die ("Não foi possível realizar a consulta ao banco de dados");
while ($linha=mysql_fetch_array($resultado)) {
$id = $linha["idCliente"];
$nome = $linha["nome"];
$endereco = $linha["endereco"];
$bairro = $linha["bairro"];
$cidade = $linha["cidade"];
$uf = $linha["uf"];
$cpf_cnpj = $linha["cpf_cnpj"];
$telefone = $linha["telefone"];
$fax = $linha["fax"];
?>

 <div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Alterar Cliente</li>
            </ol>
          </div>
        </div><!-- /.row -->

<form  method='POST' action='cliente_alterar_db.php?id=<?php echo $id; ?>' name="alterarCliente">

<div class="col-lg-4">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i>Alterar Cliente</h3>
              </div>
              <div class="panel-body">
                <form role="form">

<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" class="form-control input-sm" id="nome" value="<?php echo $nome; ?>">
</div>

<div class="form-group">
    <label for="endereco">Endereço</label>
    <input type="text" name="endereco" class="form-control input-sm" id="endereco" value="<?php echo $endereco; ?>">
</div>

<div class="form-group">
    <label for="bairro">Bairro</label>
    <input type="text" name="bairro" class="form-control input-sm" id="bairro" value="<?php echo $bairro; ?>">
</div>

<div class="form-group">
    <label for="cidade">Cidade</label>
    <input type="text" name="cidade" class="form-control input-sm" id="cidade" value="<?php echo $cidade; ?>">
</div>

<div class="form-group">
    <label for="uf">UF</label>
    <input type="text" name="uf" class="form-control input-sm" id="uf" value="<?php echo $uf; ?>">
</div>

<div class="form-group">
    <label for="cpf_cnpj">CPF/CNPJ</label>
    <input type="text" name="cpf_cnpj" class="form-control input-sm" id="cpf_cnpj" value="<?php echo $cpf_cnpj; ?>">
</div>

<div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" name="telefone" class="form-control input-sm" id="telefone" value="<?php echo $telefone; ?>">
</div>

<div class="form-group">
    <label for="fax">Fax</label>
    <input type="text" name="fax" class="form-control input-sm" id="fax" value="<?php echo $fax; ?>">
</div>

<input type="button" name="Alterar" value = "Alterar" onClick = "validar()"/>

</form>

<?php
}
?>

</div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

    <script>
	function validar(){
		if(document.getElementById("nome").value == ""){
			alert ("Campo nome deve ser preenchido.");
			document.getElementById("nome").focus();
		}
		else{
			document.alterarCliente.submit();	
		}
	}
</script>

  </body>
</html>