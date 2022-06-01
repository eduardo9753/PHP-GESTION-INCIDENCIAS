<?php

include_once('config/conexionOracle.php');
include_once('config/conexionMysql.php');

class ModeloAssets
{

    public $PDO;
    public $MYSQL;

    public function __construct()
    {
        try {
            $this->PDO = new ConexionOracle(); //INICIANDO LA CONEXION A LA BD
            $this->MYSQL = new ClassConexion();
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function mesActualCadena()
    {
        $meses = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");
        $mesActual = $meses[date('n') - 1];
        return $mesActual;
    }


    //FUNCION QUE RETORNA DIAS QUE QUEDA ENTRE 
    //LAS FECHAS REGISTRADAS EN LA BASE DE DATOS
    public function verColorTiempo($fecha_inicialDB = '', $fecha_finalDB = '')
    {
        try {
            date_default_timezone_set("America/Lima");

            $fecha_final = date_create($fecha_finalDB);       //fecha mayor
            $fecha_inicial = date_create($fecha_inicialDB);   //fecha menor

            $intervalo = date_diff($fecha_inicial, $fecha_final);

            $tiempo = array();

            foreach ($intervalo as $valor) :
                $tiempo[] = $valor;
            endforeach;

            $dia = $tiempo[2]; //accede al dia : [0] -> 2
            $datos = array();

            if ($dia >= 1 && $dia <= 3) {
                $color = 'btn btn-danger';
                $dia = $dia;

                $datos = [
                    "color" => $color,
                    "dia"   => $dia
                ];
            } else if ($dia >= 4 && $dia <= 10) {
                $color = 'btn btn-warning';
                $dia = $dia;

                $datos = [
                    "color" => $color,
                    "dia"   => $dia
                ];
            } else if ($dia >= 11 && $dia <= 10) {
                $color = 'btn btn-success';
                $dia = $dia;

                $datos = [
                    "color" => $color,
                    "dia"   => 0
                ];
            } else if ($dia >= 12 && $dia <= 30) {
                $color = 'btn btn-primary';
                $dia = $dia;

                $datos = [
                    "color" => $color,
                    "dia"   => $dia
                ];
            } else {
                $color = 'btn btn-primary';
                $dia = 0;

                $datos = [
                    "color" => $color,
                    "dia"   => $dia
                ];
            }

            return $datos;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //FUNCION QUE RETORNA DIAS QUE QUEDA EN FUNCION DEL
    //TIEMPO, TE RETORNA EL DIA QUE QUEDA Y EL COLOR
    public function verDiasQueQueda($fecha_vencimientoBD)
    {
        try {
            date_default_timezone_set("America/Lima");
            $fecha_actual = date('Y-m-d'); //FECHA DINAMICA DE HOY

            $fecha_final = date_create($fecha_vencimientoBD); //fecha mayor
            $fecha_inicial = date_create($fecha_actual);    //fecha menor

            $intervalo = date_diff($fecha_inicial, $fecha_final);

            $tiempo = array();

            foreach ($intervalo as $valor) :
                $tiempo[] = $valor;
            endforeach;

            $dia = $tiempo[2]; //accede al dia : [0] -> 2
            $datos = array();

            if ($fecha_final < $fecha_inicial) {
                $color = 'btn btn-danger';
                $dia = 0;

                $datos = [
                    "color" => $color,
                    "dia"   => $dia
                ];
            } else {

                if ($dia >= 1 && $dia <= 3) {
                    $color = 'btn btn-danger';
                    $dia = $dia;

                    $datos = [
                        "color" => $color,
                        "dia"   => $dia
                    ];
                } else if ($dia >= 4 && $dia <= 10) {
                    $color = 'btn btn-warning';
                    $dia = $dia;

                    $datos = [
                        "color" => $color,
                        "dia"   => $dia
                    ];
                } else if ($dia >= 11 && $dia <= 10) {
                    $color = 'btn btn-success';
                    $dia = $dia;

                    $datos = [
                        "color" => $color,
                        "dia"   => 0
                    ];
                } else if ($dia >= 12 && $dia <= 30) {
                    $color = 'btn btn-primary';
                    $dia = $dia;

                    $datos = [
                        "color" => $color,
                        "dia"   => $dia
                    ];
                } else {
                    $color = 'btn btn-dark';
                    $dia = 0;

                    $datos = [
                        "color" => $color,
                        "dia"   => $dia
                    ];
                }
            }
            return $datos;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //LIMPIAR CAJAS
    public function CLEAR($caja)
    {
        try {
            $texto = filter_var($caja, FILTER_SANITIZE_STRING);
            return $texto;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //REEMPLAZAR CARACTER EXTRAÑOS/SIGNOS/TILDES
    public function CLEAN($cadena)
    {
        //Reemplazamos la A y a
        $cadena = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
            array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
            $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
            $cadena
        );

        //Reemplazamos la I y i
        $cadena = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $cadena
        );

        //Reemplazamos la O y o
        $cadena = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $cadena
        );

        //Reemplazamos la U y u
        $cadena = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $cadena
        );

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç'),
            array('N', 'n', 'C', 'c'),
            $cadena
        );

        $cadena = str_replace(
            array('°', ' ', '-','ï»¿'),
            array('_', '_', '_',''),
            $cadena
        );

        return $cadena;
    }
}
