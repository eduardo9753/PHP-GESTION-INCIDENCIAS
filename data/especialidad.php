<?php

class Especialidad
{

    private $id_especialidad;
    private $nombre_especialidad;


    public function __construct()
    {
        $this->id_especialidad = '';
        $this->nombre_especialidad = '';
    }


    function setid_especialidad($id_especialidad)
    {
        $this->id_especialidad = $id_especialidad;
    }
    function getid_especialidad()
    {
        return $this->id_especialidad;
    }



    function setnombre_especialidad($nombre_especialidad)
    {
        $this->nombre_especialidad = $nombre_especialidad;
    }
    function getnombre_especialidad()
    {
        return $this->nombre_especialidad;
    }
}
