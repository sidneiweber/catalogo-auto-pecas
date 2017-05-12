<?php
require("../topo.php");
require('../Classes/Conexao.class.php');
require('../Classes/Produto.class.php');

// Instancia a conexao
$conexao = new Conexao();
$db = $conexao->getConnection();
// Instancia classe cliente com a conexao
$produto = new Produto($db);
// Exibe dados do produto selecionado
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $dados = $produto->getOneProduto($id);
} else {
    header("Location: index.php");
}
//Se clicar no botao update, registra os dados e chama o metodos update da classe cliente
if (isset($_POST['update'])) {
    $produto->id = $_GET['id'];
    $produto->codigo = $_POST['codigo'];
    $produto->produto = $_POST['produto'];
    // $var = filter_var($string, FILTER_SANITIZE_STRING);
    $produto->descricao = $_POST['descricao'];
    $produto->estoque = $_POST['estoque'];
    $produto->codigo_original = $_POST['codigo_original'];
    $produto->codigo_paralelo = $_POST['codigo_paralelo'];
    $produto->ncm = $_POST['ncm'];
    $produto->preco = $_POST['preco'];
    $produto->promocao = $_POST['promocao'];
    $produto->custo = $_POST['custo'];
    $produto->ultimo_fornecedor = $_POST['ultimo_fornecedor'];

//updating the table
    $produto->update($produto->codigo, $produto->produto, $produto->descricao, $produto->estoque, $produto->codigo_original, $produto->codigo_paralelo, $produto->ncm, $produto->preco, $produto->promocao, $produto->custo, $produto->ultimo_fornecedor, $produto->id);
}
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Alterar Produto</li>
        </ol>
    </div>
</div><!-- /.row -->

<form  method='POST' action='produto/<?php echo $id; ?>' name="alterarProduto">

    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i>Alterar Cliente</h3>
            </div>
            <div class="panel-body">
                <form role="form">

                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input type="text" name="codigo" class="form-control input-sm" id="codigo" value="<?php echo $dados[0]->codigo; ?>">
                    </div>

                    <div class="form-group">
                        <label for="produto">Produto</label>
                        <input type="text" name="produto" class="form-control input-sm" id="produto" value="<?php echo $dados[0]->produto; ?>">
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descricao</label>
                        <input type="text" name="descricao" class="form-control input-sm" id="descricao" value="<?php echo $dados[0]->descricao; ?>">
                    </div>

                    <div class="form-group">
                        <label for="estoque">Estoque</label>
                        <input type="text" name="estoque" class="form-control input-sm" id="estoque" value="<?php echo $dados[0]->estoque; ?>">
                    </div>

                    <div class="form-group">
                        <label for="codigo_original">Codigo Original</label>
                        <input type="text" name="codigo_original" class="form-control input-sm" id="codigo_original" value="<?php echo $dados[0]->codigo_original; ?>">
                    </div>

                    <div class="form-group">
                        <label for="codigo_paralelo">Codigo Paralelo</label>
                        <input type="text" name="codigo_paralelo" class="form-control input-sm" id="codigo_paralelo" value="<?php echo $dados[0]->codigo_paralelo; ?>">
                    </div>

                    <div class="form-group">
                        <label for="ncm">NCM</label>
                        <input type="text" name="ncm" class="form-control input-sm" id="ncm" value="<?php echo $dados[0]->ncm; ?>">
                    </div>

                    <div class="form-group">
                        <label for="preco">Preço</label>
                        <input type="text" name="preco" class="form-control input-sm" id="preco" value="<?php echo $dados[0]->preco; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="promocao">Promocao</label>
                        <input type="text" name="promocao" class="form-control input-sm" id="promocao" value="<?php echo $dados[0]->promocao; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="custo">Custo</label>
                        <input type="text" name="custo" class="form-control input-sm" id="custo" value="<?php echo $dados[0]->custo; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="ultimo_fornecedor">Ultimo Fornecedor</label>
                        <input type="text" name="ultimo_fornecedor" class="form-control input-sm" id="ultimo_fornecedor" value="<?php echo $dados[0]->ultimo_fornecedor; ?>">
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