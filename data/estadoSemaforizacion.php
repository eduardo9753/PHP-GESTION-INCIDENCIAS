<?php

class EstadoSemaforizacion
{

    private $id_estado_semaforizacion;
    private $nombre_estado_semaforizacion;


    public function __construct()
    {
        $this->id_estado_semaforizacion = '';
        $this->nombre_estado_semaforizacion = '';
    }


    function setid_estado_semaforizacion($id_estado_semaforizacion)
    {
        $this->id_estado_semaforizacion = $id_estado_semaforizacion;
    }
    function getid_estado_semaforizacion()
    {
        return $this->id_estado_semaforizacion;
    }



    function setnombre_estado_semaforizacion($nombre_estado_semaforizacion)
    {
        $this->nombre_estado_semaforizacion = $nombre_estado_semaforizacion;
    }
    function getnombre_estado_semaforizacion()
    {
        return $this->nombre_estado_semaforizacion;
    }
}
