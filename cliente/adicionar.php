<?php
require("../topo.php");

if ($_POST) {

    // instantiate product object
    require('../Classes/Cliente.class.php');
    require('../Classes/Conexao.class.php');

    // Instancia a conexao
    $conexao = new Conexao();
    $db = $conexao->getConnection();

    $cliente = new Cliente($db);

    // set product property values
    $cliente->nome = $_POST['nome'];
    $cliente->endereco = $_POST['endereco'];
    $cliente->bairro = $_POST['bairro'];
    $cliente->cidade = $_POST['cidade'];
    $cliente->uf = $_POST['uf'];
    $cliente->cpf_cnpj = $_POST['cpf_cnpj'];
    $cliente->telefone = $_POST['telefone'];
    $cliente->fax = $_POST['fax'];

$cliente->insert();
}
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i>Cadastro Cliente</li>
        </ol>
    </div>
</div><!-- /.row -->

<form action="" method="post" enctype="multipart/form-data">

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
                        <input type="text" name="endereco" class="form-control input-sm" id="endereco" placeholder="Endereço do cliente">
                    </div>

                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" class="form-control input-sm" id="bairro" placeholder="Bairro do cliente">
                    </div>

                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" class="form-control input-sm" id="cidade" placeholder="Cidade do cliente">
                    </div>

                    <div class="form-group">
                        <label for="uf">UF</label>
                        <input type="text" name="uf" class="form-control input-sm" id="uf" placeholder="Estado do cliente">
                    </div>

                    <div class="form-group">
                        <label for="cpf_cnpj">CPF ou CNPJ</label>
                        <input type="text" name="cpf_cnpj" class="form-control input-sm" id="cpf_cnpj" placeholder="CPF ou CNPJ do cliente">
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" class="form-control input-sm" id="telefone" placeholder="Telefone do cliente">
                    </div>

                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <input type="text" name="fax" class="form-control input-sm" id="fax" placeholder="Fax do cliente">
                    </div>


                    <tr>
                        <th>&nbsp;</th>
                        <td valign="top">
                            <input type="submit" name="enviar" value="Salvar" class="form-submit" />
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