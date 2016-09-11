<?php
require("topo_sem_menu.php");
require ("functions.php");

$id=$_GET['id'];

$sql = "SELECT * FROM produtos WHERE id='$id'";

$resultado = mysql_query($sql)
or die ("Não foi possível realizar a consulta ao banco de dados");

while ($linha=mysql_fetch_array($resultado)) {
$id = $linha["id"];
$codigo = $linha["codigo"];
$produto = $linha["produto"];
$descricao = $linha["descricao"];
$estoque = $linha["estoque"];
$codigo_original = $linha["codigo_original"];
$codigo_paralelo = $linha["codigo_paralelo"];
$preco = $linha["preco"];
$promocao = $linha["promocao"];
$foto = $linha["foto"];
//$arquivo=$_POST['foto_nova'];

//$nome_final=$_POST['nome_final'];
?>



<div id="formulario">

<form action="" method="post" enctype="multipart/form-data">

 <fieldset>

<?php if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

if (empty($retorno)) {

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
 $cadastro = mysql_query("UPDATE produtos SET foto='$nome_final' WHERE id='$id' LIMIT 1");

 if ($cadastro == 1){
 echo '<!--  start message-green -->
                 <div class="col-lg-12">
         <div class="alert alert-dismissable alert-success">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Feito!</strong> Foto alterada com sucesso!.
         </div>
         </div>
                <!--  end message-green -->';
 }else {
 echo '<span class="no">Erro ao modificar, tente novamente</span>';
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
                <h3 class="panel-title"><i class="fa fa-money"></i>Alterar foto</h3>
              </div>
              <div class="panel-body">
                <form role="form">

 <label>
 <span>Foto Atual</span>
 <img src="fotos/<?php echo $foto; ?>" width="200" height="150" />
 </label>

 <label>
 <span>Nova Foto</span>
 <input type="file" name="arquivo" size="16" />
 </label>

 <input type="hidden" name="enviar" value="send" />
 <input type="submit" name="Enviar" />

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

  </body>
</html>