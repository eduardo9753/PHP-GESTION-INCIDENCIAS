<?php include_once('view/template/head.php'); ?>

<?php include_once('view/template/menu/navJefe.php'); ?>


<!-- Dashboard Counts Section-->
<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-md-12">
                <h1 class="lead text-center">Totales Hasta Ahora : <?php echo $dataTotal ?></h1>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""># Incidencia Cerrada</label>
                                    <input type="text" name="txt_mes_actual" id="txt_mes_actual" value="<?php echo $this->ASSET->mesActualCadena(); ?>" hidden>
                                    <input type="text" class="form-control" name="txt_count_incidencia_cerrado" id="txt_count_incidencia_cerrado" value="<?php echo $countRegistroInidenciaCerrada ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""># Incidencia Pendiente</label>
                                    <input type="text" class="form-control" name="txt_count_incidencia_pendiente" id="txt_count_incidencia_pendiente" value="<?php echo $countRegistroInidenciaPendiente ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""># Reclamos Cerrados</label>
                                    <input type="text" class="form-control" name="txt_count_reclamos_cerrado" id="txt_count_reclamos_cerrado" value="<?php echo $countRegistroReclamoCerrado ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""># Reclamos Pendientes</label>
                                    <input type="text" class="form-control" name="txt_count_reclamos_pendiente" id="txt_count_reclamos_pendiente" value="<?php echo $countRegistroReclamoPendiente ?>" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <canvas id="grafica" width="" height=""></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Item -->
        </div>
    </div>
</section>


<?php include_once('view/template/footer.php'); ?>