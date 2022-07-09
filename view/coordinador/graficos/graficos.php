<?php include_once('view/template/head.php'); ?>

<?php include_once('view/template/menu/navCoordinador.php'); ?>


<!-- Dashboard Counts Section-->
<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""># Inc Cerrada</label>
                                    <input type="text" name="txt_mes_actual" id="txt_mes_actual" value="<?php echo $this->ASSET->mesActualCadena(); ?>" hidden>
                                    <input type="text" class="form-control" name="txt_count_incidencia_cerrado_coord" id="txt_count_incidencia_cerrado_coord" value="<?php echo $countRegistroInidenciaCerradaCoordinador ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""># Inc Pendiente</label>
                                    <input type="text" class="form-control" name="txt_count_incidencia_pendiente_coord" id="txt_count_incidencia_pendiente_coord" value="<?php echo $countRegistroInidenciaPendienteCoordinador ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""># Recl Cerrados</label>
                                    <input type="text" class="form-control" name="txt_count_reclamos_cerrado_coord" id="txt_count_reclamos_cerrado_coord" value="<?php echo $countRegistroReclamoCerradoCoordinador ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""># Recl Pendientes</label>
                                    <input type="text" class="form-control" name="txt_count_reclamos_pendiente_coord" id="txt_count_reclamos_pendiente_coord" value="<?php echo $countRegistroReclamoPendienteCoordinador ?>" disabled>
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