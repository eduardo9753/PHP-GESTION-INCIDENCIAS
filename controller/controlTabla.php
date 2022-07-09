<?php

//MODEL
include_once('model/modelTabla.php');
include_once('model/modelSemaforizacion.php');
include_once('model/modelAseets.php');
include_once('model/modelGraficoCoordinador.php');


//UTILS
include_once('utils/modelMensaje.php');
include_once('utils/modelSession.php');


//DATOS
include_once('data/usuario.php');



class ControlTabla
{

    public $MODELTABLA;
    public $MODELSEMAFORIZACION;
    public $GRAFICOCOOR;
    public $MSG;
    public $ASSETS;
    public $SESSION;


    public function __construct()
    {
        $this->MODELTABLA = new ModeloTabla();
        $this->MSG = new ModeloMensaje();
        $this->MODELSEMAFORIZACION = new ModeloSemaforizacion();
        $this->ASSETS = new ModeloAssets();
        $this->SESSION = new ModeloSession();
        $this->GRAFICOCOOR = new ModeloGraficoCood();
    }


    public function InidenciaPendiente()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            //color de links
            if (isset($_REQUEST['ruta']) == 'InidenciaPendiente') {
                $ruta = 'InidenciaPendiente';
                $active_seguimiento = "active";
                $show_seguimiento = "show";
                $flag_notificacion = 1;  //PARA ACTIVAR LAS NOTIFICACIONES
            }

            $titulo = "INCIDENCIAS EN ESTADO PENDIENTE";
            $id_usuario = $_SESSION["id_usuario"];

            $dataIncidencia = $this->MODELSEMAFORIZACION->dataIncidenciaPendiente($id_usuario);
            $dataCONCLUCION = $this->MODELTABLA->dataCONCLUCION();

            include_once('view/coordinador/tablas/IncidenciaPendiente.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function ReclamoPendiente()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            //color de links
            if (isset($_REQUEST['ruta']) == 'ReclamoPendiente') {
                $ruta = 'ReclamoPendiente';
                $active_seguimiento = "active";
                $show_seguimiento = "show";
            }

            $titulo = "RECLAMOS EN ESTADO PENDIENTE";

            $dataIncidencia = $this->MODELSEMAFORIZACION->dataReclamoPendiente();
            $dataCONCLUCION = $this->MODELTABLA->dataCONCLUCION();

            include_once('view/coordinador/tablas/ReclamoPendiente.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //echo "<script>alert('RECLAMOS PENDIENTES!'); window.location='InidenciaPendiente'</script>";
}
