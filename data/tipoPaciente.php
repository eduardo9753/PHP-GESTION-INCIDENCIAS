<?php

class TipoPaciente
{

    private $id_tipo_paciente;
    private $nombre_tipo_paciente;


    public function __construct()
    {
        $this->id_tipo_paciente = '';
        $this->nombre_tipo_paciente = '';
    }


    function setid_tipo_paciente($id_tipo_paciente)
    {
        $this->id_tipo_paciente = $id_tipo_paciente;
    }
    function getid_tipo_paciente()
    {
        return $this->id_tipo_paciente;
    }



    function setnombre_tipo_paciente($nombre_tipo_paciente)
    {
        $this->nombre_tipo_paciente = $nombre_tipo_paciente;
    }
    function getnombre_tipo_paciente()
    {
        return $this->nombre_tipo_paciente;
    }
}
