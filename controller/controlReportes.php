<?php

//MODEL
include_once('model/modelSemaforizacion.php');
include_once('model/modelAseets.php');
include_once('model/modelLogin.php');
include_once('model/modelReportes.php');;

//UTILS
include_once('utils/modelMensaje.php');
include_once('utils/modelSession.php');

//DATOS
include_once('data/usuario.php');
include_once('data/semaforizacion.php');
include_once('data/tipoSemaforizacion.php');
include_once('data/estadoSemaforizacion.php');



class ControlReportes
{
    public $MODELSEMAFORIZACION;
    public $ASSETS;
    public $MSG;
    public $MODELTABLA;
    public $SESSION;
    public $REPORTES;

    public function __construct()
    {
        $this->MODELSEMAFORIZACION = new ModeloSemaforizacion();
        $this->ASSETS = new ModeloAssets();
        $this->MSG = new ModeloMensaje();
        $this->MODELTABLA = new ModeloTabla();
        $this->SESSION = new ModeloSession();
        $this->REPORTES = new ModeloReportes();
    }


    public function pdfIncidencia()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            if (isset($_REQUEST['id'])) {
                $semaforizacion = new Semaforizacion();
                $semaforizacion->setid($_REQUEST['id']);

                $dataIncidenciaPDF =  $this->REPORTES->dataPDFIncidencia($semaforizacion);

                include_once('view/coordinador/pdf/incidencia.php');
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function pdfReclamo()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            if (isset($_REQUEST['id'])) {
                $semaforizacion = new Semaforizacion();
                $semaforizacion->setid($_REQUEST['id']);

                $dataIncidenciaPDF =  $this->REPORTES->dataPDFIncidencia($semaforizacion);
                include_once('view/coordinador/pdf/reclamos.php');
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //vista del reporte
    public function Reporte()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            $titulo = "PORTES PAUS";
            $titulo1 = "REPORTE GENERAL - PAUS";
            $titulo2 = "REPORTE POR ESTADOS - PAUS";

            //color de links
            if (isset($_REQUEST['ruta']) == 'Reporte') {
                $ruta = 'Reporte';
            }

            $dataTIPO_SEMAFORIZACION = $this->MODELTABLA->dataTIPO_SEMAFORIZACION();
            $dataESTADO_SEMAFORIZACION = $this->MODELTABLA->dataESTADO_SEMAFORIZACION();
            include_once('view/jefe/reportes/reporte.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //generacion del excel
    public function ReportePaus()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            //color de links
            if (isset($_REQUEST['ruta']) == 'ReportePaus') {
                $ruta = 'Reporte';
            }

            $tipo_semaforizacion = new tipoSemaforizacion();
            $estado_semaforizacion = new EstadoSemaforizacion();

            $tipo_semaforizacion->setid_tipo_semaforizacion($_POST['cbo_tipo_semaforizacion']);
            $estado_semaforizacion->setid_estado_semaforizacion($_POST['cbo_estado_semaforizacion']);
            $fecha_inicio_incidencia = $_POST['txt_fecha_incidencia_inicio'];
            $fecha_fin_incidencia = $_POST['txt_fecha_incidencia_fin'];
            $dataExcelPaus = $this->REPORTES->dataExcel($tipo_semaforizacion, $estado_semaforizacion, $fecha_inicio_incidencia, $fecha_fin_incidencia);
            include_once('view/jefe/excel/excelEstadoPaus.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    public function ReporteGeneral()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            //color de links
            if (isset($_REQUEST['ruta']) == 'ReportePaus') {
                $ruta = 'Reporte';
            }

            $tipo_semaforizacion = new tipoSemaforizacion();
            $estado_semaforizacion = new EstadoSemaforizacion();

            $tipo_semaforizacion->setid_tipo_semaforizacion($_POST['cbo_tipo_semaforizacion']);
            $estado_semaforizacion->setid_estado_semaforizacion($_POST['cbo_estado_semaforizacion']);
            $fecha_inicio_incidencia = $_POST['txt_fecha_incidencia_inicio'];
            $fecha_fin_incidencia = $_POST['txt_fecha_incidencia_fin'];

            $dataExcelPaus = $this->REPORTES->dataExcelGeneral($fecha_inicio_incidencia, $fecha_fin_incidencia);
            include_once('view/jefe/excel/excelEstadoPaus.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
