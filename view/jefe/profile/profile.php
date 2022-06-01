<?php include_once('view/template/head.php'); ?>


<?php include_once('view/template/menu/navJefe.php'); ?>


<!-- Page-header end -->
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-close">
                        <div class="dropdown">
                            <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                            <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h3 class="h4 text-center">PROFILE</h3>
                    </div>
                    <div class="card-body">
                        <form action="update" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">USUARIO ACTUAL</label>
                                        <input type="text" class="form-control" name="txt_usuario" value="<?php echo $_SESSION['nombre_usuario'] ?>" id="txt_usuario">
                                    </div>

                                    <div class="form-group">
                                        <label for="">CONTRASEÑA ACTUAL</label>
                                        <input type="text" class="form-control" name="txt_pass" value="<?php echo $_SESSION['contra_usuario'] ?>" id="txt_pass">
                                    </div>

                                    <div class="form-group">
                                        <label for="">PERFIL</label>
                                        <input type="text" readonly class="form-control" name="txt_perfil" value="<?php echo $_SESSION['perfil'] ?>" id="txt_perfil">
                                    </div>

                                    <div class="form-group">
                                        <label for="">AREA</label>
                                        <input type="text" readonly class="form-control" name="txt_area" id="txt_area" value="<?php echo $_SESSION['area_usuario']; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="morado my-2">Seleccione una Foto</label>
                                        <input type="file" name="file" class="form-control" accept=".jpg, .jpeg, .png" id="img">
                                        <div class="text-center my-3 img-vista"> <img src="" id="imgPreview" alt="imgPreview" class="img-fluid"></div>
                                    </div>

                                    <div class="form-group text-center">
                                        <label for="" class="morado my-2">Foto Actual</label>
                                        <img src="<?php echo $_SESSION['foto']; ?>" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div><button type="submit" class="btn btn-dark w-100" name="btn-update-profile" id="btn-update-profile">UPDATE PROFILE</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page-header end -->


<?php include_once('view/template/footer.php'); ?>