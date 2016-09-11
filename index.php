<?php require("topo.php");
require ("functions.php");
?>

<div class="row">
  <div class="col-lg-12">
    <ol class="breadcrumb">
      <li class="active"><i class="fa fa-dashboard"></i> Últimos produtos cadastrados</li>
    </ol>
  </div>
</div><!-- /.row -->

<div class="col-lg-12">
</div>
<div class="panel-body">
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Produto</th>
          <th>Descricao</th>
          <th>Valor</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while($res=mysql_fetch_array($sql)) {
         $codigo = $res[0];
         $produto = $res[1];
         $descricao = $res[2];
         $estoque = $res[3];
         $codigo_original = $res[4];
         $codigo_paralelo = $res[5];
         $preco = $res[6];
         $promocao = $res[7];
         $i++;
         $css = ($i % 2 == 0) ? 'style="background: #FFF;"' : 'style="background: #e7e7e7;"';
         ?>

         <tr <?php echo $css ?>>
           <td class=centro><?php echo $codigo; ?> </td>
           <td class=centro><?php echo $produto; ?></td>
           <td class=esquerda><?php echo $descricao; ?></td>
           <td class=centro><?php echo formata_dinheiro($preco); ?></td>
         </tr>
         <?php
       }
       ?>

     </tbody>
   </table>
 </div>
 <div class="text-right">

 </div>
</div>
</div><!-- /.row -->


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