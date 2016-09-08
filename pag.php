<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Catálogo de peças - BL Auto Peças</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Color Box -->
     <link rel="stylesheet" href="css/colorbox.css" />

<!-- Botao pesquisa -->
<script language="JavaScript" src="js/shortcut.js"></script>
<script>
shortcut.add("F9",function()
{
	 document.consulta.consulta.focus();
});
</script>
<!-- Final botao pesquisa-->
  </head>
  <body>
     <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">BL Auto Peças</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produtos <b class="caret"></b></a>
              	<ul class="dropdown-menu">
                	<li><a href="cadastro.php">Cadastro Produtos</a></li>
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
              	</ul>
              </li>
            <li><a href="orcamento_gerenciar.php">Orçamentos</a></li>
            </ul>
          <ul class="nav navbar-nav navbar-right">

          <form class="navbar-form navbar-right" role="form" method="GET" name="consulta" action="busca.php">
            <div class="form-group">
              <input type="text" placeholder="Pesquisar produto" class="form-control"  id="consulta" name="consulta" maxlength="255">
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
      <div id="page-wrapper"></div>
</html>