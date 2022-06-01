<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#boxEstadoCerradoSemaforizacion_<?php echo $data->id ?>">
    <i class='bx bx-check-square bx-tada'></i>
</button>

<!--LLAVE DEL MODAL-->
<div class="modal fade" id="boxEstadoCerradoSemaforizacion_<?php echo $data->id ?>" tabindex="-1" aria-labelledby="boxEstadoCerradoSemaforizacion_" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="boxEstadoCerradoSemaforizacion_"><?php echo $data->tipo_semaforizacion ?> | PACIENTE: <?php echo $data->paciente ?></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <p class="text-center">DATOS SEMAFORIZACION</p>
                    <p class="">FECHA DE INCIDENTE: <?php echo $data->fecha_incidencia ?></p>
                    <p class="">N# REQUERIMIENTO: <?php echo $data->num_requerimiento ?></p>
                    <p class="">PACIENTE: <?php echo $data->paciente ?></p>
                    <form action="" id="frmSemaforizacionEditar_<?php echo $data->id ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">FECHA INCIDENCIA</label>
                                    <input type="text" name="txt_id" id="txt_id" value="<?php echo $data->id ?>" hidden>
                                    <input type="" name="txt_fecha_incidencia" id="txt_fecha_incidencia" value="<?php echo $data->fecha_incidencia ?>" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">FECHA CIERRE</label>
                                    <input type="text" name="txt_id" id="txt_id" value="<?php echo $data->id ?>" hidden>
                                    <input type="" name="txt_fecha_cierre" id="txt_fecha_cierre" value="<?php echo $data->fecha_cierre ?>" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">ESTADO ACTUAL</label>
                                    <input type="text" name="txt_id" id="txt_id" value="<?php echo $data->nombre_estado_semaforizacion ?>" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php if ($data->documento == 'docs/') : ?>
                                        <label class="form-control-label">SUBIR DOCUMENTO</label>
                                        <input type="file" name="txt_file" id="txt_file"  class="form-control">
                                    <?php else : ?>
                                        <label class="form-control-label">DESCARGAR DOCUMENTO</label>
                                        <a title="Descargar Archivo" class="btn btn-success w-100" href="<?php echo $data->documento; ?>" download="<?php echo $data->documento; ?>"><i class='bx bx-downvote'></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="color-paus">CONCLUSION</label>
                                    <input type="text" name="txt_id" id="txt_id" value="<?php echo $data->nombre_conclusion ?>" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>