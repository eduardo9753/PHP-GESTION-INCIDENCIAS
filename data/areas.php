<?php

class Areas
{

    private $id_area;
    private $nombre_area;


    public function __construct()
    {
        $this->id_area = '';
        $this->nombre_area = '';
    }


    function setid_area($id_area)
    {
        $this->id_area = $id_area;
    }
    function getid_area()
    {
        return $this->id_area;
    }



    function setnombre_area($nombre_area)
    {
        $this->nombre_area = $nombre_area;
    }
    function getnombre_area()
    {
        return $this->nombre_area;
    }
}
