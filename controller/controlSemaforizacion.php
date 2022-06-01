<?php

//MODEL
include_once('model/modelSemaforizacion.php');
include_once('model/modelAseets.php');
include_once('model/modelLogin.php');


//UTILS
include_once('utils/modelMensaje.php');
include_once('utils/modelSession.php');


//DATOS
include_once('data/usuario.php');
include_once('data/semaforizacion.php');



class ControlSemaforizacion
{

    public $MODELSEMAFORIZACION;
    public $ASSETS;
    public $MSG;
    public $MODELTABLA;
    public $SESSION;


    public function __construct()
    {
        $this->MODELSEMAFORIZACION = new ModeloSemaforizacion();
        $this->ASSETS = new ModeloAssets();
        $this->MSG = new ModeloMensaje();
        $this->MODELTABLA = new ModeloTabla();
        $this->SESSION = new ModeloSession();
    }


    public function Incidencia()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();

            $titulo = "Formulario - Registro de Incidencias";

            //color de links
            if (isset($_REQUEST['ruta']) == 'Incidencia') {
                $ruta = 'Incidencia';
            }

            $dataTIPO_DOCUMENTO = $this->MODELTABLA->dataTIPO_DOCUMENTO();
            $dataTIPO_PACIENTE = $this->MODELTABLA->dataTIPO_PACIENTE();
            $dataORIGEN = $this->MODELTABLA->dataORIGEN();
            $dataESPECIALIDAD = $this->MODELTABLA->dataESPECIALIDAD();
            $dataSERVICIO = $this->MODELTABLA->dataSERVICIO();
            $dataHABITACION = $this->MODELTABLA->dataHABITACION();
            $dataPROCEDENCIA = $this->MODELTABLA->dataPROCEDENCIA();
            $dataPRIORIDAD = $this->MODELTABLA->dataPRIORIDAD();
            $dataCAUSA = $this->MODELTABLA->dataCAUSA();
            $dataCAUSA_ESPECIFICA = $this->MODELTABLA->dataCAUSA_ESPECIFICA();
            $dataESTADO_SEMAFORIZACION = $this->MODELTABLA->dataESTADO_SEMAFORIZACION();
            $dataCONCLUCION = $this->MODELTABLA->dataCONCLUCION();
            $dataTIPO_SEMAFORIZACION = $this->MODELTABLA->dataTIPO_SEMAFORIZACION();


            //AREAS CON SERVICIOS
            $dataAdministrativo = $this->MODELTABLA->dataAdministrativo();
            $dataMedico = $this->MODELTABLA->dataMedico();
            $dataAsistencial = $this->MODELTABLA->dataAsistencial();
            $dataOtro = $this->MODELTABLA->dataOtro();

