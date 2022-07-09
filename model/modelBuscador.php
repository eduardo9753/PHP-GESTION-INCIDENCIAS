<?php

include_once('config/conexionOracle.php');
include_once('config/conexionMysql.php');

class ModeloBuscador
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

    public function dataBuscador($caracter)
    {
        try {
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
            INNER JOIN conclucion con ON con.id_conclusion = sema.id_conclusion
            INNER JOIN usuario usu ON usu.id_usuario = sema.id_usuario
            WHERE CONCAT(num_requerimiento,numero_documento,paciente) LIKE '%$caracter%'";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataBuscarUsuario($fecha_inicio_incidencia, $fecha_fin_incidencia,$id_usuario)
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
                      INNER JOIN CAUSA_ESPECIFICA caes ON caes.id_causa_especifica = sema.id_causa_especifica
                      INNER JOIN causa ca ON ca.id_causa = caes.id_causa
                      INNER JOIN habitacion a ON a.id_habitacion = sema.id_habitacion
                      INNER JOIN ESTADO_SEMAFORIZACION estasema ON estasema.id_estado_semaforizacion = sema.id_estado_semaforizacion
                      INNER JOIN CONCLUCION concl ON concl.id_conclusion = sema.id_conclusion
                      INNER JOIN TIPO_SEMAFORIZACION tisema ON tisema.id_tipo_semaforizacion = sema.id_tipo_semaforizacion
                      INNER JOIN usuario usu ON usu.id_usuario = sema.id_usuario 
            WHERE sema.id_estado_semaforizacion IN(1,2) AND sema.id_tipo_semaforizacion IN(1,2,3) AND DATE_FORMAT(sema.fecha_incidencia, '%Y-%m-%d') BETWEEN '$fecha_inicio_incidencia' AND '$fecha_fin_incidencia' AND usu.id_usuario IN($id_usuario)
            ORDER BY sema.fecha_incidencia DESC ";
            //tipo semaforizacion
            //1: reclamos
            //2: incidencia
            //3: consulta/atencion
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
