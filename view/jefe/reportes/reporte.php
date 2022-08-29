<?php include_once('view/template/head.php'); ?>


<?php include_once('view/template/menu/navJefe.php'); ?>


<!-- Page-header end -->
<section class="forms">
    <div class="container-fluid">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-body start -->
                    <div class="page-body">

                        <?php $date = Date('Y-m-d') ?>
                        <div class="row">
                            <!-- Basic Form-->
                            <div class="col-lg-6">
                                <form action="ReporteGeneral" class="form-material" method="POST" enctype="multipart/form-data">

                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-center"><?php echo $titulo1; ?></p>
                                            <div class="row">
                                                <!--start row-->
                                                <div class="col-md-6">
                                                    <label for="">Tipo Incidencia</label>
                                                    <select name="cbo_tipo_semaforizacion" id="cbo_tipo_semaforizacion" class="form-control">
                                                        <option value="3">TODOS</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="">Tipo Estado</label>
                                                    <select name="cbo_estado_semaforizacion" id="cbo_estado_semaforizacion" class="form-control">
                                                        <option value="3">TODOS</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="">Fecha Inicio</label>
                                                    <input type="date" class="form-control" value="<?php echo $date ?>" name="txt_fecha_incidencia_inicio" id="txt_fecha_incidencia_inicio" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="">Fecha Fin</label>
                                                    <input type="date" class="form-control" value="<?php echo $date ?>" name="txt_fecha_incidencia_fin" id="txt_fecha_incidencia_fin" required>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div><input type="submit" class="btn btn-success w-100" value="Generar Reporte General Excel" id="btn-generar-excel-carta" name="btn-generar-excel-carta"></div>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                </form>
                            </div>



                            <div class="col-lg-6">
                                <form action="ReportePaus" class="form-material" method="POST" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-center"><?php echo $titulo2; ?></p>
                                            <div class="row">
                                                <!--start row-->
                                                <div class="col-md-6">
                                                    <label for="">Tipo Incidencia</label>
                                                    <select name="cbo_tipo_semaforizacion" id="cbo_tipo_semaforizacion" class="form-control">
                                                        <?php foreach ($dataTIPO_SEMAFORIZACION as $data) : ?>
                                                            <option value=" <?php echo $data->id_tipo_semaforizacion; ?>  "> <?php echo $data->tipo_semaforizacion; ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="">Tipo Estado</label>
                                                    <select name="cbo_estado_semaforizacion" id="cbo_estado_semaforizacion" class="form-control">
                                                        <?php foreach ($dataESTADO_SEMAFORIZACION as $data) : ?>
                                                            <option value=" <?php echo $data->id_estado_semaforizacion; ?>  "> <?php echo $data->nombre_estado_semaforizacion; ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="">Fecha Inicio</label>
                                                    <input type="date" class="form-control" value="<?php echo $date ?>" name="txt_fecha_incidencia_inicio" id="txt_fecha_incidencia_inicio" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="">Fecha Fin</label>
                                                    <input type="date" class="form-control" value="<?php echo $date ?>" name="txt_fecha_incidencia_fin" id="txt_fecha_incidencia_fin" required>
                                                </div>
                                                <div class="col-md-12 mt-4">
                                                    <div><input type="submit" class="btn btn-success w-100" value="Generar Excel por Estados" id="btn-generar-excel-carta" name="btn-generar-excel-carta"></div>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Page-body end -->
            </div>
        </div>
    </div>
</section>
<!-- Page-header end -->


<?php include_once('view/template/footer.php'); ?>