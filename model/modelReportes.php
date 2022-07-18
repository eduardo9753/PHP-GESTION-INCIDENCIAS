<?php

include_once('config/conexionOracle.php');
include_once('config/conexionMysql.php');

class ModeloReportes
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

    public function dataExcelGeneral($fecha_inicio_incidencia, $fecha_fin_incidencia)
    {
        try {
            $sql = "SELECT 
                sema.num_requerimiento,
                sema.mes_incidencia,
                DATE_FORMAT(sema.fecha_incidencia, '%d/%m/%Y') AS fecha_incidencia,
                docu.nombre_documento,
                sema.numero_documento,
                sema.paciente,
                pac.nombre_tipo_paciente,
                rg.nombre_origen,
                tipopac.nombre_area,
                org.nombre_especialidad,
                sema.personal_involucrado,
                ser.nombre_servicio,
                a.nombre_habitacion, 
                pro.nombre_procedencia,
                sema.numero_procedencia,
                sema.tomo,
                prio.nombre_prioridad,
                ca.nombre_causa,
                caes.nombre_causa_especifica,
                sema.detalle,
                sema.accion_inmediata,
                estasema.nombre_estado_semaforizacion,
                DATE_FORMAT(sema.fecha_cierre, '%d/%m/%Y') AS fecha_cierre,
                concl.nombre_conclusion,
                tisema.tipo_semaforizacion,
                sema.detalle_final,
                usu.nombre_usuario
           
                      FROM SEMAFORIZACION sema 
                      INNER JOIN TIPO_DOCUMENTO docu ON docu.id_tipo_documento = sema.id_tipo_documento 
                      INNER JOIN TIPO_PACIENTE pac ON pac.id_tipo_paciente = sema.id_tipo_paciente 
                      INNER JOIN ORIGEN rg ON rg.id_origen = sema.id_origen 
                      INNER JOIN AREAS tipopac ON tipopac.id_area = sema.id_area
                      INNER JOIN ESPECIALIDAD org ON org.id_especialidad = sema.id_especialidad 
                      INNER JOIN SERVICIO ser ON ser.id_servicio = sema.id_servicio
                      INNER JOIN PROCEDENCIA pro ON pro.id_procedencia = sema.id_procedencia 
                      INNER JOIN PRIORIDAD prio ON prio.id_prioridad = sema.id_prioridad
                      INNER JOIN CAUSA_ESPECIFICA caes ON caes.id_causa_especifica = sema.id_causa_especifica
                      INNER JOIN causa ca ON ca.id_causa = caes.id_causa
                      INNER JOIN habitacion a ON a.id_habitacion = sema.id_habitacion
                      INNER JOIN ESTADO_SEMAFORIZACION estasema ON estasema.id_estado_semaforizacion = sema.id_estado_semaforizacion
                      INNER JOIN CONCLUCION concl ON concl.id_conclusion = sema.id_conclusion
                      INNER JOIN TIPO_SEMAFORIZACION tisema ON tisema.id_tipo_semaforizacion = sema.id_tipo_semaforizacion
                      INNER JOIN usuario usu ON usu.id_usuario = sema.id_usuario  
                      WHERE sema.id_estado_semaforizacion IN(1,2) AND sema.id_tipo_semaforizacion IN(1,2,3) AND DATE_FORMAT(sema.fecha_incidencia, '%Y-%m-%d') BETWEEN '$fecha_inicio_incidencia' AND '$fecha_fin_incidencia' 
                      ORDER BY sema.fecha_incidencia ASC ";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataExcel(tipoSemaforizacion $tipoSemaforizacion, EstadoSemaforizacion $estadoSemaforizacion, $fecha_inicio_incidencia, $fecha_fin_incidencia)
    {
        try {
            $sql = "SELECT 
                sema.num_requerimiento,
                sema.mes_incidencia,
                DATE_FORMAT(sema.fecha_incidencia, '%d/%m/%Y') AS fecha_incidencia,
                docu.nombre_documento,
                sema.numero_documento,
                sema.paciente,
                pac.nombre_tipo_paciente,
                rg.nombre_origen,
                tipopac.nombre_area,
                org.nombre_especialidad,
                sema.personal_involucrado,
                ser.nombre_servicio,
                a.nombre_habitacion,
                pro.nombre_procedencia,
                sema.numero_procedencia,
                sema.tomo,
                prio.nombre_prioridad,
                ca.nombre_causa,
                caes.nombre_causa_especifica,
                sema.detalle,
                sema.accion_inmediata,
                estasema.nombre_estado_semaforizacion,
                DATE_FORMAT(sema.fecha_cierre, '%d/%m/%Y') AS fecha_cierre,
                concl.nombre_conclusion,
                tisema.tipo_semaforizacion,
                sema.detalle_final,
                usu.nombre_usuario
           
                      FROM SEMAFORIZACION sema 
                      INNER JOIN TIPO_DOCUMENTO docu ON docu.id_tipo_documento = sema.id_tipo_documento 
                      INNER JOIN TIPO_PACIENTE pac ON pac.id_tipo_paciente = sema.id_tipo_paciente 
                      INNER JOIN ORIGEN rg ON rg.id_origen = sema.id_origen 
                      INNER JOIN AREAS tipopac ON tipopac.id_area = sema.id_area
                      INNER JOIN ESPECIALIDAD org ON org.id_especialidad = sema.id_especialidad 
                      INNER JOIN SERVICIO ser ON ser.id_servicio = sema.id_servicio
                      INNER JOIN PROCEDENCIA pro ON pro.id_procedencia = sema.id_procedencia 
                      INNER JOIN PRIORIDAD prio ON prio.id_prioridad = sema.id_prioridad
                      INNER JOIN CAUSA_ESPECIFICA caes ON caes.id_causa_especifica = sema.id_causa_especifica
                      INNER JOIN causa ca ON ca.id_causa = caes.id_causa
                      INNER JOIN habitacion a ON a.id_habitacion = sema.id_habitacion
                      INNER JOIN ESTADO_SEMAFORIZACION estasema ON estasema.id_estado_semaforizacion = sema.id_estado_semaforizacion
                      INNER JOIN CONCLUCION concl ON concl.id_conclusion = sema.id_conclusion
                      INNER JOIN TIPO_SEMAFORIZACION tisema ON tisema.id_tipo_semaforizacion = sema.id_tipo_semaforizacion
                      INNER JOIN usuario usu ON usu.id_usuario = sema.id_usuario 
            WHERE sema.id_estado_semaforizacion IN(?) AND sema.id_tipo_semaforizacion IN(?) AND DATE_FORMAT(sema.fecha_incidencia, '%Y-%m-%d') BETWEEN '$fecha_inicio_incidencia' AND '$fecha_fin_incidencia'
            ORDER BY sema.fecha_incidencia ASC ";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $estadoSemaforizacion->getid_estado_semaforizacion(),
                $tipoSemaforizacion->getid_tipo_semaforizacion()
            ));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }



    public function dataPDFIncidencia(Semaforizacion $semaforizacion)
    {
        try {
            $sql = "SELECT * FROM SEMAFORIZACION sema 
            INNER JOIN TIPO_DOCUMENTO docu ON docu.id_tipo_documento = sema.id_tipo_documento 
            INNER JOIN TIPO_PACIENTE pac ON pac.id_tipo_paciente = sema.id_tipo_paciente 
            INNER JOIN ORIGEN rg ON rg.id_origen = sema.id_origen 
            INNER JOIN AREAS tipopac ON tipopac.id_area = sema.id_area
            INNER JOIN ESPECIALIDAD org ON org.id_especialidad = sema.id_especialidad 
            INNER JOIN SERVICIO ser ON ser.id_servicio = sema.id_servicio
            INNER JOIN PROCEDENCIA pro ON pro.id_procedencia = sema.id_procedencia 
            INNER JOIN PRIORIDAD prio ON prio.id_prioridad = sema.id_prioridad
            INNER JOIN habitacion ha ON ha.id_habitacion = sema.id_habitacion
            INNER JOIN CAUSA_ESPECIFICA caes ON caes.id_causa_especifica = sema.id_causa_especifica
            INNER JOIN causa ca ON ca.id_causa = caes.id_causa
            INNER JOIN ESTADO_SEMAFORIZACION estasema ON estasema.id_estado_semaforizacion = sema.id_estado_semaforizacion
            INNER JOIN CONCLUCION concl ON concl.id_conclusion = sema.id_conclusion
            INNER JOIN TIPO_SEMAFORIZACION tisema ON tisema.id_tipo_semaforizacion = sema.id_tipo_semaforizacion
            WHERE sema.id=?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $semaforizacion->getid()
            ));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
