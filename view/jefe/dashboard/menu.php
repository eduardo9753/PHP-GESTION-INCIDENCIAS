<?php include_once('view/template/head.php'); ?>


<?php include_once('view/template/menu/navJefe.php'); ?>


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
          <div class="card-header d-flex align-items-center text-center">
            <h3 class="text-center">Enlaces Directos</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="alert alert-danger" role="alert">
                  <a href="Reporte" class="btn btn-outline-primary w-100">Reportes</a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="alert alert-warning" role="alert">
                  <a href="GraficosJefe" class="btn btn-outline-primary w-100">Graficos</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Page-header end -->


<?php include_once('view/template/footer.php'); ?>