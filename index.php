<?php

include_once('controller/controlBuscador.php');
include_once('controller/controlGrafico.php');
include_once('controller/controlIndex.php');
include_once('controller/controlLogin.php');
include_once('controller/controlProfile.php');
include_once('controller/controlReportes.php');
include_once('controller/controlSemaforizacion.php');
include_once('controller/controlTabla.php');

//PHP PDF
require_once 'lib/pdf/fpdf.php';

//PHP EXCEL
require_once 'lib/PHPExcel/Classes/PHPExcel.php';

//ZONA DE HORARIO
date_default_timezone_set("America/Lima");

//VARIABLES CONTROLADORES
$controlBuscador = new ControlBuscador();
$controlGrafico = new ControlGrafico();
$controlIndex = new ControlIndex();
$controlLogin = new ControlLogin();
$controlProfile = new ControlProfile();
$controlReportes = new ControlReportes();
$controlSemaforizacion = new ControlSemaforizacion();
$controlTabla = new ControlTabla();


//LLAMADA DE METODOS
if (!isset($_REQUEST['ruta'])) {
    $controlIndex->index();
} else {
    $peticion = $_REQUEST['ruta'];
    if (method_exists($controlBuscador, $peticion)) {
        call_user_func(array($controlBuscador, $peticion));
    } else if (method_exists($controlGrafico, $peticion)) {
        call_user_func(array($controlGrafico, $peticion));
    } else if (method_exists($controlIndex, $peticion)) {
        call_user_func(array($controlIndex, $peticion));
    } else if (method_exists($controlLogin, $peticion)) {
        call_user_func(array($controlLogin, $peticion));
    } else if (method_exists($controlProfile, $peticion)) {
        call_user_func(array($controlProfile, $peticion));
    } else if (method_exists($controlReportes, $peticion)) {
        call_user_func(array($controlReportes, $peticion));
    } else if (method_exists($controlSemaforizacion, $peticion)) {
        call_user_func(array($controlSemaforizacion, $peticion));
    } else if (method_exists($controlTabla, $peticion)) {
        call_user_func(array($controlTabla, $peticion));
    } else {
        $controlIndex->NoEncontrado();
    }
}


//CUANDO SE PONGAN ESPECIOS CON CARACTERES EXTRAÑOS "3#ffEf" ....
//BORRAR EL INDEX Y REALIZARLO DE NUEVO
