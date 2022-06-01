<?php

class TipoDocumento
{

    private $id_tipo_documento;
    private $nombre_documento;


    public function __construct()
    {
        $this->id_tipo_documento = '';
        $this->nombre_documento = '';
    }


    function setid_tipo_documento($id_tipo_documento)
    {
        $this->id_tipo_documento = $id_tipo_documento;
    }
    function getid_tipo_documento()
    {
        return $this->id_tipo_documento;
    }



    function setnombre_documento($nombre_documento)
    {
        $this->nombre_documento = $nombre_documento;
    }
    function getnombre_documento()
    {
        return $this->nombre_documento;
    }
}
