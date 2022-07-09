<?php

//MODEL
include_once('model/modelTabla.php');
include_once('model/modelGrafico.php');
include_once('model/modelAseets.php');
include_once('model/modelBuscador.php');
include_once('model/modelReportes.php');

//UTILS
include_once('utils/modelMensaje.php');
include_once('utils/modelSession.php');

//DATOS
include_once('data/usuario.php');
include_once('data/tipoSemaforizacion.php');
include_once('data/estadoSemaforizacion.php');


class ControlBuscador
{

    public $MODELTABLA;
    public $MODELOGRAFICO;
    public $MSG;
    public $SESSION;
    public $ASSET;
    public $BUSCADOR;
    public $REPORTES;

    public function __construct()
    {
        $this->MODELTABLA = new ModeloTabla();
        $this->MODELOGRAFICO = new ModeloGrafico;
        $this->MSG = new ModeloMensaje();
        $this->SESSION = new ModeloSession();
        $this->ASSET = new ModeloAssets();
        $this->BUSCADOR = new ModeloBuscador();
        $this->REPORTES = new ModeloReportes();
    }


    public function Buscador()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            $titulo = "Buscador";

            //color de links
            if (isset($_REQUEST['ruta']) == 'Buscador') {
                $ruta = 'Buscador';
            }
            $dataCONCLUCION = $this->MODELTABLA->dataCONCLUCION();

            if (isset($_POST['txt_buscador'])) {
                $caracter = $_POST['txt_buscador'];
                $dataIncidencia = $this->BUSCADOR->dataBuscador($caracter);
                include_once('view/coordinador/buscador/buscadorData.php');
            } else {
                include_once('view/coordinador/buscador/buscador.php');
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    public function BuscarDatos()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();
            $id_usuario = $_SESSION["id_usuario"];

            $titulo = "Buscador Por Fechas";

            //color de links
            if (isset($_REQUEST['ruta']) == 'BuscarDatos') {
                $ruta = 'BuscarDatos';
            }

            if (isset($_POST['txt_fecha_incidencia_inicio']) && isset($_POST['txt_fecha_incidencia_fin'])) {
                $fecha_inicio = $_POST['txt_fecha_incidencia_inicio'];
                $fecha_fin = $_POST['txt_fecha_incidencia_fin'];
                $dataBusquedaUsuario = $this->BUSCADOR->dataBuscarUsuario($fecha_inicio, $fecha_fin, $id_usuario);
                include_once('view/coordinador/reportes/reporteData.php');
            } else {
                include_once('view/coordinador/reportes/reporte.php');
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
