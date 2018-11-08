<?php
require( '../topo.php');
require('../Config.inc.php');
require('../Classes/Conexao.class.php');
require('../Classes/Cliente.class.php');
//$conn = new Conexao();

$conexao = new Conexao();
$db = $conexao->getConnection();

/*
 * Chama o método getAllCliente() que retorna um array de objetos
 */
$cliente = new Cliente($db);
$dados = $cliente->getAllclientes();
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gerenciar Clientes
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Sistema Vendas</a></li>
      <li class="active">Gerenciar Clientes</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-10">
        <div class="row">
                <div class="col-xs-10">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Lista de clientes</h3>

                      <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 160px;">
                          <input type="text" id="search" name="search" class="form-control pull-right" placeholder="Pesquisar">

                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                      <table id="table" class="table table-bordered table-responsive table-striped table-condensed">
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
                            <?php endforeach;?>
                              </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
              </div>
            </section>
            <!-- /.content -->
          </div>

          <!-- Main Footer -->
          <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
              Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
          </footer>

          <!-- Control Sidebar -->
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
              <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
              <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Home tab content -->
              <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                  <li>
                    <a href="javascript::;">
                      <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                      <div class="menu-info">
                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                        <p>Will be 23 on April 24th</p>
                      </div>
                    </a>
                  </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                  <li>
                    <a href="javascript::;">
                      <h4 class="control-sidebar-subheading">
                        Custom Template Design
                        <span class="pull-right-container">
                          <span class="label label-danger pull-right">70%</span>
                        </span>
                      </h4>

                      <div class="progress progress-xxs">
                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                      </div>
                    </a>
                  </li>
                </ul>
                <!-- /.control-sidebar-menu -->

              </div>
              <!-- /.tab-pane -->
              <!-- Stats tab content -->
              <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
              <!-- /.tab-pane -->
              <!-- Settings tab content -->
              <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                  <h3 class="control-sidebar-heading">General Settings</h3>

                  <div class="form-group">
                    <label class="control-sidebar-subheading">
                      Report panel usage
                      <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                      Some information about this general settings option
                    </p>
                  </div>
                  <!-- /.form-group -->
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
          </aside>
          <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
          </div>
          <!-- ./wrapper -->

          <!-- REQUIRED JS SCRIPTS -->

          <!-- jQuery 2.2.3 -->
          <script src="js/jquery-1.10.2.js"></script>
          <!-- Bootstrap 3.3.6 -->
          <script src="bootstrap/js/bootstrap.min.js"></script>
          <!-- AdminLTE App -->
          <script src="dist/js/app.min.js"></script>

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

          <!-- Optionally, you can add Slimscroll and FastClick plugins.
               Both of these plugins are recommended to enhance the
               user experience. Slimscroll is required when using the
               fixed layout. -->
             </body>
             </html>
