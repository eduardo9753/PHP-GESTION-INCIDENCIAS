<?php

class Servicio
{

    private $id_servicio;
    private $nombre_servicio;


    public function __construct()
    {
        $this->id_servicio = '';
        $this->nombre_servicio = '';
    }


    function setid_servicio($id_servicio)
    {
        $this->id_servicio = $id_servicio;
    }
    function getid_servicio()
    {
        return $this->id_servicio;
    }



    function setnombre_servicio($nombre_servicio)
    {
        $this->nombre_servicio = $nombre_servicio;
    }
    function getnombre_servicio()
    {
        return $this->nombre_servicio;
    }
}
