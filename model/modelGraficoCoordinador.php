<?php

use PhpOffice\PhpSpreadsheet\Shared\Date;

include_once('config/conexionOracle.php');
include_once('config/conexionMysql.php');

class ModeloGraficoCood
{

    public $PDO;
    public $MYSQL;

    public function __construct()
    {
        try {
            $this->PDO = new ConexionOracle(); //INICIANDO LA CONEXION A LA BD
            $this->MYSQL = new ClassConexion();
        } catch (Exception $th) {
            throw $th;
        }
    }

    public function countRegistroInidenciaPendienteCoordinador($id_usuario)
    {
        try {
            $mes_actual = Date('Y-m-d');
            $sql = "SELECT * FROM SEMAFORIZACION sema 
            INNER JOIN estado_semaforizacion estasema ON estasema.id_estado_semaforizacion = sema.id_estado_semaforizacion 
            INNER JOIN tipo_semaforizacion tiposema ON tiposema.id_tipo_semaforizacion = sema.id_tipo_semaforizacion 
            INNER JOIN tipo_documento tipodoc ON tipodoc.id_tipo_documento = sema.id_tipo_documento 
            INNER JOIN tipo_paciente tipopac ON tipopac.id_tipo_paciente = sema.id_tipo_paciente
            INNER JOIN origen org ON org.id_origen = sema.id_origen 
            INNER JOIN servicio ser ON ser.id_servicio = sema.id_servicio
            INNER JOIN procedencia pro ON pro.id_procedencia = sema.id_procedencia 
            INNER JOIN areas ar ON ar.id_area = sema.id_area
            INNER JOIN prioridad prio ON prio.id_prioridad = sema.id_prioridad
            INNER JOIN usuario usu ON usu.id_usuario = sema.id_usuario 
            WHERE sema.id_estado_semaforizacion IN ('1') AND sema.id_tipo_semaforizacion IN('2') AND usu.id_usuario IN($id_usuario) AND DATE_FORMAT(sema.fecha_incidencia, '%Y-%m-%d') = '$mes_actual'";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function countRegistroInidenciaCerradaCoordinador($id_usuario)
    {
        try {
            $mes_actual = Date('Y-m-d');
            $sql = "SELECT * FROM SEMAFORIZACION sema 
            INNER JOIN estado_semaforizacion estasema ON estasema.id_estado_semaforizacion = sema.id_estado_semaforizacion 
            INNER JOIN tipo_semaforizacion tiposema ON tiposema.id_tipo_semaforizacion = sema.id_tipo_semaforizacion 
            INNER JOIN tipo_documento tipodoc ON tipodoc.id_tipo_documento = sema.id_tipo_documento 
            INNER JOIN tipo_paciente tipopac ON tipopac.id_tipo_paciente = sema.id_tipo_paciente
            INNER JOIN origen org ON org.id_origen = sema.id_origen 
            INNER JOIN servicio ser ON ser.id_servicio = sema.id_servicio
            INNER JOIN procedencia pro ON pro.id_procedencia = sema.id_procedencia 
            INNER JOIN areas ar ON ar.id_area = sema.id_area
            INNER JOIN prioridad prio ON prio.id_prioridad = sema.id_prioridad
            INNER JOIN usuario usu ON usu.id_usuario = sema.id_usuario 
            WHERE sema.id_estado_semaforizacion IN ('2') AND sema.id_tipo_semaforizacion IN('2') AND usu.id_usuario IN($id_usuario) AND DATE_FORMAT(sema.fecha_incidencia, '%Y-%m-%d') = '$mes_actual'";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function countRegistroReclamoPendienteCoordinador($id_usuario)
    {
        try {
            $mes_actual = Date('Y-m-d');
            $sql = "SELECT * FROM SEMAFORIZACION sema 
            INNER JOIN estado_semaforizacion estasema ON estasema.id_estado_semaforizacion = sema.id_estado_semaforizacion 
            INNER JOIN tipo_semaforizacion tiposema ON tiposema.id_tipo_semaforizacion = sema.id_tipo_semaforizacion 
            INNER JOIN tipo_documento tipodoc ON tipodoc.id_tipo_documento = sema.id_tipo_documento 
            INNER JOIN tipo_paciente tipopac ON tipopac.id_tipo_paciente = sema.id_tipo_paciente
            INNER JOIN origen org ON org.id_origen = sema.id_origen 
            INNER JOIN servicio ser ON ser.id_servicio = sema.id_servicio
            INNER JOIN procedencia pro ON pro.id_procedencia = sema.id_procedencia 
            INNER JOIN areas ar ON ar.id_area = sema.id_area
            INNER JOIN prioridad prio ON prio.id_prioridad = sema.id_prioridad
            INNER JOIN usuario usu ON usu.id_usuario = sema.id_usuario 
            WHERE sema.id_estado_semaforizacion IN ('1') AND sema.id_tipo_semaforizacion IN('1') AND usu.id_usuario IN($id_usuario) AND DATE_FORMAT(sema.fecha_incidencia, '%Y-%m-%d') = '$mes_actual'";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function countRegistroReclamoCerradoCoordinador($id_usuario)
    {
        try {
            $mes_actual = Date('Y-m-d');
            $sql = "SELECT * FROM SEMAFORIZACION sema 
            INNER JOIN estado_semaforizacion estasema ON estasema.id_estado_semaforizacion = sema.id_estado_semaforizacion 
            INNER JOIN tipo_semaforizacion tiposema ON tiposema.id_tipo_semaforizacion = sema.id_tipo_semaforizacion 
            INNER JOIN tipo_documento tipodoc ON tipodoc.id_tipo_documento = sema.id_tipo_documento 
            INNER JOIN tipo_paciente tipopac ON tipopac.id_tipo_paciente = sema.id_tipo_paciente
            INNER JOIN origen org ON org.id_origen = sema.id_origen 
            INNER JOIN servicio ser ON ser.id_servicio = sema.id_servicio
            INNER JOIN procedencia pro ON pro.id_procedencia = sema.id_procedencia 
            INNER JOIN areas ar ON ar.id_area = sema.id_area
            INNER JOIN prioridad prio ON prio.id_prioridad = sema.id_prioridad
            INNER JOIN usuario usu ON usu.id_usuario = sema.id_usuario 
            WHERE sema.id_estado_semaforizacion IN ('2') AND sema.id_tipo_semaforizacion IN('1') AND usu.id_usuario IN($id_usuario) AND DATE_FORMAT(sema.fecha_incidencia, '%Y-%m-%d') = '$mes_actual'";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
