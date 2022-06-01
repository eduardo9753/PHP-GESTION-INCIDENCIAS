<?php

class Procedencia
{

    private $id_procedencia;
    private $nombre_procedencia;


    public function __construct()
    {
        $this->id_procedencia = '';
        $this->nombre_procedencia = '';
    }


    function setid_procedencia($id_procedencia)
    {
        $this->id_procedencia = $id_procedencia;
    }
    function getid_procedencia()
    {
        return $this->id_procedencia;
    }



    function setnombre_procedencia($nombre_procedencia)
    {
        $this->nombre_procedencia = $nombre_procedencia;
    }
    function getnombre_procedencia()
    {
        return $this->nombre_procedencia;
    }
}
