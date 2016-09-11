<?php include"conexao/config.php";
$conexao = mysql_connect("$local", "$usuario", "$senha")
or die(mysql_error());
$db = mysql_select_db("$selecione")
or die (mysql_error());
?>
<?php
$sql = mysql_query("SELECT codigo, produto, descricao, estoque, codigo_original, codigo_paralelo, preco, promocao, foto
 FROM produtos
 ORDER BY id DESC
 LIMIT 10")
or die(mysql_error());
if (@mysql_num_rows($sql) == 0) {
	echo "<h1>Nenhum resultado encontrato</h1>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>Catálogo de peças - BL Auto Peças</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <!-- Add custom CSS here -->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- Color Box -->
  <link rel="stylesheet" href="css/colorbox.css" />
  <link rel="stylesheet" href="css/bootstrap-select.css">
   <style type="text/css">
      @media print {
      .noprint { display: none; }
      }
  </style>

  <!-- Botao pesquisa -->
  <script language="JavaScript" src="js/shortcut.js"></script>
  <script>
  shortcut.add("F9",function()
  {
    document.consulta.consulta.focus();
  });
  </script>
  <!-- Final botao pesquisa-->

  <!-- MODAL CALCULADORA-->
  <script src="js/jquery.colorbox.js"></script>
  <script>
  $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        $(".group1").colorbox({rel:'group1'});
        $(".group2").colorbox({rel:'group2', transition:"fade"});
        $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
        $(".group4").colorbox({rel:'group4', slideshow:true});
        $(".ajax").colorbox();
        $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
        $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
        $(".iframe").colorbox({iframe:true, width:"60%", height:"65%"});
        $(".inline").colorbox({inline:true, width:"50%"});
        $(".callbacks").colorbox({
          onOpen:function(){ alert('onOpen: colorbox is about to open'); },
          onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
          onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
          onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
          onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
        });

        $('.non-retina').colorbox({rel:'group5', transition:'none'})
        $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});

        //Example of preserving a JavaScript event for inline calls.
        $("#click").click(function(){
          $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
          return false;
        });
      });
</script>
<!-- FIM MODAL -->

</head>

<body>

 <!-- Fixed navbar -->
 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">

      <a class="navbar-brand" style="padding-top:15px" href="index.php">BL Auto Peças</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produtos <b class="caret"></b></a>
          <ul class="dropdown-menu">
           <li><a href="cadastro.php">Cadastro Produtos</a></li>
           <li><a href="relatorio_vendas.php">Relatório Vendas</a></li>
           <li><a href="catalogo.php">Lista Catálogos</a></li>
         </ul>
       </li>
       <li><a href="carrinho.php">Carrinho</a></li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes <b class="caret"></b></a>
        <ul class="dropdown-menu">
         <li><a href="cliente.php">Cadastrar clientes</a></li>
         <li><a href="cliente_gerenciar.php">Gerenciar clientes</a></li>
       </ul>
     </li>
     <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Financeiro <b class="caret"></b></a>
      <ul class="dropdown-menu">
       <li><a href="cadastro_boleto.php">Cadastrar boleto</a></li>
       <li><a href="gerenciar_boleto.php">Gerenciar boleto</a></li>
       <li><a href="relatorio_compras.php">Cadastrar nota compra</a></li>
       <li><a href="relatorio.php">Relatório Semanal</a></li>
     </ul>
   </li>
   <li><a href="orcamento_gerenciar.php">Orçamentos</a></li>
 </ul>
 <ul class="nav navbar-nav navbar-right">

  <form class="navbar-form navbar-right" role="form" method="GET" name="consulta" action="busca.php">
    <div class="form-group">
      <input type="text" placeholder="Pesquisar produto" class="form-control"  id="consulta" name="consulta" onfocus="this.select()">
    </div>
    <button type="submit" class="btn btn-success">Buscar</button>
  </form>


            <!--<li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>
            <li class="active"><a href="./">Fixed top</a></li>-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <!--/.navbar-collapse -->
           <!-- <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      --><!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
