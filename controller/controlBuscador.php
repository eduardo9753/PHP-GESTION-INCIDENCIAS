<?php

//MODEL
include_once('model/modelTabla.php');
include_once('model/modelGrafico.php');
include_once('model/modelAseets.php');
include_once('model/modelBuscador.php');

//UTILS
include_once('utils/modelMensaje.php');
include_once('utils/modelSession.php');

//DATOS
include_once('data/usuario.php');



class ControlBuscador
{

    public $MODELTABLA;
    public $MODELOGRAFICO;
    public $MSG;
    public $SESSION;
    public $ASSET;
    public $BUSCADOR;

    public function __construct()
    {
        $this->MODELTABLA = new ModeloTabla();
        $this->MODELOGRAFICO = new ModeloGrafico;
        $this->MSG = new ModeloMensaje();
        $this->SESSION = new ModeloSession();
        $this->ASSET = new ModeloAssets();
        $this->BUSCADOR = new ModeloBuscador();
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
}
