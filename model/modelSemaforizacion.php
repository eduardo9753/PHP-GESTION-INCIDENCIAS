<?php

include_once('config/conexionOracle.php');
include_once('config/conexionMysql.php');

class ModeloSemaforizacion
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


    public function insertIncidencia(Semaforizacion $semaforizacion)
    {
        try {
            $sql = "CALL SP_INCIDENCIA_INSERT(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql)->execute(
                array(
                    $semaforizacion->getmes_incidencia(),
                    $semaforizacion->getfecha_incidencia(),
                    $semaforizacion->getid_tipo_documento(),
                    $semaforizacion->getnumero_documento(),
                    $semaforizacion->getpaciente(),
                    $semaforizacion->getid_tipo_paciente(),
                    $semaforizacion->getid_origen(),
                    $semaforizacion->getid_area(),
                    $semaforizacion->getid_especialidad(),
                    $semaforizacion->getpersonal_involucrado(),
                    $semaforizacion->getid_servicio(),
                    $semaforizacion->getid_habitacion(),
                    $semaforizacion->getid_procedencia(),
                    $semaforizacion->getnumero(),
                    $semaforizacion->gettomo(),
                    $semaforizacion->getid_prioridad(),
                    $semaforizacion->getid_causa_especifica(),
                    $semaforizacion->getdocumento(),
                    $semaforizacion->getdetalle(),
                    $semaforizacion->getaccion_inmediata(),
                    $semaforizacion->getid_estado_semaforizacion(),
                    $semaforizacion->getfecha_cierre(),
                    $semaforizacion->getid_conclusion(),
                    $semaforizacion->getid_tipo_semaforizacion(),
                    $semaforizacion->getid_usuario(),
                )
            );
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    public function updateSemaforizacion(Semaforizacion $semaforizacion)
    {
        try {
            $sql = "UPDATE SEMAFORIZACION SET fecha_cierre =?, id_conclusion=?, id_estado_semaforizacion=? , detalle_final=? WHERE id = ?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql)->execute(
                array(
                    $semaforizacion->getfecha_cierre(),
                    $semaforizacion->getid_conclusion(),
                    $semaforizacion->getid_estado_semaforizacion(),
                    $semaforizacion->getdetalle_final(),
                    $semaforizacion->getid()
                )
            );
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function editarDataSemaforizacion(Semaforizacion $semaforizacion){
        try {
            $sql = "UPDATE SEMAFORIZACION SET detalle =?, accion_inmediata=? WHERE id = ?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql)->execute(
                array(
                    $semaforizacion->getdetalle(),
                    $semaforizacion->getaccion_inmediata(),
                    $semaforizacion->getid()
                )
            );
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function updateSemaforizacionAndFile(Semaforizacion $semaforizacion)
    {
        try {
            $sql = "UPDATE SEMAFORIZACION SET fecha_cierre =?, id_conclusion=?, documento=?, id_estado_semaforizacion=? , detalle_final=? WHERE id = ?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql)->execute(
                array(
                    $semaforizacion->getfecha_cierre(),
                    $semaforizacion->getid_conclusion(),
                    $semaforizacion->getdocumento(),
                    $semaforizacion->getid_estado_semaforizacion(),
                    $semaforizacion->getdetalle_final(),
                    $semaforizacion->getid()
                )
            );
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }



    public function semaforizacionById(Semaforizacion $semaforizacion)
    {
        try {
            $sql = "SELECT * FROM gestion_carta WHERE id = ?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(
                array()
            );
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataIncidenciaPendiente($id_usuario)
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
            INNER JOIN usuario usu ON usu.id_usuario = sema.id_usuario
            WHERE sema.id_estado_semaforizacion IN ('1') AND sema.id_tipo_semaforizacion IN('2') AND usu.id_usuario IN('$id_usuario') ";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataReclamoPendiente()
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
            WHERE sema.id_estado_semaforizacion IN ('1') AND sema.id_tipo_semaforizacion IN('1') ";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array());
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    //PARA EL SELECT DINAMICO
    public function causaEspecificaById($id_causa)
    {
        try {
            $sql = "SELECT * FROM causa_especifica cau WHERE cau.id_causa=?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array($id_causa));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
