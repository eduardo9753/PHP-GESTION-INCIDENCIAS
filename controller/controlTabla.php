<?php

//MODEL
include_once('model/modelTabla.php');
include_once('model/modelSemaforizacion.php');
include_once('model/modelAseets.php');


//UTILS
include_once('utils/modelMensaje.php');
include_once('utils/modelSession.php');


//DATOS
include_once('data/usuario.php');



class ControlTabla
{

    public $MODELTABLA;
    public $MODELSEMAFORIZACION;
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
            }

            $titulo = "INCIDENCIAS EN ESTADO PENDIENTE";

            $dataIncidencia = $this->MODELSEMAFORIZACION->dataIncidenciaPendiente();
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
}
