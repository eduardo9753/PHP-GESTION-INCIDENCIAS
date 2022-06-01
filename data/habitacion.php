<?php

class Habitacion
{

    private $id_habitacion;
    private $nombre_habitacion;


    public function __construct()
    {
        $this->id_habitacion = '';
        $this->nombre_habitacion = '';
    }


    function setid_habitacion($id_habitacion)
    {
        $this->id_habitacion = $id_habitacion;
    }
    function getid_habitacion()
    {
        return $this->id_habitacion;
    }



    function setnombre_habitacion($nombre_habitacion)
    {
        $this->nombre_habitacion = $nombre_habitacion;
    }
    function getnombre_habitacion()
    {
        return $this->nombre_habitacion;
    }
}
