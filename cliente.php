<?php require("topo.php");
require ("functions.php");
require ("js/function.js");
require ("pag.php");
?>

<div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i>Cadastro Cliente</li>
            </ol>
           </div>
        </div><!-- /.row -->

<form action="" method="post" enctype="multipart/form-data">
<?php
	if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {
		$nome = strip_tags(trim($_POST['nome']));
		$endereco = strip_tags(trim($_POST['endereco']));
		$bairro = strip_tags(trim($_POST['bairro']));
		$cidade = strip_tags(trim($_POST['cidade']));
		$uf = strip_tags(trim($_POST['uf']));
		$cpf_cnpj = strip_tags(trim($_POST['cpf_cnpj']));
		$telefone = strip_tags(trim($_POST['telefone']));
		$fax = strip_tags(trim($_POST['fax']));

		$cadastro = mysql_query("INSERT INTO clientes (nome, endereco, bairro, cidade, uf, cpf_cnpj, telefone, fax) VALUES ('$nome', '$endereco', '$bairro', '$cidade', '$uf', '$cpf_cnpj', '$telefone', '$fax')");
		if ($cadastro == 1){
			echo '<!--  start message-green -->
				 <div class="col-lg-12">
         <div class="alert alert-dismissable alert-success">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Feito!</strong> Cliente cadastrado com sucesso!.
         </div>
         </div>
				<!--  end message-green -->';
		}
		else {
			echo '<!--  start message-green -->
				 <div class="col-lg-12">
         <div class="alert alert-dismissable alert-danger">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Erro!</strong> Tente novamente!.
         </div>
         </div>
				<!--  end message-green -->';
		}
	}
?>



 <div class="col-lg-4">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i>Cadastrar Cliente</h3>
              </div>
              <div class="panel-body">
                <form role="form">

<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" required value="" name="nome" title="Preencha com o nome do cliente." class="form-control input-sm" id="nome" placeholder="Nome do cliente">
</div>

<div class="form-group">
    <label for="endereco">Endereço</label>
    <input type="text" required   value="" name="endereco" class="form-control input-sm" id="endereco" placeholder="Endereço do cliente">
</div>

<div class="form-group">
    <label for="bairro">Bairro</label>
    <input type="text" required  name="bairro" class="form-control input-sm" id="bairro" placeholder="Bairro do cliente">
</div>

<div class="form-group">
    <label for="cidade">Cidade</label>
    <input type="text"  required  name="cidade" class="form-control input-sm" id="cidade" placeholder="Cidade do cliente">
</div>

<div class="form-group">
   <label for="cpf_cnpj">UF:</label>
   <select  name="uf" class="form-control input-sm" id="uf" > 
		<option value="estado">Selecione o Estado</option> 
		<option value="ac">Acre</option> 
		<option value="al">Alagoas</option> 
		<option value="am">Amazonas</option> 
		<option value="ap">Amapá</option> 
		<option value="ba">Bahia</option> 
		<option value="ce">Ceará</option> 
		<option value="df">Distrito Federal</option> 
		<option value="es">Espírito Santo</option> 
		<option value="go">Goiás</option> 
		<option value="ma">Maranhão</option> 
		<option value="mt">Mato Grosso</option> 
		<option value="ms">Mato Grosso do Sul</option> 
		<option value="mg">Minas Gerais</option> 
		<option value="pa">Pará</option> 
		<option value="pb">Paraíba</option> 
		<option value="pr">Paraná</option> 
		<option value="pe">Pernambuco</option> 
		<option value="pi">Piauí</option> 
		<option value="rj">Rio de Janeiro</option> 
		<option value="rn">Rio Grande do Norte</option> 
		<option value="ro">Rondônia</option> 
		<option value="rs">Rio Grande do Sul</option> 
		<option value="rr">Roraima</option> 
		<option value="sc">Santa Catarina</option> 
		<option value="se">Sergipe</option> 
		<option value="sp">São Paulo</option> 
		<option value="to">Tocantins</option> 
	</select>
</div>

<div class="form-group">
    <label for="cpf_cnpj">CPF ou CNPJ</label>
    <input type="text" required  name="cpf_cnpj" class="form-control input-sm" id="cpf_cnpj" placeholder="CPF ou CNPJ do cliente"onkeypress="return number(event);" size=18 maxlength=18>
</div>

<div class="form-group">
    <label for="telefone">Telefone</label>
    <input type="text" required  name="telefone" class="form-control input-sm" id="telefone" placeholder="Telefone do cliente" onkeypress="mascara(this, '## #####-####'); return number(event);" maxlength=13>
</div>

<div class="form-group">
    <label for="fax">Fax</label>
    <input type="text" required  name="fax" class="form-control input-sm" id="fax" placeholder="Fax do cliente" onkeypress="mascara(this, '## ## ####-####'); return number(event);" maxlength=15>
</div>


<tr>
		<th>&nbsp;</th>
		<td valign="top">
		<div align="center">
			<input type="submit" name="enviar" value="send"  class="form-submit" />
        </div>
		</td>
		<td></td>
	</tr>

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

