<?php

class Causa
{

    private $id_causa;
    private $nombre_causa;


    public function __construct()
    {
        $this->id_causa = '';
        $this->nombre_causa = '';
    }


    function setid_causa($id_causa)
    {
        $this->id_causa = $id_causa;
    }
    function getid_causa()
    {
        return $this->id_causa;
    }



    function setnombre_causa($nombre_causa)
    {
        $this->nombre_causa = $nombre_causa;
    }
    function getnombre_causa()
    {
        return $this->nombre_causa;
    }
}
