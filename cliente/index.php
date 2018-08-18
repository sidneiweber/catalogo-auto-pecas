<?php
require '../topo.php';
require('../Config.inc.php');
require('../Classes/Conexao.class.php');
require('../Classes/Cliente.class.php');
//$conn = new Conexao();

$conexao = new Conexao();
$db = $conexao->getConnection();
/*
 * Chama o método getAllClientes() que retorna um array de objetos
 */
$cliente = new Cliente($db);
$dados = $cliente->getAllclientes();
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i> Gerenciar Clientes  <input type="text" id="search" placeholder="Digite para pesquisar"></li>
        </ol>
    </div>
</div><!-- /.row -->

<div class="col-lg-8">
    <div class="table-responsive">

            <table id="table" class="table table-bordered table-hover table-responsive table-striped table-condensed">
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
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody class="searchable">

                    <?php foreach ($dados as $reg): ?>
                        <tr> 
                            <td><?php echo $reg->nome; ?> </td>
                            <td><?php echo $reg->endereco; ?></td>
                            <td><?php echo $reg->bairro; ?></td>
                            <td><?php echo $reg->cidade; ?></td>
                            <td><?php echo $reg->uf; ?></td>
                            <td><?php echo $reg->cpf_cnpj; ?></td>
                            <td><?php echo $reg->telefone; ?></td>
                            <td><?php echo $reg->fax; ?></td>

                            <td>

                                <a href = "cliente/<?php echo $reg->idCliente ?>">
                                    <img src = "images/editar.png" alt="Editar" width = "20px" height="20px"/>
                                </a>
                                <a href = "cliente/apagar.php?id=<?php echo $reg->idCliente ?>" onclick="return confirm('Confirmar exclusão de registro?');">
                                   <img src = "images/delete.png" alt="Remover" width = "20px" height="20px"/>
                                </a>

                            </td>

                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
            </table>

        </div><!-- /.row -->
 
</div><!-- /#wrapper -->

<!-- JavaScript -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
<!-- Page Specific Plugins -->
<script src="js/tablesorter/tables.js"></script>
<script>
// Write on keyup event of keyword input element
$("#search").keyup(function () {
        _this = this;
// Show only matching TR, hide rest of them
    $.each($("#table tbody tr"), function () {
    if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
    $(this).hide();
    else
    $(this).show();
    });
});
</script>
</body>
</html>
