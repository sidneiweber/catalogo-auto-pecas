<?php
require("../topo.php");
require('../Config.inc.php');
require('../Classes/Conexao.class.php');
require('../Classes/Cliente.class.php');

// Instancia a conexao
$conexao = new Conexao();
$db = $conexao->getConnection();

// Instancia classe cliente com a conexao
$cliente = new Cliente($db);
// Exibe dados do cliente selecionado
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idCliente = $_GET['id'];
    $dados = $cliente->getCliente($idCliente);
} else {
    header("Location: index.php");
}
//Se clicar no botao update, registra os dados e chama o metodos update da classe cliente
if (isset($_POST['update'])) {
    $cliente->idCliente = $_GET['id'];
    $cliente->nome = $_POST['nome'];
    // $var = filter_var($string, FILTER_SANITIZE_STRING);
    $cliente->endereco = $_POST['endereco'];
    $cliente->bairro = $_POST['bairro'];
    $cliente->cidade = $_POST['cidade'];
    $cliente->uf = $_POST['uf'];
    $cliente->cpf_cnpj = $_POST['cpf_cnpj'];
    $cliente->telefone = $_POST['telefone'];
    $cliente->fax = $_POST['fax'];

//updating the table
    $cliente->update($cliente->nome, $cliente->endereco, $cliente->bairro, $cliente->cidade, $cliente->uf, $cliente->cpf_cnpj, $cliente->telefone, $cliente->fax, $cliente->idCliente);
}
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Alterar Cliente</li>
        </ol>
    </div>
</div><!-- /.row -->

<form  method='POST' action='cliente/<?php echo $idCliente; ?>' name="alterarCliente">

    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i>Alterar Cliente</h3>
            </div>
            <div class="panel-body">
                <form role="form">

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control input-sm" id="nome" value="<?php echo $dados[0]->nome; ?>">
                    </div>

                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" class="form-control input-sm" id="endereco" value="<?php echo $dados[0]->endereco; ?>">
                    </div>

                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" class="form-control input-sm" id="bairro" value="<?php echo $dados[0]->bairro; ?>">
                    </div>

                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" class="form-control input-sm" id="cidade" value="<?php echo $dados[0]->cidade; ?>">
                    </div>

                    <div class="form-group">
                        <label for="uf">UF</label>
                        <input type="text" name="uf" class="form-control input-sm" id="uf" value="<?php echo $dados[0]->uf; ?>">
                    </div>

                    <div class="form-group">
                        <label for="cpf_cnpj">CPF/CNPJ</label>
                        <input type="text" name="cpf_cnpj" class="form-control input-sm" id="cpf_cnpj" value="<?php echo $dados[0]->cpf_cnpj; ?>">
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" class="form-control input-sm" id="telefone" value="<?php echo $dados[0]->telefone; ?>">
                    </div>

                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <input type="text" name="fax" class="form-control input-sm" id="fax" value="<?php echo $dados[0]->fax; ?>">
                    </div>

                    <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                    <td><input type="submit" name="update" value="Atualizar"></td>
                </form>


            </div><!-- /.row -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
    <script src="js/sweetalert.min.js"></script>
</body>
</html>