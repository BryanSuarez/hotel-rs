<div class="container">
    <h3 class="text-center">Recorriendo data</h3>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <?php 
                foreach ($consulta->result() as $fila) { ?>

                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"><?= $fila->title ?></h3>
                  </div>
                  <div class="panel-body">
                    <?= $fila->description ?>
                  </div>
                </div>
            
            <?php       
                }
            ?>
        </div>
    </div>
</div>