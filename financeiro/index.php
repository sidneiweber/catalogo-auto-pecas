<?php 
require '../topo.php';
require('../Config.inc.php');
require('../Classes/Conexao.class.php');
require('../Classes/ContasPagar.class.php');
//$conn = new Conexao();

$conexao = new Conexao();
$db = $conexao->getConnection();

/*
 * Chama o método getAllArtigo() que retorna um array de objetos
 */
$contaspagar = new ContasPagar($db);
$dados = $contaspagar->contasPagarHoje();
?>

<div class="row">
          <div class="col-lg-12">
              <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Gerenciar boletos</li>
            </ol>
          </div>
        </div><!-- /.row -->

<div class="row">
<div class="col-lg-4">
  <div class="panel panel-danger">
    <div class="panel-heading"> 
      <h3 class="panel-title"><i class="fa fa-money"></i> Contas a pagar nesse mês</h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th>Mês</th>
              <th>Total</th>

            </tr>
          </thead>
          <tbody>
            
          <td><?php echo $contaspagar->getNomeMes(date('m')) ?></td>
          <td><?php echo $contaspagar->contasMes() ?></td>


          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<div class="col-lg-4">
  <div class="panel panel-danger">
    <div class="panel-heading"> 
      <h3 class="panel-title"><i class="fa fa-money"></i>Contas a pagar próximo mês</h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th>Mês</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            
            <td><?php echo $contaspagar->getNomeMes(date('m', strtotime('+1 months'))) ?></td>
            <td><?php echo $contaspagar->contasProximoMes() ?></td>


          </tbody>
        </table>
      </div>
      </div>
  </div>
</div>

 <div class="col-lg-8">
            <div class="panel panel-danger">
              <div class="panel-heading"> 
                  <h3 class="panel-title"><i class="fa fa-money"></i> Boletos do dia: <?php $contaspagar->getHoje(); ?> <form method="GET" name="consulta_data" action="busca_boleto.php">
<fieldset>
<!--<label for="consulta">Buscar boleto de um dia especifico:</label>-->
<label for="consulta_data">Escolha uma data especifica : </label>
<input id="consulta_data" name="consulta_data" type="date" value=""/>
<!-- <input type="text" id="consulta" name="consulta" maxlength="255" /> -->
<input type="submit" value="OK" />
</form></h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Fornecedor</th>
                        <th>Nr Documento</th>
                        <th>Data</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($dados as $reg): ?>
                        <tr> 
                            <td><?php echo $reg->fornecedor; ?> </td>
                            <td><?php echo $reg->numero_documento; ?></td>
                            <td><?php echo implode("/",array_reverse(explode("-",$reg->data))); ?></td>
                            <td><?php echo $reg->valor; ?></td>
                            <td>
                            <?php
                              if($status == "pago"):
                                echo '<span class="label label-success">Pago</span>';
                              else:
                                echo '<span class="label label-danger">Aberto</span>';
                              endif;?>
                            </td>
   <!-- <td class=centro><?php echo $hoje; ?></td>-->
    <td><a class='iframe' href="alterar_boleto.php?id=<?php echo $reg->id; ?>"><img src=images/editar.png width="24" height="24"/></a></td>
</tr>
<?php endforeach;?>

                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                <span style="font-size:18px; color:#F00">Total do dia: <?php echo $contaspagar->totalContasHoje() ?></span>
                  <!-- <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
              </div>
            </div>
          </div>

        </div><!-- /.row -->





 <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

    <!-- MODAL -->
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

  </body>
</html>
