<?php include_once('view/template/head.php'); ?>


<?php include_once('view/template/menu/navCoordinador.php'); ?>


<!-- Page-header end -->
<section class="forms">
    <div class="container-fluid">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-body start -->
                    <div class="page-body">

                        <form action="insertIncidencia" id="frmAjaxSemaforizacion" class="form-material" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Basic Form-->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-center">Paciente</p>
                                            <div class="row">
                                                <!--start row-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">TIPO DOCUMENTO</label>
                                                        <select name="cbo_tipo_documento" id="cbo_tipo_documento" class="form-control">
                                                            <?php foreach ($dataTIPO_DOCUMENTO as $data) : ?>
                                                                <option value="<?php echo $data->id_tipo_documento ?>"><?php echo utf8_encode($data->nombre_documento) ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">NUMERO DE DOCUMENTO</label>
                                                        <input type="text" value="" name="txt_numero_documento" id="txt_numero_documento" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">PACIENTE</label>
                                                        <input type="text" value="" name="txt_paciente" id="txt_paciente" placeholder="Nombre del Paciente" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">TIPO PACIENTE</label>
                                                        <select name="cbo_tipo_paciente" id="cbo_tipo_paciente" class="form-control">
                                                            <?php foreach ($dataTIPO_PACIENTE as $data) : ?>
                                                                <option value="<?php echo $data->id_tipo_paciente ?>"><?php echo $data->nombre_tipo_paciente ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end row-->

                                            <!--start row-->
                                            <div class="row">
                                                <!--end row-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">ORIGEN</label>
                                                        <select name="cbo_origen" id="cbo_origen" class="form-control">
                                                            <?php foreach ($dataORIGEN as $data) : ?>
                                                                <option value="<?php echo $data->id_origen ?>"><?php echo $data->nombre_origen ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!--ADMINISTRATIVO-->
                                                <div class="col-md-6 none-administrativo">
                                                    <div class="form-group">
                                                        <label class="form-control-label">AREA</label>
                                                        <select name="cbo_area_admin" id="cbo_area_admin" class="form-control">
                                                            <option value="administrativo">
                                                                <--SELECCIONE-->
                                                            </option>
                                                            <?php foreach ($dataAdministrativo as $data) : ?>
                                                                <option value="<?php echo $data->id_area ?>"><?php echo $data->nombre_area ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!--MEDICO-->
                                                <div class="col-md-6 none-medico">
                                                    <div class="form-group">
                                                        <label class="form-control-label">AREA</label>
                                                        <select name="cbo_area_medico" id="cbo_area_medico" class="form-control">
                                                            <option value="medico">
                                                                <--SELECCIONE-->
                                                            </option>
                                                            <?php foreach ($dataMedico as $data) : ?>
                                                                <option value="<?php echo $data->id_area ?>"><?php echo $data->nombre_area ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--ASISTENCIAL-->
                                                <div class="col-md-6 none-asistencial">
                                                    <div class="form-group">
                                                        <label class="form-control-label">AREA</label>
                                                        <select name="cbo_area_asisten" id="cbo_area_asisten" class="form-control">
                                                            <option value="asistencial">
                                                                <--SELECCIONE-->
                                                            </option>
                                                            <?php foreach ($dataAsistencial as $data) : ?>
                                                                <option value="<?php echo $data->id_area ?>"><?php echo $data->nombre_area ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--OTROS-->
                                                <div class="col-md-6 none-otro">
                                                    <div class="form-group">
                                                        <label class="form-control-label">AREA</label>
                                                        <select name="cbo_area_otro" id="cbo_area_otro" class="form-control">
                                                            <option value="otro">
                                                                <--SELECCIONE-->
                                                            </option>
                                                            <?php foreach ($dataOtro as $data) : ?>
                                                                <option value="<?php echo $data->id_area ?>"><?php echo $data->nombre_area ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end row-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>

                                <!-- Basic Form-->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-center">Area</p>
                                            <!--start row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">ESPECIALIDAD</label>
                                                        <select name="cbo_especialidad" id="cbo_especialidad" class="form-control">
                                                            <?php foreach ($dataESPECIALIDAD as $data) : ?>
                                                                <option value="<?php echo $data->id_especialidad ?>"><?php echo $data->nombre_especialidad ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">PERSONAL INVOLUCRADO</label>
                                                        <input type="text" name="txt_personal_involucrado" placeholder="Digite el Personal si aplica" id="txt_personal_involucrado" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">SERVICIO</label>
                                                        <select name="cbo_servicio" id="cbo_servicio" class="form-control">
                                                            <?php foreach ($dataSERVICIO as $data) : ?>
                                                                <option value="<?php echo $data->id_servicio ?>"><?php echo $data->nombre_servicio ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 none-habitacion">
                                                    <div class="form-group">
                                                        <label class="form-control-label">HABITACION</label>
                                                        <select class="form-control" name="cbo_habitacion" id="cbo_habitacion">
                                                            <?php foreach ($dataHABITACION as $data) : ?>
                                                                <option value="<?php echo $data->id_habitacion ?>"><?php echo $data->nombre_habitacion ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">PROCEDENCIA</label>
                                                        <select name="cbo_procedencia" id="cbo_procedencia" class="form-control">
                                                            <?php foreach ($dataPROCEDENCIA as $data) : ?>
                                                                <option value="<?php echo $data->id_procedencia ?>"><?php echo $data->nombre_procedencia ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 none-numero">
                                                    <div class="form-group">
                                                        <label class="form-control-label">NUMERO</label>
                                                        <input type="text" name="txt_numero" id="txt_numero" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-3 none-tomo">
                                                    <div class="form-group">
                                                        <label class="form-control-label">TOMO</label>
                                                        <input type="text" value="" name="txt_tomo" id="txt_tomo" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <!-- Basic Form-->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-center">Registro de Incidencias</p>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">CAUSA</label>
                                                        <select name="cbo_causa" id="cbo_causa" class="form-control">
                                                            <?php foreach ($dataCAUSA as $data) : ?>
                                                                <option value="<?php echo $data->id_causa ?>"><?php echo $data->nombre_causa ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">CAUSA ESPECIFICA</label>
                                                        <select name="cbo_causa_especifica" id="cbo_causa_especifica" class="form-control">
                                                            <?php foreach ($dataCAUSA_ESPECIFICA as $data) : ?>
                                                                <option value="<?php echo $data->id_causa_especifica ?>"><?php echo $data->nombre_causa_especifica ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>-->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">CAUSA ESPECIFICA</label>
                                                        <select name="cbo_causa_especifica" id="cbo_causa_especifica" class="form-control">
                                                          <option value="0">Seleccione La Causa Especifica</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">DETALLE</label>
                                                        <textarea name="txt_detalle" id="txt_detalle" rows="4" placeholder="Resumen del Detalle" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">ACCION INMEDIATA</label>
                                                        <textarea name="txt_accion_inmediata" id="txt_accion_inmediata" rows="4" placeholder="Resumen de la accion inmediata" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>

                                <!-- Basic Form-->
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-center">Respuesta</p>
                                            <!--start row-->
                                            <div class="row">
                                                <!--start row-->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">PRIORIDAD</label>
                                                        <select name="cbo_prioridad" id="cbo_prioridad" class="form-control">
                                                            <?php foreach ($dataPRIORIDAD as $data) : ?>
                                                                <option value="<?php echo $data->id_prioridad ?>"><?php echo $data->nombre_prioridad ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label class="form-control-label">ESTADO</label>
                                                        <select name="estado_semaforizacion" id="estado_semaforizacion" class="form-control">
                                                            <?php foreach ($dataESTADO_SEMAFORIZACION as $data) : ?>
                                                                <option value="<?php echo $data->id_estado_semaforizacion ?>"><?php echo $data->nombre_estado_semaforizacion ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 none-fecha-cierre">
                                                    <div class="form-group">
                                                        <label class="form-control-label">FECHA CIERRE</label>
                                                        <input type="datetime-local" name="txt_fecha_cierre" id="txt_fecha_cierre" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 none-conclusion">
                                                    <div class="form-group">
                                                        <label class="form-control-label">CONCLUSION</label>
                                                        <select name="cbo_conclusion" id="cbo_conclusion" class="form-control">
                                                            <?php foreach ($dataCONCLUCION as $data) : ?>
                                                                <option value="<?php echo $data->id_conclusion ?>"><?php echo $data->nombre_conclusion ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">SUBIR FILE</label>
                                                        <input type="file" class="form-control" name="txt_file" id="txt_file">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 my-2">
                                                    <div class="d-flex justify-content-between">
                                                        <?php foreach ($dataTIPO_SEMAFORIZACION as $data) : ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" required type="radio" name="tipo_semaforizacion" value="<?php echo $data->id_tipo_semaforizacion; ?>" id="<?php echo $data->id_tipo_semaforizacion; ?>">
                                                                <label class="form-check-label" for="<?php echo $data->id_tipo_semaforizacion; ?>">
                                                                    <?php echo $data->tipo_semaforizacion; ?>
                                                                </label>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div><input type="submit" class="btn btn-primary w-100" value="Registrar" id="btn-registrar-semaforizacion" name="btn-registrar-semaforizacion"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Page-body end -->
            </div>
        </div>
    </div>
</section>
<!-- Page-header end -->


<?php include_once('view/template/footer.php'); ?>