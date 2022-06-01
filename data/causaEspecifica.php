<?php

class CausaEspecifica
{

    private $id_causa_especifica;
    private $nombre_causa_especifica;


    public function __construct()
    {
        $this->id_causa_especifica = '';
        $this->nombre_causa_especifica = '';
    }


    function setid_causa_especifica($id_causa_especifica)
    {
        $this->id_causa_especifica = $id_causa_especifica;
    }
    function getid_causa_especifica()
    {
        return $this->id_causa_especifica;
    }



    function setnombre_causa_especifica($nombre_causa_especifica)
    {
        $this->nombre_causa_especifica = $nombre_causa_especifica;
    }
    function getnombre_causa_especifica()
    {
        return $this->nombre_causa_especifica;
    }
}
