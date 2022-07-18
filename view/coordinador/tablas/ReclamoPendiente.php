<?php include_once('view/template/head.php'); ?>


<?php include_once('view/template/menu/navCoordinador.php'); ?>


<!-- Page-header end -->
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Tabla</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>PACIENTE</th>
                                        <th>DOCUMENTO</th>
                                        <th>TIPO</th>
                                        <th>ORIGEN</th>
                                        <th>MES</th>
                                        <th>SERVICIO</th>
                                        <th>PROCEDENCIA</th>
                                        <th>PRIORIDAD</th>
                                        <th>AREA</th>
                                        <th>FECHA</th>
                                        <th>USUARIO</th>
                                        <th>PDF</th>
                                        <th>VIEW</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataIncidencia as $data) : ?>
                                        <tr>
                                            <th scope="row"><?php echo $data->num_requerimiento ?></th>
                                            <td><?php echo $data->paciente ?></td>
                                            <td><?php echo $data->numero_documento ?></td>
                                            <td><?php echo $data->nombre_tipo_paciente ?></td>
                                            <td><?php echo $data->nombre_origen ?></td>
                                            <td><?php echo $data->mes_incidencia ?></td>
                                            <td><?php echo $data->nombre_servicio ?></td>
                                            <td><?php echo $data->nombre_procedencia ?></td>
                                            <td class="text-center"><?php echo $data->nombre_prioridad ?></td>
                                            <td><?php echo $data->nombre_area ?></td>
                                            <td><?php echo $data->fecha_incidencia ?></td>
                                            <td class="text-center"><?php echo $data->nombre_usuario ?></td>
                                            <td><a class="btn btn-outline-danger" href="index.php?ruta=pdfReclamo&id=<?php echo $data->id ?>" target="_blank"><i class='bx bxs-file-pdf bx-burst'></i></a></td>
                                            <td>
                                                <?php include('view/coordinador/modalSemaforizacion/modalReclamo.php'); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page-header end -->



<?php include_once('view/template/footer.php'); ?>