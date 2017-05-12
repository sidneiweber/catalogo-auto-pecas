<?php
require("../topo.php");

if ($_POST) {

    // instantiate product object
    require('../Classes/Produto.class.php');
    require('../Classes/Conexao.class.php');

    // Instancia a conexao
    $conexao = new Conexao();
    $db = $conexao->getConnection();

    $produto = new Produto($db);

    // set product property values
    $produto->codigo = $_POST['codigo'];
    $produto->produto = $_POST['produto'];
    $produto->descricao = $_POST['descricao'];
    $produto->estoque = $_POST['estoque'];
    $produto->codigo_original = $_POST['codigo_original'];
    $produto->codigo_paralelo = $_POST['codigo_paralelo'];
    $produto->ncm = $_POST['ncm'];
    $produto->preco = $_POST['preco'];
    $produto->promocao = $_POST['promocao'];
    $produto->custo = $_POST['custo'];
    $produto->ultimo_fornecedor = $_POST['ultimo_fornecedor'];
    

    $_UP['pasta'] = '../fotos/';
    $_UP['tamanho'] = 1024 * 1024 * 2;
    $_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif');
    $_UP['renomeia'] = true;

    $_UP['errors'][0] = 'Não tivemos errors';
    $_UP['errors'][1] = 'A Pasta não foi encontrada';
    $_UP['errors'][2] = 'O tamanho da imagem e maior que o permitido';
    $_UP['errors'][3] = 'As extensões permitidas para o envio do arquivo são: jpg, png e gif';
    $_UP['errors'][4] = 'Não foi feito o upload de sua foto, já existia outra com o mesmo nome';

    if ($_FILES['arquivo']['errors'] != 0) {
        die("Não foi possivel enviar sua imagem o erro foi:" . $_UP['errors'][$_FILES['arquivo']['errors']]);
        exit;
    }

    $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
    if (array_search($extensao, $_UP['extensoes']) === false) {
        echo "Formato da imagem não e válido, envie com as extensões: jpg, gif ou png!";
    } else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
        echo "O arquivo não pode ter mais de 2mb";
    } else {
        if ($_UP['renomeia'] == true) {
            $nome_final = md5(time()) . '.jpeg';
        } else {
            $nome_final = $_FILES['arquivo']['name'];
        }

        $tam_name = getimagesize($_FILES['arquivo']['tmp_name']);

        if ($tam_name[0] >= '801') {
            echo "A imagem deve ter a largura menor ou igual a 800px";
        }

        if ($tam_name[1] >= '601') {
            echo "A imagem deve ter a altura menor ou igual a 600px";
        } else

        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
            $produto->foto = $nome_final;
            $produto->insert();

            } else {
                echo '<span class="no">Erro ao cadastrar, tente novamente</span>';
            }
        }
    }
?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i>Cadastro Produto</li>
        </ol>
    </div>
</div><!-- /.row -->

<form action="" method="post" enctype="multipart/form-data">


    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i>Dados produto a cadastrar</h3>
            </div>
            <div class="panel-body">
                <form role="form">

                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="text" required value="" name="codigo" title="Preencha com o codigo do produto." class="form-control input-sm" id="codigo" placeholder="Código do Produto">
                    </div>

                    <div class="form-group">
                        <label for="produto">Produto</label>
                        <input type="text" required value="" name="produto" title="Preencha com o nome do produto." class="form-control input-sm" id="produto" placeholder="Produto">
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="text" required value="" name="descricao" title="Preencha com descrição do produto." class="form-control input-sm" id="descricao" placeholder="Descrição do Produto">
                    </div>

                    <div class="form-group">
                        <label for="estoque">Estoque</label>
                        <input type="text" name="estoque" class="form-control input-sm" id="estoque" placeholder="Quantidade em estoque">
                    </div>

                    <div class="form-group">
                        <label for="codigo_original">Código Original</label>
                        <input type="text" name="codigo_original" class="form-control input-sm" id="codigo_original" placeholder="Código Original do Produto">
                    </div>

                    <div class="form-group">
                        <label for="codigo_paralelo">Código Paralelo</label>
                        <input type="text" name="codigo_paralelo" class="form-control input-sm" id="codigo_paralelo" placeholder="Código Paralelo do Produto">
                    </div>

                    <div class="form-group">
                        <label for="ncm">NCM</label>
                        <input type="text" name="ncm" class="form-control input-sm" id="ncm" placeholder="NCM do Produto">
                    </div>

                    <div class="form-group">
                        <label for="preco">Preço</label>
                        <input type="text" required value="" name="preco" title="Preencha com o preço do produto." onKeyPress="return(MascaraMoeda(this, '.', '.', event))" class="form-control input-sm" id="Preço" placeholder="Preço do Produto">
                    </div>

                    <div class="form-group">
                        <label for="promocao">Promoção</label>
                        <input type="text" name="promocao" class="form-control input-sm" id="promocao" placeholder="Promoção do Produto">
                    </div>

                    <div class="form-group">
                        <label for="custo">Custo</label>
                        <input type="text" name="custo" class="form-control input-sm" onKeyPress="return(MascaraMoeda(this, '.', '.', event))" id="custo" placeholder="Custo do produto">
                    </div>

                    <div class="form-group">
                        <label for="ultimo_fornecedor">Último Fornecedor</label>
                        <input type="text" name="ultimo_fornecedor" class="form-control input-sm" id="ultimo_fornecedor" placeholder="Último Fornecedor do Produto">
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="arquivo" required value="" title="Foto obrigatoria." size="16" class="file_1"/> JPEG, GIF 2MB maximo
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