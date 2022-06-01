<?php

class Semaforizacion
{

    private $id;
    private $num_requerimiento;
    private $id_tipo_semaforizacion;
    private $mes_incidencia;
    private $fecha_incidencia;
    private $id_tipo_documento;
    private $numero_documento;
    private $paciente;
    private $id_tipo_paciente;
    private $id_origen;
    private $id_area;
    private $id_especialidad;
    private $personal_involucrado;
    private $id_servicio;
    private $id_habitacion;
    private $id_procedencia;
    private $numero;
    private $tomo;
    private $id_prioridad;
    private $id_causa;
    private $id_causa_especifica;
    private $documento; #file
    private $detalle;
    private $accion_inmediata;
    private $fecha_cierre;
    private $id_conclusion;
    private $id_usuario;
    private $id_estado_semaforizacion;
    private $detalle_final;

    public function __construct()
    {
        $this->id = '';
        $this->num_requerimiento = '';
        $this->mes_incidencia = '';
        $this->fecha_incidencia = '';
        $this->id_tipo_documento = '';
        $this->numero_documento = '';
        $this->paciente = '';
        $this->id_tipo_paciente = '';
        $this->id_origen = '';
        $this->id_area = '';
        $this->id_especialidad = '';
        $this->personal_involucrado = '';
        $this->id_servicio = '';
        $this->id_habitacion = '';
        $this->id_procedencia = '';
        $this->numero = '';
        $this->tomo = '';
        $this->id_prioridad = '';
        $this->id_causa = '';
        $this->id_causa_especifica = '';
        $this->documento = '';
        $this->detalle = '';
        $this->accion_inmediata = '';
        $this->fecha_cierre = '';
        $this->id_conclusion = '';
        $this->id_usuario = '';
        $this->id_estado_semaforizacion = '';
        $this->detalle_final = '';
    }


    function setid($id)
    {
        $this->id = $id;
    }
    function getid()
    {
        return $this->id;
    }

    function setid_estado_semaforizacion($id_estado_semaforizacion)
    {
        $this->id_estado_semaforizacion = $id_estado_semaforizacion;
    }
    function getid_estado_semaforizacion()
    {
        return $this->id_estado_semaforizacion;
    }

    function setnum_requerimiento($num_requerimiento)
    {
        $this->num_requerimiento = $num_requerimiento;
    }
    function getnum_requerimiento()
    {
        return $this->num_requerimiento;
    }

    function setid_tipo_semaforizacion($id_tipo_semaforizacion)
    {
        $this->id_tipo_semaforizacion = $id_tipo_semaforizacion;
    }
    function getid_tipo_semaforizacion()
    {
        return $this->id_tipo_semaforizacion;
    }

    function setmes_incidencia($mes_incidencia)
    {
        $this->mes_incidencia = $mes_incidencia;
    }
    function getmes_incidencia()
    {
        return $this->mes_incidencia;
    }


    function setfecha_incidencia($fecha_incidencia)
    {
        $this->fecha_incidencia = $fecha_incidencia;
    }
    function getfecha_incidencia()
    {
        return $this->fecha_incidencia;
    }


    function setid_tipo_documento($id_tipo_documento)
    {
        $this->id_tipo_documento = $id_tipo_documento;
    }
    function getid_tipo_documento()
    {
        return $this->id_tipo_documento;
    }

    function setnumero_documento($numero_documento)
    {
        $this->numero_documento = $numero_documento;
    }
    function getnumero_documento()
    {
        return $this->numero_documento;
    }

    function settomo($tomo)
    {
        $this->tomo = $tomo;
    }
    function gettomo()
    {
        return $this->tomo;
    }

    function setid_prioridad($id_prioridad)
    {
        $this->id_prioridad = $id_prioridad;
    }
    function getid_prioridad()
    {
        return $this->id_prioridad;
    }

    function setid_causa($id_causa)
    {
        $this->id_causa = $id_causa;
    }
    function getid_causa()
    {
        return $this->id_causa;
    }

    function setid_causa_especifica($id_causa_especifica)
    {
        $this->id_causa_especifica = $id_causa_especifica;
    }
    function getid_causa_especifica()
    {
        return $this->id_causa_especifica;
    }

    function setdocumento($documento)
    {
        $this->documento = $documento;
    }
    function getdocumento()
    {
        return $this->documento;
    }

    function setdetalle($detalle)
    {
        $this->detalle = $detalle;
    }
    function getdetalle()
    {
        return $this->detalle;
    }

    function setaccion_inmediata($accion_inmediata)
    {
        $this->accion_inmediata = $accion_inmediata;
    }
    function getaccion_inmediata()
    {
        return $this->accion_inmediata;
    }

    function setfecha_cierre($fecha_cierre)
    {
        $this->fecha_cierre = $fecha_cierre;
    }
    function getfecha_cierre()
    {
        return $this->fecha_cierre;
    }

    function setid_conclusion($id_conclusion)
    {
        $this->id_conclusion = $id_conclusion;
    }
    function getid_conclusion()
    {
        return $this->id_conclusion;
    }

    function setnumero($numero)
    {
        $this->numero = $numero;
    }
    function getnumero()
    {
        return $this->numero;
    }

    function setpaciente($paciente)
    {
        $this->paciente = $paciente;
    }
    function getpaciente()
    {
        return $this->paciente;
    }

    function setid_tipo_paciente($id_tipo_paciente)
    {
        $this->id_tipo_paciente = $id_tipo_paciente;
    }
    function getid_tipo_paciente()
    {
        return $this->id_tipo_paciente;
    }

    function setid_origen($id_origen)
    {
        $this->id_origen = $id_origen;
    }
    function getid_origen()
    {
        return $this->id_origen;
    }

    function setid_area($id_area)
    {
        $this->id_area = $id_area;
    }
    function getid_area()
    {
        return $this->id_area;
    }

    function setid_especialidad($id_especialidad)
    {
        $this->id_especialidad = $id_especialidad;
    }
    function getid_especialidad()
    {
        return $this->id_especialidad;
    }

    function setpersonal_involucrado($personal_involucrado)
    {
        $this->personal_involucrado = $personal_involucrado;
    }
    function getpersonal_involucrado()
    {
        return $this->personal_involucrado;
    }

    function setid_servicio($id_servicio)
    {
        $this->id_servicio = $id_servicio;
    }
    function getid_servicio()
    {
        return $this->id_servicio;
    }

    function setid_habitacion($id_habitacion)
    {
        $this->id_habitacion = $id_habitacion;
    }
    function getid_habitacion()
    {
        return $this->id_habitacion;
    }

    function setid_procedencia($id_procedencia)
    {
        $this->id_procedencia = $id_procedencia;
    }
    function getid_procedencia()
    {
        return $this->id_procedencia;
    }

    function setid_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    function getid_usuario()
    {
        return $this->id_usuario;
    }

    function setdetalle_final($detalle_final)
    {
        $this->detalle_final = $detalle_final;
    }
    function getdetalle_final()
    {
        return $this->detalle_final;
    }
}
