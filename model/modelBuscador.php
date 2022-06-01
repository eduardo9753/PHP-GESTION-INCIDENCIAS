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
            WHERE CONCAT(num_requerimiento,numero_documento,paciente) LIKE '%$caracter%'";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
