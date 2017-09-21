<?php
require("../topo.php");

if ($_POST) {

    // instantiate product object
    require('../Classes/ContasPagar.class.php');
    require('../Classes/Conexao.class.php');

    // Instancia a conexao
    $conexao = new Conexao();
    $db = $conexao->getConnection();

    $contaspagar = new ContasPagar($db);

    // set product property values
    $contaspagar->fornecedor = $_POST['fornecedor'];
    $contaspagar->numero_documento = $_POST['numero_documento'];
    //$contaspagar->data = $_POST['data'];
    $contaspagar->data  = implode("-",array_reverse(explode("/",$_POST['data'])));
    $contaspagar->valor = $_POST['valor'];
    $contaspagar->status = $_POST['status'];

$contaspagar->insert();
}

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-dashboard"></i>Cadastro Contas Pagar</li>
        </ol>
    </div>
</div><!-- /.row -->

<form action="" method="post" enctype="multipart/form-data">

    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i>Cadastrar Conta a pagar</h3>
            </div>
            <div class="panel-body">
                <form role="form">

                    <div class="form-group">
                        <label for="nome">Fornecedor</label>
                        <input type="text" required value="" name="fornecedor" title="Preencha com o nome do fornecedor." class="form-control input-sm" id="fornecedor" placeholder="Nome do fornecedor">
                    </div>

                    <div class="form-group">
                        <label for="endereco">Numero documento</label>
                        <input type="text" name="numero_documento" class="form-control input-sm" id="numero_documetno" placeholder="Numero do documento">
                    </div>

                    <div class="form-group">
                        <label for="bairro">Data Vencimento</label>
                        <input type="text" name="data" class="form-control input-sm" id="data" placeholder="Data vencimento">
                    </div>

                    <div class="form-group">
                        <label for="cidade">Valor</label>
                        <input type="text" name="valor" onKeyPress="return(MascaraMoeda(this,'','.',event))" class="form-control input-sm" id="valor" placeholder="Valor do documento">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status"><option value="aberto">Aberto</option> <option value="pago">Pago</option></select>
                        <!-- <input type="<textarea></textarea></textarea>t" required value="" name="status" class="form-control input-sm" id="status" placeholder="Status">-->
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
    <script type="text/javascript" src="js/jquery.maskedinput.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      $("input.data").mask("99/99/9999");
        $("input.cpf").mask("999.999.999-99");
        $("input.cep").mask("99.999-999");
      });
    </script>

    <script language="javascript">
//-----------------------------------------------------
//Funcao: MascaraMoeda
//Sinopse: Mascara de preenchimento de moeda
//Parametro:
//   objTextBox : Objeto (TextBox)
//   SeparadorMilesimo : Caracter separador de milésimos
//   SeparadorDecimal : Caracter separador de decimais
//   e : Evento
//Retorno: Booleano
//Autor: Gabriel Fróes - www.codigofonte.com.br
//-----------------------------------------------------
function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true;
    key = String.fromCharCode(whichCode); // Valor para o código da Chave
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida
    len = objTextBox.value.length;
    for(i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) objTextBox.value = '';
    if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
    if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
    }
    return false;
}
</script>

</body>
</html>