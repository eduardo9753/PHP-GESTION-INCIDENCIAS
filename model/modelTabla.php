<?php

include_once('config/conexionOracle.php');
include_once('config/conexionMysql.php');

class ModeloTabla
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


    public function dataTIPO_DOCUMENTO()
    {
        try {
            $sql = "SELECT * FROM TIPO_DOCUMENTO";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataTIPO_PACIENTE()
    {
        try {
            $sql = "SELECT * FROM TIPO_PACIENTE";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataORIGEN()
    {
        try {
            $sql = "SELECT * FROM ORIGEN O ORDER BY O.id_origen DESC";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataAdministrativo()
    {
        try {
            $sql = "SELECT  * FROM areas ar WHERE ar.id_area BETWEEN 1 AND 39;";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataMedico()
    {
        try {
            $sql = "SELECT  * FROM areas ar WHERE ar.id_area BETWEEN 40 AND 57;";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataAsistencial()
    {
        try {
            $sql = "SELECT  * FROM areas ar WHERE ar.id_area BETWEEN 58 AND 74;";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataOtro()
    {
        try {
            $sql = "SELECT  * FROM areas ar WHERE ar.id_area BETWEEN 75 AND 79;";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataESPECIALIDAD()
    {
        try {
            $sql = "SELECT * FROM ESPECIALIDAD";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataSERVICIO()
    {
        try {
            $sql = "SELECT * FROM SERVICIO";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataHABITACION()
    {
        try {
            $sql = "SELECT * FROM habitacion WHERE nombre_habitacion NOT LIKE '%NO APLICA%'";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataPROCEDENCIA()
    {
        try {
            $sql = "SELECT * FROM PROCEDENCIA p ORDER BY p.nombre_procedencia ASC";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataPRIORIDAD()
    {
        try {
            $sql = "SELECT * FROM PRIORIDAD";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataCAUSA()
    {
        try {
            $sql = "SELECT * FROM CAUSA ca ORDER BY ca.nombre_causa DESC";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataCAUSA_ESPECIFICA()
    {
        try {
            $sql = "SELECT * FROM CAUSA_ESPECIFICA";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataESTADO_SEMAFORIZACION()
    {
        try {
            $sql = "SELECT  * FROM estado_semaforizacion";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataCONCLUCION()
    {
        try {
            $sql = "SELECT * FROM conclucion C WHERE C.nombre_conclusion NOT LIKE '%EN SEGUIMIENTO%'";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function dataTIPO_SEMAFORIZACION()
    {
        try {
            $sql = "SELECT * FROM TIPO_SEMAFORIZACION";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
