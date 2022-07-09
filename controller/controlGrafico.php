<?php

//MODEL
include_once('model/modelGrafico.php');
include_once('model/modelGraficoCoordinador.php');
include_once('model/modelAseets.php');


//UTILS
include_once('utils/modelMensaje.php');
include_once('utils/modelSession.php');

//DATOS
include_once('data/usuario.php');



class ControlGrafico
{

    public $MODELOGRAFICO;
    public $GRAFICOCOOR;
    public $MSG;
    public $SESSION;
    public $ASSET;

    public function __construct()
    {
        $this->MODELOGRAFICO = new ModeloGrafico;
        $this->MSG = new ModeloMensaje();
        $this->SESSION = new ModeloSession();
        $this->ASSET = new ModeloAssets();
        $this->GRAFICOCOOR = new ModeloGraficoCood();
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
            $id_usuario = $_SESSION["id_usuario"];

            $titulo = "Mis Estadisticas del Mes de : " . $this->ASSET->mesActualCadena() . " - " . $_SESSION["nombre_usuario"];

            //color de links
            if (isset($_REQUEST['ruta']) == 'GraficosCoordinador') {
                $ruta = 'GraficosCoordinador';
            }

            $countRegistroInidenciaPendienteCoordinador = $this->GRAFICOCOOR->countRegistroInidenciaPendienteCoordinador($id_usuario);
            $countRegistroInidenciaCerradaCoordinador = $this->GRAFICOCOOR->countRegistroInidenciaCerradaCoordinador($id_usuario);
            $countRegistroReclamoPendienteCoordinador = $this->GRAFICOCOOR->countRegistroReclamoPendienteCoordinador($id_usuario);
            $countRegistroReclamoCerradoCoordinador = $this->GRAFICOCOOR->countRegistroReclamoCerradoCoordinador($id_usuario);

            include_once('view/coordinador/graficos/graficos.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
