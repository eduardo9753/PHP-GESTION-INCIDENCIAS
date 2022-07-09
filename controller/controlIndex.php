<?php

//MODEL
include_once('model/modelLogin.php');
include_once('model/modelTabla.php');
include_once('model/modelAseets.php');


//UTILS
include_once('utils/modelMensaje.php');
include_once('utils/modelSession.php');

//DATOS
include_once('data/usuario.php');



class ControlIndex
{

    public $MODEL;
    public $MSG;
    public $TABLA;
    public $ASSETS;
    public $SESSION;

    public function __construct()
    {
        $this->MODEL = new ModeloLogin();
        $this->MSG = new ModeloMensaje();
        $this->TABLA = new ModeloTabla();
        $this->ASSETS = new ModeloAssets();
        $this->SESSION = new ModeloSession();
    }

    public  function index() //VISTA INDEX
    {
        include_once('view/login/login.php');
    }

    public function dashboardJefe()
    {
        //VER LA SESSION INICIADA  
        $this->SESSION->isSession();

        //color de links
        if (isset($_REQUEST['ruta']) == 'dashboard') {
            $ruta = 'dashboard';
        }

        $titulo = "Dasboard";
        include_once('view/jefe/dashboard/menu.php');
    }

    public function dashboardCoordinador()
    {
        //VER LA SESSION INICIADA  
        $this->SESSION->isSession();

        //echo "<script>alert('RECLAMOS PENDIENTES!'); window.location='InidenciaPendiente'</script>";

        //color de links
        if (isset($_REQUEST['ruta']) == 'dashboard') {
            $ruta = 'dashboard';
        }

        $titulo = "Dasboard";
        include_once('view/coordinador/dashboard/menu.php');
    }

    public function NoEncontrado()
    {
        include_once('view/404/noEncontrado.php');
    }


    public function Close()
    {
        try {
            session_start();
            $_SESSION['CONTROL'] = 0;
            $_SESSION['CONTROL'] = '';
            include_once('view/login/login.php');
        } catch (Exception $th) {
            throw $th->getMessage();
        }
    }
}