            include_once('view/coordinador/semaforizacion/formRegistroSemaforizacion.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }


    //FUNCION QUE ESTA ENLAZADO CON "causaEspecifica" , AHORA ES AUTONOMO
    public function causaEspecifica()
    {
        try {
            $id_causa = filter_input(INPUT_POST, 'id_causa');
            $datos = $this->MODELSEMAFORIZACION->causaEspecificaById($id_causa);

            foreach ($datos as $datos) :
                echo '<option value="' . $datos->id_causa_especifica . '">' . $datos->nombre_causa_especifica . '</option>';
            endforeach;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function insertIncidencia()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();
            $id_usuario = $_SESSION["id_usuario"];

            $directorio = "docs/";
            $filePaus = $directorio . $this->ASSETS->CLEAN(basename($_FILES['txt_file']['name']));
            move_uploaded_file($_FILES['txt_file']['tmp_name'], $filePaus);

            //si es pendiente la fecha de cierre no se guarda ni la cinclusion "fundado - infundado"
            if ($_POST['estado_semaforizacion'] == 1) {
                $fecha_cierre = "";
                $conclusion = 5;
            } else {
                $fecha_cierre = $_POST['txt_fecha_cierre'];
                $conclusion = $_POST['cbo_conclusion'];
            }

            //SERVICIO : HOSPITALARIO
            if ($_POST['cbo_servicio'] == 4) {
                $servicio = $_POST['cbo_servicio'];
                $habitacion = $_POST['cbo_habitacion'];
            } else {
                $servicio = $_POST['cbo_servicio'];
                $habitacion = 109; //"NO APLICA" EN LA TABLA HABITACION
            }


            //ORIGEN POR AREA  : SI ES DISTINTO AL PRIMERO ENTONCES ELIGIO ALGUN COMBO SELECCIONADO
            if ($_POST['cbo_area_admin'] !== 'administrativo') { //SI LO QUE SE RECIBE ES DISTINTO DE "administratitvo" ENTONCES SE ELIJIO UN COMBO DISTINTO
                $cbo_area = $_POST['cbo_area_admin'];
            } else if ($_POST['cbo_area_medico'] !== 'medico') {
                $cbo_area = $_POST['cbo_area_medico'];
            } else if ($_POST['cbo_area_asisten'] !== 'asistencial') {
                $cbo_area = $_POST['cbo_area_asisten'];
            } else if ($_POST['cbo_area_otro'] !== 'otro') {
                $cbo_area = $_POST['cbo_area_otro'];
            }

            $semaforizacion = new Semaforizacion();
            $date = Date('Y-m-d h:i:s');
            $mount = $this->ASSETS->mesActualCadena();
            $semaforizacion->setmes_incidencia($mount);
            $semaforizacion->setfecha_incidencia($date);
            $semaforizacion->setid_tipo_documento($_POST['cbo_tipo_documento']);
            $semaforizacion->setnumero_documento($_POST['txt_numero_documento']);
            $semaforizacion->setpaciente($_POST['txt_paciente']);
            $semaforizacion->setid_tipo_paciente($_POST['cbo_tipo_paciente']);
            $semaforizacion->setid_origen($_POST['cbo_origen']);
            $semaforizacion->setid_area($cbo_area);
            $semaforizacion->setid_especialidad($_POST['cbo_especialidad']);
            $semaforizacion->setpersonal_involucrado($_POST['txt_personal_involucrado']);
            $semaforizacion->setid_servicio($servicio);
            $semaforizacion->setid_habitacion($habitacion); #id habitacion
            $semaforizacion->setid_procedencia($_POST['cbo_procedencia']);
            $semaforizacion->setnumero($_POST['txt_numero']);
            $semaforizacion->settomo($_POST['txt_tomo']);
            $semaforizacion->setid_prioridad($_POST['cbo_prioridad']);
            //$semaforizacion->setid_causa($_POST['cbo_causa']);
            $semaforizacion->setid_causa_especifica($_POST['cbo_causa_especifica']);
            $semaforizacion->setdocumento($filePaus);
            $semaforizacion->setdetalle($_POST['txt_detalle']);
            $semaforizacion->setaccion_inmediata($_POST['txt_accion_inmediata']);
            $semaforizacion->setid_estado_semaforizacion($_POST['estado_semaforizacion']);
            $semaforizacion->setfecha_cierre($fecha_cierre);
            $semaforizacion->setid_conclusion($conclusion);
            $semaforizacion->setid_tipo_semaforizacion($_POST['tipo_semaforizacion']);
            $semaforizacion->setid_usuario($id_usuario);

            $save = $this->MODELSEMAFORIZACION->insertIncidencia($semaforizacion);

            if ($save) {
                if ($semaforizacion->getid_tipo_semaforizacion() == 1) {
                    header('Location:ReclamoPendiente');
                } else {
                    header('Location:InidenciaPendiente');
                }
            } else {
                header('Location:Incidencia');
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function ActualizarIncidencia()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();
            $id_usuario = $_SESSION["id_usuario"];
            $semaforizacion = new Semaforizacion();

            if (isset($_FILES['txt_file']['name'])) {
                $directorio = "docs/";
                $filePaus = $directorio . $this->ASSETS->CLEAN(basename($_FILES['txt_file']['name']));
                move_uploaded_file($_FILES['txt_file']['tmp_name'], $filePaus);
                $semaforizacion->setfecha_cierre($_POST['txt_fecha_cierre']);
                $semaforizacion->setid_conclusion($_POST['txt_conclusion']);
                $semaforizacion->setid($_POST['txt_id']);
                $semaforizacion->setid_estado_semaforizacion(2);
                $semaforizacion->setdocumento($filePaus);
                $semaforizacion->setdetalle_final($_POST['txt_detalle_final']);
                $save = $this->MODELSEMAFORIZACION->updateSemaforizacionAndFile($semaforizacion);
            } else {
                $semaforizacion->setfecha_cierre($_POST['txt_fecha_cierre']);
                $semaforizacion->setid_conclusion($_POST['txt_conclusion']);
                $semaforizacion->setid($_POST['txt_id']);
                $semaforizacion->setid_estado_semaforizacion(2);
                $semaforizacion->setdetalle_final($_POST['txt_detalle_final']);
                $save = $this->MODELSEMAFORIZACION->updateSemaforizacion($semaforizacion);
            }

            if ($save) {
                header('Location:InidenciaPendiente');
            } else {
                echo "no guardado";
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function ActualizarReclamo()
    {
        try {
            //VER LA SESSION INICIADA  
            $this->SESSION->isSession();
            $id_usuario = $_SESSION["id_usuario"];
            $semaforizacion = new Semaforizacion();

            if (isset($_FILES['txt_file']['name'])) {
                $directorio = "docs/";
                $filePaus = $directorio . $this->ASSETS->CLEAN(basename($_FILES['txt_file']['name']));
                move_uploaded_file($_FILES['txt_file']['tmp_name'], $filePaus);
                $semaforizacion->setfecha_cierre($_POST['txt_fecha_cierre']);
                $semaforizacion->setid_conclusion($_POST['txt_conclusion']);
                $semaforizacion->setid($_POST['txt_id']);
                $semaforizacion->setid_estado_semaforizacion(2);
                $semaforizacion->setdocumento($filePaus);
                $semaforizacion->setdetalle_final($_POST['txt_detalle_final']);
                $save = $this->MODELSEMAFORIZACION->updateSemaforizacionAndFile($semaforizacion);
            } else {
                $semaforizacion->setfecha_cierre($_POST['txt_fecha_cierre']);
                $semaforizacion->setid_conclusion($_POST['txt_conclusion']);
                $semaforizacion->setid($_POST['txt_id']);
                $semaforizacion->setid_estado_semaforizacion(2);
                $semaforizacion->setdetalle_final($_POST['txt_detalle_final']);
                $save = $this->MODELSEMAFORIZACION->updateSemaforizacion($semaforizacion);
            }

            if ($save) {
                header('Location:ReclamoPendiente');
            } else {
                echo "no guardado";
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    /*public function updateLaboratorio()
    {
        try {
            $ids = $_POST['id'];

            foreach ($ids as $value) :
                $semaforizacion = new Semaforizacion();
                $semaforizacion->setnum_requerimiento('S-modicado5');
                $semaforizacion->setid($value);
                $save = $this->MODELSEMAFORIZACION->updateSemaforizacion($semaforizacion);
            endforeach;

            if ($save) {
                echo 1;
            } else {
                echo 0;
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }*/
}
