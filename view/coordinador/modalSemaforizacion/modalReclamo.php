<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#boxEditarReclamo_<?php echo $data->id ?>">
    <i class='bx bx-edit bx-tada'></i>
</button>

<!--LLAVE DEL MODAL-->
<div class="modal fade" id="boxEditarReclamo_<?php echo $data->id ?>" tabindex="-1" aria-labelledby="boxEditarReclamo_" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="boxEditarReclamo_"><?php echo $data->tipo_semaforizacion ?> | PACIENTE: <?php echo $data->paciente ?></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <p class="">DATOS SEMAFORIZACION</p>
                    <p class="">FECHA DE INCIDENTE: <?php echo $data->fecha_incidencia ?></p>
                    <p class="">N# REQUERIMIENTO: <?php echo $data->num_requerimiento ?></p>
                    <p class="">PACIENTE: <?php echo $data->paciente ?></p>
                    <form action="ActualizarReclamo" id="frmSemaforizacionEditar_<?php echo $data->id ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">FECHA CIERRE</label>
                                    <input type="text" name="txt_id" id="txt_id" value="<?php echo $data->id ?>" hidden>
                                    <input type="datetime-local" name="txt_fecha_cierre" id="txt_fecha_cierre" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php if ($data->documento == 'docs/') : ?>
                                        <label class="form-control-label">SUBIR DOCUMENTO</label>
                                        <input type="file" name="txt_file" id="txt_file" class="form-control">
                                    <?php else : ?>
                                        <label class="form-control-label">DESCARGAR DOCUMENTO</label>
                                        <a title="Descargar Archivo" class="btn btn-success w-100" href="<?php echo $data->documento; ?>" download="<?php echo $data->documento; ?>"><i class='bx bx-downvote'></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="color-paus">CONCLUSION</label>
                                    <select class="form-control" name="txt_conclusion" id="txt_conclusion">
                                        <?php foreach ($dataCONCLUCION as $data) : ?>
                                            <option value="<?php echo $data->id_conclusion ?>"><?php echo $data->nombre_conclusion ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">DETALLE</label>
                                    <textarea name="txt_detalle_final" id="txt_detalle_final" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 mx-auto"><button type="submit" class="btn btn-primary w-100" name="btn-update-reclamo-Editar" id="btn-update-reclamo-Editar">Actulizar Datos<i class='bx bxs-right-arrow bx-fade-right'></i></button></div>
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