<?php

include_once('config/conexionOracle.php');
include_once('config/conexionMysql.php');

class ModeloMensaje
{

  public $PDO;
  public $MYSQL;

  public function __construct()
  {
    try {
      $this->PDO = new ConexionOracle(); //INICIANDO LA CONEXION A LA BD
      $this->MYSQL = new ClassConexion();
    } catch (Exception $th) {
      throw $th;
    }
  }



  /****************************************MESAGES DE ALERTAS PARA MOSTRARLE AL USUARIO***********************/
  public function success($message = "")
  {
    $resultado = '
        <div class="alert alert-success alert-dismissible fade show mover-mensage" role="alert">
        <strong>Message !</strong> ' . $message . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    echo $resultado;
  }

  public function error($message = "")
  {
    $resultado = '
        <div class="alert alert-danger alert-dismissible fade show mover-mensage" role="alert">
        <strong>Message !</strong> ' . $message . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    echo $resultado;
  }


  public function successAlert($message = "", $ruta='')
  {
    echo "<script>Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'BIENVENID@',
      showConfirmButton: false,
      timer: 1500
  })</script>";
  }
  /************************************************************************************************************/
}
