<?php require("topo.php");
require ("functions.php");
?>

<div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i>Cadastro Produto</li>
            </ol>
           </div>
        </div><!-- /.row -->

<form action="" method="post" enctype="multipart/form-data">

<?php if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

 $codigo    			= strip_tags(trim($_POST['codigo']));
 $produto   			= strip_tags(trim($_POST['produto']));
 $descricao     		= strip_tags(trim($_POST['descricao']));
 $estoque    			= strip_tags(trim($_POST['estoque']));
 $codigo_original       = strip_tags(trim($_POST['codigo_original']));
 $codigo_paralelo       = strip_tags(trim($_POST['codigo_paralelo']));
 $preco     			= strip_tags(trim($_POST['preco']));
 $promocao    			= strip_tags(trim($_POST['promocao'])); 
$custo	    			= strip_tags(trim($_POST['custo']));
$ultimo_fornecedor		= strip_tags(trim($_POST['ultimo_fornecedor']));

 if (empty($codigo)) {
 $retorno = '<!--  start message-red -->
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Digite o codigo</td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-red -->';

 }elseif (empty($produto)){
 $retorno = '<!--  start message-red -->
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Digite o produto</td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-red -->';

  }elseif (empty($descricao)){
 $retorno = '<!--  start message-red -->
				<div id="message-red">
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="red-left">Informe a descricao do produto</td>
					<td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
				</tr>
				</table>
				</div>
				<!--  end message-red -->';

  }if (empty($retorno)) {
$_UP['pasta'] = 'fotos/';
$_UP['tamanho'] = 1024 * 1024 * 2;
$_UP['extensoes'] = array ('jpg', 'jpeg', 'png', 'gif');
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
}

else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
 echo "O arquivo não pode ter mais de 2mb";
}

else {
 if ($_UP['renomeia'] == true) {
 $nome_final = md5(time()).'.jpeg';
 }else{
	$nome_final = $_FILES['arquivo']['name'];
 }

$tam_name = getimagesize($_FILES['arquivo']['tmp_name']);

if ($tam_name[0] >= '801') {
 echo "A imagem deve ter a largura menor ou igual a 800px";
}

if ($tam_name[1] >= '601') {
 echo "A imagem deve ter a altura menor ou igual a 600px";
}else

if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {

 $cadastro = mysql_query("INSERT INTO produtos (codigo, produto, descricao, estoque, codigo_original, codigo_paralelo, preco, promocao, custo, ultimo_fornecedor, foto) VALUES ('$codigo', '$produto', '$descricao', '$estoque', '$codigo_original', '$codigo_paralelo', '$preco', '$promocao', '$custo', '$ultimo_fornecedor', '$nome_final')");

 if ($cadastro == 1){
 echo '<!--  start message-green -->
				 <div class="col-lg-12">
         <div class="alert alert-dismissable alert-success">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Feito!</strong> Produto cadastrado com sucesso!.
         </div>
         </div>
				<!--  end message-green -->';

 }else {
 echo '<span class="no">Erro ao cadastrar, tente novamente</span>';
 }
}
}
}

if ($retorno == 0){
 echo "$retorno";
}else{
}
}
?>

  <div class="col-lg-4">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i>Cadastrar Produto</h3>
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
    <label for="preco">Preço</label>
    <input type="text" required value="" name="preco" title="Preencha com o preço do produto." class="form-control input-sm" id="Preço" placeholder="Preço do Produto">
</div>

<div class="form-group">
    <label for="promocao">Promoção</label>
    <input type="text" name="promocao" class="form-control input-sm" id="promocao" placeholder="Promoção do Produto">
</div>

<div class="form-group">
    <label for="custo">Custo</label>
    <input type="text" name="custo" class="form-control input-sm" id="custo" placeholder="Custo do produto">
</div>

<div class="form-group">
    <label for="ultimo_fornecedor">Último Fornecedor</label>
    <input type="text" name="ultimo_fornecedor" class="form-control input-sm" id="ultimo_fornecedor" placeholder="Último Fornecedor do Produto">
</div>

<div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" name="arquivo" required value="" title="Foto obrigatoria." size="16" class="file_1"/> JPEG, GIF 2MB maximo
</div>

<tr><th>&nbsp;</th>
	<td valign="top">
		<input type="hidden" name="enviar" value="send" />
		<input type="submit" name="Enviar" />
		<!--<input type="submit" name="enviar" value="send" class="form-submit" />-->
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
