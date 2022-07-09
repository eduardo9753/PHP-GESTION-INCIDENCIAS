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
                                                <th><i class='bx bxs-file-pdf'></i></th>
                                                <th>VIEW</th>
                                            </tr>
                                        </thead>
                                        <tbody>

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