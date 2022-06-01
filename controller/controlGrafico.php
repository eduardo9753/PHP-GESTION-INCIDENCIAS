<?php

//MODEL
include_once('model/modelGrafico.php');
include_once('model/modelAseets.php');


//UTILS
include_once('utils/modelMensaje.php');
include_once('utils/modelSession.php');

//DATOS
include_once('data/usuario.php');



class ControlGrafico
{

    public $MODELOGRAFICO;
    public $MSG;
    public $SESSION;
    public $ASSET;

    public function __construct()
    {
        $this->MODELOGRAFICO = new ModeloGrafico;
        $this->MSG = new ModeloMensaje();
        $this->SESSION = new ModeloSession();
        $this->ASSET = new ModeloAssets();
    }


    public function GraficosJefe()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            $titulo = "Graficos";

            //color de links
            if (isset($_REQUEST['ruta']) == 'GraficosJefe') {
                $ruta = 'GraficosJefe';
            }

            $countRegistroInidenciaPendiente = $this->MODELOGRAFICO->countRegistroInidenciaPendiente();
            $countRegistroInidenciaCerrada = $this->MODELOGRAFICO->countRegistroInidenciaCerrada();
            $countRegistroReclamoPendiente = $this->MODELOGRAFICO->countRegistroReclamoPendiente();
            $countRegistroReclamoCerrado = $this->MODELOGRAFICO->countRegistroReclamoCerrado();
            $dataTotal = $this->MODELOGRAFICO->countTotal();

            include_once('view/jefe/graficos/graficos.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function GraficosCoordinador()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            $titulo = "Graficos";

            //color de links
            if (isset($_REQUEST['ruta']) == 'GraficosCoordinador') {
                $ruta = 'GraficosCoordinador';
            }

            $countRegistroInidenciaPendiente = $this->MODELOGRAFICO->countRegistroInidenciaPendiente();
            $countRegistroInidenciaCerrada = $this->MODELOGRAFICO->countRegistroInidenciaCerrada();
            $countRegistroReclamoPendiente = $this->MODELOGRAFICO->countRegistroReclamoPendiente();
            $countRegistroReclamoCerrado = $this->MODELOGRAFICO->countRegistroReclamoCerrado();
            $dataTotal = $this->MODELOGRAFICO->countTotal();

            include_once('view/coordinador/graficos/graficos.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
