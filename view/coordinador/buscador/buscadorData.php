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

                        <form action="Buscador" id="" class="form-material" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Basic Form-->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="text-center">Paciente</p>
                                            <div class="row">
                                                <!--start row-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="txt_buscador" name="txt_buscador" autocomplete="off" placeholder="Digite el Nombre o N° Documento o N° de Requimiento" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div><button type="submit" class="btn btn-outline-success w-100" name="btn-buscador" id="btn-buscador">BUSCAR DATOS <i class='bx bx-search-alt bx-spin'></i></button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>PACIENTE</th>
                                                <th>DOCU</th>
                                                <th>TIPO</th>
                                                <th>ORIGEN</th>
                                                <th>MES</th>
                                                <th>SERVICIO</th>
                                                <th>PROCEDENCIA</th>
                                                <th>PRIORIDAD</th>
                                                <th>AREA</th>
                                                <th>INCIDENTE</th>
                                                <th>USUARIO</th>
                                                <th><i class='bx bxs-file-pdf'></i></th>
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
                                                    <td class="text-center"><?php echo $data->nombre_origen ?></td>
                                                    <td><?php echo $data->mes_incidencia ?></td>
                                                    <td><?php echo $data->nombre_servicio ?></td>
                                                    <td class="text-center"><?php echo $data->nombre_procedencia ?></td>
                                                    <td class="text-center"><?php echo $data->nombre_prioridad ?></td>
                                                    <td><?php echo $data->nombre_area ?></td>
                                                    <td><?php echo $data->fecha_incidencia ?></td>
                                                    <td class="text-center"><?php echo $data->nombre_usuario ?></td>
                                                    <td><a class="btn btn-outline-danger" href="index.php?ruta=pdfIncidencia&id=<?php echo $data->id ?>" target="_blank"><i class='bx bxs-file-pdf bx-burst'></i></a></td>
                                                    <!--<td><input type="checkbox" name="ids[]" value="<?php echo $data->id ?>" class="update_checkbox"></td>-->
                                                    <td>
                                                        <?php if ($data->nombre_estado_semaforizacion == 'CERRADO') : ?>
                                                            <?php include('view/coordinador/modalSemaforizacion/modalEstadoCerradoSemaforizacion.php'); ?>
                                                        <?php else : ?>
                                                            <?php if ($data->tipo_semaforizacion == 'INCIDENCIA') : ?>
                                                                <?php include('view/coordinador/modalSemaforizacion/modalIncidencia.php'); ?>
                                                            <?php else : ?>
                                                                <?php include('view/coordinador/modalSemaforizacion/modalReclamo.php'); ?>
                                                            <?php endif  ?>
                                                        <?php endif  ?>
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
                <!-- Page-body end -->
            </div>
        </div>
    </div>
</section>
<!-- Page-header end -->


<?php include_once('view/template/footer.php'); ?>