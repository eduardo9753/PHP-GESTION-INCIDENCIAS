<?php

class Prioridad
{

    private $id_prioridad;
    private $nombre_prioridad;


    public function __construct()
    {
        $this->id_prioridad = '';
        $this->nombre_prioridad = '';
    }


    function setid_prioridad($id_prioridad)
    {
        $this->id_prioridad = $id_prioridad;
    }
    function getid_prioridad()
    {
        return $this->id_prioridad;
    }



    function setnombre_prioridad($nombre_prioridad)
    {
        $this->nombre_prioridad = $nombre_prioridad;
    }
    function getnombre_prioridad()
    {
        return $this->nombre_prioridad;
    }
}
