<?php

class tipoSemaforizacion
{

    private $id_tipo_semaforizacion;
    private $tipo_semaforizacion;


    public function __construct()
    {
        $this->id_tipo_semaforizacion = '';
        $this->tipo_semaforizacion = '';
    }


    function setid_tipo_semaforizacion($id_tipo_semaforizacion)
    {
        $this->id_tipo_semaforizacion = $id_tipo_semaforizacion;
    }
    function getid_tipo_semaforizacion()
    {
        return $this->id_tipo_semaforizacion;
    }



    function settipo_semaforizacion($tipo_semaforizacion)
    {
        $this->tipo_semaforizacion = $tipo_semaforizacion;
    }
    function gettipo_semaforizacion()
    {
        return $this->tipo_semaforizacion;
    }
}
