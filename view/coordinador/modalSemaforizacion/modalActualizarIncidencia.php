<button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#boxActualizarIncidencia_<?php echo $data->id ?>">
    <i class='bx bx-message-edit bx-flashing'></i>
</button>

<!--LLAVE DEL MODAL-->
<div class="modal fade" id="boxActualizarIncidencia_<?php echo $data->id ?>" tabindex="-1" aria-labelledby="boxActualizarIncidencia_" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="boxActualizarIncidencia_"><?php echo $data->tipo_semaforizacion ?> | PACIENTE: <?php echo $data->paciente ?></h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <p class="p-0">DATOS SEMAFORIZACION</p>
                    <p class="">FECHA DE INCIDENTE: <?php echo $data->fecha_incidencia ?></p>
                    <p class="">N# REQUERIMIENTO: <?php echo $data->num_requerimiento ?></p>
                    <p class="">PACIENTE: <?php echo $data->paciente ?></p>
                    <form action="editarIncidencia" id="frmSemaforizacionEditar_<?php echo $data->id ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">DETALLE</label>
                                    <input type="text" name="txt_id" id="txt_id" value="<?php echo $data->id ?>" hidden>
                                    <textarea name="txt_detalle" id="txt_detalle" rows="7" placeholder="Resumen del Detalle" class="form-control"><?php echo $data->detalle ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">ACCION INMEDIATA</label>
                                    <textarea name="txt_accion_inmediata" id="txt_accion_inmediata" rows="7" placeholder="Resumen de la accion inmediata" class="form-control"><?php echo $data->accion_inmediata ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 mx-auto"><button type="submit" class="btn btn-primary w-100" name="btn-actualizar-incidencia" id="btn-actualizar-incidencia">Actulizar Datos<i class='bx bxs-right-arrow bx-fade-right'></i></button></div>
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