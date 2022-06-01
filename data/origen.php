<?php

class Origen
{

    private $id_origen;
    private $nombre_origen;


    public function __construct()
    {
        $this->id_origen = '';
        $this->nombre_origen = '';
    }


    function setid_origen($id_origen)
    {
        $this->id_origen = $id_origen;
    }
    function getid_origen()
    {
        return $this->id_origen;
    }



    function setnombre_origen($nombre_origen)
    {
        $this->nombre_origen = $nombre_origen;
    }
    function getnombre_origen()
    {
        return $this->nombre_origen;
    }
}
